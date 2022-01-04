<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paymentcontroller extends CI_Controller{

  function __construct(){
    parent:: __construct();
    $this->load->model('Databaseinsert','dbin');
  }
	// public function index()
	// {
	// 	//echo"ok";die;
	// 	$this->load->helper('url');
	// 	$data=array();
 //      $data['msg']='';
 //      $this->load->view('adminlogin',$data);
	// }
		public function pgresponse()
	{
  		// if($this->input->post()){
   
    // //calling function of Admission model 
    // $r=$this->dbin->adminverify($this->input->post());  
    // if($r){
    //   $myname= $this->dbin->getlogeername($this->input->post('username'));
    //     //session code
    //     $usersession['user']=array(
    //      'isuserlogin'=>1,
    //      'username'=>$this->input->post('username'),
    //      'myname'=>$myname
    //     );
    //     $this->session->set_userdata($usersession);
    //     //redirect to dashboard
    //     //echo "okkkkk";
    //     redirect('project/dashboard');
        $this->load->view('PaytmKit/pgResponse');
  //   }else{
  //     $data=array();
  //     $data['msg']='Wrong Credentials';
  //     redirect('alogin/index');
  //     }
  // }else{
  //     $data=array();
  //     $data['msg']='';
  //     redirect('alogin/index');
  //    // $this->load->view('adminlogin',$data);

  // }
	}
 
}
