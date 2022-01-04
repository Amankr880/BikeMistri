<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller{
 function __construct(){
    parent:: __construct();
    // $this->load->model('Databaseinsert','dbin');
  }
	public function index()
	{
		//echo"ok";die;
		// $this->load->helper('url');
		// $data=array();
  //     $data['msg']='';
      $this->load->view('frontend/index');
	}
}