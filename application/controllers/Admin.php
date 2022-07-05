<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Admin extends CI_Controller
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
		$this->load->view('includes/footer');
		if ($this->session->userdata('logged_in') !== TRUE) {
			$this->load->view('login');
		}

	}



	public function create()
	{
		if ($this->session->userdata('user_type') !== 'admin') {
			redirect('login');
		}
		$this->load->database();
		$this->load->view('includes/admin/head');
		$this->load->view('includes/admin/header');
		$this->load->helper('url');

		$this->form_validation->set_rules('fname', 'First name', 'required');
		$this->form_validation->set_rules('lname', 'Last name', 'required');
		$this->form_validation->set_rules('referral', 'Phone Number', 'required|is_unique[users.referral]', array('is_unique' => 'This %s already exists.'));
		$this->form_validation->set_rules('address', 'Contact Address', 'required');
		$this->form_validation->set_rules('email', 'Email', 'valid_email|required|is_unique[users.email]', array('is_unique' => 'This %s already exists.'));
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[30]');
		$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'required|matches[password]');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('dashboard/create', $this->data);
		} else {
			//get user inputs
			$fname = $this->input->post('fname');
			$lname = $this->input->post('lname');
			$referral = $this->input->post('referral');
			$address = $this->input->post('address');
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$status = $this->input->post('status');
			$admin = $this->input->post('admin');
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
			$user['active'] = 'verified';
			$user['status'] = $status;
			$user['user_type'] = $admin;
			$this->users_model->insert($user);

			//set up email
			redirect('admin');
		}
		//$this->load->view('includes/footer');

	}

	public function login()
	{
		$this->load->view('includes/head');
		$this->load->view('login');
	}

	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('user_type');
		$this->session->sess_destroy();
		redirect('login');
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
				'user_type' => 'admin',
				'logged_in' => TRUE
			);
			$this->session->set_userdata($sesdata);
			// access login for admin
			if ($level === 'admin') {
				redirect('admin');
			}
			// access login for support
			elseif($level === 'support'){
				redirect('support');
			}
			// access login for finance
			elseif($level === 'finance'){
				redirect('finance');
			}
			// access login for Agents
			elseif ($level === 'user' && $verified === 'verified') {
				redirect('dashboard');
			} else {
				echo $this->session->set_flashdata('verify', 'Email Not Yet Verified. <br> Kindly Check Your Inbox');
				redirect('login');
			}
			// access login for author
			//else{
			//	redirect('page/author');
			//}
		} else {
			echo $this->session->set_flashdata('msg', 'Email or Password is Wrong');
			redirect('login');
		}
	}


	public function admin(){
		if ($this->session->userdata('user_type') !== 'admin') {
			redirect('login');
		}

		$this->load->view('includes/admin/head');
		$this->load->view('includes/admin/header');
		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->library('pagination');
		$this->load->library('table');
		$this->load->library('calendar');
		//load model
		// load base_url
		$this->load->database();

		//load model
		$this->load->model('Main_model');
//		$data['h']=$this->Main_model->select();

		$this->load->view('dashboard/admin');
		$this->load->view('includes/admin/footer');
	}


	public function usersExcel() {
		$this->load->model('Main_model');
		$this->load->database();
		$fileName = 'users.xlsx';

		// recursively creates all required nested directories


		$employeeData = $this->Main_model->agentList();
		$spreadsheet =  new Spreadsheet();


		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'Hello World !');
		$sheet->setCellValue('A1', 'Date');
		$sheet->setCellValue('B1', 'Fname');
		$sheet->setCellValue('C1', 'Lname');
		$sheet->setCellValue('D1', 'Email');
		$sheet->setCellValue('E1', 'Bank');
		$sheet->setCellValue('F1', 'Address');
		$sheet->setCellValue('G1', 'Account_name');
		$sheet->setCellValue('H1', 'Account_number');


		$rows = 2;
		foreach ($employeeData as $val){
			$sheet->setCellValue('A' . $rows, $val['date']);
			$sheet->setCellValue('B' . $rows, $val['fname']);
			$sheet->setCellValue('C' . $rows, $val['lname']);
			$sheet->setCellValue('D' . $rows, $val['email']);
			$sheet->setCellValue('E' . $rows, $val['bank']);
			$sheet->setCellValue('F' . $rows, $val['address']);
			$sheet->setCellValue('G' . $rows, $val['account_name']);
			$sheet->setCellValue('H' . $rows, $val['account_number']);


			$rows++;
		}
		$writer = new Xlsx($spreadsheet);
		$writer->save("excel/".$fileName);
		header("Content-Type: application/vnd.ms-excel");
		redirect(base_url()."/excel/".$fileName);
	}

	public function salesExcel() {
		$this->load->model('Main_model');
		$this->load->database();
		$fileName = 'sales.xlsx';
		$employeeData = $this->Main_model->salesExcel();
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'Hello World !');
		$sheet->setCellValue('A1', 'Date');
		$sheet->setCellValue('B1', 'Cname');
		$sheet->setCellValue('C1', 'Email');
		$sheet->setCellValue('D1', 'Phone');
		$sheet->setCellValue('E1', 'Address');
		$sheet->setCellValue('F1', 'Plan');
		$sheet->setCellValue('G1', 'Amount');
		$sheet->setCellValue('H1', 'Referral');



		$rows = 2;
		foreach ($employeeData as $val){
			$sheet->setCellValue('A' . $rows, $val['date']);
			$sheet->setCellValue('B' . $rows, $val['cname']);
			$sheet->setCellValue('C' . $rows, $val['email']);
			$sheet->setCellValue('D' . $rows, $val['phone_number']);
			$sheet->setCellValue('E' . $rows, $val['delivery_address']);
			$sheet->setCellValue('F' . $rows, $val['plan']);
			$sheet->setCellValue('G' . $rows, $val['amount']);
			$sheet->setCellValue('H' . $rows, $val['referral']);


			$rows++;
		}
		//$writer = new Xlsx($spreadsheet);
		$writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);

		$writer->save("excel/".$fileName);
		header("Content-Type: application/vnd.ms-excel");
		redirect(base_url()."/excel/".$fileName);
	}


	public function commissionExcel() {
		$this->load->model('Main_model');
		$this->load->database();
		$fileName = 'commission.xlsx';
		$employeeData = $this->Main_model->commissionExcel();
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'Hello World !');
		$sheet->setCellValue('A1', 'Date');
		$sheet->setCellValue('B1', 'fname');
		$sheet->setCellValue('C1', 'Lname');
		$sheet->setCellValue('D1', 'Bank');
		$sheet->setCellValue('E1', 'Account_name');
		$sheet->setCellValue('F1', 'Account_number');
		$sheet->setCellValue('G1', 'Referral');
		$sheet->setCellValue('H1', 'Plan');
		$sheet->setCellValue('J1', 'AgentCommission');


		$rows = 2;
		foreach ($employeeData as $val){
			$sheet->setCellValue('A' . $rows, $val['date']);
			$sheet->setCellValue('B' . $rows, $val['fname']);
			$sheet->setCellValue('C' . $rows, $val['lname']);
			$sheet->setCellValue('D' . $rows, $val['bank']);
			$sheet->setCellValue('E' . $rows, $val['account_name']);
			$sheet->setCellValue('F' . $rows, $val['account_number']);
			$sheet->setCellValue('G' . $rows, $val['referral']);
			$sheet->setCellValue('H' . $rows, $val['plan']);
			$sheet->setCellValue('J' . $rows, $val['agent_commission']);

			$rows++;
		}
		//$writer = new Xlsx($spreadsheet);
		$writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);

		$writer->save("excel/".$fileName);
		header("Content-Type: application/vnd.ms-excel");
		redirect(base_url()."/excel/".$fileName);
	}


	public function support(){
		if ($this->session->userdata('logged_in') !== TRUE) {
			redirect('login');
		}

		$this->load->view('includes/admin/head');
		$this->load->view('includes/admin/header');
		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->library('pagination');
		$this->load->library('table');
		$this->load->library('calendar');
		//load model
		// load base_url
		$this->load->database();
		//load model
		$this->load->model('Main_model');

		$data['h']=$this->Main_model->select();

		$this->load->view('dashboard/support', $data);

		$this->load->view('includes/admin/footer');
	}


	public function approve_user()
	{
		if ($this->session->userdata('logged_in') !== TRUE) {
			redirect('login');
		}
		$this->load->database();
		$this->load->view('includes/admin/head');
		$this->load->view('includes/admin/header');

		$this->load->model('Main_model');
		// Get
		$edit = $this->input->get('edit');

		if(!isset($edit)){
			// get data
			$data['response'] = $this->Main_model->getRecordsById();
			$data['view'] = 1;

			// load view
			$this->load->view('dashboard/approve_user',$data);
		}else{
			// Check submit button POST or not
			if($this->input->post('submit') != NULL ){
				// POST data
				$postData = $this->input->post();
				//load model
				// Update record
				$this->Main_model->update_records($postData,$edit);
				$this->session->set_flashdata('approve', 'Approved Successful');

				//Send email to the agent when Approved
			//	$email= trim($postData['email']);
				$email = $this->input->post('email');


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
							<title>Congratulations! Your account has been approved</title>
						</head>
						<body>
							<h2>Your account as a Sales Agent has been approved</h2>
							<p>You can start giving your Referral code to your customers.</p>
							<p>Please note, you get 2% of all purchase when a successful transaction as taken place, while any one who buys with your code gets discount on any purchase.</p>
							
					
					
						</body>
						</html>
						";

				$this->load->library('email', $config);
				$this->email->set_newline("\r\n");
				$this->email->from($config['smtp_user']);
				$this->email->to($email);
				$this->email->subject('Congratulations! Your account has been approved');
				$this->email->message($message);

				//sending email
				if ($this->email->send()) {
					echo "<script>alert('Approved. Email sent.')</script>";

				}
				// Redirect page
				redirect('admin');
			}

			else{
				// get data by id
				$data['response'] = $this->Main_model->getUserById($edit);
				$data['view'] = 2;

				// load view
				$this->load->view('dashboard/approve_user',$data);
			}
		}
		//$this->load->view('includes/admin/footer');
	}


	//Reject Agent Account, send email to user

	public function reject_user()
	{
		if ($this->session->userdata('logged_in') !== TRUE) {
			redirect('login');
		}
		$this->load->database();
		$this->load->view('includes/admin/head');
		$this->load->view('includes/admin/header');

		$this->load->model('Main_model');
		// Get
		$edit = $this->input->get('edit');

		if(!isset($edit)){
			// get data
			$data['response'] = $this->Main_model->getRecordsById();
			$data['view'] = 1;

			// load view
			$this->load->view('dashboard/reject_user',$data);
		}else{
			// Check submit button POST or not
			if($this->input->post('submit') != NULL ){
				// POST data
				$postData = $this->input->post();
				//load model
				// Update record
				$this->Main_model->reject($postData,$edit);
				$this->session->set_flashdata('reject', 'Application Rejected');

				//Send email to the agent when Approved
				//	$email= trim($postData['email']);
				$email = $this->input->post('email');


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
							<title>Your Account Was Rejected</title>
						</head>
						<body>
							<h2>Sorry! your account as a sales agent was rejected</h2>
							<p>Kindly <a href='" . site_url() . "login' class='text-primary'>login here </a>and Update your profile with your Face ID and your Valid ID card</p>
							<p>If you are having any issue with uploading your ID do Call our <strong>Customer Support on 09062903550</strong> or send an email to <a href='mailto:support@livestock247.com' class='text-primary'>support@livestock247.com</a></p>
							
						</body>
						</html>
						";

				$this->load->library('email', $config);
				$this->email->set_newline("\r\n");
				$this->email->from($config['smtp_user']);
				$this->email->to($email);
				$this->email->subject('Your Account Was Rejected');
				$this->email->message($message);

				//sending email
				if ($this->email->send()) {
					echo "<script>alert('reject. Email sent.')</script>";

				}
				// Redirect page
				redirect('admin');
			}

			else{
				// get data by id
				$data['response'] = $this->Main_model->getUserById($edit);
				$data['view'] = 2;

				// load view
				$this->load->view('dashboard/reject_user',$data);
			}
		}
		//$this->load->view('includes/admin/footer');
	}

	//all successful sales
	public function sales()
	{
		if ($this->session->userdata('logged_in') !== TRUE) {
			redirect('login');
		}
		$this->load->database();
		$this->load->view('includes/admin/head');
		$this->load->view('includes/admin/header');
		// load base_url
		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->library('table');
		$this->load->library('calendar');
		//load model
		$this->load->model('Main_model');

		$data['h']=$this->Main_model->Trans();

		$this->load->view('dashboard/sales', $data);
		$this->load->view('includes/admin/footer');
	}


	//all successful sales
	public function specta()
	{
		if ($this->session->userdata('logged_in') !== TRUE) {
			redirect('login');
		}
		$this->load->database();
		$this->load->view('includes/admin/head');
		$this->load->view('includes/admin/header');
		// load base_url
		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->library('table');
		$this->load->library('calendar');
		//load model
		$this->load->model('Main_model');

		$data['h']=$this->Main_model->Specta();

		$this->load->view('specta/specta', $data);
		$this->load->view('includes/admin/footer');
	}



	//all pending orders
	public function pendingOrder()
	{
		if ($this->session->userdata('logged_in') !== TRUE) {
			redirect('login');
		}
		$this->load->database();
		$this->load->view('includes/admin/head');
		$this->load->view('includes/admin/header');
		// load base_url
		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->library('table');
		//load model
		$this->load->model('Main_model');

		$data['h']=$this->Main_model->pendingOrder();

		$this->load->view('dashboard/pendingOrder', $data);
		$this->load->view('includes/admin/footer');
	}


	//edith and update agents details
	public function edit_user()
	{
		if ($this->session->userdata('logged_in') !== TRUE) {
			redirect('login');
		}
		$this->load->database();
		$this->load->view('includes/admin/head');
		$this->load->view('includes/admin/header');

		$this->load->model('Main_model');
		// Get
		$edit = $this->input->get('edit');

		if(!isset($edit)){
			// get data
			$data['response'] =  $this->Main_model->getRecordsById();
			$data['view'] = 1;

			// load view
			$this->load->view('dashboard/edit_user',$data);
		}else {

			// Check submit button POST or not
			if ($this->input->post('submit')) {

				// POST data
				$postData = $this->input->post();

				$config['upload_path'] = FCPATH.'/uploads/';
				$config['allowed_types'] = 'jpeg|jpg|png|JPG|JPEG|PNG';
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
					$this->session->set_flashdata('edit', 'Upload Successful');

				}

				redirect('admin');

			} else {
				// get data by id
				$data['response'] = $this->Main_model->getUserById($edit);
				$data['view'] = 2;

				// load view
				$this->load->view('dashboard/edit_user', $data);
			}
		}
	}



	public function reset_user()
	{
		if ($this->session->userdata('logged_in') !== TRUE) {
			redirect('login');
		}
		$this->load->database();
		$this->load->view('includes/admin/head');
		$this->load->view('includes/admin/header');

		$this->load->model('Main_model');
		// Get
		$edit = $this->input->get('edit');

		if(!isset($edit)){
			// get data
			$data['response'] = $this->Main_model->getRecordsById();
			$data['view'] = 1;

			// load view
			$this->load->view('dashboard/reset_user',$data);
		}else{
			// Check submit button POST or not
			if($this->input->post('submit') != NULL ){
				// POST data
				$postData = $this->input->post();
				//load model

				// Update record
				$this->Main_model->reset_user($postData,$edit);
				$this->session->set_flashdata('reset', 'Password Reset Successful');

				//Send email to the agent when Approved

//				$email = $this->input->post('email');
//				$password = $this->input->get('password');
//
//
//
//				//set up email
//				$config = array(
//					'protocol' => 'smtp',
//					'smtp_host' => 'ssl://smtp.gmail.com',
//					'smtp_port' => 465,
//					'smtp_user' => 'admin@livestock247.com', // change it to yours
//					'smtp_pass' => 'b861N8cPchr3', // change it to yours
//					'mailtype' => 'html',
//					'charset' => 'iso-8859-1',
//					'wordwrap' => TRUE
//				);
//
//				$message = "
//						<html>
//						<head>
//							<title>Congratulations! Your password has been reset</title>
//						</head>
//						<body>
//
//							<p>Your new password is $password</p>
//
//						</body>
//						</html>
//						";
//
//				$this->load->library('email', $config);
//				$this->email->set_newline("\r\n");
//				$this->email->from($config['smtp_user']);
//				$this->email->to($email);
//				$this->email->subject('Request for password reset');
//				$this->email->message($message);
//
//				//sending email
//				if ($this->email->send()) {
//					echo "<script>alert('Password Reset. Email sent.')</script>";
//
//				}
				// Redirect page
				redirect('admin');
			}

			else{
				// get data by id
				$data['response'] = $this->Main_model->getUserById($edit);
				$data['view'] = 2;

				// load view
				$this->load->view('dashboard/reset_user',$data);
			}
		}
		//$this->load->view('includes/admin/footer');
	}



	//all agents commission
	public function commission()
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
		$this->load->library('pagination');
		// load base_url
		$this->load->database();
		//load model
		$this->load->model('Main_model');

		$data['b'] = $this->Main_model->userAndMeatsharing();
		//pagination


		$config = array();
		$config["base_url"] = base_url() . "admin/commission";
		$config["total_rows"] = $this->Main_model->record_count();
		$config["per_page"] = 2;
		$config["uri_segment"] = 3;
		$this->pagination->initialize($config);
		$config['use_page_numbers'] = TRUE;
		//$config[‘page_query_string’] = TRUE;
		$config['num_links'] = 4;
		$config['cur_tag_open'] = '&nbsp;<a >';
		$config['cur_tag_close'] = '</a>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';

		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$data["links"] = $this->pagination->create_links();
		$data['commission'] = $this->Main_model->fetch_data($config["per_page"], $page);
