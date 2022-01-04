<?php
class Employeemodel extends CI_Model {
	
	public function getemployeelist(){

		$r=$this->db->select('*')->from('customer')->get();
        $rs=$r->result_array();

        $r1=$this->db->select('*')->from('admin')->get();
        $rs1=$r1->result_array();

        $data=array('employeelist'=>$rs,'teamlist'=>$rs1);

        return $data;


  }

  public function getemployeeinfo($id){
  	    $r=$this->db->select('*')->from('customer')->where('id',$id)->get();
        $rs=$r->result_array();

        $data=array('employeeinfo'=>$rs);
        return $data;


  }



}

?>