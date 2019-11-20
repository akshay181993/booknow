 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BuildingController extends My_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Building_Model');
	}

	public function index()
	{
		$data['title'] = 'All Buildings';
		$data['content'] = 'projects/all_buildings';
		$data['all_buildings'] = $this->Building_Model->GetAllBuildings();
		// var_dump($data['all_buildings']);die();
		$this->load->view($this->layout,$data);
	}

	public function show()
	{
		$data['title'] = 'Add Building';
		$data['content'] = 'projects/add_building';
		$data['all_projects'] = $this->Building_Model->GetallProjects();
		$this->load->view($this->layout,$data);
	}

	public function add_flats()
	{
		$data['title'] = 'Add Flats';
		$data['content'] = 'projects/add_flats';
		$data['all_projects'] = $this->Building_Model->GetallProjects();
		$this->load->view($this->layout,$data);
	}

	public function all_flats()
	{
		$data['title'] = 'All Flats';
		$data['content'] = 'projects/all_flats';
		$data['all_flats'] = $this->Building_Model->GetFlats();
		// var_dump($data['all_flats']);die();
		$this->load->view($this->layout,$data);
	}

	public function Edit()
	{
		$id = $this->uri->segment(2);
		$data['title'] = 'Edit Building';
		$data['content'] = 'projects/edit_building';
		$data['all_projects'] = $this->Building_Model->GetallProjects();
		$data['get_building'] = $this->Building_Model->getSingleBuilding($id);
		// var_dump($data['get_building']);die();
		$this->load->view($this->layout,$data);
	}

	public function edit_flats()
	{
		$id = $this->uri->segment(2);
		$data['title'] = 'Edit Flat';
		$data['content'] = 'projects/edit_flat';
		$data['all_projects'] = $this->Building_Model->GetallProjects();
		$data['get_flat'] = $this->Building_Model->GetSingleFlat($id);		
		// var_dump($data['get_flat']);die();
		$this->load->view($this->layout,$data);
	}

	public function save_buildings()
	{
		$data = [
				'project_id' => $this->input->post('project_name'),
			];
		$type = $this->input->post('type');
		if($this->form_validation->run('buildings_rules') == TRUE)
		{
			if($type == 'insert'){
				if(count($this->input->post('building_name[]')) > 0){
					$k =0;
					for ($i=0; $i < count($this->input->post('building_name[]')) ; $i++) { 
						$data['building_name'] = $this->input->post('building_name[]')[$i];
						$return = $this->Building_Model->SaveBuildingsData($data);
						$k++;
					}
				}
			}else{
				$data['building_name'] = $this->input->post('building_name');
				$id = $this->input->post('id');
				$return = $this->Building_Model->UpdateBuilding($data,$id);
			}
			echo json_encode("success");
		}else{
			$errors = [
				'project_name' => form_error('project_name')
			];
			
			for ($j = 0; $j < count($this->input->post('building_name[]')) ; $j++) { 
				$errors['building_name'][$j] = form_error('building_name[]');
			}
			echo json_encode($errors);
		}
	}

	public function save_flats()
	{
		$data = [
				'project_id' => $this->input->post('project_name'),
				'building_id' => $this->input->post('building_name'),
			];
		$type = $this->input->post('type');
		if($this->form_validation->run('flats_rules') == TRUE)
		{
			if($type == 'insert'){
				// var_dump($this->input->post('flat_no[]'));die();
				if(count($this->input->post('flat_no[]')) >= 1){
					$k =0;
					for ($i=0; $i < count($this->input->post('flat_no[]')) ; $i++) { 
						$data['flat_no'] = $this->input->post('flat_no[]')[$i];
						$data['flat_view'] = $this->input->post('view[]')[$i];
						$data['flat_type'] = $this->input->post('flat_type[]')[$i];
						$data['flat_cost'] = $this->input->post('flat_cost[]')[$i];
						$data['flat_area'] = $this->input->post('flat_area[]')[$i];
						$data['floor_number'] = $this->input->post('floor_number[]')[$i];
						$return = $this->Building_Model->SaveFlatsData($data);
						$k++;
					}
				}
			}else{
				$id = $this->input->post('id');
				$data['flat_type'] = $this->input->post('flat_type');
				$data['flat_cost'] = $this->input->post('flat_cost');
				$data['flat_area'] = $this->input->post('flat_area');
				$data['flat_no'] = $this->input->post('flat_no');
				$data['flat_view'] = $this->input->post('view');
				$data['floor_number'] = $this->input->post('floor_number');
				$return = $this->Building_Model->UpdateFlat($data,$id);
			}
			echo json_encode("success");
		}else{
			$errors = [
				'project_name'  => form_error('project_name'),
				'building_name' => form_error('building_name'),
			];
			
			for ($j = 0; $j < count($this->input->post('flat_no[]')) ; $j++) { 
				$errors['flat_no'][$j] = form_error('flat_no[]');
				$errors['flat_cost'][$j] = form_error('flat_cost[]');
				$errors['flat_area'][$j] = form_error('flat_area[]');
				$errors['view'][$j] = form_error('view[]');
				$errors['flat_type'][$j] = form_error('flat_type[]');
				$errors['floor_number'][$j] = form_error('floor_number[]');
			}
			echo json_encode($errors);
		}
	}

	public function getBuildings()
	{
		$id = $this->input->get('id');
		// var_dump($id);die();
		$data = $this->Building_Model->getBuildingsByp($id);
		echo json_encode($data);
	}

	public function UpdateStatus()
	{
		$update = '';
		$id = $this->input->post('flat_id');
		$status = $this->input->post('flat_status');
		if($status == 'false'){
			$update = ['flat_status' => ''];
		}else{
			$update = ['flat_status' => 'Booked'];
		}
		$data = $this->Building_Model->UpdateFlat($update,$id);
		if($data == true)
			echo json_encode("success");
	}
}