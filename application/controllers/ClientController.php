 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClientController extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Client_Model');
	}

	public function index()
	{
		$data['all_projects'] = $this->Client_Model->GetAllProjects();
		// var_dump($data['all_projects']);die();
		$this->load->view('client/pre_booking', $data);
	}

	public function getFlats()
	{
		$id = $this->uri->segment(2);
		$all_flats = $this->Client_Model->GetAllFlats($id);
		echo json_encode($all_flats);
	}

	public function getallflats()
	{
		$data = [
			'project_name' => $this->input->get('project_name'),
			'building_name' => $this->input->get('building_name'),
			'flat_view' => $this->input->get('flat_view'),
			'flat_type' => $this->input->get('flat_type')
		];
		// var_dump($data);die();
		$all_flats = $this->Client_Model->GetAllFlatsData($data);
		echo json_encode($all_flats);
	}

	public function UserDetails()
	{
		// $errors = [];
		$amount = 51000;
		$product_info = "Flat";
		$MERCHANT_KEY = "IEpj1TUm"; //change  merchant with yours
        $SALT = "pSwH7iYjoF";  //change salt with yours 
        $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
        //optional udf values 
        $udf1 = '';
        $udf2 = '';
        $udf3 = '';
        $udf4 = '';
        $udf5 = '';

		$checked = $this->input->post('agentchk');
		$this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('mobile_no', 'Mobile No', 'required|numeric'
        );
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if($checked == 1){
        	$this->form_validation->set_rules('token', 'CP code', 'required|numeric');
        }

        if ($this->form_validation->run() == FALSE)
        {
        	$errors = [
        		'name' => form_error('name'),
        		'email' => form_error('email'),
        		'mobile_no' => form_error('mobile_no')
        	];
        	if($checked == 1){
        		$errors['token'] = form_error('token');        		
        	}
            echo json_encode($errors);
        }
        else
        {
        	$customer_name = $this->input->post('name');
        	$customer_email = $this->input->post('email');
        	$customer_mobile = $this->input->post('mobile_no');
        	$hashstring = $MERCHANT_KEY . '|' . $txnid . '|' . $amount . '|' . $product_info . '|' . $customer_name . '|' . $customer_email . '|' . $udf1 . '|' . $udf2 . '|' . $udf3 . '|' . $udf4 . '|' . $udf5 . '||||||' . $SALT;
             $hash = strtolower(hash('sha512', $hashstring));
            
        	 $token = $this->input->post('token');
	         $data = [
	         	'customer_name'   => $customer_name,
	         	'customer_email'  => $customer_email,
	         	'customer_mobile' => $customer_mobile,
	         	'otp'			  => rand(100000,999999),
	         	'tid'			  => $txnid,	
	         	'hash'			  => $hash	
	         ];
	         // var_dump($hash."|||".$data['hash']);die();   
	         $otp_msg = "Hello ".$data['customer_name'].' your otp for megapolis is '.$data['otp'];
             if(!empty($token)){
             	$chkvalid_cp = $this->Client_Model->ChkValidCp($token);
             	if($chkvalid_cp != false)
             	{
             		$data['agent_id'] = $chkvalid_cp[0]['id'];
             		$result = $this->Client_Model->SaveUserDetails($data);
             		$resp = sendSms($data['customer_mobile'],$otp_msg);
             		echo json_encode("success");
             	}else{
	             	echo json_encode("cp_notvalid");
	            }
            }else{
            	$resp = sendSms($data['customer_mobile'],$otp_msg);
             	$result = $this->Client_Model->SaveUserDetails($data);
             	echo json_encode("success");
            }
        }
	}

	public function CheckOtp()
	{
		$this->form_validation->set_rules('otp', 'OTP', 'required');
		if($this->form_validation->run() == FALSE)
		{
			$errors = [
				'otp' => form_error('otp')
			];
			echo json_encode($errors);
		}else{
			$otp = $this->input->post('otp');
			$data = $this->Client_Model->ChkOtp($otp);
			// var_dump($data);die();
			if(!empty($data))
			{
				echo json_encode(['status' => 'success','data' => $data]);
			}else{
				echo json_encode(['status' => 'notvalid']);
			}		
		}
		
	}

	public function FlatBooking()
	{
		// var_dump($this->input->post());die();
		$this->form_validation->set_rules('project_name', 'Project', 'required');
        $this->form_validation->set_rules('building_name', 'Building', 'required'
        );
        $this->form_validation->set_rules('flat_type', 'Flat', 'required');
        $this->form_validation->set_rules('flat_view', 'Flat', 'required');
        $this->form_validation->set_rules('slectedflat', 'Flat No', 'required');
        $this->form_validation->set_rules('t_and_c', 'Terms & Conditions', 'required');
        if($this->form_validation->run() == FALSE)
		{
			$errors = [
				'project_name' => form_error('project_name'),
				'building_name' => form_error('building_name'),
				'flat_type' => form_error('flat_type'),
				'flat_view' => form_error('flat_view'),
				'slectedflat' => form_error('slectedflat'),
				't_and_c' 		=> form_error('t_and_c')
			];

			echo json_encode($errors);
		}else{

			$data = [
				'project_id' => $this->input->post('project_name'),
				'building_id' => $this->input->post('building_name'),
				'flat_type' => $this->input->post('flat_type'),
				'flat_view' => $this->input->post('flat_view'),
				'flat_no' => $this->input->post('slectedflat'),
				'flat_id' => $this->input->post('flat_id')
			];
			$id = $this->uri->segment(2);
			$result = $this->Client_Model->UpdateFlatsDetails($data,$id);
			echo json_encode("success");
		}

	}

	public function FlatBookedDetails()
	{
		$flat_id = $this->input->get('id');
		$data = $this->Client_Model->GetCustomerBookedD($flat_id);
		echo json_encode($data);
	}

	public function Payment_gateway()
	{
		$amount =  51000;
	    $product_info = "Flat";
	    $customer_name = $this->input->post('customer_name');
	    $customer_email = $this->input->post('customer_email');
	    $customer_mobile = $this->input->post('customer_mobile');
	    	//payumoney details
	    
	        $MERCHANT_KEY = "5fYs2pB7"; //change  merchant with yours
	        $SALT = "50FlZtE3k4";  //change salt with yours 
	        $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
	        //optional udf values 
	        $udf1 = '';
	        $udf2 = '';
	        $udf3 = '';
	        $udf4 = '';
	        $udf5 = '';
	        
	        $hashstring = $MERCHANT_KEY . '|' . $txnid . '|' . $amount . '|' . $product_info . '|' . $customer_name . '|' . $customer_emial . '|' . $udf1 . '|' . $udf2 . '|' . $udf3 . '|' . $udf4 . '|' . $udf5 . '||||||' . $SALT;
	         $hash = strtolower(hash('sha512', $hashstring));
	         
	        $success = base_url() . 'Status';  
	        $fail = base_url() . 'Status';
	        $cancel = base_url() . 'Status';
	        
	        
	     $data = array(
	        'mkey' => $MERCHANT_KEY,
	        'tid' => $txnid,
	        'hash' => $hash,
	        'amount' => $amount,           
	        'name' => $customer_name,
	        'productinfo' => $product_info,
	        'mailid' => $customer_email,
	        'phoneno' => $customer_mobile,	            
	        'action' => "https://secure.payu.in", //for live change action  https://secure.payu.in
	        'sucess' => $success,
	        'failure' => $fail,
	        'cancel' => $cancel            
	    );
	}

	public function CancelBooking()
	{
		$id = $this->input->post('id');
		$update = [
			'booking_status' => 'cancelled'
		];
		$data = $this->Client_Model->UpdateFlatsDetails($update,$id);
		if($data == true){
			echo json_encode("success");
		}
	}

	public function getBuildings()
	{
		$id = $this->uri->segment(2);
		// var_dump($id);die();
		$data = $this->Client_Model->getBuildingsByp($id);
		echo json_encode($data);
	}

	public function UpdateBlockedFlat()
	{
		$id = $this->input->post('id');
		// var_dump($id);die();
		$data = $this->Client_Model->updateBlockeStatus($id);
		echo json_encode("success");
	}

	public function ShowAvailability()
	{
		$data['all_projects'] = $this->Client_Model->GetAllProjects();
		$this->load->view('availability',$data);
	}
}