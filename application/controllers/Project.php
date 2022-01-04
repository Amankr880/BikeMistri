<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 require_once"application/core/App_config.php";

class Project extends App_config {
  
    function __construct(){
    parent:: __construct();
    $this->load->model('Databaseinsert','dbin');
  }
	
	public function dashboard()
	{
  
    $r=$this->session->userdata('user');
    $data=array();
    $data['firstname']=$r['myname'];
		$this->load->view('adminindex',$data);
	}
	// public function createprofile()
	// {
 //    $r=$this->session->userdata('user');
    
 //    $data=array();
 //    $data['username']=$r['username'];
 //    $this->load->view('createprofile');
	// }
	public function uploaddata()
	{
		$this->load->model('Databaseinsert','dbin');
        if($this->input->post()){

              
              $r=$this->dbin->insert_data($this->input->post());   
              if($r==1){
              // $data=array();
              // $data['msg']='Your Data Save';
              // 	echo "ok";
              // $this->load->view('indextest');
              	$this->index();
              }
      }else{
          $data=array();
          $data['msg']='';
          $this->load->view('index',$data);

      }
	}
  public function logout()
  {
    $this->session->sess_destroy();
  redirect('alogin/index');
  }
  public  function custinsert()
  {
    if($this->input->post())
    {
      $this->form_validation->set_rules('first-name','First Name','required');
      $this->form_validation->set_rules('last-name','Last Name','required');
      $this->form_validation->set_rules('gender','Gender','required');
      $this->form_validation->set_rules('emailid','Email Id','required|valid_email');
      $this->form_validation->set_rules('phoneno1','Phone No.','required');
      $this->form_validation->set_rules('state','State','required');
      $this->form_validation->set_rules('city','City','required');
      $this->form_validation->set_rules('address','Address','required');
      $this->form_validation->set_rules('pincode','Pincode','required');
      if ($this->form_validation->run() ==FALSE){
          $r=$this->session->userdata('user');
          $data=array();
          $data['firstname']=$r['myname'];
          $data['state']=$this->dbin->fetchstate();
          $this->load->view('createprofile',$data);
      }else{
          $r=$this->dbin->insertcust($this->input->post());
          if($r==1){
            $data=array('success'=>1,'msg'=>'Data Save Successfully');
            echo json_encode($data);
          }else{
            $data=array('success'=>0,'msg'=>'Data Not Inserted');
            echo json_encode($data);
          }
        }
      }else{
      $r=$this->session->userdata('user');
      $data=array();
      $data['firstname']=$r['myname'];
      $data['state']=$this->dbin->fetchstate();
      $this->load->view('createprofile',$data);
    }
  }
  public function mechinsert()
  {
    if($this->input->post()){

          $r=$this->dbin->insertmech($this->input->post());
          if($r==1){
            $data=array('success'=>1,'msg'=>'Data Save Successfully');
            echo json_encode($data);
          }else{
            $data=array('success'=>0,'msg'=>'Data Not Inserted');
            echo json_encode($data);
          }
        }
    else{
      $r=$this->session->userdata('user');
      $data=array();
      $data['firstname']=$r['myname'];
      $this->load->view('insertmech',$data);
    }
  }
  public function requestinsert()
  {
    if($this->input->post()){
     // print_r($this->input->post());die;
      $data['email']=$this->input->post('email'); 
          $r=$this->dbin->insertrequest($this->input->post());
          if($r==1){
            $letter=array('msg'=>'This Email is send to inform you about Your Vehicle Repair Request has been Created');
            $email=$data;
            $this->sendmail($email,$letter);
            $data=array('success'=>1,'msg'=>'Data  Inserted');
            echo json_encode($data);
          }else{
            $data=array('success'=>0,'msg'=>'Data Not Inserted');
            echo json_encode($data);
          }
        }
  }
  public function requestassign()
  {
    if($this->input->post()){ 
          $r=$this->dbin->insertassign($this->input->post());
          if($r==1){
            $data=array('success'=>1,'msg'=>'Data  Inserted');
            echo json_encode($data);
            
          }else{
            $data=array('success'=>0,'msg'=>'Data Not Inserted');
            echo json_encode($data);
          }
        }
  }
  public function requestschedule()
  {
    if($this->input->post()){ 
      $cid=$this->input->post('customerid');
          $r=$this->dbin->insertschedule($this->input->post());
          if($r==1){
            $data=array('success'=>1,'msg'=>'Data  Inserted');
            echo json_encode($data);
            
          }else{
            $data=array('success'=>0,'msg'=>'Data Not Inserted');
            echo json_encode($data);
          }
        }
  }
  public function requestcancel()
  {
     if($this->input->post()){ 
      // $req=$this->input->post();
      //     print_r($req);die;
      //$rid=$this->input->post('customerid');
          $r=$this->dbin->insertcancel($this->input->post());
          if($r==1){
            $data=array('success'=>1,'msg'=>'Data  Inserted');
            echo json_encode($data);
            
          }else{
            $data=array('success'=>0,'msg'=>'Data Not Inserted');
            echo json_encode($data);
          }
        }     
  }
  public function retrive()
  {
      // $req=$this->input->post();
      //     print_r($req);die;

          $r=$this->dbin->retrivecancel($this->input->post());
          if($r==1){
            $data=array('success'=>1,'msg'=>'Data  Inserted');
            echo json_encode($data);
            
          }else{
            $data=array('success'=>0,'msg'=>'Data Not Inserted');
            echo json_encode($data);
          }
          
  }
  public function createrequest()
  {
    $r=$this->session->userdata('user');
    $data=array();
    $data['firstname']=$r['myname'];
    $data['company']=$this->dbin->fetchcompany();
    $this->load->view('createrequest',$data);
  }
  public function assignmech()
  {
    $rid=$this->input->get('requestid');
    $r=$this->session->userdata('user');
     $data=array();
      $data['firstname']=$r['myname'];
      //$data['rid']=$id;
      $data['requestid']=$rid;
       //print_r($data);die;
     $this->load->view('assignmech',$data);
      //echo $data['request']
    
  }
  public function getcusdata()
  {
    if($this->input->post('contact'))
    {
      echo $this->dbin->fetchcusdata($this->input->post('contact'));
    }
  }
  public function getmechdata()
  {
    if($this->input->post('pincode'))
    {
      echo $this->dbin->fetchmechdata($this->input->post('pincode'));
    }
  }
  public function initializerequest()
  {
    $r=$this->session->userdata('user');
    $data=array();
    $data['firstname']=$r['myname'];
    $data['requests']=$this->dbin->fetchrequest();
    $this->load->view('initializerequest',$data);
  }
  public function runningrequest()
  {
    $r=$this->session->userdata('user');
    $data=array();
    $data['firstname']=$r['myname'];
    $data['requests']=$this->dbin->fetchrunrequest();
    $this->load->view('runningrequest',$data);
  }
  public function cancelrequest()
  {
    $r=$this->session->userdata('user');
    $data=array();
    $data['firstname']=$r['myname'];
    $data['requests']=$this->dbin->fetchcancelrequest();
    $this->load->view('cancelrequest',$data);
  }
  public function completedrequest()
  {
    $r=$this->session->userdata('user');
    $data=array();
    $data['firstname']=$r['myname'];
    $data['orderid']="ORDS" . rand(10000,99999999);
    $data['industrytype']=INDUSTRYTYPE;
    // $data['channel']=CHAN;
    $data['requests']=$this->dbin->fetchcompletedrequest();
    $this->load->view('completedrequest',$data);
  }
  public function getcity()
  {
    if($this->input->post('state_id'))
  {
   echo $this->dbin->fetchcity($this->input->post('state_id'));
  }

  }
  public function getmodel()
  {
    if($this->input->post('company_id'))
  {
   echo $this->dbin->fetchmodel($this->input->post('company_id'));
  }

  }
  public function sendmail($email,$letter)
  {
        // $otp=rand(1000,5000);
    //print_r($letter);die;
        
        $creatoremail='amankr880@gmail.com';
        $creatorname='BikeMistri.Com';
        $subject='Bike Service Request Details';
        $toemail=$email;
        $this->email->set_mailtype("html");
        $this->email->from($creatoremail,$creatorname);
        $this->email->to($toemail);
        // $this->email->cc('rajsrv171195@gmail.com,rahul933rks@gmail.com');
        $this->email->subject($subject);
         $message='<html><body><center>';
         $message.='<img src="https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.startupindia.gov.in%2Fcontent%2Fsih%2Fen%2Fprofile.Startup.5e37b9c2e4b0bf34fcfa3530.html&psig=AOvVaw21bUio1JAoFwspIQij-xHg&ust=1621512228005000&source=images&cd=vfe&ved=0CAIQjRxqFwoTCPCtpfXZ1fACFQAAAAAdAAAAABAD" style="width:100px;height:100px;">';
         $message.='<p>'.$letter["msg"].'</p>';

         $message.='</center></body></html>';



        $this->email->message($message);
        $this->email->send();
        // echo $this->email->print_debugger();
  }

