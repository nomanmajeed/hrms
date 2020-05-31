<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Model {
	
	public function user_details($email,$password,$role){
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
		$this->db->where('users.user_email',$email);
		$this->db->where('users.user_password',$password);
		$this->db->where('users.user_role',$role);
		$query=$this->db->get();
		return $query->row();
	}

	public function get_name($value){
		
		return $value;
	}
}

?>