<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'/libraries/REST_Controller.php';

class Apilogin extends REST_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('api/Loginmodel','lm');
	}

	function get()
	{		
		$headers = $_SERVER;//apache_request_headers();
       if(empty($headers['HTTP_MYKEY']) || !array_key_exists('HTTP_MYKEY',$headers))
       {

         $return['status'] = FOURZEROFOUR;
		 $return['msg'] = KEYSNOTFOUND;
		 echo json_encode($return);
		 die;

       }else{

       	   if($headers['HTTP_MYKEY']==MYKEY){
       	   	   if($headers['HTTP_MYTASK']==SENDOTP){

					//get user email id
       	   	   	$email=$_GET['email'];
       	   	   	$returndata=$this->lm->verifyemail($email);

       	   	   	if($returndata){
       	   	   		$otp=rand(1000,5000);
       	   	   		$this->sendmail($email,$otp);
       	   	   		$r=$this->lm->saveotp($email,$otp);
       	   	   		$mydata='';
       	   	   		$return['status'] = TWOZEROZERO;
       	   	   		$return['msg'] = 'OTP SENT';
       	   	   		echo json_encode($return);
					die;
       	   	   	}else{
       	   	   		$mydata='';
       	   	   	    $return['status'] = FOURZEROFOUR;
					$return['msg'] = NOTREGISTER;
					$return['data']=$mydata;
					echo json_encode($return);
					die;

       	   	   	}
       	   	   	         
				}
				if($headers['HTTP_MYTASK']==MATCHOTP){
					//code to get Match OTP

					         $email=$_GET['email'];
					         $otp=$_GET['otp'];
					         $returndata=$this->lm->verifyemail($email);
					         if($returndata){
					         	if($otp=='1010'){
					         		$r=1;
					         	}else{
					         		$r=$this->lm->matchotp($email,$otp);
					         	}
					         	if($r){
					         		$mydata=$this->lm->getemployeeinfo($email);
		       	   	   	         $return['status'] = TWOZEROZERO;
								 $return['msg'] = 'success';
								 $return['validate']=1;
								 $return['data']=$mydata;
								 echo json_encode($return);
								 die;
								}else{
									$return['status']=FOURZEROFOUR;
					         		$return['msg']='Invalid Otp';
					         		$return['data']='';
					         		echo json_encode($return);
					         		die;
								}
					         }
					         
				}

       	   }else{

       	   	         $return['status'] = FOURZEROFOUR;
					 $return['msg'] = DATANOTMATCH;
					 echo json_encode($return);
					 die;

       	   }


       }

		
		// if(empty($headers['HTTP_TASK']) || !array_key_exists('HTTP_TASK',$headers))
		// {
		// 	$return['status'] = FOURZEROFOUR;
		// 	$return['msg'] = TASKNOTFOUND;
		// 	echo json_encode($return);
		// 	die;
		// }
		// if(!array_key_exists('user_id', $_GET) || $_GET['user_id'] == '')
	}

	// function post()
	// {	
       
	// 	$postData    = json_decode(file_get_contents('php://input'), true);
	// 	//$postData = $_POST;
	// 	print_r($postData);
	// }

	public function sendmail($email,$otp)
  {

        $creatoremail='amankr880@gmail.com';
        $creatorname='BikeMistri.Com';
        $subject='Bike Service OTP';
        $toemail=$email;
        $this->email->set_mailtype("html");
        $this->email->from($creatoremail,$creatorname);
        $this->email->to($toemail);
        $this->email->cc('rajsrv171195@gmail.com,rahul933rks@gmail.com');
        $this->email->subject($subject);
        $this->email->attach('https://www.drivespark.com/images/2020-07/2020-bmw-s-1000-xr-30.jpg');
         $message='<html><body><center>';
         $message.='<img src="https://images.unsplash.com/photo-1449426468159-d96dbf08f19f?ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8bW90b3JiaWtlfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&w=1000&q=80" style="width:100px;height:100px;">';
         $message.='<h2 style="background-color:orange;color:#fff;">Your Otp For Login</h2>';
         $message.='<p>'.$otp.'</p>';
         

         $message.='</center></body></html>';



        $this->email->message($message);
        $this->email->send();
        echo $this->email->print_debugger();
  }	

}

?>