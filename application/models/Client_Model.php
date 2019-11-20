<?php 
include APPPATH.'/libraries/DataTablesTrait.php';
class Client_Model extends CI_Model {
	use DataTablesTrait;

	public function GetAllProjects()
	{
		$table = ['projects_tbl p','layouts_tbl l'];
		$fields = ['p.id','p.project_name','l.layout'];
		$conditions = ['p.status' => 1];
		$relation = ['','l.project_id = p.id'];
		$query = $this->SelectQJ($fields,$table,$conditions,$relation);
		if(count($query) > 0){
			return $query;
		}
	}

	public function GetAllFlats($id)
	{
		$this->db->select('flat_type');
		$this->db->distinct();
		$this->db->where('building_id',$id);
		$query = $this->db->get('flats_tbl');
		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}
	}

	public function GetAllFlatsData($data)
	{
		// var_dump($data);die();
		$this->db->select('f.flat_no,f.status as flat_status, f.floor_number, f.flat_view, f.id,f.flat_status as booked_status, f.flat_cost, f.flat_area, bf.booking_status, bf.payment_status,bf.flat_no as bookedflat_no,bf.id as bookedflat_id,bf.created_at as booked_date');
		$this->db->from('flats_tbl f');
		$this->db->join('booked_flats_tbl bf','f.id = bf.flat_id AND f.project_id = '.$data['project_name'].' AND f.building_id = '.$data['building_name'].' AND bf.booking_status != "cancelled"'.' ','left');
		$this->db->where('f.project_id',$data['project_name']);
		// $this->db->where('f.flat_view',$data['flat_view']);
		$this->db->where('f.flat_type',$data['flat_type']);
		$this->db->where('f.building_id',$data['building_name']);
		$this->db->order_by('f.id','asc');
		$query = $this->db->get();
		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}else{
			return false;
		}
	}

	public function ChkValidCp($token)
	{
		$table = 'agents_code_tbl';
		$fields = ['id','agent_code'];
		$conditions = ['agent_code' => $token,'status' => 1];
		$query = $this->SelectQ($fields,$table,$conditions);
		if(count($query) > 0)
		{
			return $query;
		}else{
			return false;
		}

		// $table = ['agents_code_tbl ac','booked_flats_tbl bf'];
		// $fields = ['ac.id','ac.agent_code'];
		// $relation = ['','bf.agent_id = ac.id'];
		// $conditions = ['ac.agent_code' => $token];
		// $query = $this->SelectQJ($fields,$table,$conditions,$relation);
		// // var_dump($query);die();
		// if(count($query) > 0){
		// 	return $query;
		// }else{
		// 	return false;
		// }
	}

	public function SaveUserDetails($data)
	{
		$table = 'booked_flats_tbl';
		$query = $this->InsertQ($data,$table);
		if($query == true){
			return true;
		}
	}

	public function ChkOtp($otp)
	{
		$table = 'booked_flats_tbl';
		$conditions = ['otp' => $otp];
		$fields = ['id'];
		$query = $this->SelectQ($fields,$table,$conditions);
		if(count($query) > 0)
		{
			return $query;
		}else{
			return false;
		}
	}

	public function UpdateFlatsDetails($data,$id)
	{
		$table = 'booked_flats_tbl';
		$conditions = ['id' => $id];
		$query = $this->UpdateQ($data,$table,$conditions);
		if($query == true)
		{
			return true;
		}
	}

	public function GetCustomerBookedD($id){
		$this->db->select('u.name, u.mobile_no, p.project_name, b.building_name, bf.flat_no, bf.flat_view,bf.flat_type,bf.customer_name,bf.customer_mobile,bf.customer_email,f.flat_area,f.flat_cost,bf.hash,bf.tid');
		$this->db->from('booked_flats_tbl bf');
		$this->db->join('projects_tbl p','p.id = bf.project_id','left');
		$this->db->join('buildings_tbl b','b.id = bf.building_id','left');
		$this->db->join('users_tbl u','u.id = bf.agent_id','left');
		$this->db->join('flats_tbl f','f.id = bf.flat_id','left');
		$this->db->where('bf.id',$id);
		$query = $this->db->get()->result();
		if(count($query) >= 1 )
		{
			return $query;
		}else{
			return flase;
		}
	}

	public function UpdatePaymentDetails($data,$txid)
	{
		$table = 'booked_flats_tbl';
		$conditions = ['tid' => $txid];
		$query = $this->UpdateQ($data,$table,$conditions);
		if($query == true)
		{
			return true;
		}
	}

	public function GetBookedDetails($txnid)
	{
		$table = ['booked_flats_tbl bf','projects_tbl p','buildings_tbl b'];
		$fields = ['bf.flat_no','p.project_name','b.building_name','bf.customer_mobile','bf.flat_id','bf.agent_id'];
		$relation = ['','bf.project_id = p.id','bf.building_id = b.id'];
		$conditions = ['bf.tid' => $txnid];
		$data = $this->SelectQJ($fields,$table,$conditions,$relation);
		if(count($data) >= 1)
		{
			return $data;
		}else{
			false;
		}
	}

	public function getBuildingsByp($id)
	{
		$table = 'buildings_tbl';
		$fields = ['id','building_name'];
		$condition = ['project_id' => $id];
		$query = $this->SelectQ($fields,$table,$condition);
		if($query ==  true){
			return $query;
		}
	}

	public function UpdateFlatStatus($table,$data,$id)
	{
		$conditions = ['id' => $id];
		$query = $this->UpdateQ($data,$table,$conditions);
		if($query == true)
		{
			return true;
		}
	}

	public function updateBlockeStatus($id)
	{
		$this->db->set('booking_status','Available');
		$this->db->set('payment_status','');
		$this->db->where('flat_id',$id);
		$this->db->update('booked_flats_tbl');

		$this->db->set('flat_status','');
		$this->db->where('id',$id);
		$this->db->update('flats_tbl');
		
		return true;
	}
}