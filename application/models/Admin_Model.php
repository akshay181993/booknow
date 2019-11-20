<?php 
include APPPATH.'/libraries/DataTablesTrait.php';
class Admin_Model extends CI_Model {
	use DataTablesTrait;

	public function login($email, $password)
	{
		$fields = ['id','name','email','mobile_no','role'];
		$table = ['users_tbl']; 
		$conditions = ['email' => $email, 'password' => sha1($password)];
		$data = $this->SelectQ($fields,$table,$conditions);
		if(count($data) > 0 )
		{
			return $data;
		}else{
			return false;
		}
	}

	public function insert($fields,$table)
	{
		$data = $this->InsertQ($fields,$table);
		if($data == true){
			return true;
		}else{
			return false;
		}
	}

	public function commonUpdate($fields,$id,$table)
	{
		$conditions = ['id' => $id];
		$data = $this->UpdateQ($fields,$table,$conditions);
		// var_dump($data);die();
		if($data == true){
			return true;
		}else{
			return false;
		}
	}
	
	public function update($fields,$id)
	{
		$table = 'users_tbl';
		$conditions = ['id' => $id];
		$data = $this->UpdateQ($fields,$table,$conditions);
		if($data == true){
			return true;
		}else{
			return false;
		}
	}

	public function getPassword($data)
	{
		$table = 'users_tbl';
		$fields = 'password';
		$conditions = ['id' => $this->session->userdata('id'),'password' => $data['old_password']];
		$data = $this->SelectQ($fields,$table,$conditions);
		if(count($data) > 0 )
		{
			return true;
		}else{
			return false;
		}
	}

	public function getCP($role)
	{
		$table = 'users_tbl';
		$fields = ['id','mobile_no','name','email','role','status'];
		$conditions = ['role' => $role];
		$data = $this->SelectQ($fields,$table,$conditions);
		if(count($data) > 0 )
		{
			return $data;
		}else{
			return false;
		}
	}

	
	public function getSingle($id)
	{
		$table = 'users_tbl';
		$fields = ['password','id','mobile_no','name','email','role'];
		$conditions = ['id' => $id];
		$data = $this->SelectQ($fields,$table,$conditions);
		if(count($data) > 0 )
		{
			return $data;
		}else{
			return false;
		}
	}

	public function GetProfile($id)
	{
		$table = 'users_tbl';
		$fields = ['id','mobile_no','name','email'];
		$conditions = ['id' => $id];
		$query = $this->SelectQ($fields,$table,$conditions);
		if(count($query) > 0)
		{
			return $query;
		}
	}

	public function GetallBookedDetails($params = "")
	{
		$conditions = [];
		if(!empty($params['project_name'])){
			$conditions['bf.project_id'] = $params['project_name'];
		}
		if(!empty($params['start_date'])){
			$conditions['bf.created_at >='] = $params['start_date'];
		}
		if(!empty($params['end_date'])){
			$conditions['bf.created_at <='] = $params['end_date'];
		}
		
		$table = ['booked_flats_tbl bf','projects_tbl p','buildings_tbl b','agents_code_tbl ac'];
		$fields = ['bf.*','p.project_name','b.building_name','ac.agent_code'];
		$relation = ['','bf.project_id = p.id','bf.building_id = b.id','bf.agent_id = ac.id'];
		$conditions = ['bf.booking_status' => 'Booked','bf.payment_status' => 'Completed'];
		$data = $this->SelectQJ($fields,$table,$conditions,$relation);
		if(count($data) >= 1)
		{
			return $data;
		}else{
			false;
		}
	}

	public function AllProjects()
	{
		$table = ['projects_tbl'];
		$fields = ['id','project_name'];
		$conditions = ['status' => 1];
		$query = $this->SelectQ($fields,$table,$conditions);
		if(count($query) >= 1)
		{
			return $query;
		}else{
			return false;
		}
	}

	public function ExportBookedDetails($params = "")
	{
		$conditions = [];
		if(!empty($params['project_name'])){
			$conditions['bf.project_id'] = $params['project_name'];
		}
		if(!empty($params['start_date'])){
			$conditions['bf.created_at >='] = $params['start_date'];
		}
		if(!empty($params['end_date'])){
			$conditions['bf.created_at <='] = $params['end_date'];
		}
		
		$table = ['booked_flats_tbl bf','projects_tbl p','buildings_tbl b','users_tbl u'];
		$fields = ['bf.customer_name','bf.customer_email','bf.customer_mobile','bf.tid','bf.booking_status','bf.payment_status','bf.flat_no','bf.flat_type','bf.flat_view','p.project_name','b.building_name','u.name','u.mobile_no'];
		$relation = ['','bf.project_id = p.id','bf.building_id = b.id','bf.agent_id = u.id'];
		$data = $this->SelectQJ($fields,$table,$conditions,$relation);
		if(count($data) >= 1)
		{
			return $data;
		}else{
			false;
		}
	}

	public function UsersCount()
	{
		$this->db->select('COUNT(*) as user_count,role');
		$this->db->from('users_tbl');
		$this->db->group_by('role');
		$query = $this->db->get();
		if($query->num_rows() >=1 ){
			return $query->result_array();
		}else{
			return false;
		}
	}

	public function AllBookingsCount()
	{
		$query = $this->db->from("booked_flats_tbl")
					->where('payment_status','Completed')
					->count_all_results();
		return $query;
	}

	public function AllflatsCount()
	{
		$query = $this->db->from("flats_tbl")->count_all_results();
		return $query;
	}
	public function AllBuildingsCount()
	{
		$query = $this->db->from("buildings_tbl")->count_all_results();
		return $query;
	}
	
}