<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function getAllUsers(){
		$query = $this->db->get('users');
		return $query->result(); 
	}

	public function insert($user){
		$this->db->insert('users', $user);
		return $this->db->insert_id(); 
	}
	//forgot password
	public function reset($user, $email){
		$reset = trim($user['password']);
		if ($reset != '') {
			// Update
			$value = array('password' => $reset);
			//->db->where('id', $id);
			$this->db->where('email', $email);
			$this->db->update('users', $value);
		}
	}

	//enter new password
	public function reset_password($data, $email){
		$response = "";
		$status = trim($data['password']);
		if ($status != '') {
			// Update
			$value['password'] = md5($status);
			$this->db->where('email', $email->email);
			$this->db->update('users', $value);
		}
	}

	public function getUseremail($email){
		$query = $this->db->get_where('users',array('email'=>$email));
		return $query->row_array();
	}

	public function getUser($id){
		$query = $this->db->get_where('users',array('id'=>$id));
		return $query->row_array();
	}

	public function activate($data, $id){
		$this->db->where('users.id', $id);
		return $this->db->update('users', $data);
	}


//Login Users
	public function validate($email,$password){
		$this->db->where('email',$email);
		$this->db->where('password',$password);
		$result = $this->db->get('users',1);
		return $result;
	}



