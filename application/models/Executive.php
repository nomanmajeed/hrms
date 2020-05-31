<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Executive extends CI_Model {
	#Add Employee Personal Information
	function select_country(){
		$query=$this->db->query('Select * from country');
		return $query;
	}

	function select_city(){
		$query=$this->db->query('Select * from city');
		return $query;
	}

	function insert_data($user_data){
		$this->db->insert("users",$user_data);
	}

	#Add Employee Qualification Information
	function last_row(){
		$query=$this->db->query('Select * from users order by user_id desc limit 1');
		return $query;
	}

	function insert_data_qualification($user_data){
		$this->db->insert("qualification",$user_data);
	}

	#Add Employee Bank Details
	function insert_data_bank($user_data){
		$this->db->insert("bank",$user_data);
	}

	#Add Employee Job Details
	function select_department(){
		$query=$this->db->query('Select * from department');
		return $query;
	}

	function select_project(){
		$query=$this->db->query('Select * from project');
		return $query;
	}

	function select_location(){
		$query=$this->db->query('Select * from location');
		return $query;
	}

	function select_designation(){
		$query=$this->db->query('Select * from designation');
		return $query;
	}

	function insert_data_job($user_data){
		$this->db->insert("user_job",$user_data);
	}

	function insert_data_salary($salary_data){
		$this->db->insert("user_salary",$salary_data);
	}

	#View Employee
	function view_employee(){
		$query=$this->db->query('Select * from users
								join country on(country.country_id=users.user_country)
								join city on(users.user_city=city.city_id)
								join qualification using (user_id)
								join bank using (user_id)
								join user_job using (user_id)
								join designation on(user_job.user_designation=designation.designation_id)
								join department on(user_job.user_department=department.department_id)
								join project on(user_job.user_project=project.project_id)
								join location on(user_job.user_location=location.location_id)
								join user_salary using (user_id)');

		return $query;
	}

	#Edit Employee
	function get_employee_crud_details($id){
		$this->db->distinct();
		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('country','users.user_country=country.country_id');
		$this->db->join('city','users.user_city=city.city_id');
		$this->db->join('qualification','users.user_id=qualification.user_id');
		$this->db->join('bank','users.user_id=bank.user_id');
		$this->db->join('user_job','users.user_id=user_job.user_id');
		$this->db->join('designation','user_job.user_designation=designation.designation_id');
		$this->db->join('department','user_job.user_department=department.department_id');
		$this->db->join('project','user_job.user_project=project.project_id');
		$this->db->join('location','user_job.user_location=location.location_id');
		$this->db->join('user_salary','users.user_id=user_salary.user_id');
		$this->db->where('users.user_id',$id);
		$query=$this->db->get();
		return $query->row();
	}

	function update_data_personal($user_data_personal,$id){
		$this->db->where('user_id', $id);
		$this->db->update('users', $user_data_personal);
	}

	function update_data_qualification($user_data_qualification,$id){
		$this->db->where('user_id', $id);
		$this->db->update('qualification', $user_data_qualification);
	}

	function update_data_bank($user_data_bank,$id){
		$this->db->where('user_id', $id);
		$this->db->update('bank', $user_data_bank);
	}

	function update_data_job($user_data_job,$id){
		$this->db->where('user_id', $id);
		$this->db->update('user_job', $user_data_job);
	}

	function update_data_salary($user_data_salary,$id){
		$this->db->where('user_id', $id);
		$this->db->update('user_salary', $user_data_salary);
	}

	#Delete Employee
	function delete_employee($id){
		// $tables = array('users', 'bank', 'qualification', 'user_job', 'user_salary');
		// $this->db->where('user_id', $id);
		// $this->db->delete($tables);
		// $this->db->query('Delete users, user_job, user_salary, bank, qualification 
		// 				  From users, user_job, user_salary, bank, qualification
		// 				  where users.user_id='.$id.'
		// 				  and user_salary.user_id='.$id.'
		// 				  and user_job.user_id='.$id.'
		// 				  and bank.user_id='.$id.'
		// 				  and qualification.user_id='.$id.'
		// 				');
		return;
	}

	#Assign Role
	function select_role(){
		$query=$this->db->query('Select * from role');
		return $query;
	}

	function insert_role($user_data,$user_id,$email){
		$this->db->where('user_id',$user_id);
		$this->db->where('user_email',$email);
		$this->db->update("users",$user_data);
	}

	#View Salary
	function print_salary_data($id){
		$this->db->distinct();
		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('bank','users.user_id=bank.user_id');
		$this->db->join('user_job','users.user_id=user_job.user_id');
		$this->db->join('designation','user_job.user_designation=designation.designation_id');
		$this->db->join('department','user_job.user_department=department.department_id');
		$this->db->join('user_salary','users.user_id=user_salary.user_id');
		$this->db->where('users.user_id',$id);
		$query=$this->db->get();
		return $query;
	}

	#Get Admin Details
	public function get_admin_data(){
		$data = array(
			"username" => "Noman Majeed",
			"image" => "admin.jpg",
			"role" => "Admin"
		);
		return $data;
	}
}

?>