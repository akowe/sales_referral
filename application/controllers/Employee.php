<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Employee extends CI_Controller {
	public function __construct() {
        parent::__construct();
//		$this->load->model('EmployeeModel');
		$this->load->model('Main_model');
    }    
	public function users() {
		$this->load->helper('url');
		$this->load->database();

        $data['page'] = 'export-excel';
        $data['title'] = 'Export Excel data';
        $data['employeeData'] = $this->Main_model->employeeList();
		$this->load->view('dashboard/users', $data);
    }
	public function createExcel() {
		$this->load->database();
		$fileName = 'users.xlsx';
		$employeeData = $this->Main_model->employeeList();
		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Hello World !');
		$sheet->setCellValue('A1', 'Id');
        $sheet->setCellValue('B1', 'Fname');
        $sheet->setCellValue('C1', 'Lname');
        $sheet->setCellValue('D1', 'Email');
		$sheet->setCellValue('E1', 'Bank');
        $sheet->setCellValue('F1', 'Address');
        $sheet->setCellValue('G1', 'Account_name');
        $sheet->setCellValue('H1', 'Account_number');


        $rows = 2;
        foreach ($employeeData as $val){
            $sheet->setCellValue('A' . $rows, $val['id']);
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
}
?>
