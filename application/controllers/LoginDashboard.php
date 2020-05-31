<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginDashboard extends CI_Controller {
	#Add Employee Personal Information
	public function index(){
		$this->load->view("login_form");
	}

	public function loginValidation(){
		$this->form_validation->set_rules("user_email", "User Email","required|valid_email");
		$this->form_validation->set_rules("user_password", "Email Password","required|min_length[4]|max_length[15]|alpha_numeric");
		$this->form_validation->set_rules("user_role", "User Role","required");	
		
		if ($this->form_validation->run()){
			
			$email =$this->input->post("user_email");
			$password =$this->input->post("user_password");
			$role=$this->input->post("user_role");
			
			$this->load->model("Login");
			$data['details']=$this->Login->user_details($email,$password,$role);
			if($email=="hr@admin.com" && $password=="admin123" && $role=="Admin"){

                $this->session->set_flashdata('data',array('success', 'Admin Login Successfully.'));
				return redirect(base_url().'admin/AdminDashboard/addEmployeePersonal');
				
			}elseif($email=="hr@executive.com" && $password=="executive123" && $role=="Executive"){

				$this->session->set_flashdata('data',array('success', 'Executive Login Successfully.'));
				return redirect(base_url().'executive/ExecutiveDashboard/addEmployeeJob');
			
			}elseif($data['details']->user_role==1){

				$this->session->set_flashdata('data',array('success', 'Employee Login Successfully.'));
				return redirect(base_url().'employee/EmployeeDashboard/viewEmployeeRole/'.$data['details']->user_id);

			}else{
				$this->session->set_flashdata('error','Invalid User');
				return 	redirect(base_url().'LoginDashboard/index');
				
			}

		}else{
			$this->index();
		}
	}
}
