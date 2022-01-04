<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'/libraries/REST_Controller.php';
//use Restserver\Libraries\REST_Controller;
//require_once"application/libraries/REST_Controller.php";
class Employeedetail extends REST_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('api/Employeemodel','em');
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
       	   	   if($headers['HTTP_MYTASK']==GETEMPLOYEELIST){

					//code to get EMPLOYEE DATA
       	   	   	         $mydata=$this->em->getemployeelist();
       	   	   	         $return['status'] = TWOZEROZERO;
						 $return['msg'] = SUCCESS;
						 $return['data']=$mydata;
						 echo json_encode($return);
						 die;
				}
				if($headers['HTTP_MYTASK']==GETEMPLOYEEDATA){
					//code to get salary data

					         $id=$_GET['id'];
					         $mydata=$this->em->getemployeeinfo($id);
					         $return['status'] = TWOZEROZERO;
							 $return['msg'] = SUCCESS;
							 $return['data']=$mydata;
							 echo json_encode($return);
							 die;
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

	function post()
	{	
       
		$postData    = json_decode(file_get_contents('php://input'), true);
		//$postData = $_POST;
		print_r($postData);
	}	









}

?>
