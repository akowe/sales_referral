<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main_model extends CI_Model {

    // Get all user list
    function getUsersList(){
		$email=$this->session->userdata('email');
        $this->db->select('*');
		$this->db->where('email', $email);
        $q = $this->db->get('users');
        $result = $q->result_array();
        return $result;
    }

    // Get user by id
    function getUserById($id){
        $this->db->select('*');
        $this->db->where('id', $id);
        $q = $this->db->get('users');
		return $q->row_array();
    }

    // Update users profile bank details by id
    function updateUser($postData, $id)
	{
			$this->db->where('id', $id);
			$this->db->update('users', $postData);

    	//}
	}

	// Get all user list
	function getAllUser()
	{
		$this->db->select('*');
		$this->db->order_by('date', 'asc');
		$this->db->limit(10,0);
		$q = $this->db->get('users');
		$result = $q->result_array();
		return $result;
	}

	// count all users pagination
	public function record_count() {
		return $this->db->count_all("users");
	}

	// pagination
	public function fetch_data($limit, $id) {
		//$this->db->select('*');
    	$this->db->limit($limit);
		$this->db->where('id', $id);
		$query = $this->db->get("users");
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}

	//select all users table for admin
	public function select()
	{
		//data is retrive from this query
		$this->db->order_by('date', 'DESC');
		//$this->db->limit(1);
		$query = $this->db->get_where('users', array('user_type' => 'user'));
		return $query;
	}

	// sum biggie sales for specific date and month
	public function dateBiggie(){
		$from= $this->input->get('from');
		$to= $this->input->get('to');
		$this->db->select_sum('amount');
		$this->db->like('paystack_status', 'success');
		$this->db->like('plan', 'Biggie');
		$this->db->where('DATE(date) >=', date('Y-m-d',strtotime($from)));
		$this->db->where('DATE(date) <=', date('Y-m-d',strtotime($to)));
		$total_biggie= $this->db->get('meat_sharing')->row();
		if($total_biggie->amount){
			echo "&#8358;";
			//echo $total_mini->amount;
			echo round($total_biggie->amount, 1);
		}
		else{
			echo "0";
		}

	}

	public function dateMidi(){
		$midi_from= $this->input->get('midi_from');
		$midi_to= $this->input->get('midi_to');
		$this->db->select_sum('amount');
		$this->db->like('paystack_status', 'success');
		$this->db->like('plan', 'Midi');
		$this->db->where('DATE(date) >=', date('Y-m-d',strtotime($midi_from)));
		$this->db->where('DATE(date) <=', date('Y-m-d',strtotime($midi_to)));
		$total_biggie= $this->db->get('meat_sharing')->row();
		if($total_biggie->amount){
			echo "&#8358;";
			//echo $total_mini->amount;
			echo round($total_biggie->amount, 1);
		}
		else{
			echo "0";
		}

	}


	public function dateMini(){
		$mini_from= $this->input->get('mini_from');
		$mini_to= $this->input->get('mini_to');
		$this->db->select_sum('amount');
		$this->db->like('paystack_status', 'success');
		$this->db->like('plan', 'Mini');
		$this->db->where('DATE(date) >=', date('Y-m-d',strtotime($mini_from)));
		$this->db->where('DATE(date) <=', date('Y-m-d',strtotime($mini_to)));
		$total_biggie= $this->db->get('meat_sharing')->row();
		if($total_biggie->amount){
			echo "&#8358;";
			//echo $total_mini->amount;
			echo round($total_biggie->amount, 1);
		}
		else{
			echo "0";
		}
	}

	// see sum of  previous month Goat meat large package
	public function dateLarge(){
		$large_from= $this->input->get('large_from');
		$large_to= $this->input->get('large_to');
		$this->db->select_sum('amount');
		$this->db->like('paystack_status', 'success');
		$this->db->like('plan', 'Large');
		$this->db->where('DATE(date) >=', date('Y-m-d',strtotime($large_from)));
		$this->db->where('DATE(date) <=', date('Y-m-d',strtotime($large_to)));
		$total_biggie= $this->db->get('meat_sharing')->row();
		if($total_biggie->amount){
			echo "&#8358;";
			//echo $total_mini->amount;
			echo round($total_biggie->amount, 1);
		}
		else{
			echo "0";
		}
	}


	// see sum of  previous month Goat meat Medium package
	public function dateMedium(){
		$medium_from= $this->input->get('medium_from');
		$medium_to= $this->input->get('medium_to');
		$this->db->select_sum('amount');
		$this->db->like('paystack_status', 'success');
		$this->db->like('plan', 'Medium');
		$this->db->where('DATE(date) >=', date('Y-m-d',strtotime($medium_from)));
		$this->db->where('DATE(date) <=', date('Y-m-d',strtotime($medium_to)));
		$total_biggie= $this->db->get('meat_sharing')->row();
		if($total_biggie->amount){
			echo "&#8358;";
			//echo $total_mini->amount;
			echo round($total_biggie->amount, 1);
		}
		else{
			echo "0";
		}
	}

	// see sum of  previous month Goat meat small package
	public function dateSmall(){
		$small_from= $this->input->get('small_from');
		$small_to= $this->input->get('small_to');
		$this->db->select_sum('amount');
		$this->db->like('paystack_status', 'success');
		$this->db->like('plan', 'Small');
		$this->db->where('DATE(date) >=', date('Y-m-d',strtotime($small_from)));
		$this->db->where('DATE(date) <=', date('Y-m-d',strtotime($small_to)));
		$total_biggie= $this->db->get('meat_sharing')->row();
		if($total_biggie->amount){
			echo "&#8358;";
			//echo $total_mini->amount;
			echo round($total_biggie->amount, 1);
		}
		else{
			echo "0";
		}
	}


	// see sum of  previous month Ram meat maxi package
	public function dateMaxi(){
		$maxi_from= $this->input->get('maxi_from');
		$maxi_to= $this->input->get('maxi_to');
		$this->db->select_sum('amount');
		$this->db->like('paystack_status', 'success');
		$this->db->like('plan', 'Maxi');
		$this->db->where('DATE(date) >=', date('Y-m-d',strtotime($maxi_from)));
		$this->db->where('DATE(date) <=', date('Y-m-d',strtotime($maxi_to)));
		$total_biggie= $this->db->get('meat_sharing')->row();
		if($total_biggie->amount){
			echo "&#8358;";
			//echo $total_mini->amount;
			echo round($total_biggie->amount, 1);
		}
		else{
			echo "0";
		}
	}


	// see sum of  previous month Ram meat standard package
	public function dateStandard(){
		$standard_from= $this->input->get('standard_from');
		$standard_to= $this->input->get('standard_to');
		$this->db->select_sum('amount');
		$this->db->like('paystack_status', 'success');
		$this->db->like('plan', 'Standard');
		$this->db->where('DATE(date) >=', date('Y-m-d',strtotime($standard_from)));
		$this->db->where('DATE(date) <=', date('Y-m-d',strtotime($standard_to)));
		$total_biggie= $this->db->get('meat_sharing')->row();
		if($total_biggie->amount){
			echo "&#8358;";
			//echo $total_mini->amount;
			echo round($total_biggie->amount, 1);
		}
		else{
			echo "0";
		}
	}


	// see sum of  previous month Ram meat compact package
	public function dateCompact(){
		$compact_from= $this->input->get('compact_from');
		$compact_to= $this->input->get('compact_to');
		$this->db->select_sum('amount');
		$this->db->like('paystack_status', 'success');
		$this->db->like('plan', 'Compact');
		$this->db->where('DATE(date) >=', date('Y-m-d',strtotime($compact_from)));
		$this->db->where('DATE(date) <=', date('Y-m-d',strtotime($compact_to)));
		$total_biggie= $this->db->get('meat_sharing')->row();
		if($total_biggie->amount){
			echo "&#8358;";
			//echo $total_mini->amount;
			echo round($total_biggie->amount, 1);
		}
		else{
			echo "0";
		}
	}

	//sum total biggie by month
	public function allBiggie(){
		$this->db->select_sum('amount');
		$this->db->where('paystack_status', 'success');
		$this->db->where('plan', 'Biggie');
		$this->db->where('month(date)', date('m'));
		$total_biggie= $this->db->get('meat_sharing')->row();
		if($total_biggie->amount){
			echo "&#8358;";
			//echo $total_mini->amount;
			echo round($total_biggie->amount, 1);
		}
		else{
			echo "0";
		}


	}
	//sum total biggie sales ever
	public function allBiggieOverall(){
		$this->db->select_sum('amount');
		$this->db->like('paystack_status', 'success');
		$this->db->like('plan', 'Biggie');
		$total_biggie= $this->db->get('meat_sharing')->row();
		if($total_biggie->amount){
			echo "&#8358;";
			//echo $total_mini->amount;
			echo round($total_biggie->amount, 1);
		}
		else{
			echo "0";
		}

	}

	//sum total midi sales ever
	public function allMidi(){
		$this->db->select_sum('amount');
		$this->db->where('paystack_status', 'success');
		$this->db->where('plan', 'Midi');
		$this->db->where('month(date)', date('m'));
		$total_midi= $this->db->get('meat_sharing')->row();
		if($total_midi->amount){
			echo "&#8358;";
			//echo $total_mini->amount;
			echo round($total_midi->amount, 1);
		}
		else{
			echo "0";
		}

	}
	//sum total mini sales ever
	public function allMini(){
		$this->db->select_sum('amount');
		$this->db->where('paystack_status', 'success');
		$this->db->where('plan', 'Mini');
		$this->db->where('month(date)', date('m'));
		$total_mini= $this->db->get('meat_sharing')->row();
		if($total_mini->amount){
			echo "&#8358;";
			//echo $total_mini->amount;
			echo round($total_mini->amount, 1);
		}
		else{
			echo "0";
		}
	}

	//sum total large by month
	public function allLarge(){
		$this->db->select_sum('amount');
		$this->db->where('paystack_status', 'success');
		$this->db->where('plan', 'Large');
		$this->db->where('month(date)', date('m'));
		$total_biggie= $this->db->get('meat_sharing')->row();
		if($total_biggie->amount){
			echo "&#8358;";
			//echo $total_mini->amount;
			echo round($total_biggie->amount, 1);
		}
		else{
			echo "0";
		}
	}


	//sum total medium by month
	public function allMedium(){
		$this->db->select_sum('amount');
		$this->db->where('paystack_status', 'success');
		$this->db->where('plan', 'Medium');
		$this->db->where('month(date)', date('m'));
		$total_biggie= $this->db->get('meat_sharing')->row();
		if($total_biggie->amount){
			echo "&#8358;";
			//echo $total_mini->amount;
			echo round($total_biggie->amount, 1);
		}
		else{
			echo "0";
		}
	}


	//sum total Small by month
	public function allSmall(){
		$this->db->select_sum('amount');
		$this->db->where('paystack_status', 'success');
		$this->db->where('plan', 'Small');
		$this->db->where('month(date)', date('m'));
		$total_biggie= $this->db->get('meat_sharing')->row();
		if($total_biggie->amount){
			echo "&#8358;";
			//echo $total_mini->amount;
			echo round($total_biggie->amount, 1);
		}
		else{
			echo "0";
		}
	}

	//sum total maxi by month
	public function allMaxi(){
		$this->db->select_sum('amount');
		$this->db->where('paystack_status', 'success');
		$this->db->where('plan', 'Maxi');
		$this->db->where('month(date)', date('m'));
		$total_biggie= $this->db->get('meat_sharing')->row();
		if($total_biggie->amount){
			echo "&#8358;";
			//echo $total_mini->amount;
			echo round($total_biggie->amount, 1);
		}
		else{
			echo "0";
		}
	}

	//sum total standard by month
	public function allStandard(){
		$this->db->select_sum('amount');
		$this->db->where('paystack_status', 'success');
		$this->db->where('plan', 'Standard');
		$this->db->where('month(date)', date('m'));
		$total_biggie= $this->db->get('meat_sharing')->row();
		if($total_biggie->amount){
			echo "&#8358;";
			//echo $total_mini->amount;
			echo round($total_biggie->amount, 1);
		}
		else{
			echo "0";
		}
	}

	//sum total compact by month
	public function allCompact(){
		$this->db->select_sum('amount');
		$this->db->where('paystack_status', 'success');
		$this->db->where('plan', 'Compact');
		$this->db->where('month(date)', date('m'));
		$total_biggie= $this->db->get('meat_sharing')->row();
		if($total_biggie->amount){
			echo "&#8358;";
			//echo $total_mini->amount;
			echo round($total_biggie->amount, 1);
		}
		else{
			echo "0";
		}
	}

	//sum Grand Total sales for current month
	public function allPayment(){
		$this->db->select_sum('amount');
		$this->db->like('paystack_status', 'success');
		$this->db->where('month(date)', date('m'));
		$total_mini= $this->db->get('meat_sharing')->row();
		if($total_mini->amount){
			echo "&#8358;";
			//echo $total_mini->amount;
			echo round($total_mini->amount, 1);
		}
		else{
			echo "0";
		}
	}

//sum total biggie by month
	public function allFlash(){
		$this->db->select_sum('amount');
		$this->db->where('paystack_status', 'success');
		$this->db->where('plan', 'Flash_sales');
		$this->db->where('month(date)', date('m'));
		$total_biggie= $this->db->get('meat_sharing')->row();
		if($total_biggie->amount){
			echo "&#8358;";
			//echo $total_mini->amount;
			echo round($total_biggie->amount, 1);
		}
		else{
			echo "0";
		}
	}

	//get all successful transaction
	public function Flash_sales()
	{
		$this->db->order_by('date',  'DESC');
		$this->db->like('paystack_status', 'success');
		$this->db->like('plan', 'Flash_sales');
//		$this->db->like('month(date)', date('m'));
		$query = $this->db->get('meat_sharing');
		return $query;
	}

	//get all successful transaction
	public function Trans()
	{
		$this->db->order_by('date',  'DESC');
		$this->db->like('paystack_status', 'success');
		//$this->db->like('specta_status', 'success');
//		$this->db->like('month(date)', date('m'));
		$query = $this->db->get('meat_sharing');
		return $query;
	}

	//get all successful Specta transaction
	public function Specta()
	{
		$this->db->order_by('date',  'DESC');
		//$this->db->like('paystack_status', 'success');
		$this->db->like('specta_status', 'success');
//		$this->db->like('month(date)', date('m'));
		$query = $this->db->get('meat_sharing');
		return $query;
	}


	//get all pending order
	public function pendingOrder()
	{
		$this->db->order_by('date',  'DESC');
		//$this->db->like('month(date)', date('m'));
		$this->db->like('paystack_status', 'pending');
		$query = $this->db->get('meat_sharing');
		return $query;
	}

	public function getRecordsById()
	{
		$id=$this->input->get('id');
		$this->db->select('*');
		$this->db->where('id', $id);
		$q = $this->db->get('users');
		$result = $q->result_array();
		return $result;
	}

	/*Approve Agent by id*/
	public function update_records($postData,$id)
	{
		$response = "";
		$status = trim($postData['status']);
		if ($status != '') {
			// Update
			$value = array('status' => $status);
			$this->db->where('id', $id);
			$this->db->update('users', $value);
		}
	}


	/*Reject Agent by id*/
	public function reject($postData,$id)
	{
		$response = "";
		$status = trim($postData['status']);
		if ($status != '') {
			// Update
			$value = array('status' => $status);
			$this->db->where('id', $id);
			$this->db->update('users', $value);
		}
	}

	/*edit Agent by id*/
	public function edit_records($postData,$id)
	{
		$response = "";
		$user_image = trim($postData['user_image']);
		$user_card = trim($postData['user_card']);

		if ($user_image != '' &&  $user_card != '') {
			// Update
			$value = array('user_image' => $user_image, 'user_card' => $user_card);
			$this->db->where('id', $id);
			$this->db->update('users', $value);
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

	// count Total sales where payment is successful
	public function countSuccessfulSales()
	{
		$this->db->count_all('meat_sharing');
		$this->db->like('paystack_status', 'Success');
		$this->db->like('date(date)', date('m'));
		//gives Sum of amount columns value

	}
	//total commission for all agent for current month
	public function commission(){
		$this->db->select_sum('agent_commission');
		$this->db->like('paystack_status', 'success');
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

// sum commission by date
	public function dateCommission(){
		$mini_from= $this->input->get('comm_from');
		$mini_to= $this->input->get('comm_to');
		$this->db->select_sum('agent_commission');
		$this->db->like('paystack_status', 'success');
		$this->db->where('DATE(date) >=', date('Y-m-d',strtotime($mini_from)));
		$this->db->where('DATE(date) <=', date('Y-m-d',strtotime($mini_to)));
		$commission= $this->db->get('meat_sharing')->row();
		if($commission->agent_commission){
			echo "&#8358;";
			//echo $total_mini->amount;
			echo round($commission->agent_commission, 1);
		}
		else{
			echo "0";
		}

	}

// sum monthly commission for individual agent by referral and by date
	public function agentCommission(){
		$agent_from= $this->input->get('agent_from');
		$agent_to= $this->input->get('agent_to');
		$agent_referral = $this->input->get('referral');
		$this->db->select_sum('agent_commission');
		$this->db->like('paystack_status', 'success');
		$this->db->where('DATE(date) >=', date('Y-m-d',strtotime($agent_from)));
		$this->db->where('DATE(date) <=', date('Y-m-d',strtotime($agent_to)));
		$this->db->like('referral', $agent_referral);
		$commission= $this->db->get('meat_sharing')->row();
		if($commission->agent_commission){
			echo "&#8358;";
			//echo $total_mini->amount;
			echo round($commission->agent_commission, 1);
		}
		else{
			echo "0";
		}

	}


	// agents commission from sales that is successful
	public function userAndMeatsharing() {

		$this->db->select('users.*, meat_sharing.*') ;//select what we need
		$this->db->join('meat_sharing', 'users.referral = meat_sharing.referral'); //do join
		$this->db->like('paystack_status', 'success');
		//$this->db->like('month(date)', date('m'));
		//$this->db->like( date('m'));
		$query = $this->db->get('users');

		return $query; //is there something to return? otherwise return an empty array
	}


	public function agentList()
	{
		$this->db->select(array('date', 'fname', 'lname', 'email', 'bank', 'address', 'account_name', 'account_number'));
		$this->db->from('users');
		$this->db->like('user_type', 'user');
		//$this->db->limit(10);
		$query = $this->db->get();
		return $query->result_array();

	}

	public function employeeList() {
		$this->db->select(array('date', 'fname', 'lname', 'email', 'bank', 'address', 'account_name', 'account_number'));
		$this->db->from('users');
		$this->db->like('user_type', 'user');
		//$this->db->limit(10);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function salesExcel() {
		$this->db->select(array('date', 'cname', 'email', 'phone_number', 'delivery_address', 'plan', 'amount', 'referral'));
		$this->db->from('meat_sharing');
		$this->db->like('paystack_status', 'success');
		//$this->db->limit(10);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function commissionExcel() {
		$this->db->select(array('users.*, meat_sharing.*'));
		$this->db->join('meat_sharing', 'users.referral = meat_sharing.referral'); //do join
		$this->db->like('paystack_status', 'success');
		//$this->db->limit(10);
		$query = $this->db->get('users');
		return $query->result_array();
	}


	}// end class


