<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Model {
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


	function get_employee_details($id){
		$query=$this->db->query('Select user_id,user_name, user_image_name from users where user_id='.$id);
		return $query;
	}
	
	function last_row(){
		$query=$this->db->query('Select * from users order by user_id desc limit 1');
		return $query;
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


	#View Employee Role
	function view_employee_role($id){
		$query=$this->db->query('Select * from company.users
				join user_job using (user_id)
				join designation on(user_job.user_designation=designation.designation_id)
				join department on(user_job.user_department=department.department_id)
				join project on(user_job.user_project=project.project_id)
				join location on(user_job.user_location=location.location_id)
				join user_salary using (user_id)
				join country on(users.user_country=country.country_id)
				join city on(users.user_city=city.city_id)
				where user_id='.$id);
		return $query;
	}
}

?>