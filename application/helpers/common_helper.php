<?php 
function sendSms($mobile_no,$text)
{
	$contacts = $mobile_no;
	$from = 'DANCEE';
	$sms_text = urlencode($text);
 
	$ch = curl_init("http://173.45.76.226:81/send.aspx?username=kumarp&pass=Pallavi1234&route=trans1&senderid=megapo&numbers=".$contacts."&message=".$sms_text);
	
   curl_setopt($ch, CURLOPT_HEADER, 0);    // we want headers
   curl_setopt($ch, CURLOPT_NOBODY, true);    // we don't need body
   

	$response = curl_exec($ch);
	curl_close($ch);
	return $response;
}

function send_email($to,$from,$subject,$message){
    $admin_email = $from;
    $CI =& get_instance();
    $CI->load->library('email');
    $CI->email->set_mailtype("html");
   // $CI->email->from('no-reply@megapolis.co.in', 'Megapolis');
    $CI->email->from('info@megapolis.co.in', 'Megapolis');
    $CI->email->to($to); 
    $CI->email->subject($subject);
    $data['message'] = $message;
    $body=$CI->load->view('client/mail',$data,TRUE);
    $CI->email->message($body);
    if($CI->email->send()) {
       return true;
    }else{
        return false;
        //  echo $CI->email->print_debugger();
      //  exit();
    }
}
function send_admin_email($to,$from,$subject,$message){
    $CI =& get_instance();
    $CI->load->library('email');
    $CI->email->set_mailtype("html");
   // $CI->email->from('no-reply@megapolis.co.in', 'Megapolis');
    $CI->email->from('info@megapolis.co.in', 'Megapolis');
    $CI->email->to($to); 
    $CI->email->subject($subject);
    $data['message'] = $message;
    $body=$CI->load->view('client/mail',$data,TRUE);
  //  echo $body; exit();
    $CI->email->message($body);
    if($CI->email->send()) {
       return true;
    }else{
        return false;
    }
}

 ?>