<?php 
include APPPATH.'/libraries/DataTablesTrait.php';
class Project_Model extends CI_Model {
	use DataTablesTrait;

	public function GetallProjects()
	{
		$table = 'projects_tbl';
		$fields = ['id','project_name','city_name','location','status'];
		$query = $this->SelectQ($fields,$table);
		if(count($query) > 0)
		{
			return $query;
		}
	}

	public function getProject($id)
	{
		$table = 'projects_tbl';
		$fields = ['id','project_name','city_name','location','status'];
		$condition = ['id' => $id];
		$query = $this->SelectQ($fields,$table,$condition);
		if(count($query) > 0)
		{
			return $query;
		}
	}

	public function update($fields,$id)
	{
		$table = 'projects_tbl';
		$condition = ['id' => $id];
		$query = $this->UpdateQ($fields,$table,$condition);
		if($query == true)
		{
			return true;
		}
	}

	public function insert($fields)
	{
		$table = 'layouts_tbl';
		$data = $this->InsertQ($fields,$table);
		if($data == true){
			return true;
		}else{
			return false;
		}
	}

	public function AllLayouts()
	{
		$table = ['layouts_tbl l','projects_tbl p'];
		$fields = ['l.layout','p.project_name','l.status','l.id'];
		$relation = ['','l.project_id = p.id'];
		$data = $this->SelectQJ($fields,$table,"",$relation);
		// var_dump($data);die();
		if(count($data) >= 1)
		{
			return $data;
		}else{
			false;
		}
	}

	public function GetSingleLayout($id)
	{
		$table = ['layouts_tbl'];
		$condition = ['id' => $id,'status' => 1];
		$fields = ['id','project_id','layout'];
		$query = $this->SelectQ($fields,$table,$condition);
		// var_dump($query);die();
		if(count($query) >= 1)
		{
			return $query;
		}else{
			false;
		}
	}

	public function updateLayout($fields,$id)
	{
		$table = 'layouts_tbl';
		$condition = ['id'=>$id];
		$query = $this->UpdateQ($fields,$table,$condition);
		if($query == true)
		{
			return true;
		}
	}
}