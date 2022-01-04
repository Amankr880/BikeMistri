<?php
class App_config extends CI_Controller{

  public function __construct(){
    parent::__construct();
    //echo"okkkk";die;
    $r=$this->session->userdata();
    // print_r($r);
  //       //$r->session->user();
        

    if(array_key_exists('user', $r)){

    }else{
        $data=array();
            $data['msg']='';
      //$this->load->view('adminlogin',$data);
     redirect('alogin/index');
    }
  }
  
}



?>