//		if($this->uri->segment(3)){
//			$page = ($this->uri->segment(3)) ;
//		}
//		else{
//			$page = 1;
//		}
//		$data["results"] = $this->Main_model->fetch_data($config["per_page"], $page);
//		$str_links = $this->pagination->create_links();
//		$data["links"] = explode('&nbsp;',$str_links );

		$this->load->view('dashboard/commission', $data);
		$this->load->view('includes/admin/footer');
	}



	public function finance(){
		if ($this->session->userdata('logged_in') !== TRUE) {
			redirect('login');
		}
		$this->load->helper('url');
		$this->load->view('includes/admin/head');
		$this->load->view('includes/admin/header');
		$this->load->library('pagination');
		// load base_url
		$this->load->database();
		//load model
		$this->load->model('Main_model');

		//$data['h']=$this->Main_model->select();
		$data['h']=$this->Main_model->Trans();

		//pagination
//		$config = array();
//		$config["base_url"] = base_url() . "index.php/admin/support";
//		$this->Main_model->record_count();
//		$config["total_rows"] = 200;
//		$config["per_page"] = 1;
//		//$config['use_page_numbers'] = TRUE;
//		$config['num_links'] = 4;
//		$config['cur_tag_open'] = '&nbsp;<a >';
//		$config['cur_tag_close'] = '</a>';
//		$config['next_link'] = 'Next';
//		$config['prev_link'] = 'Previous';
//
//		$this->pagination->initialize($config);
//		if($this->uri->segment(3)){
//			$page = ($this->uri->segment(3)) ;
//		}
//		else{
//			$page = 1;
//		}
//		$data["results"] = $this->Main_model->fetch_data($config["per_page"], $page);
//		$str_links = $this->pagination->create_links();
//		$data["links"] = explode('&nbsp;',$str_links );

		$this->load->view('dashboard/finance', $data);

		$this->load->view('includes/admin/footer');
	}


	public function agents(){
		if ($this->session->userdata('logged_in') !== TRUE) {
			redirect('login');
		}

		$this->load->view('includes/admin/head');
		$this->load->view('includes/admin/header');
		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->library('pagination');
		$this->load->library('table');
		$this->load->library('calendar');
		//load model
		// load base_url
		$this->load->database();

		//load model
		$this->load->model('Main_model');
		$this->load->model('Users_model');

		// Admin create Users/Agents
		$this->form_validation->set_rules('referral', 'Phone Number', 'required|is_unique[users.referral]', array('is_unique' => 'This %s already exists.'));
		$this->form_validation->set_rules('email', 'Email', 'valid_email|required|is_unique[users.email]', array('is_unique' => 'This %s already exists.'));
		$this->form_validation->set_rules('password', 'Password', 'required|max_length[30]');
		$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'required|matches[password]');

		$data['h']=$this->Main_model->select();
		//$this->load->view('dashboard/agents', $data);

		if ($this->form_validation->run() == FALSE) {
//			$this->load->view('dashboard/agents', $this->data);
			$this->load->view('dashboard/agents', $data);

		} else {
			//get user inputs
			$referral = $this->input->post('referral');
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$status = $this->input->post('status');

			//generate simple random code
			$set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$code = substr(str_shuffle($set), 0, 12);

			//insert user to users table and get id
			$user['referral'] = $referral;
			$user['email'] = $email;
			$user['password'] = md5($password);
			$user['code'] = $code;
			$user['active'] = 'inactive';
			$user['status'] = 'Pending';
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
				$this->session->set_flashdata('user', 'Verification link has been sent to the agent email');
			} else {
				$this->session->set_flashdata('user', $this->email->print_debugger());

			}
			redirect('agents');
		}



		$this->load->view('includes/admin/footer');
	}


	public function flash_sales(){
		if ($this->session->userdata('logged_in') !== TRUE) {
			redirect('login');
		}

		$this->load->view('includes/admin/head');
		$this->load->view('includes/admin/header');
		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->library('pagination');
		$this->load->library('table');
		$this->load->library('calendar');
		//load model
		// load base_url
		$this->load->database();

		//load model
		$this->load->model('Main_model');
		$data['h']=$this->Main_model->Flash_sales();

		$this->load->view('dashboard/flash_sales', $data);
		$this->load->view('includes/admin/footer');
	}


}// end class
