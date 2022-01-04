<?php
class Databaseinsert extends CI_Model {

        public function insert_data()
        {
                $firstname=$this->input->post('first-name');
                $lastname=$this->input->post('last-name');
                $email_id=$this->input->post('email-id');
                $data = array(
                        'firstname'=>$firstname,
                        'lastname'=>$lastname,
                        'email_id'=>$email_id
                );

                $this->db->insert('registration', $data);
        }
        public function get_data()
        {
                $username=$this->input->post('username');
                $password=$this->input->post('password');
                $data = array(
                        'username'=>$username,
                        'password'=>$password
                );
                // $this->db->insert('baby',$data);
                $query = $this->dbin->get('admin',$data);  
                return $query->result();  
        }

        public function update_entry()
        {
                $this->title    = $_POST['title'];
                $this->content  = $_POST['content'];
                $this->date     = time();

                $this->db->update('entries', $this, array('id' => $_POST['id']));
        }
        public function adminverify($arr)
        {
               $username=$arr['username'];
                $password=$arr['password'];

                $q="select * from admin where username='$username'and password='$password'";
                $r=$this->db->query($q);
                $c=$r->num_rows();
                if($c>0){
                        return 1;
                }else{
                        return 0;
                } 
        }
        
       public function getallinfo($username){

                $query=$this->db->select('*')->from('admin')->where('username',$username)->get();  
               $r= $query->result_array(); 
               return $r[0];
        }
        public function getlogeername($username){



                $query=$this->db->select('firstname')->from('admin')->where('username',$username)->get();  
               $r= $query->result_array(); 
               return $r[0]['firstname'];
        }
        public function insertcust($data)
        {
                $data=array(
                'firstname'=>$data['first-name'],
                'lastname'=>$data['last-name'],
                'gender'=>$data['gender'],
                'emailid'=>$data['emailid'],
                'phoneno1'=>$data['phoneno1'],
                'phoneno2'=>$data['phoneno2'],
                'address'=>$data['address'],
                'pincode'=>$data['pincode'],
                'state'=>$data['state'],
                'city'=>$data['city']
                );
                

                $this->db->insert('customer', $data);
                return 1;
        }
        public function insertmech($data)
        {
                $data=array(
                'firstname'=>$data['first-name'],
                'lastname'=>$data['last-name'],
                'fathername'=>$data['father-name'],
                'emailid'=>$data['emailid'],
                'age'=>$data['age'],
                'phoneno1'=>$data['phoneno1'],
                'phoneno2'=>$data['phoneno2'],
                'phoneno3'=>$data['phoneno3'],
                'address'=>$data['address'],
                'pincode'=>$data['pincode']
                );
                

                $this->db->insert('mechanic', $data);
                return 1;
        }
        public function insertrequest($data)
        {
            $date=date('Y-m-d h:i:s');
                $data=array(
                'customerid'=>$data['uid'],
                'bikecompany'=>$data['company'],
                'bikemodel'=>$data['bike'],
                'registration_no'=>$data['registration'],
                'datetime'=>$date
                );
                

                $this->db->insert('request', $data);
                return 1;
        }
        public function insertassign($data){
            $mechid=$this->input->post('mech');
            $requesttype=$this->input->post('rtype');
            $rid=$this->input->post('requestid');
            $this->db->set('mechid',$mechid)->set('requesttype',$requesttype)->set('requeststatus','Initialized')->where('requestid',$rid)->update('request');

            // $query=$this->db->select('requestid,customerid,mechid,bikecompany,bikemodel,registration_no,requesttype,requeststatus')->where('requestid',$rid)->get('request');
            // foreach ($query->result() as $row) {
            //         $this->db->insert('running',$row);
            //         };
            // $this->db->delete('request', array('requestid' => $rid));
            return 1; 
        }
        public function insertschedule($data)
        {
            $sdate=$this->input->post('sdate');
            $stime=$this->input->post('stime');
            $rid=$this->input->post('requestid');
            $this->db->set('scheduled_date',$sdate)->set('scheduled_time',$stime)->set('requeststatus','Request Scheduled')->where('requestid',$rid)->update('request');
            return 1;
        }
        public function insertcancel($data)
        {
            $rid=$this->input->post('reqid');
            $msg=$this->input->post('cancelmsg');
            $this->db->set('requeststatus','RequestCancelled')->set('cancel_message',$msg)->where('requestid',$rid)->update('request');
            return 1;
        }
        public function retrivecancel($data)
        {
            $rid=$this->input->post('id');
            $this->db->set('requeststatus','Not_Initialised')->set('cancel_message','')->where('requestid',$rid)->update('request');
            return 1;
        }
        public function fetchrequest()
        {
            $this->db->select('*')->where('requeststatus','Not_Initialised');
            $query=$this->db->get("request");
            $s=$query->result_array();
            //print_r($s);die;
            return $s;
        }
        public function fetchrunrequest()
        {
            $this->db->select('*')->where('requeststatus','Initialized')->or_where('requeststatus','Request Scheduled');
            $query=$this->db->get("request");
            $s=$query->result_array();
            //print_r($s);die;
            return $s;
        }
        public function fetchcancelrequest()
        {
            $this->db->select('*')->where('requeststatus','RequestCancelled');
            $query=$this->db->get("request");
            $s=$query->result_array();
            //print_r($s);die;
            return $s;
        }
        public function fetchcompletedrequest()
        {
            $this->db->select('*')->where('requeststatus','Completed');
            $query=$this->db->get("request");
            $s=$query->result_array();
            //print_r($s);die;
            return $s;
        }
        public function fetchstate()
        {
            $this->db->select('id,state');
            // $this->db->order_by("state","ASC");
            $query=$this->db->get("state");
            $s=$query->result_array();
            //print_r($s);die;
            return $s;
        }
        public function fetchcity($id)
        {
            $this->db->select('id,city');
            $this->db->where('stateid', $id);
            $this->db->order_by("city","ASC");
            $query=$this->db->get("city");
            $output = '<option value="">Select City</option>';
               foreach($query->result_array() as $row)
               {
               $output .= '<option value="'.$row['id'].$row['city'].'">'.$row['city'].'</option>';
               }
                return $output;

            // $c=$query->result_array();
            // return $c;
        
        }
        public function fetchcusdata($contact)
        {
            $this->db->select('customerid,firstname,lastname,emailid,phoneno1,phoneno2,address,pincode');
            $this->db->where('phoneno1',$contact)->or_where('phoneno2',$contact)->or_where('emailid',$contact);
            $query=$this->db->get("customer");
            $query->result_array();
            $output='';
            foreach($query->result_array() as $data)
            {
                $output.= '<div class="col-md-4 col-sm-4  profile_details">
                            <div class="well profile_view">
                            <div class="col-sm-12">
                            <h4 class="brief"><i>Customer</i></h4>
                            <div class="left col-md-7 col-sm-7">';
                $output.= '<h2>'.$data['firstname']."_".$data['lastname'].'</h2>';
                $output.= '<ul class="list-unstyled">';
                $output.= '<li><i class="fa fa-at"></i> EmailId: '.$data['emailid'].'</li>';
                $output.= '<li><i class="fa fa-phone"></i> Phone1: '.$data['phoneno1'].'</li>';
                $output.= '<li><i class="fa fa-phone"></i> phone2: '.$data['phoneno2'].'</li>';
                $output.= '<li><i class="fa fa-building"></i> Address: '.$data['address'].'</li>';
                $output.= '<li><i class="fa fa-map-marker"></i> pincode: '.$data['pincode'].'</li>';
                $output.= '<li style="display:none;" id="myuserid">'.$data['customerid'].'</li>';
                $output.= '<li id="myemail" style="display:none;" ><i class="fa fa-at"></i>'.$data['emailid'].'</li>';
                $output.= '</ul></div></div>
                            <div class=" profile-bottom text-center">
                            </div></div></div>';

            }
            return $output;
        }
        public function fetchcompany()
        {
            $this->db->select('id,company');
            $this->db->order_by("company","ASC");
            $query=$this->db->get("company");
            $s=$query->result_array();
            //print_r($s);die;
            return $s;
        }
        public function fetchmodel($id)
        {
            echo $id;
            $this->db->select('id,model');
            $this->db->where('company_id', $id);
            $this->db->order_by("model","ASC");
            $query=$this->db->get("model");
            $output = '<option value="">Select Bike</option>';
               foreach($query->result_array() as $row)
               {
               $output .= '<option value="'.$row['model'].'">'.$row['model'].'</option>';
               }
                return $output;

            // $c=$query->result_array();
            // return $c;
        
        }
        public function fetchmechdata($pincode)
        {
            echo $id;
            $this->db->select('mechid,firstname,address,pincode');
            $this->db->where('pincode', $pincode);
            $this->db->order_by("pincode","ASC");
            $query=$this->db->get("mechanic");
            $output = '<option value="">Select Mech</option>';
               foreach($query->result_array() as $row)
               {
               $output .= '<option value="'.$row['mechid'].'">'.$row['firstname']." - ".$row['address']." - ".$row['pincode'].'</option>';
               }
                return $output;

            // $c=$query->result_array();
            // return $c;
        
        }
        public function intializepayment($mydata,$user){
            $rid=$this->input->post('requestid');
            $data=array(
                'orderid'=>$mydata['ORDER_ID'],
                'requestid'=>$mydata['requestid'],
                'amount'=>$mydata['TXN_AMOUNT'],
                'username'=>$user
            );
            $this->db->insert('payment',$data);
            $this->db->set('requeststatus','Paid')->where('requestid',$rid)->update('request');
        }
        public function getuser($ord){
            $this->db->select('username');
            $this->db->where('orderid',$ord);
            $query=$this->db->get("payment");
            $s=$query->result_array();
            print_r($s);die;

        }
        
}