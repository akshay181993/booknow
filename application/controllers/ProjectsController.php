 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProjectsController extends My_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Project_Model');
	}

	public function index()
	{
		$data['title'] = 'All Projects';
		$data['content'] = 'projects/all_projects';
		$data['all_projects'] = $this->Project_Model->GetallProjects();
		$this->load->view($this->layout,$data);
	}

	public function Edit()
	{
		$id = $this->uri->segment(2);
		$data['title'] = 'Edit Project';
		$data['content'] = 'projects/edit_project';
		$data['get_project'] = $this->Project_Model->getProject($id);
		$this->load->view($this->layout,$data);
	}
	public function ProjectLayout()
	{
		$data['title'] = 'Project Layout';
		$data['content'] = 'projects/layout';
		$data['all_layouts'] = $this->Project_Model->AllLayouts();
		$this->load->view($this->layout,$data);
	}

	public function SaveLayout()
	{
		// var_dump($_FILES['project_layout']['size']);die();
		if($this->form_validation->run('layout_rules') == TRUE){
				$project = $this->input->post('project_name');				
			if($_FILES['project_layout']['size'] > 0){
		         if(isset($_FILES['project_layout'])){
					$fpath = "./public/uploads";
					$file_name = time().$_FILES['project_layout']['name'];
					$uploadimage = $fpath . '/'.$file_name;
					move_uploaded_file($_FILES['project_layout']['tmp_name'], $uploadimage);
					
				}
			}else{
				$file_name = $this->input->post('image');
			}
				$insertdata = [
					'project_id' => $project,
					'layout'  => $file_name
				];
			if($this->input->post('type') == "insert"){
				$response = $this->Project_Model->insert($insertdata);
			}else{
				$id = $this->input->post('id');
				$response = $this->Project_Model->updateLayout($insertdata,$id);
			}
			if($response == true){
				redirect(base_url()."project-layout");
			}
		}else{
			$this->session->set_flashdata('project_name',form_error('project_name'));
            $this->session->set_flashdata('project_layout',form_error('project_layout'));
            $this->AddLayout();
		}
	}

	public function AddLayout()
	{
		$data['title'] = 'Add Layout';
		$data['content'] = 'projects/add_layout';
		$data['all_projects'] = $this->Project_Model->GetallProjects();
		$this->load->view($this->layout,$data);
	}

	public function EditLayout()
	{
		$id = $this->uri->segment(2);
		$data['title'] = 'Edit Layout';
		$data['content'] = 'projects/edit_layout';
		$data['all_projects'] = $this->Project_Model->GetallProjects();
		$data['layout_data'] = $this->Project_Model->GetSingleLayout($id);
		$this->load->view($this->layout,$data);
	}
}