// Function To Fetch Selected users Record
	function profile(){
		$id=$this->session->userdata('id');
		$this->db->select('*');
		$this->db->where('id', $id);
		$query = $this->db->get('users');
		$result = $query->result();
		return $result;

	}


	// count Total sales where payment is successful
	public function countSales(){
		$referral= $this->session->userdata('referral');
		$this->db->where('referral', $referral);
		$this->db->where('paystack_status', 'success');
		$this->db->where('month(date)', date('m'));
		//$this->db->get('mini', 'midi', 'biggie')->row();
		$count= $this->db->count_all_results('meat_sharing');
		//echo $total_biggie->amount;//gives Sum of amount columns value
		return $count;

	}

	//total commission earn for each Agents

	public function commission(){
		$agent_commission = $this->session->userdata('referral');
		$this->db->select_sum('agent_commission');
		$this->db->where('referral', $agent_commission);
		$this->db->where('paystack_status', 'success');
		$this->db->where('month(date)', date('m'));
		$commission= $this->db->get('meat_sharing')->row();
		//echo $total_commission->agent_commission;//gives Sum of amount columns value
		//return $commission;
		if($commission->agent_commission){
			echo "&#8358;";
			//echo $total_mini->amount;
			echo round($commission->agent_commission, 1);
		}
		else{
			echo "0";
		}

	}

	// sum total biggie sales based on user phone number (referral code)
	public function sumBiggie(){
		$referral= $this->session->userdata('referral');
		$this->db->select_sum('amount');
		$this->db->where('referral', $referral);
		$this->db->where('paystack_status', 'success');
		$this->db->where('month(date)', date('m'));
		$total_biggie= $this->db->get('biggie')->row();
		//echo $total_biggie->amount;//gives Sum of amount columns value
		if($total_biggie->amount){
			echo "&#8358;";
			echo round($total_biggie->amount, 1);
		}
		else{
			echo "0";
		}

	}

	// sum total midi sales based on user phone number (referral code)
	public function sumMidi(){
		$referral= $this->session->userdata('referral');
		$this->db->select_sum('amount');
		$this->db->where('referral', $referral);
		$this->db->where('paystack_status', 'success');
		$this->db->where('month(date)', date('m'));
		$total_midi= $this->db->get('midi')->row();
		//echo $total_midi->amount;//gives Sum of amount columns value
		if($total_midi->amount){
			echo "&#8358;";
			//echo $total_midi->amount;
			echo round($total_midi->amount, 1);
		}
		else{
			echo "0";
		}


	}
	// sum total mini sales based on user phone number (referral code)
	public function sumMini(){
		$referral= $this->session->userdata('referral');
		$this->db->select_sum('amount');
		$this->db->where('referral', $referral);
		$this->db->where('paystack_status', 'success');
		$this->db->where('month(date)', date('m'));
		$total_mini= $this->db->get('mini')->row();
		//echo $total_mini->amount;//gives Sum of amount columns value
		if($total_mini->amount){
			echo "&#8358;";
			//echo $total_mini->amount;
			echo round($total_mini->amount, 1);
		}
		else{
			echo "0";
		}

	}

	// sum agents biggie commission
	public function biggieCommission(){
		$agent_commission = $this->session->userdata('referral');
		$this->db->select_sum('agent_commission');
		$this->db->where('referral', $agent_commission);
		$this->db->where('plan', 'Biggie');
		$this->db->where('paystack_status', 'success');
		$this->db->where('month(date)', date('m'));
		$total_commission= $this->db->get('meat_sharing')->row();
		//echo $total_commission->agent_commission;//gives Sum of amount columns value
		if($total_commission->agent_commission){
			echo "&#8358;";
		//	echo $total_commission->agent_commission;

			echo round($total_commission->agent_commission, 1);
		}
		else{
			echo "0";
		}
	}

	// biggie sales statement that is successful
	public function selectBiggie()
	{
		$referral= $this->session->userdata('referral');
		//get all bigie transaction according to referral number
		$this->db->order_by('date',  'DESC');
		$this->db->where('month(date)', date('m'));
		$this->db->where('paystack_status', 'success');
		$this->db->where('plan', 'Biggie');
		$query = $this->db->get_where('meat_sharing', array('referral' => $referral ) );
		return $query;
	}

	public function BiggieOverview()
	{
		$referral= $this->session->userdata('referral');
		//get all bigie transaction according to referral number
		$this->db->order_by('date',  'DESC');
		$this->db->where('month(date)', date('m'));
		$this->db->where('paystack_status', 'success');
		$this->db->where('plan', 'Biggie');
		$this->db->limit(10);
		$query = $this->db->get_where('meat_sharing', array('referral' => $referral ) );
		return $query;
	}


	public function MidiOverview()
	{
		$referral= $this->session->userdata('referral');
		//get all midi transaction according to referral number
		$this->db->order_by('date',  'DESC');
		$this->db->where('month(date)', date('m'));
		$this->db->where('paystack_status', 'success');
		$this->db->where('plan', 'Midi');
		$this->db->limit(10);
		$query = $this->db->get_where('meat_sharing', array('referral' => $referral ) );
		return $query;
	}


	public function MiniOverview()
	{
		$referral= $this->session->userdata('referral');
		//get all mini transaction according to referral number
		$this->db->order_by('date',  'DESC');
		$this->db->where('month(date)', date('m'));
		$this->db->where('paystack_status', 'success');
		$this->db->where('plan', 'Mini');
		$this->db->limit(10);
		$query = $this->db->get_where('meat_sharing', array('referral' => $referral ) );
		return $query;
	}


	public function LargeOverview()
	{
		$referral= $this->session->userdata('referral');
		//get all mini transaction according to referral number
		$this->db->order_by('date',  'DESC');
		$this->db->where('month(date)', date('m'));
		$this->db->where('paystack_status', 'success');
		$this->db->where('plan', 'Large');
		$this->db->limit(10);
		$query = $this->db->get_where('meat_sharing', array('referral' => $referral ) );
		return $query;
	}


	public function MediumOverview()
	{
		$referral= $this->session->userdata('referral');
		//get all mini transaction according to referral number
		$this->db->order_by('date',  'DESC');
		$this->db->where('month(date)', date('m'));
		$this->db->where('paystack_status', 'success');
		$this->db->where('plan', 'Medium');
		$this->db->limit(10);
		$query = $this->db->get_where('meat_sharing', array('referral' => $referral ) );
		return $query;
	}

	public function SmallOverview()
	{
		$referral= $this->session->userdata('referral');
		//get all mini transaction according to referral number
		$this->db->order_by('date',  'DESC');
		$this->db->where('month(date)', date('m'));
		$this->db->where('paystack_status', 'success');
		$this->db->where('plan', 'Small');
		$this->db->limit(10);
		$query = $this->db->get_where('meat_sharing', array('referral' => $referral ) );
		return $query;
	}


	public function MaxiOverview()
	{
		$referral= $this->session->userdata('referral');
		//get all mini transaction according to referral number
		$this->db->order_by('date',  'DESC');
		$this->db->where('month(date)', date('m'));
		$this->db->where('paystack_status', 'success');
		$this->db->where('plan', 'Maxi');
		$this->db->limit(10);
		$query = $this->db->get_where('meat_sharing', array('referral' => $referral ) );
		return $query;
	}

	public function StandardOverview()
	{
		$referral= $this->session->userdata('referral');
		//get all mini transaction according to referral number
		$this->db->order_by('date',  'DESC');
		$this->db->where('month(date)', date('m'));
		$this->db->where('paystack_status', 'success');
		$this->db->where('plan', 'Standard');
		$this->db->limit(10);
		$query = $this->db->get_where('meat_sharing', array('referral' => $referral ) );
		return $query;
	}

	public function CompactOverview()
	{
		$referral= $this->session->userdata('referral');
		//get all mini transaction according to referral number
		$this->db->order_by('date',  'DESC');
		$this->db->where('month(date)', date('m'));
		$this->db->where('paystack_status', 'success');
		$this->db->where('plan', 'Compact');
		$this->db->limit(10);
		$query = $this->db->get_where('meat_sharing', array('referral' => $referral ) );
		return $query;
	}

	// sum agents midi commission
	public function midiCommission(){
		$agent_commission = $this->session->userdata('referral');
		$this->db->select_sum('agent_commission');
		$this->db->where('referral', $agent_commission);
		$this->db->where('plan', 'Midi');
		$this->db->where('paystack_status', 'success');
		$this->db->where('month(date)', date('m'));
		$total_commission= $this->db->get('meat_sharing')->row();
		//echo $total_commission->agent_commission;//gives Sum of amount columns value
		if($total_commission->agent_commission){
			echo "&#8358;";
			//echo $total_commission->agent_commission;
			echo round($total_commission->agent_commission, 1);
		}
		else{
			echo "0";
		}
	}

	public function selectMidi()
	{
		$referral= $this->session->userdata('referral');
		//get all Midi transaction according to referral number
		$this->db->order_by('date',  'DESC');
		$this->db->where('month(date)', date('m'));
		$this->db->where('paystack_status', 'success');
		$this->db->where('plan', 'Midi');
		$query = $this->db->get_where('meat_sharing', array('referral' => $referral ) );
		return $query;
	}

	// sum agents mini commission
	public function miniCommission(){
		$agent_commission = $this->session->userdata('referral');
		$this->db->select_sum('agent_commission');
		$this->db->where('referral', $agent_commission);
		$this->db->where('plan', 'Mini');
		$this->db->where('paystack_status', 'success');
		$this->db->where('month(date)', date('m'));
		$total_commission= $this->db->get('meat_sharing')->row();
		//echo $total_commission->agent_commission;//gives Sum of amount columns value
		if($total_commission->agent_commission){
			echo "&#8358;";
			//echo $total_commission->agent_commission;
			echo round($total_commission->agent_commission, 1);
		}
		else{
			echo "0";
		}
	}

	public function selectMini()
	{
		$referral= $this->session->userdata('referral');
		//get all Mini transaction according to referral number
		$this->db->order_by('date',  'DESC');
		$this->db->where('month(date)', date('m'));
		$this->db->where('paystack_status', 'success');
		$this->db->where('plan', 'Mini');
		$query = $this->db->get_where('meat_sharing', array('referral' => $referral ) );
		return $query;
	}


	public function selectLarge()
	{
		$referral= $this->session->userdata('referral');
		//get all Mini transaction according to referral number
		$this->db->order_by('date',  'DESC');
		$this->db->where('month(date)', date('m'));
		$this->db->where('paystack_status', 'success');
		$this->db->where('plan', 'Large');
		$query = $this->db->get_where('meat_sharing', array('referral' => $referral ) );
		return $query;
	}

	// sum agents large commission
	public function largeCommission(){
		$agent_commission = $this->session->userdata('referral');
		$this->db->select_sum('agent_commission');
		$this->db->where('referral', $agent_commission);
		$this->db->where('plan', 'Large');
		$this->db->where('paystack_status', 'success');
		$this->db->where('month(date)', date('m'));
		$total_commission= $this->db->get('meat_sharing')->row();
		//echo $total_commission->agent_commission;//gives Sum of amount columns value
		if($total_commission->agent_commission){
			echo "&#8358;";
			//echo $total_commission->agent_commission;
			echo round($total_commission->agent_commission, 1);
		}
		else{
			echo "0";
		}
	}


	public function selectMedium()
	{
		$referral= $this->session->userdata('referral');
		//get all Mini transaction according to referral number
		$this->db->order_by('date',  'DESC');
		$this->db->where('month(date)', date('m'));
		$this->db->where('paystack_status', 'success');
		$this->db->where('plan', 'Medium');
		$query = $this->db->get_where('meat_sharing', array('referral' => $referral ) );
		return $query;
	}

	// sum agents medium commission
	public function mediumCommission(){
		$agent_commission = $this->session->userdata('referral');
		$this->db->select_sum('agent_commission');
		$this->db->where('referral', $agent_commission);
		$this->db->where('plan', 'Medium');
		$this->db->where('paystack_status', 'success');
		$this->db->where('month(date)', date('m'));
		$total_commission= $this->db->get('meat_sharing')->row();
		//echo $total_commission->agent_commission;//gives Sum of amount columns value
		if($total_commission->agent_commission){
			echo "&#8358;";
			//echo $total_commission->agent_commission;
			echo round($total_commission->agent_commission, 1);
		}
		else{
			echo "0";
		}
	}

	public function selectSmall()
	{
		$referral= $this->session->userdata('referral');
		//get all Mini transaction according to referral number
		$this->db->order_by('date',  'DESC');
		$this->db->where('month(date)', date('m'));
		$this->db->where('paystack_status', 'success');
		$this->db->where('plan', 'Small');
		$query = $this->db->get_where('meat_sharing', array('referral' => $referral ) );
		return $query;
	}

	// sum agents small commission
	public function smallCommission(){
		$agent_commission = $this->session->userdata('referral');
		$this->db->select_sum('agent_commission');
		$this->db->where('referral', $agent_commission);
		$this->db->where('plan', 'Small');
		$this->db->where('paystack_status', 'success');
		$this->db->where('month(date)', date('m'));
		$total_commission= $this->db->get('meat_sharing')->row();
		//echo $total_commission->agent_commission;//gives Sum of amount columns value
		if($total_commission->agent_commission){
			echo "&#8358;";
			//echo $total_commission->agent_commission;
			echo round($total_commission->agent_commission, 1);
		}
		else{
			echo "0";
		}
	}

	public function selectMaxi()
	{
		$referral= $this->session->userdata('referral');
		//get all Mini transaction according to referral number
		$this->db->order_by('date',  'DESC');
		$this->db->where('month(date)', date('m'));
		$this->db->where('paystack_status', 'success');
		$this->db->where('plan', 'Maxi');
		$query = $this->db->get_where('meat_sharing', array('referral' => $referral ) );
		return $query;
	}

	// sum agents maxi commission
	public function maxiCommission(){
		$agent_commission = $this->session->userdata('referral');
		$this->db->select_sum('agent_commission');
		$this->db->where('referral', $agent_commission);
		$this->db->where('plan', 'Maxi');
		$this->db->where('paystack_status', 'success');
		$this->db->where('month(date)', date('m'));
		$total_commission= $this->db->get('meat_sharing')->row();
		//echo $total_commission->agent_commission;//gives Sum of amount columns value
		if($total_commission->agent_commission){
			echo "&#8358;";
			//echo $total_commission->agent_commission;
			echo round($total_commission->agent_commission, 1);
		}
		else{
			echo "0";
		}
	}

	public function selectStandard()
	{
		$referral= $this->session->userdata('referral');
		//get all Mini transaction according to referral number
		$this->db->order_by('date',  'DESC');
		$this->db->where('month(date)', date('m'));
		$this->db->where('paystack_status', 'success');
		$this->db->where('plan', 'Standard');
		$query = $this->db->get_where('meat_sharing', array('referral' => $referral ) );
		return $query;
	}

	// sum agents standard commission
	public function standardCommission(){
		$agent_commission = $this->session->userdata('referral');
		$this->db->select_sum('agent_commission');
		$this->db->where('referral', $agent_commission);
		$this->db->where('plan', 'Standard');
		$this->db->where('paystack_status', 'success');
		$this->db->where('month(date)', date('m'));
		$total_commission= $this->db->get('meat_sharing')->row();
		//echo $total_commission->agent_commission;//gives Sum of amount columns value
		if($total_commission->agent_commission){
			echo "&#8358;";
			//echo $total_commission->agent_commission;
			echo round($total_commission->agent_commission, 1);
		}
		else{
			echo "0";
		}
	}

	public function selectCompact()
	{
		$referral= $this->session->userdata('referral');
		//get all Mini transaction according to referral number
		$this->db->order_by('date',  'DESC');
		$this->db->where('month(date)', date('m'));
		$this->db->where('paystack_status', 'success');
		$this->db->where('plan', 'Compact');
		$query = $this->db->get_where('meat_sharing', array('referral' => $referral ) );
		return $query;
	}

	// sum agents compact commission
	public function compactCommission(){
		$agent_commission = $this->session->userdata('referral');
		$this->db->select_sum('agent_commission');
		$this->db->where('referral', $agent_commission);
		$this->db->where('plan', 'Compact');
		$this->db->where('paystack_status', 'success');
		$this->db->where('month(date)', date('m'));
		$total_commission= $this->db->get('meat_sharing')->row();
		//echo $total_commission->agent_commission;//gives Sum of amount columns value
		if($total_commission->agent_commission){
			echo "&#8358;";
			//echo $total_commission->agent_commission;
			echo round($total_commission->agent_commission, 1);
		}
		else{
			echo "0";
		}
	}

	/*Reset Agent password by id*/
	public function reset_user($postData,$id)
	{
		$response = "";
		$status = trim($postData['password']);
		if ($status != '') {
			// Update
			$value['password'] = md5($status);
			//$value = array('password' => $status);
			$this->db->where('id', $id);
			$this->db->update('users', $value);
		}
	}


	// forgot password
	public function getUserInfoByEmail($email)
	{
		$q = $this->db->get_where('users', array('email' => $email), 1);
		if($this->db->affected_rows() > 0){
			$row = $q->row();
			return $row;
		}else{
			error_log('no user found getUserInfo('.$email.')');
			return false;
		}
	}

	public function insertToken($user_id)
	{
		$token = substr(sha1(rand()), 0, 30);
		$date = date('Y-m-d');

		$string = array(
			'token'=> $token,
			'user_id'=>$user_id,
			'created'=>$date
		);
		$query = $this->db->insert_string('tokens',$string);
		$this->db->query($query);
		return $token . $user_id;

	}

	public function isTokenValid($token)
	{
		$tkn = substr($token,0,30);
		$uid = substr($token,30);

		$q = $this->db->get('tokens', array(
			'tokens.token' => $tkn,
			'tokens.user_id' => $uid), 1);

		if($this->db->affected_rows() > 0){
			$row = $q->row();

			$created = $row->created;
			$createdTS = strtotime($created);
			$today = date('Y-m-d');
			$todayTS = strtotime($today);

			if($createdTS != $todayTS){
				return false;
			}

			$user_info = $this->getUserInfo($row->user_id);
			return $user_info;

		}else{
			return false;
		}

	}


	public function getUserInfo($id)
	{
		$q = $this->db->get_where('users', array('id' => $id), 1);
		if($this->db->affected_rows() > 0){
			$row = $q->row();
			return $row;
		}else{
			error_log('no user found getUserInfo('.$id.')');
			return false;
		}
	}

	public function updatePassword($post)
	{
		$this->db->where('id', $post['user_id']);
		$this->db->update('users', array('password' => $post['password']));
		$success = $this->db->affected_rows();

		if(!$success){
			error_log('Unable to updatePassword('.$post['user_id'].')');
			return false;
		}
		return true;
	}

	public function updateUserInfo($post)
	{
		$data = array(
			'password' => $post['password'],
//			'last_login' => date('Y-m-d h:i:s A'),
			'active' => 'verified'
		);
		$this->db->where('id', $post['user_id']);
		$this->db->update('users', $data);
		$success = $this->db->affected_rows();

		if(!$success){
			error_log('Unable to updateUserInfo('.$post['user_id'].')');
			return false;
		}

		$user_info = $this->getUserInfo($post['user_id']);
		return $user_info;
	}




}
