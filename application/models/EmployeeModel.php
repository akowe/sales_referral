<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');
class EmployeeModel extends CI_Model {
	public function employeeList() {
		$this->db->select(array('id', 'fname', 'lname', 'email', 'bank', 'address', 'account_name', 'account_number'));
		$this->db->from('users');
		$this->db->limit(10);  
		$query = $this->db->get();
		return $query->result_array();
	}
}
?>
