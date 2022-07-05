<?php

require APPPATH . 'libraries/REST_Controller.php';

class Referral extends REST_Controller
{

	/**
	 * Get All Data from this method.
	 *
	 * @return Response
	 */
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	/**
	 * Get All Data from this method.
	 *
	 * @return Response
	 */
	public function index_get($id = '')
	{
		if(!empty($id)){
			$data = $this->db->get_where("users", ['id' => $id])->row_array();
		}else{
			$data = $this->db->get("users")->result();
		}

		$this->response($data, REST_Controller::HTTP_OK);
	}


	public function code_exist_get($code = '')
	{
		if(!empty($code)){
			$data = $this->db->get_where("users", ['referral' => $code, 'status' => 'Approved'])->row_array();


			if (empty($data)) {
				return $this->response(['status' => 'error', 'message' => 'The Referral code is invalid'], REST_Controller::HTTP_NOT_FOUND);
			}

		}else{
			return $this->response(['status' => 'error', 'message' => 'No Referral code is given'], REST_Controller::HTTP_NOT_FOUND);
		}


		return $this->response(['status' => 'success', 'data' => $data], REST_Controller::HTTP_OK);
	}

	/**
	 * Get All Data from this method.
	 *
	 * @return Response
	 */
	public function index_post()
	{
		$input = $this->input->post();

		$this->db->insert('users',$input);

		$this->response(['users created successfully.'], REST_Controller::HTTP_OK);
	}

	/**
	 * Get All Data from this method.
	 *
	 * @return Response
	 */
//	public function index_put($id)
//	{
//		$input = $this->put();
//		$this->db->update('users', $input, array('id'=>$id));
//
//		$this->response(['users updated successfully.'], REST_Controller::HTTP_OK);
//	}

	/**
	 * Get All Data from this method.
	 *
	 * @return Response
	 */
//	public function index_delete($id)
//	{
//		$this->db->delete('users', array('id'=>$id));
//
//		$this->response(['users deleted successfully.'], REST_Controller::HTTP_OK);
//	}

}