  public function fileupload(){


  if($this->input->post()){

    $config['upload_path']          = './uploads';
    $config['allowed_types']        = 'gif|jpg|png|';
    $config['max_size']             = 10000;
    $config['remove_spaces']        =TRUE;
    $config['encrypt_name']         =TRUE;
    $config['file_ext_tolower']     =TRUE;

    $this->load->library('upload', $config);
     $images = array();

  if (!$this->upload->do_upload('images[]')) {
                $data=array();
                $data['msg']=$this->upload->display_errors();
                $this->load->view('formupload',$data);
            } else {
                // return false;
              $data=array();
               $data['msg']='file Uploaded suceesfully';
               $this->load->view('formupload',$data);
            }
        
      }else{
    $data=array();
    $data['msg']='';
    $this->load->view('formupload',$data);
  }
  
}
public function onlinepayment(){ 

    if($this->input->post()){

      //print_r($this->input->post());
      $r=$this->session->userdata('user');
      $user=$r['username'];
      $this->dbin->intializepayment($this->input->post(),$user);
      $this->load->view('PaytmKit/pgRedirect');

    }else{
      $rid=$this->input->get('requestid');
      $cid=$this->input->get('customerid');
      $r=$this->session->userdata('user');
        //$payment_amount=500;
        $data=array();
        $data['firstname']=$r['myname'];
        $data['requestid']=$rid;
        // $data['amount']=$payment_amount;
        $data['orderid']="ORDS" . rand(10000,99999999);
         $data['customerid']=$cid;
        $data['industrytype']=INDUSTRYTYPE;
        $data['channel']=CHANNELID;
        $this->load->view('bikepayment',$data);
    }
}

public function pgresponse(){

  $this->load->view('PaytmKit/pgResponse');
}



}

