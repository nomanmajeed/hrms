<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminDashboard extends CI_Controller {
	
	#Add Employee Personal Information
	public function index(){
		$data=$this->viewDataPersonal();
		$data['page']="add-employee-roles/addEmployeePersonal";
		$this->load->view("admin-template/admin-template",$data);
		}

	public function viewDataPersonal(){
		$this->load->model("Admin");
		$data['country']=$this->Admin->select_country();
		$data['city']=$this->Admin->select_city();
		return $data;
	}

	public function GetAdminDetails(){
		//$this->load->model("Admin");
		//$data['user']=$this->Admin->get_admin_data();
		$data = array(
			"username" => "Noman Majeed",
			"image" => "admin.jpg",
			"role" => "Admin"
		);
		return $data;
	} 

	public function addEmployeePersonal(){
		$data=$this->viewDataPersonal();
		$data['admin_details']=$this->GetAdminDetails();
		$data['page']="add-employee-roles/addEmployeePersonal";
		$this->load->view("admin-template/admin-template",$data);
	}

	public function addEmployeePersonalValidation(){
		$this->form_validation->set_rules("fname","User Name", "required|regex_match[/^[A-Z][a-zA-Z]{1,}(?: [A-Z][a-zA-Z]*){0,2}$/]");
		$this->form_validation->set_rules("cnic","cnic", "required|regex_match[/^[0-9+]{5}-[0-9+]{7}-[0-9]{1}$/]");
		$this->form_validation->set_rules("email","email", "required|valid_email|is_unique[users.user_email]");
		$this->form_validation->set_rules("confirm_email","confirm email", "required|valid_email|matches[email]");
		$this->form_validation->set_rules("mobile","mobile", "required|integer|exact_length[11]|regex_match[/^03/]");
		$this->form_validation->set_rules("country","country", "required");
		$this->form_validation->set_rules("city","city", "required");
		$this->form_validation->set_rules("address","address", "required");
		$this->form_validation->set_rules("dob","dob", "required|regex_match[/[0-9]{2}[-|\/]{1}[0-9]{2}[-|\/]{1}[0-9]{4}/]");
		$this->form_validation->set_rules("gender","gender", "required");

		if(isset($_POST['next'])){
			redirect(base_url().'admin/AdminDashboard/addEmployeeQualification');	
		}else{
			
			$config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['encrypt_name']         = TRUE;
            
            $this->load->library('upload', $config);

			if ($this->form_validation->run()){
				
				if($this->upload->do_upload('profile_image')){
					$data = array('upload_data' => $this->upload->data());
					$file_name = $this->upload->data('file_name'); 
      				$image_url = $this->upload->data('full_path');
				}else{
					$upload_error = array('error' => $this->upload->display_errors());
				}
				$this->load->model("Admin");
				$user_data=array(
						//"user_role" =>"Employee",
						"user_name" =>$this->input->post("fname"),
						"user_cnic" =>$this->input->post("cnic"),
						"user_email" =>$this->input->post("email"),
						"user_phone" =>$this->input->post("mobile"),
						"user_address" =>$this->input->post("address"),
						"user_city" =>$this->input->post("city"),
						"user_country" =>$this->input->post("country"),
						"user_dob" =>$this->input->post("dob"),
						"user_gender" =>$this->input->post("gender"),
						"user_image_name" =>$file_name,
						"user_image_url" =>$image_url
					);
				$this->Admin->insert_data($user_data);
				$this->session->set_flashdata('success','Data Inserted Successfully');
				return 	redirect(base_url().'admin/AdminDashboard/addEmployeePersonal');
			} else {
				$this->addEmployeePersonal();
			}	
		}
	}

	#Add Employee Qualification Information
	public function lastUserId(){
		$this->load->model('Admin');
		$data['last_user']=$this->Admin->last_row();
		return $data;
	}

	public function addEmployeeQualification(){
		$data=$this->viewDataPersonal();
		$data['admin_details']=$this->GetAdminDetails();
		$data['page']="add-employee-roles/addEmployeeQualification";
		$this->load->view("admin-template/admin-template",$data);
	}

	public function addEmployeeQualificationValidation(){
		$this->form_validation->set_rules("degree_level", "Degree Level","required");
		$this->form_validation->set_rules("degree_title", "Degree Title","required|regex_match[/^[A-Z][a-zA-Z]{1,}(?: [A-Z][a-zA-Z]*){0,2}$/]");
		$this->form_validation->set_rules("major_subjects", "Major Subjects","required");
		$this->form_validation->set_rules("college", "College","required");
		$this->form_validation->set_rules("date_enrolled", "Date Enrolled","required|regex_match[/[0-9]{2}[-|\/]{1}[0-9]{2}[-|\/]{1}[0-9]{4}/]");
		$this->form_validation->set_rules("date_completion", "Date Completion","required|regex_match[/[0-9]{2}[-|\/]{1}[0-9]{2}[-|\/]{1}[0-9]{4}/]");
		$this->form_validation->set_rules("grade", "Grade","required");	

		if(isset($_POST['previous'])){
			//$this->addEmployeePersonal();
			redirect(base_url().'admin/AdminDashboard/addEmployeePersonal');	
		}else if(isset($_POST['next'])){
			redirect(base_url().'admin/AdminDashboard/addEmployeeBank');
		}else{
			if ($this->form_validation->run()){
				$this->load->model("Admin");
				$last_user=$this->Admin->last_row();
				$user_id="";
				foreach ($last_user->result() as $last_user){
					$user_id=$last_user->user_id;
				}
				$user_data=array(
						"user_id" =>$user_id,
						"degree_level" =>$this->input->post("degree_level"),
						"degree_title" =>$this->input->post("degree_title"),
						"major_subjects" =>$this->input->post("major_subjects"),
						"college_name" =>$this->input->post("college"),
						"date_enrollment" =>$this->input->post("date_enrolled"),
						"date_completion" =>$this->input->post("date_completion"),
						"grade" =>$this->input->post("grade")
					);
				$this->Admin->insert_data_qualification($user_data);
				$this->session->set_flashdata('success','Data Inserted Successfully');
				return 	redirect(base_url().'admin/AdminDashboard/addEmployeeQualification');
			}else{
				$this->addEmployeeQualification();
			}
		}	
	}

	#Add Employee Bank Details
	public function addEmployeeBank(){
		$data=$this->viewDataPersonal();
		$data['admin_details']=$this->GetAdminDetails();
		$data['page']="add-employee-roles/addEmployeeBank";
		$this->load->view("admin-template/admin-template",$data);	
	}

	public function addEmployeeBankValidation(){
		$this->form_validation->set_rules("bank_name", "Bank Name","required|regex_match[/^[A-Z][a-zA-Z]{1,}(?: [A-Z][a-zA-Z]*){0,2}$/]");
		$this->form_validation->set_rules("branch_no", "Branch No.","required|integer|exact_length[4]");
		$this->form_validation->set_rules("branch_address", "Branch Address","required");
		$this->form_validation->set_rules("account_no", "Account No.","required|max_length[20]");
			

		if(isset($_POST['previous'])){
			redirect(base_url().'admin/AdminDashboard/addEmployeeQualification');	
		}else if(isset($_POST['next'])){
			redirect(base_url().'admin/AdminDashboard/addEmployeeJob');
		}else{
			if ($this->form_validation->run()){
				
				$this->load->model("Admin");
				$last_user=$this->Admin->last_row();
				$user_id="";
				foreach ($last_user->result() as $last_user){
					$user_id=$last_user->user_id;
				}
				$user_data=array(
						"user_id" =>$user_id,
						"bank_name" =>$this->input->post("bank_name"),
						"branch_no" =>$this->input->post("branch_no"),
						"branch_name" =>$this->input->post("branch_address"),
						"account_no" =>$this->input->post("account_no")
					);
				$this->Admin->insert_data_bank($user_data);
				$this->session->set_flashdata('success','Data Inserted Successfully');
				return 	redirect(base_url().'admin/AdminDashboard/addEmployeeBank');
			}else{
				$this->addEmployeeBank();
			}
		}	
	}

	#Add Employee Job Details
	public function viewDataJob(){
		$this->load->model("Admin");
		$data['designation']=$this->Admin->select_designation();
		$data['department']=$this->Admin->select_department();
		$data['project']=$this->Admin->select_project();
		$data['location']=$this->Admin->select_location();
		return $data;
	} 

	public function addEmployeeJob(){
		$data=$this->viewDataPersonal();
		$data=$this->viewDataJob();
		$data['admin_details']=$this->GetAdminDetails();
		$data['page']="add-employee-roles/addEmployeeJob";
		$this->load->view("admin-template/admin-template",$data);
	}
	
	public function addEmployeeJobValidation(){
		$this->form_validation->set_rules("designation", "Designation","required");
		$this->form_validation->set_rules("department", "Department","required");
		$this->form_validation->set_rules("project", "Project","required");
		$this->form_validation->set_rules("location", "Project Location","required");
		$this->form_validation->set_rules("date_hire", "Date Hire","required");
		$this->form_validation->set_rules("salary", "Salary","required");
		
		if(isset($_POST['previous'])){
			redirect(base_url().'admin/AdminDashboard/addEmployeeBank');	
		}else{
			if ($this->form_validation->run()){
				
				$this->load->model("Admin");
				$last_user=$this->Admin->last_row();
				$user_id="";
				foreach ($last_user->result() as $last_user){
					$user_id=$last_user->user_id;
				}

				$user_data=array(
						"user_id" =>$user_id,
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
						"user_id" =>$user_id,
						"total_salary" =>$total_salary,
						"basic_salary" =>$basic_salary,
						"travelling_allounce" =>$travelling_allounce,
						"house_allounce" =>$house_allounce,
						"medical_allounce" =>$medical_allounce,
						"lunch_allounce" =>$lunch_allounce
					);
				$this->Admin->insert_data_job($user_data);
				$this->Admin->insert_data_salary($salary_data);
				$this->session->set_flashdata('success','Data Inserted Successfully');
				return 	redirect(base_url().'admin/AdminDashboard/addEmployeeJob');
			}else{
				$this->addEmployeeJob();
			}
		}	
	}

	#View Employees
	public function viewDataEmployees(){
		$this->load->model("Admin");
		$data['user']=$this->Admin->view_employee();
		return $data;
	}

	public function viewEmployee(){
		$data=$this->viewDataEmployees();
		$data['admin_details']=$this->GetAdminDetails();
		$data['page']="view-employee-roles/viewEmployee";
		$this->load->view("admin-template/admin-template",$data);
		//$this->load->view("admin/view-employee-template/admin-template-viewEmployee",$data);

	}

	#Edit Employee
	public function editEmployee(){
		$this->load->view("admin/edit-employee-template/admin-template-editEmployee");	
	}

	public function editEmployeeCrud($id){
		$data=$this->viewDataPersonal();
		$this->load->model("Admin");
		$data['details']=$this->Admin->get_employee_crud_details($id);
		$data['designation']=$this->Admin->select_designation();
		$data['department']=$this->Admin->select_department();
		$data['project']=$this->Admin->select_project();
		$data['location']=$this->Admin->select_location();
		$data['page']="edit-employee-roles/editEmployeeCrud";
		$data['admin_details']=$this->GetAdminDetails();
		$this->load->view("admin-template/admin-template",$data);
		//$this->load->view("admin/edit-employee-template/admin-template-editEmployeeCrud",$data);
	}

	public function editEmployeeCrudValidation(){
		$this->form_validation->set_rules("fname","User Name", "required|regex_match[/^[A-Z][a-zA-Z]{1,}(?: [A-Z][a-zA-Z]*){0,2}$/]");
		$this->form_validation->set_rules("cnic","cnic", "required|regex_match[/^[0-9+]{5}-[0-9+]{7}-[0-9]{1}$/]");
		$this->form_validation->set_rules("email","email", "required|valid_email|is_unique[users.user_email]");
		$this->form_validation->set_rules("confirm_email","confirm email", "required|valid_email|matches[email]");
		$this->form_validation->set_rules("mobile","mobile", "required|integer|exact_length[11]|regex_match[/^03/]");
		$this->form_validation->set_rules("country","country", "required");
		$this->form_validation->set_rules("city","city", "required");
		$this->form_validation->set_rules("address","address", "required");
		$this->form_validation->set_rules("dob","dob", "required|regex_match[/[0-9]{2}[-|\/]{1}[0-9]{2}[-|\/]{1}[0-9]{4}/]");
		$this->form_validation->set_rules("gender","gender", "required");
		$this->form_validation->set_rules("degree_level", "Degree Level","required");
		$this->form_validation->set_rules("degree_title", "Degree Title","required|regex_match[/^[A-Z][a-zA-Z]{1,}(?: [A-Z][a-zA-Z]*){0,2}$/]");
		$this->form_validation->set_rules("major_subjects", "Major Subjects","required");
		$this->form_validation->set_rules("college", "College","required");
		$this->form_validation->set_rules("date_enrolled", "Date Enrolled","required|regex_match[/[0-9]{2}[-|\/]{1}[0-9]{2}[-|\/]{1}[0-9]{4}/]");
		$this->form_validation->set_rules("date_completion", "Date Completion","required|regex_match[/[0-9]{2}[-|\/]{1}[0-9]{2}[-|\/]{1}[0-9]{4}/]");
		$this->form_validation->set_rules("grade", "Grade","required");
		$this->form_validation->set_rules("bank_name", "Bank Name","required|regex_match[/^[A-Z][a-zA-Z]{1,}(?: [A-Z][a-zA-Z]*){0,2}$/]");
		$this->form_validation->set_rules("branch_no", "Branch No.","required|integer|exact_length[4]");
		$this->form_validation->set_rules("branch_address", "Branch Address","required");
		$this->form_validation->set_rules("account_no", "Account No.","required|max_length[20]");
		$this->form_validation->set_rules("designation", "Designation","required");
		$this->form_validation->set_rules("department", "Department","required");
		$this->form_validation->set_rules("project", "Project","required");
		$this->form_validation->set_rules("location", "Project Location","required");
		$this->form_validation->set_rules("date_hire", "Date Hire","required");
		$this->form_validation->set_rules("salary", "Salary","required");
		
		if (!$this->form_validation->run()){
			
			$id =$this->input->post("user_id");
			$user_data_personal=array(
					"user_id" =>$id,
					"user_name" =>$this->input->post("fname"),
					"user_cnic" =>$this->input->post("cnic"),
					"user_email" =>$this->input->post("email"),
					"user_phone" =>$this->input->post("mobile"),
					"user_address" =>$this->input->post("address"),
					"user_city" =>$this->input->post("city"),
					"user_country" =>$this->input->post("country"),
					"user_dob" =>$this->input->post("dob"),
					"user_gender" =>$this->input->post("gender")
				);
			$user_data_qualification=array(
					"user_id" =>$id,
					"degree_level" =>$this->input->post("degree_level"),
					"degree_title" =>$this->input->post("degree_title"),
					"major_subjects" =>$this->input->post("major_subjects"),
					"college_name" =>$this->input->post("college"),
					"date_enrollment" =>$this->input->post("date_enrolled"),
					"date_completion" =>$this->input->post("date_completion"),
					"grade" =>$this->input->post("grade")
				);
			$user_data_bank=array(
					"user_id" =>$id,
					"bank_name" =>$this->input->post("bank_name"),
					"branch_no" =>$this->input->post("branch_no"),
					"branch_name" =>$this->input->post("branch_address"),
					"account_no" =>$this->input->post("account_no")
				);
			$user_data_job=array(
					"user_id" =>$id,
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
			
			$user_data_salary=array(
					"user_id" =>$id,
					"total_salary" =>$total_salary,
					"basic_salary" =>$basic_salary,
					"travelling_allounce" =>$travelling_allounce,
					"house_allounce" =>$house_allounce,
					"medical_allounce" =>$medical_allounce,
					"lunch_allounce" =>$lunch_allounce
				);
			$this->load->model("Admin");
			$this->Admin->update_data_personal($user_data_personal,$id);
			$this->Admin->update_data_qualification($user_data_qualification,$id);
			$this->Admin->update_data_bank($user_data_bank,$id);
			$this->Admin->update_data_job($user_data_job,$id);
			$this->Admin->update_data_salary($user_data_salary,$id);
			$this->session->set_flashdata('success','Data Updated Successfully');
			return 	redirect(base_url().'admin/AdminDashboard/viewEmployee');
		}else{
			$this->session->set_flashdata('error','Error Encountered');
			return 	redirect(base_url().'admin/AdminDashboard/viewEmployee');
		}
	}

	#Delete Employee
	public function deleteEmployeeCrud($id){
		$data=$this->viewDataPersonal();
		$this->load->model("Admin");
		$this->Admin->delete_employee($id);
		$this->session->set_flashdata('success','Employee Deleted Successfully');
		return 	redirect(base_url().'admin/AdminDashboard/viewEmployee');
		//$this->load->view("admin/edit-employee-template/admin-template-editEmployeeCrud",$data);
	}

	#Assign Role
	public function viewRole(){
		$this->load->model("Admin");
		$data['role']=$this->Admin->select_role();
		return $data;
	}

	public function assignRole(){
		$data=$this->viewRole();
		//$data['admin_details']=$this->GetAdminDetails();
		$data['page']="assign-role/assignRole";
		//$this->load->view("admin/assign-role-template/admin-template-assignRole",$data);
		$this->load->view("admin-template/admin-template",$data);
	}

	public function assignRoleValidation(){
		$this->form_validation->set_rules("user_id", "User Id","required|integer");
		$this->form_validation->set_rules("email", "Email Address","required|valid_email");
		$this->form_validation->set_rules("password", "Password","required|alpha_numeric");
		$this->form_validation->set_rules("confirm_password", "Confirmation Password","required|alpha_numeric|matches[password]");
		$this->form_validation->set_rules("role", "Role","required");
			
		if ($this->form_validation->run()){
				
			$this->load->model("Admin");
			$user_id =$this->input->post("user_id");
			$email =$this->input->post("email");
			$user_data=array(
					"user_role" =>$this->input->post("role"),
					"user_password" =>$this->input->post("password")
				);
			$this->Admin->insert_role($user_data,$user_id,$email);
			$this->session->set_flashdata('success','Role Assigned Successfully');
			return 	redirect(base_url().'admin/AdminDashboard/assignRole');
		}else{
			$this->assignRole();
		}
	}

	#View Employees Salary
	public function viewEmployeeSalary(){
		$data=$this->viewDataEmployees();
		$data['page']="view-employee-roles/viewEmployeeSalary";
		$data['admin_details']=$this->GetAdminDetails();
		$this->load->view("admin-template/admin-template",$data);
	}

	public function printSalary($id){
		$this->load->model("Admin");
		$data['user']=$this->Admin->print_salary_data($id);
		$data['page']="view-employee-roles/viewEmployeeSalaryTable";
		$data['admin_details']=$this->GetAdminDetails();
		$this->load->view("admin-template/admin-template",$data);
		//$this->load->view("admin/view-employee-template/admin-template-viewEmployeeSalaryTable",$data);

	}


			
		
}
