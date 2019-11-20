 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends My_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_Model');		
	}

	public function index()
	{
		$this->load->view('admin/login');
	}

	public function login()
	{

		if($this->form_validation->run('login_rules') == TRUE){
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$result = $this->Admin_Model->login($email,$password);			
			if($result != false){
				$this->session->set_userdata('id',$result[0]['id']);
				$this->session->set_userdata('name',$result[0]['name']);
				$this->session->set_userdata('email',$result[0]['email']);
				$this->session->set_userdata('mobile_no',$result[0]['mobile_no']);
				$this->session->set_userdata('role',$result[0]['role']);
				$this->session->set_userdata('logged_in',true);
				redirect(base_url().'dashboard');
			}else{
				$this->session->set_flashdata('invalid', 'Invalid credentials');
                redirect(base_url()."admin-login");
			}
		}else{
			$this->session->set_flashdata('errors', validation_errors());
            redirect(base_url()."admin-login");
		}
	}

	public function dashboard()
	{
		$data['title'] = 'Admin Dashboard';
		$data['content'] = 'admin/dashboard';
        $data['all_cp'] = $this->Admin_Model->getCP('SM');
        $data['user_count'] = $this->Admin_Model->UsersCount();
        $data['all_projects'] = $this->Admin_Model->AllProjects();
        $data['all_bookings'] = $this->Admin_Model->AllBookingsCount();
        $data['all_flats'] = $this->Admin_Model->AllflatsCount();
        $data['all_buildings'] = $this->Admin_Model->AllBuildingsCount();

		$this->load->view($this->layout,$data);
	}

	public function settings()
	{
		$data['title'] = 'Profile Setting';
		$data['content'] = 'admin/settings';
        $data['user_data'] = $this->Admin_Model->GetProfile($this->session->userdata('id'));
		$this->load->view($this->layout,$data);
	}

	 public function Update_Profile()
    {
        // var_dump($this->input->post('id'));die();
        // $admin_id = $this->session->userdata('id');
        if($this->session->userdata('logged_in') != true){
            redirect(base_url().'admin-login');
        }
       
        if ($this->form_validation->run('profile_rules') == TRUE)
        {
            $password = $this->input->post('password');
            
            if($password == ""){
                $data = [
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'mobile_no' => $this->input->post('mobile_no'),
                ];
            }else{
                $data = [
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'mobile_no' => $this->input->post('mobile_no'),
                    'password' => sha1($this->input->post('password')),
                ];
            }
           // var_dump($this->input->post('id'));die();
            $datareturn = $this->Admin_Model->update($data,$this->input->post('id'));
            if($datareturn == true)
            {
                // $this->session->set_userdata('name',$data['name']);
                // $this->session->set_userdata('email',$data['email']);
                // $this->session->set_userdata('mobile_no',$data['mobile_no']);
                // $this->session->set_flashdata('updated', 'Profile Updated Successfully');
                echo json_encode('success');
            }

        }else{
        	$errors = [
        		'name' 	=> form_error('name'),
        		'email'	=> form_error('email'),
        		'mobile_no'	=> form_error('mobile_no')
        	];
        	
            echo json_encode($errors);
        }

    }

    public function change_password()
    {
        $admin_id = $this->session->userdata('id');
        if($this->session->userdata('logged_in') != true){
            redirect(base_url()."admin-login");
        }
        if($this->form_validation->run('password_reset_rules') == TRUE)
        {
            $data = [
                'old_password' => sha1($this->input->post('old_password'))
                ];
            $datareturn = $this->Admin_Model->getPassword($data);
            if($datareturn == true)
            {
                $data= [
                     'password' => sha1($this->input->post('new_password')),
                ];
                $this->Admin_Model->update($data);
                echo json_encode('success');
            }else{
                echo json_encode('notmatched');
            }
        }else{
            $this->session->set_flashdata('formvalues',$this->input->post());
            $errors = [
            	'old_password' => form_error('old_password'),
            	'new_password' => form_error('new_password'),
            	'confirm_password' => form_error('confirm_password'),
            ];

            echo json_encode($errors);
        }
    }

	public function BookingDetails()
	{
        $params = "";
        $params = [
            'project_name'  => $this->input->get('project_name'),
            'start_date'    => $this->input->get('start_date'),
            'end_date'      => $this->input->get('end_date')
        ];
        $this->session->set_userdata('pid',$params['project_name']);
        $this->session->set_userdata('sdate',$params['start_date']);
        $this->session->set_userdata('edate',$params['end_date']);
        // var_dump($params);die();
		$data['title'] = 'All Bookings';
		$data['content'] = 'admin/booking_details';
        $data['all_bookedflats'] = $this->Admin_Model->GetallBookedDetails($params);
        $data['all_projects'] = $this->Admin_Model->AllProjects();
		$this->load->view($this->layout,$data);
	}

	public function cp_sm()
	{
		$data['title'] = 'CP & SM';
		$data['content'] = 'admin/cp_sm';
		// $data['all_cp'] = $this->Admin_Model->getCP('CP');
        $data['all_sm'] = $this->Admin_Model->getCP('SM');
        // var_dump($data['all_SM']);die();
		$this->load->view($this->layout, $data);
	}

	public function add_cp_sm()
	{
		$data['title'] = 'Add CP & SM';
		$data['content'] = 'admin/add_cp_sm';
		$this->load->view($this->layout, $data);
	}

	public function edit_cp_sm()
	{
		$id = $this->uri->segment(2);
		$data['title'] = 'Edit CP & SM';
		$data['content'] = 'admin/edit_cp_sm';
        $data['user'] = $this->Admin_Model->getSingle($id);
		$this->load->view($this->layout, $data);
	}

    public function logout()
    {
        $id = $this->session->userdata('id');
        if($this->session->userdata('logged_in') != true){
            redirect(base_url()."admin-login");
        }
        if($this->session->has_userdata('id'))
        {
            $this->session->sess_destroy();
            redirect(base_url()."admin-login");
        }else{
            redirect(base_url()."admin-login");       
        }
    }

    public function Export()
    {
        $params = "";
        $params = [
            'project_name'  => $this->session->userdata('pid'),
            'start_date'    => $this->session->userdata('sdate'),
            'end_date'      => $this->session->userdata('edate')
        ];
        $list = $this->Admin_Model->ExportBookedDetails($params);
        if($list != false){       
            $filename = 'FlatBookingDetails_'.date('Ymd').'.csv'; 
            header("Content-Description: File Transfer"); 
            header("Content-Disposition: attachment; filename=$filename"); 
            header("Content-Type: application/csv; ");
            header("Pragma: public");
            header("Expires: 0");
              
            $file = fopen('php://output','w');
            $header = array('Name','Email','Phone','Trasaction ID','Booking Status','Payment Status','Flat No','Flat Type','Flat View','Project Name','Building Name','Agent Name','Agent Mobile'); 
            fputcsv($file, $header);
            foreach ($list as $key=>$line){ 
                fputcsv($file,$line); 
            }
            fclose($file); 
            exit;    
        }
    }
}