// SEND MAIL CODE

// public function sendmail()
//   {
//     $r=$this->session->userdata('user');
//       $data=array();
//       $data['firstname']=$r['myname'];
//       $data=$this->dbin->getallinfo($r['username']);
//       //print_r($data);die;

//         $otp=rand(1000,5000);
//         $creatoremail='amankr880@gmail.com';
//         $creatorname='BikeMistri.Com';
//         $subject='Bike Service Request Details';
//         $toemail='nitishroy6666@gmail.com';
//         $this->email->set_mailtype("html");
//         $this->email->from($creatoremail,$creatorname);
//         $this->email->to($toemail);
//         $this->email->cc('rajsrv171195@gmail.com,rahul933rks@gmail.com');
//         $this->email->subject($subject);
//         $this->email->attach('https://www.drivespark.com/images/2020-07/2020-bmw-s-1000-xr-30.jpg');
//          $message='<html><body><center>';
//          $message.='<img src="https://images.unsplash.com/photo-1449426468159-d96dbf08f19f?ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8bW90b3JiaWtlfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&w=1000&q=80" style="width:100px;height:100px;">';
//          $message.='<h2 style="background-color:orange;color:#fff;">Your Otp For Login</h2>';
//          $message.='<p>'.$otp.'</p>';
//          $message.='<table style="border: 1px solid black;">';
//          $message.='<tr><th>Username</th><th>First name</th><th>Last Name</th><th>Password</th></tr>';
//          $message.='<tr><th>'.$data["username"].'</th><th>'.$data["firstname"].'</th><th>'.$data["lastname"].'</th><th>'.$data["password"].'</th></tr>';
//          $message.='</table>';

//          $message.='</center></body></html>';



//         $this->email->message($message);
//         $this->email->send();
//         echo $this->email->print_debugger();
//   }
