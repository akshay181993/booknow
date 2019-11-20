<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Status extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->model('Client_Model');
    }
	public function index() {
       $status = $this->input->post('status');
      // if (empty($status)) {
      //       redirect(base_url());
      //   }
       
        $firstname = $this->input->post('firstname');
        $amount = $this->input->post('amount');
        $txnid = $this->input->post('txnid');
        $posted_hash = $this->input->post('hash');
        $key = $this->input->post('key');
        $productinfo = $this->input->post('productinfo');
        $email = $this->input->post('email');
        $salt = "50FlZtE3k4"; //  Your salt
        $add = $this->input->post('additionalCharges');
        If (isset($add)) {
            $additionalCharges = $this->input->post('additionalCharges');
            $retHashSeq = $additionalCharges . '|' . $salt . '|' . $status . '|||||||||||' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
        } else {
            $retHashSeq = $salt . '|' . $status . '|||||||||||' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
        }
          $data['hash'] = hash("sha512", $retHashSeq);
          $data['amount'] = $amount;
          $data['txnid'] = $txnid;
          $data['posted_hash'] = $posted_hash;
          $data['status'] = $status;
          $data['name'] = $firstname;
          // var_dump($status);die;
          $data['user_data'] = $this->Client_Model->GetBookedDetails($txnid);
          if($status == 'success'){
            // var_dump($this->input->post('phone'));die();
            $update = [
              'booking_status' => 'Booked',
              'payment_status' => 'Completed'
            ];
            $flat_status = [
              'status' => 0
            ];

            $bookedflat_status = [
              'flat_status' => 'Booked'
            ];
            //for agent code to make it expired
            $this->Client_Model->UpdateFlatStatus('agents_code_tbl',$flat_status,$data['user_data'][0]['agent_id']);
            $msgSms = "Hello ".$firstname." We are Happy to give payment Confirmation for flat. ".$data['user_data'][0]['project_name']."-".$data['user_data'][0]['building_name']."-".$data['user_data'][0]['flat_no'].". For any queries Call 8411002309 Or Email @ info@megapolis.co.in";
           
            $subject = $data['user_data'][0]['project_name']." Flat Booking Notification";
            $cmessage = "Hello ".$firstname."</br>"."Your flat No".$data['user_data'][0]['flat_no']." successfully Booked. To confirm your booking please visit Megapolis Sales  Office within 2 days OR call Swapnil 8411002309 Or Email @ info@megapolis.co.in"."</br>"." Thanks & Regards"."<br>"."Megapolis Team";
            $res = send_email($email,NULL,$subject,$cmessage);
            if($res){
               $tooo ="swapnil.gaikwad@megapolis.co.in";
                $subject = $data['user_data'][0]['project_name']." Flat Booking Notification";
                $msg = "Hello Client Name-".$firstname." Flat Details. ".$data['user_data'][0]['project_name']."-".$data['user_data'][0]['building_name']."-".$data['user_data'][0]['flat_no'];
               
              $res = send_admin_email($tooo,NULL,$subject,$msg);
            }
            $sms = sendSms($data['user_data'][0]['customer_mobile'],$msgSms);
            $this->load->view('client/success', $data);
         }
         else{
           $update = [
              'booking_status' => 'Booked',
              'payment_status' => 'Pending'
            ];
            $bookedflat_status = [
              'flat_status' => 'Pending'
            ];
            $this->load->view('client/failure',$data); 
         }
         $this->Client_Model->UpdatePaymentDetails($update,$txnid);
         $this->Client_Model->UpdateFlatStatus('flats_tbl',$bookedflat_status,$data['user_data'][0]['flat_id']);
    }
}