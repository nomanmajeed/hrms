<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExecutiveDashboard extends CI_Controller {

	function __construct() {
        parent::__construct();
    }

	public function index(){
		$data['page']="assign-job/addEmployeeJob";
		$this->load->view("executive-template/executive-template",$data);
	}

	public function addEmployeeJob(){
		$data=$this->viewDataPersonal();
		$data=$this->viewDataJob();
		$data['executive_details']=$this->GetExecutiveDetails();
		$data['page']="assign-job/addEmployeeJob";
		$this->load->view("executive-template/executive-template",$data);
	}
	
	public function addEmployeeJobValidation(){
		$this->form_validation->set_rules("user_id", "User Id","required|integer");
		$this->form_validation->set_rules("designation", "Designation","required");
		$this->form_validation->set_rules("department", "Department","required");
		$this->form_validation->set_rules("project", "Project","required");
		$this->form_validation->set_rules("location", "Project Location","required");
		$this->form_validation->set_rules("date_hire", "Date Hire","required");
		$this->form_validation->set_rules("salary", "Salary","required");
		
			if ($this->form_validation->run()){
				
				$this->load->model("Executive");
				$last_user=$this->Executive->last_row();

				$user_data=array(
						"user_id" =>$this->input->post("user_id"),
						"user_designation" =>$this->input->post("designation"),
						"user_project" =>$this->input->post("project"),
						"user_department" =>$this->input->post("department"),
						"user_location" =>$this->input->post("location"),
						"user_date_hire" =>$this->input->post("date_hire")
					);
				
				$total_salary=$this->input->post("salary");
				$travelling_allounce=($total_salary/100)*5;
				$house_allounce=($total_salary/100)*15;
				$medical_allounce=($total_salary/100)*10;
				$lunch_allounce=($total_salary/100)*2;
				$sum=$travelling_allounce+$house_allounce+$medical_allounce+$lunch_allounce;
				$basic_salary=$total_salary-$sum;
				
				$salary_data=array(
						"user_id" =>$this->input->post("user_id"),
						"total_salary" =>$total_salary,
						"basic_salary" =>$basic_salary,
						"travelling_allounce" =>$travelling_allounce,
						"house_allounce" =>$house_allounce,
						"medical_allounce" =>$medical_allounce,
						"lunch_allounce" =>$lunch_allounce
					);
				$this->Executive->insert_data_job($user_data);
				$this->Executive->insert_data_salary($salary_data);
				$this->session->set_flashdata('success','Data Inserted Successfully');
				return 	redirect(base_url().'executive/ExecutiveDashboard/addEmployeeJob');
			}else{
				$this->addEmployeeJob();
			}
	}

	#View Employees
	public function viewDataEmployees(){
		$this->load->model("Executive");
		$data['user']=$this->Executive->view_employee();
		return $data;
	}

	public function viewEmployee(){
		$data=$this->viewDataEmployees();
		$data['executive_details']=$this->GetExecutiveDetails();
		$data['page']="view-employee-roles/viewEmployee";
		$this->load->view("executive-template/executive-template",$data);
		
	}

	#Assign Role
	public function viewRole(){
		$this->load->model("Executive");
		$data['role']=$this->Executive->select_role();
		return $data;
	}

	public function assignRole(){
		$data=$this->viewRole();
		$data['page']="assign-role/assignRole";
		$data['executive_details']=$this->GetExecutiveDetails();
		$this->load->view("executive-template/executive-template",$data);
	}

	public function assignRoleValidation(){
		$this->form_validation->set_rules("user_id", "User Id","required|integer");
		$this->form_validation->set_rules("email", "Email Address","required|valid_email");
		$this->form_validation->set_rules("password", "Password","required|alpha_numeric");
		$this->form_validation->set_rules("confirm_password", "Confirmation Password","required|alpha_numeric|matches[password]");
		$this->form_validation->set_rules("role", "Role","required");
			
		if ($this->form_validation->run()){
				
			$this->load->model("Executive");
			$user_id =$this->input->post("user_id");
			$email =$this->input->post("email");
			$user_data=array(
					"user_role" =>$this->input->post("role"),
					"user_password" =>$this->input->post("password")
				);
			$this->Executive->insert_role($user_data,$user_id,$email);
			$this->session->set_flashdata('success','Role Assigned Successfully');
			return 	redirect(base_url().'executive/ExecutiveDashboard/assignRole');
		}else{
			$this->assignRole();
		}
	}

	public function viewDataPersonal(){
		$this->load->model("Executive");
		$data['country']=$this->Executive->select_country();
		$data['city']=$this->Executive->select_city();
		return $data;
	}

	#Assign Employee Job Details
	public function viewDataJob(){
		$this->load->model("Executive");
		$data['designation']=$this->Executive->select_designation();
		$data['department']=$this->Executive->select_department();
		$data['project']=$this->Executive->select_project();
		$data['location']=$this->Executive->select_location();
		return $data;
	} 
	public function GetExecutiveDetails(){
		$data = array(
			"username" => "Sayyar Hassan",
			"image" => "executive.jpg",
			"role" => "Executive"
		);
		return $data;
	}
}
