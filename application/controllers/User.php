<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('users_model');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('session');
		//get all users
		$this->data['users'] = $this->users_model->getAllUsers();
	}

	public function index()
	{
		$this->load->view('includes/head');
		$this->load->view('includes/header');
		//if ($this->session->userdata('logged_in') !== TRUE) {
		$this->load->view('index');
		$this->load->view('includes/footer');
		//}
	}

	public function register()
	{
		$this->load->view('includes/head');
		//$this->load->view('includes/header');
		$this->form_validation->set_rules('fname', 'First name', 'required');
		$this->form_validation->set_rules('lname', 'Last name', 'required');
		$this->form_validation->set_rules('referral', 'Phone Number', 'required|is_unique[users.referral]', array('is_unique' => 'This %s already exists.'));
		$this->form_validation->set_rules('address', 'Contact Address', 'required');
		$this->form_validation->set_rules('email', 'Email', 'valid_email|required|is_unique[users.email]', array('is_unique' => 'This %s already exists.'));
		$this->form_validation->set_rules('password', 'Password', 'required|max_length[30]');
		$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'required|matches[password]');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('register', $this->data);
		} else {
			//get user inputs
			$fname = $this->input->post('fname');
			$lname = $this->input->post('lname');
			$referral = $this->input->post('referral');
			$address = $this->input->post('address');
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$status = $this->input->post('status');

			//generate simple random code
			$set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$code = substr(str_shuffle($set), 0, 12);

			//insert user to users table and get id
			$user['fname'] = $fname;
			$user['lname'] = $lname;
			$user['referral'] = $referral;
			$user['address'] = $address;
			$user['email'] = $email;
			$user['password'] = md5($password);
			$user['code'] = $code;
			$user['active'] = 'inactive';
			$user['status'] = $status;
			$user['user_type'] = 'user';
			$user['percentage'] = '2';
			$id = $this->users_model->insert($user);

			//set up email
			$config = array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.gmail.com',
				'smtp_port' => 465,
				'smtp_user' => 'admin@livestock247.com', // change it to yours
				'smtp_pass' => 'b861N8cPchr3', // change it to yours
				'mailtype' => 'html',
				'charset' => 'iso-8859-1',
				'wordwrap' => TRUE
			);

			$message = "
						<html>
						<head>
							<title>Verification Link</title>
						</head>
						<body>
							<h2>Thank you for Registering with Livestock247.</h2>
							<p>Your Account:</p>
							<p>Email: " . $email . "</p>
							
							<p>Please click the link below to verify your account.</p>
							<h4 class='btn btn-primary'><a href='" . site_url() . "user/activate/" . $id . "/" . $code . "' >Verify My Account</a></h4>
						</body>
						</html>
						";

			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			$this->email->from($config['smtp_user']);
			$this->email->to($email);
			$this->email->subject('Livestock247 Verification Email');
			$this->email->message($message);

			//sending email
			if ($this->email->send()) {
				$this->session->set_flashdata('message', 'Verification link has been sent to your email');
			} else {
				$this->session->set_flashdata('message', $this->email->print_debugger());

			}
			redirect('register');
		}
		//$this->load->view('includes/footer');

	}

	public function activate()
	{
		$id = $this->uri->segment(3);
		$code = $this->uri->segment(4);

		//fetch user details
		$user = $this->users_model->getUser($id);

		//if code matches
		if ($user['code'] == $code) {
			//update user active status
			$data['active'] = 'verified';
			$query = $this->users_model->activate($data, $id);


			if ($query) {
				$this->session->set_flashdata('message', 'User Verified successfully');
			} else {
				$this->session->set_flashdata('message', 'Something went wrong in verifying your  account');
			}
		} else {
			$this->session->set_flashdata('message', 'Cannot verify account. Code didnt match');
		}

		redirect('verify');
	}

	public function verify()
	{
		$this->load->view('includes/head');
		$this->load->model('users_model');
		$this->load->helper(array('form', 'url'));
		$this->load->database();
		$this->load->view('verify');
	}

	public function login()
	{
		$this->load->view('includes/head');
		//$this->load->view('includes/header');
		$this->load->view('login');
	}


	public function forgot_password2()
	{
		$this->load->view('includes/head');
		//$this->load->view('includes/header');
		$this->form_validation->set_rules('email', 'Email', 'valid_email|required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('forgot_password', $this->data);
		} else {
			//get user inputs


			//generate simple random code
			$set = 'Ls247abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$code = substr(str_shuffle($set), 0, 12);

			//insert user to users table
			$email = $this->input->post('email');
			$user['password'] = $code;
			$this->users_model->reset($user, $email);

			//set up email
			$config = array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.gmail.com',
				'smtp_port' => 465,
				'smtp_user' => 'admin@livestock247.com', // change it to yours
				'smtp_pass' => 'b861N8cPchr3', // change it to yours
				'mailtype' => 'html',
				'charset' => 'iso-8859-1',
				'wordwrap' => TRUE
			);

			$message = "
						<html>
						<head>
							<title>Reset Password</title>
						</head>
						<body>
							<h2>You have request to reset password</h2>
							<p>Your Account:</p>
							<p>Email: ".$email."</p>
							
							<p>Please click the link below to reset your password.</p>
							<h4 class='btn btn-primary'>
							<a href='" . site_url() . "user/reset_password?key=" . $code . "&email=" . $email . "' class='btn btn-primary btn-md btn-block' >
							Reset My Password</a></h4>
						</body>
						</html>
						";

			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			$this->email->from($config['smtp_user']);
			$this->email->to($email);
			$this->email->subject('Request To Reset Your Password');
			$this->email->message($message);

			//sending email
			if ($this->email->send()) {
				$this->session->set_flashdata('message', 'A mail has been sent to you. Check your inbox.');
			} else {
				$this->session->set_flashdata('message', $this->email->print_debugger());

			}
			redirect('forgot_password');
		}
		//$this->load->view('includes/footer');
	}

	public function auth()
	{
		$this->load->model('users_model');
		$email = $this->input->post('email', TRUE);
		$password = md5($this->input->post('password', TRUE));
		$validate = $this->users_model->validate($email, $password);
		if ($validate->num_rows() > 0) {
			$data = $validate->row_array();

			$fname = $data['fname'];
			$lname = $data['lname'];
			$referral = $data['referral'];
			$verified = $data['active'];
			$email = $data['email'];
			$level = $data['user_type'];
			$sesdata = array(

				'fname' => $fname,
				'lname' => $lname,
				'referral' => $referral,
				'active' => $verified,
				'email' => $email,
				'user_type' => $level,
				'logged_in' => TRUE
			);
			$this->session->set_userdata($sesdata);
			// access login for admin
			if ($level === 'admin') {
				redirect('admin');
			} // access login for support
			elseif ($level === 'support') {
				redirect('support');
			} 	// access login for finance
			elseif($level === 'finance'){
				redirect('finance');
			}// access login for Agents
			elseif ($level === 'user' && $verified === 'verified') {
				redirect('profile');
			} else {
				echo $this->session->set_flashdata('verify', 'Email Not Yet Verified. <br> Kindly Check Your Inbox');
				redirect('login');
			}

		} else {
			echo $this->session->set_flashdata('msg', 'Email or Password is Wrong');
			redirect('login');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('user_type');
		$this->session->sess_destroy();
		redirect(site_url());
	}

	public function admin()
	{
		//Allowing  admin only
		if ($this->session->userdata('user_type') === 'admin') {
			$this->load->view('dashboard');
		} else {
			echo "Access Denied";
		}
	}

	public function agent()
	{
		//Allowing agent only
		if ($this->session->userdata('user_type') === 'user') {
			$this->load->view('dashboard');
		} else {
			echo "Access Denied";
		}
	}


	function author()
	{
		//Allowing  support only
		if ($this->session->userdata('user_type') === 'support') {
			$this->load->view('dashboard');
		} else {
			echo "Access Denied";
		}
	}


	//Dashboard Area
	public function dashboard()
	{
		if ($this->session->userdata('user_type') !== 'user'){
			redirect('login');
		}
		$this->load->model('users_model');
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$this->load->database();
		$this->load->view('includes/admin/head');
		$this->load->view('includes/admin/header');

		$this->load->model('users_model');
		$data['h'] = $this->users_model->BiggieOverview();

		$data['m'] = $this->users_model->MidiOverview();

		$data['n'] = $this->users_model->MiniOverview();

		$data['l'] = $this->users_model->LargeOverview();

		$data['d'] = $this->users_model->MediumOverview();

		$data['s'] = $this->users_model->SmallOverview();

		$data['x'] = $this->users_model->MaxiOverview();

		$data['t'] = $this->users_model->StandardOverview();

		$data['c'] = $this->users_model->CompactOverview();

		$this->load->view('dashboard/dashboard', $data);


		$this->load->view('includes/admin/footer');

	}

	public function profile()
	{
		if ($this->session->userdata('logged_in') !== TRUE) {
			redirect('login');
		}

		$this->load->database();
		$this->load->view('includes/admin/head');
		$this->load->view('includes/admin/header');
		$this->load->helper(array('form', 'url'));
		//load model
		$this->load->model('Main_model');

		// Get
		$edit = $this->input->get('edit');

		if (!isset($edit)) {
			// get data
			$data['response'] = $this->Main_model->getUsersList();
			$data['view'] = 1;

			// load view
			$this->load->view('dashboard/profile', $data);
		} else {

			// Check submit button POST or not
			if ($this->input->post('submit')) {

				// POST data
				$postData = $this->input->post();

				$config['upload_path'] = FCPATH . '/uploads/';
				$config['allowed_types'] = 'jpeg|jpg|png';
				$config['max_size'] = 5000;
				$config['encrypt_name'] = true;

				$this->load->library('upload');
				$this->upload->initialize($config);

				$tid = "";
				$error = "";

				if (isset($_FILES['user_image']) && $_FILES['user_image']['name'] != "") {
					if (!$this->upload->do_upload('user_image')) {
						$error = $this->upload->display_errors('', '');

					} else {
						$postData['user_image'] = $this->upload->data()['file_name'];
					}
				}

				if (isset($_FILES['user_card']) && $_FILES['user_card']['name'] != "") {
					if (!$this->upload->do_upload('user_card')) {
						$error = $this->upload->display_errors('', '');

					} else {
						$postData['user_card'] = $this->upload->data()['file_name'];
					}
				}

				if ($error == "") {

					//Update record
					unset($postData['submit']);
					$this->Main_model->updateUser($postData, $edit);
					$this->session->set_flashdata('update', 'Update Successful');

				}

				redirect('profile');

			} else {
				// get data by id
				$data['response'] = $this->Main_model->getUserById($edit);
				$data['view'] = 2;
				//$this->session->set_flashdata('update', 'Not Updated');

				// load view
				$this->load->view('dashboard/profile', $data);
			}
		}

		$this->load->view('includes/admin/footer');
	}

	//all agents biggie commission
	public function biggie_commission()
	{
		if ($this->session->userdata('logged_in') !== TRUE) {
			redirect('login');
		}
		$this->load->database();
		$this->load->view('includes/admin/head');
		$this->load->view('includes/admin/header');
		//	$this->load->view('dashboard/biggie_commission');
		// load base_url
		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->library('table');
		$this->load->helper('text');
		//load model
		$this->load->model('users_model');
		$data['h'] = $this->users_model->selectBiggie();


		$this->load->view('dashboard/biggie_commission', $data);

		$this->load->view('includes/admin/footer');
	}


	//all agents midi commission
	public function midi_commission()
	{
		if ($this->session->userdata('logged_in') !== TRUE) {
			redirect('login');
		}
		$this->load->database();
		$this->load->view('includes/admin/head');
		$this->load->view('includes/admin/header');
		//	$this->load->view('dashboard/midi_commission');
		// load base_url
		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->library('table');
		//load model
		$this->load->model('users_model');
		$data['h'] = $this->users_model->selectMidi();
		$this->load->view('dashboard/midi_commission', $data);

		$this->load->view('includes/admin/footer');
	}


	public function mini_commission()
	{
		if ($this->session->userdata('logged_in') !== TRUE) {
			redirect('login');
		}
		$this->load->database();
		$this->load->view('includes/admin/head');
		$this->load->view('includes/admin/header');
		//	$this->load->view('dashboard/mini_commission');
		// load base_url
		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->library('table');
		//load model
		$this->load->model('users_model');
		$data['h'] = $this->users_model->selectMini();
		$this->load->view('dashboard/mini_commission', $data);

		$this->load->view('includes/admin/footer');
	}



	public function large_commission()
	{
		if ($this->session->userdata('logged_in') !== TRUE) {
			redirect('login');
		}
		$this->load->database();
		$this->load->view('includes/admin/head');
		$this->load->view('includes/admin/header');
		//	$this->load->view('dashboard/mini_commission');
		// load base_url
		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->library('table');
		//load model
		$this->load->model('users_model');
		$data['h'] = $this->users_model->selectLarge();
		$this->load->view('dashboard/large_commission', $data);

		$this->load->view('includes/admin/footer');
	}


	public function medium_commission()
	{
		if ($this->session->userdata('logged_in') !== TRUE) {
			redirect('login');
		}
		$this->load->database();
		$this->load->view('includes/admin/head');
		$this->load->view('includes/admin/header');
		//	$this->load->view('dashboard/mini_commission');
		// load base_url
		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->library('table');
		//load model
		$this->load->model('users_model');
		$data['h'] = $this->users_model->selectMedium();
		$this->load->view('dashboard/medium_commission', $data);

		$this->load->view('includes/admin/footer');
	}


	public function small_commission()
	{
		if ($this->session->userdata('logged_in') !== TRUE) {
			redirect('login');
		}
		$this->load->database();
		$this->load->view('includes/admin/head');
		$this->load->view('includes/admin/header');
		//	$this->load->view('dashboard/mini_commission');
		// load base_url
		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->library('table');
		//load model
		$this->load->model('users_model');
		$data['h'] = $this->users_model->selectSmall();
		$this->load->view('dashboard/small_commission', $data);

		$this->load->view('includes/admin/footer');
	}


	public function maxi_commission()
	{
		if ($this->session->userdata('logged_in') !== TRUE) {
			redirect('login');
		}
		$this->load->database();
		$this->load->view('includes/admin/head');
		$this->load->view('includes/admin/header');
		//	$this->load->view('dashboard/mini_commission');
		// load base_url
		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->library('table');
		//load model
		$this->load->model('users_model');
		$data['h'] = $this->users_model->selectMaxi();
		$this->load->view('dashboard/maxi_commission', $data);

		$this->load->view('includes/admin/footer');
	}


	public function standard_commission()
	{
		if ($this->session->userdata('logged_in') !== TRUE) {
			redirect('login');
		}
		$this->load->database();
		$this->load->view('includes/admin/head');
		$this->load->view('includes/admin/header');
		//	$this->load->view('dashboard/mini_commission');
		// load base_url
		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->library('table');
		//load model
		$this->load->model('users_model');
		$data['h'] = $this->users_model->selectStandard();
		$this->load->view('dashboard/standard_commission', $data);

		$this->load->view('includes/admin/footer');
	}

	public function compact_commission()
	{
		if ($this->session->userdata('logged_in') !== TRUE) {
			redirect('login');
		}
		$this->load->database();
		$this->load->view('includes/admin/head');
		$this->load->view('includes/admin/header');
		//	$this->load->view('dashboard/mini_commission');
		// load base_url
		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->library('table');
		//load model
		$this->load->model('users_model');
		$data['h'] = $this->users_model->selectCompact();
		$this->load->view('dashboard/compact_commission', $data);

		$this->load->view('includes/admin/footer');
	}

	public function change_password()
	{
		if ($this->session->userdata('logged_in') !== TRUE) {
			redirect('login');
		}

		$this->load->database();
		$this->load->view('includes/admin/head');
		$this->load->view('includes/admin/header');
		$this->load->helper(array('form', 'url'));
		//load model
		$this->load->model('Main_model');


			// Get
			$edit = $this->input->get('edit');

			if (!isset($edit)) {
				// get data
				$data['response'] = $this->Main_model->getUsersList();
				$data['view'] = 1;

				// load view
				$this->load->view('dashboard/change_password', $data);
			} else {

				// Check submit button POST or not
				if ($this->input->post('submit') != NULL) {

					// POST data
					$postData = $this->input->post();

					$tid = "";
					$error = "";

					if ($error == "") {

						//Update record

						$this->Main_model->reset_user($postData, $edit);
						$this->session->set_flashdata('reset', 'Password Reset Successful');

					}

					redirect('profile');

				} else {
					// get data by id
					$data['response'] = $this->Main_model->getUserById($edit);
					$data['view'] = 2;
					//$this->session->set_flashdata('update', 'Not Updated');

					// load view
					$this->load->view('dashboard/change_password', $data);
				}
			}



		$this->load->view('includes/admin/footer');
	}



	public function forgot_password()
	{

		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('includes/head');
			$this->load->model('users_model');
			$this->load->view('forgot_password');
		}

		else{
			$email = $this->input->post('email');
			$clean = $this->security->xss_clean($email);
			$userInfo = $this->users_model->getUserInfoByEmail($clean);

			if(!$userInfo){
				$this->session->set_flashdata('flash_message', 'We cant find your email address');
				redirect(site_url().'login');
			}

			if($userInfo->active != 'verified'){ //if status is not approved
				$this->session->set_flashdata('flash_message', 'Your account was not verified');
				redirect(site_url().'login');
			}

			//build token

			$token = $this->users_model->insertToken($userInfo->id);
			$qstring = $this->base64url_encode($token);

			//$url = site_url() . 'reset_password/token/' . $qstring;
			$url = site_url() . 'user/reset_password?token=' . $qstring;
			$link = '<a href="' . $url . '">' . $url . '</a>';


			//set up email
			$config = array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.gmail.com',
				'smtp_port' => 465,
				'smtp_user' => 'admin@livestock247.com', // change it to yours
				'smtp_pass' => 'b861N8cPchr3', // change it to yours
				'mailtype' => 'html',
				'charset' => 'iso-8859-1',
				'wordwrap' => TRUE
			);
			$msg = "
					<html>
						<head>
							<title>Reset Password</title>
						</head>
						<body>
							<h2>You have request to reset password</h2>
							<p>Your Account:</p>
							<p>Email: ".$email."</p>
							
							<p>Please click the link below to reset your password.</p>
							<h4 class='btn btn-primary'>
							<a href='" . site_url() . "user/reset_password?token=" . $qstring . " 'class='btn btn-primary btn-md btn-block' >
							Reset My Password</a></h4>
							
							OR copy and pastes the below link in your browser<br>
							$link
						</body>
						</html>";


			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			$this->email->from('no-reply@livestock247.com', 'Livestock247');
			$this->email->to($email);
			$this->email->subject('Request To Reset Your Password');
			$this->email->message($msg);


			//sending email
			if ($this->email->send()) {
				$this->session->set_flashdata('flash_message', 'A mail has been sent to you. Check your inbox.');
			} else {
				$this->session->set_flashdata('flash_message', $this->email->print_debugger());

			}
			redirect('forgot_password');

		}

	}


	public function reset_password()
	{
		$token = $this->base64url_decode($this->uri->segment(4));
//		$token = $this->uri->segment(4);
		$cleanToken = $this->security->xss_clean($token);

	$user_info = $this->users_model->isTokenValid($cleanToken); //either false or array();
//
//		if(!$user_info){
//			$this->session->set_flashdata('flash_message', 'Token is invalid or expired');
//			redirect(site_url().'login');
//		}
//		$data = array(
//			'fname'=> $user_info->fname,
//			'email'=>$user_info->email,
//			'user_id'=>$user_info->id,
//			'token'=>$this->base64url_encode($token)
//		);

		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('includes/head');
			$this->load->view('reset_password');
		}
		else{

			//$this->load->library('password');
			$post = $this->input->post(NULL, TRUE);
			$cleanPost = $this->security->xss_clean($post);
			//$hashed = $this->password->create_hash($cleanPost['password']);
			$hashed =$this->input->post('password');
			$cleanPost['password'] =md5($hashed) ;
			$cleanPost['user_id'] = $user_info->id;
			unset($cleanPost['passconf']);
			if(!$this->users_model->updatePassword($cleanPost)){
				$this->session->set_flashdata('flash_message', 'There was a problem updating your password');
			}else{
				$this->session->set_flashdata('flash_message', 'Your password has been updated. You may now login');
			}
			redirect(site_url().'login');
		}
	}

	public function base64url_encode($data) {
		return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
	}

	public function base64url_decode($data) {
		return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
	}


} // end class
