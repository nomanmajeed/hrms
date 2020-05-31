<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmployeeDashboard extends CI_Controller {
	
	#Add Employee Personal Information
	public function index(){
		$data=$this->viewDataPersonal();
		$data['page']="view-employee/viewEmployee";
		$this->load->view("employee-template/employee-template",$data);
		}

	public function viewDataPersonal(){
		$this->load->model("Employee");
		$data['country']=$this->Employee->select_country();
		$data['city']=$this->Employee->select_city();
		return $data;
	}

	public function GetEmployeeDetails($id){
		$this->load->model("Employee");
		$data=$this->Employee->get_employee_details($id);
		return $data;
	}


	public function lastUserId(){
		$this->load->model('Employee');
		$data['last_user']=$this->Employee->last_row();
		return $data;
	}


	#View Employees
	public function viewDataEmployees(){
		$this->load->model("Employee");
		$data['user']=$this->Employee->view_employee();
		return $data;
	}

	public function viewEmployee($id){
		$data=$this->viewDataPersonal();
		$data=$this->viewDataEmployees();
		$data['employee_details']=$this->GetEmployeeDetails($id);
		$data['page']="view-employee/viewEmployee";
		$this->load->view("employee-template/employee-template",$data);
	}

	public function viewEmployeeRole($id){
		$this->load->model("Employee");
		$data['user']=$this->Employee->view_employee_role($id);
		$data['page']="view-employee/viewEmployeeRole";
		$data['employee_details']=$this->GetEmployeeDetails($id);
		$this->load->view("employee-template/employee-template",$data);
	}
}