<?php 
include APPPATH.'/libraries/DataTablesTrait.php';
class Building_Model extends CI_Model {
	use DataTablesTrait;

	public function GetallProjects()
	{
		$table = 'projects_tbl';
		$fields = ['id','project_name'];
		$query = $this->SelectQ($fields,$table);
		if(count($query) > 0)
		{
			return $query;
		}
	}

	public function SaveBuildingsData($fields)
	{
		$table = 'buildings_tbl';
		$query = $this->InsertQ($fields,$table);
		if($query == true)
		{
			return true;
		}
	}
	public function SaveFlatsData($fields)
	{
		$table = 'flats_tbl';
		$query = $this->InsertQ($fields,$table);
		if($query == true)
		{
			return true;
		}
	}

	public function GetAllBuildings()
	{
		$table = ['buildings_tbl as b','projects_tbl as p'];
		$fields = ['b.id','b.building_name','b.status','p.project_name'];
		$relation = ['','b.project_id = p.id'];
		$query = $this->SelectQJ($fields,$table,"",$relation);
		if(count($query) > 0)
		{
			return $query;
		}
	}

	public function getSingleBuilding($id)
	{
		$table = 'buildings_tbl';
		$fields = ['id','building_name','project_id'];
		$condition = ['id' => $id];
		$query = $this->SelectQ($fields,$table,$condition);
		if($query ==  true){
			return $query;
		}
	}

	public function UpdateBuilding($data, $id)
	{
		$table = 'buildings_tbl';
		$condition = ['id' => $id];
		$query = $this->UpdateQ($data,$table,$condition);
		if($query == true)
		{
			return true;
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

	public function GetFlats()
	{
		$table = ['flats_tbl as f','projects_tbl as p','buildings_tbl as b'];
		$fields = ['f.id','f.floor_number','f.flat_no','f.flat_status','f.flat_type','f.flat_view','b.building_name','f.status','p.project_name','f.flat_cost','f.flat_area'];
		$relation = ['','f.project_id = p.id','f.building_id = b.id'];
		$query = $this->SelectQJ($fields,$table,"",$relation);
		if(count($query) > 0)
		{
			return $query;
		}
	}

	public function GetSingleFlat($id)
	{
		$table = 'flats_tbl';
		$fields = ['id','building_id','floor_number','project_id','flat_no','flat_view','flat_area','flat_cost','flat_type'];
		$condition = ['id' => $id];
		$query = $this->SelectQ($fields,$table,$condition);
		if($query ==  true){
			return $query;
		}
	}

	public function UpdateFlat($data, $id)
	{
		// var_dump($data);die();
		$table = 'flats_tbl';
		$condition = ['id' => $id];
		$query = $this->UpdateQ($data,$table,$condition);
		if($query == true)
		{
			return true;
		}
	}
}