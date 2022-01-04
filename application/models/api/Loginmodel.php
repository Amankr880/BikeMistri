<?php
class Loginmodel extends CI_Model {
	
	public function getemployeelist(){

    $r=$this->db->select('*')->from('customer')->get();
        $rs=$r->result_array();

        $r1=$this->db->select('*')->from('admin')->get();
        $rs1=$r1->result_array();

        $data=array('employeelist'=>$rs,'teamlist'=>$rs1);

        return $data;


  }

  public function getemployeeinfo($email){
        $r=$this->db->select('*')->from('customer')->where('emailid',$email)->get();
        $rs=$r->result_array();

        $data=array('employeeinfo'=>$rs);
        return $data;


  }
  public function verifyemail($email){

    $r=$this->db->select('*')->from('customer')->where('emailid',$email)->get();
    $rs=$r->num_rows();
    return $rs;

  }
 public function saveotp($email,$otp){
    $date=date('Y-m-d h:i:s');
    $valide_upto = date("Y-m-d h:i:s",strtotime(date("Y-m-d h:i:s").''.OTPEXPIRYTIME));
    $update_array=array('status'=>0);
    $this->db->where('email',$email)->update('otplogin',$update_array);
    $insert_array=array('email'=>$email,'status'=>1,'otp'=>$otp,'created_date'=>$date,'valid_upto'=>$valide_upto);

    $this->db->insert('otplogin',$insert_array);
    return 1;

  }
  public function matchotp($email,$otp){
    $datetime=date('Y-m-d h:i:s');
    $r=$this->db->select('*')->from('otplogin')->where('email',$email)->where('otp',$otp)->where('status',1)->where('valid_upto>=',$datetime)->get();
    $rs=$r->num_rows();
    if($rs){
      return 1;
    }else{
      return 0;
    }
  }


}

?>