<?php
// how to create helper function
function welcomegreeting($name){
 
  echo "Wish You happy Birthady " .$name ;

}

function getusername($uid){
	//we can not call databse model directrly from helper file
	// so we need to create object of CI
    $ci=& get_instance();  // this will return an object of CI
    $ci->load->database();  // loading database
	$r=$ci->db->select('name')->where('id',$uid)->from('user')->get()->row();
	$name=$r->name;

	return $name;


}

function countmech(){
	  $ci=& get_instance();
    $ci->load->database();
    $res=$ci->db->count_all('mechanic');
    return $res;
}
function cancelreq($id){
	$ci=& get_instance();
  $ci->load->database();
  $res=$ci->db->set('requeststatus','Canceled')->where('requestid',$id)->update('request');
}
function newreq(){
	$ci=& get_instance();
  $ci->load->database();
  // $res=$ci->db->count_all('request')->where('requeststatus','Not_Initialised');
  // return $res;

  $ci->db->select('*')->from('request')->where('requeststatus','Not_Initialised'); 
$q = $ci->db->get(); 
return $q->num_rows();
} 

function updatepayment($arr){
   $ci=& get_instance();
   $ci->load->database();

     $ord=$arr['ORDERID'];
     //$r=$ci->db->getuser($ord);
            $ci->db->select('username');
            $ci->db->where('orderid',$ord);
            $query=$ci->db->get("payment");
            $s=$query->result_array();
            $user=$s[0]['username'];
            $ci->db->select('*');
            $ci->db->where('username',$user);
            $query=$ci->db->get("admin");
            $r=$query->result_array();

            //$myname= $this->dbin->getlogeername($this->input->post('username'));
        //session code
        $usersession['user']=array(
         'isuserlogin'=>1,
         'username'=>$user,
         'myname'=>$r[0]['firstname'],
        );
        $ci->session->set_userdata($usersession);

  $data=array();

  $data['mid']=$arr['MID'];
  $data['txnid']=$arr['TXNID'];
  $data['paymentmode']=$arr['PAYMENTMODE'];
  $data['currency']=$arr['CURRENCY'];
  $data['txndate']=$arr['TXNDATE'];
  $data['status']=$arr['STATUS'];
  $data['responsecode']=$arr['RESPCODE'];
  $data['gateway']=$arr['GATEWAYNAME'];
  $data['banktxnid']=$arr['BANKTXNID'];
  $data['bankname']=$arr['BANKNAME'];
  $ci->db->where('orderid',$arr['ORDERID']);
  $res=$ci->db->update('payment',$data);
  $data['firstname']=$r[0]['firstname'];

        return $ci->load->view('completedrequest', $data);

}

function getcus($rid){
  $ci=& get_instance();
  $ci->load->database();
  $res=$ci->db->select('customerid')->from('request')->where('requestid',$rid)->get()->row();
   return $res;
  // print_r($res);die;
}



?>