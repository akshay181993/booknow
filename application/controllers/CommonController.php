 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CommonController extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_Model');		
		$this->load->model('Common_model');		
	}

	public function SaveData()
	{
		$fields 	= explode(',', $this->uri->segment(2));
		$all_inputs = $this->input->post($fields);
		$type = $this->input->post('type');
		$rules = $this->input->post('rules');
		$table = $this->input->post('table');		
		if($this->form_validation->run($rules) == TRUE){
			if($type == "update"){	
				$id = $this->input->post('id');
				$returndata = $this->Admin_Model->commonUpdate($all_inputs,$id,$table);
			}else{
				if($table == 'users_tbl'){
					// $all_inputs['token'] = mt_rand(111111,999999); 
					$all_inputs['password'] = sha1($all_inputs['password']);
				}
				$returndata = $this->Admin_Model->insert($all_inputs,$table);
			}
			echo json_encode("success");
		}else{
			foreach ($fields as $value) {
				$errors[$value] = form_error($value);
			}
			echo json_encode($errors);
		}
	}

	    public function AllDelete()
    {
        // $this->load->model('Common_model');
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        // var_dump($name);die();
        $data = $this->Common_model->all_delete($id,$name);
        // var_dump()
        if($data == true){
            echo json_encode('success');
        }else{
            echo json_encode('error');
        }
    }

    public function ChangeAllStatus()
    {
        $id       = $this->input->post('id');
        $model    = $this->input->post('model');
        $name     = $this->input->post('name');
        $data     = $this->Common_model->all_status($id,$name,$model);
        if($data == true){
            echo json_encode('success');
        }else{
            echo json_encode('error');
        }
    }

}