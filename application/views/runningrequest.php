<!DOCTYPE html>
<html>
<head>	
	<title>RUNNING REQUEST</title>
    <?php include ('common/header.php')?>
</head>
<body>

	<body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="dashboard" class="site_title"><i class="fa fa-paw"></i> <span>BikeMistri.Com</span></a>
            </div>
            <div class="clearfix"></div>
            <!-- sidebar menu -->
            <?php include ('common/adminsidebar.php')?>
            <!-- /sidebar menu -->
          </div>
        </div>
        <!-- top navigation -->
        <?php include ('common/admintopnav.php')?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>RUNNING REQUEST</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Schedule Request</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Request ID</th>
                          <th>Customer ID</th>
                          <th>Vehicle Detail</th>
                          <th>RegistrationNo.</th>
                          <th>RequestStatus</th>
                          <th>Select Date</th>
                          <th>Select Time</th>
                          <th>Confirm</th>
                          <th>Cancel</th>
                        </tr>
                      </thead>

                      <tbody>

                          <?php
                          foreach($requests as $row){
                            echo '<tr>';
                            echo '<td id="rid">'.$row['requestid'].'</td>';
                            echo '<td>'.$row['customerid'].'</td>';
                            echo '<td>'.$row['bikecompany']." ".$row['bikemodel'].'</td>';
                            echo '<td>'.$row['registration_no'].'</td>';
                            echo '<td>'.$row['requeststatus'].'</td>';
                            echo '<td><form id="schedulerequest">
                              <input type="hidden" name="requestid" id="requestid" value="'.$row['requestid'].'">
                                  <div class="form-group row">
                                    <div class="col-12">
                                      <input class="form-control" type="date" id="sdate" name="sdate">
                                    </div>
                                  </div></td>';
                            echo '<td><div class="form-group row">
                                  <div class="col-12">
                                    <input class="form-control" type="time" id="stime" name="stime">
                                  </div>
                                </div></td>';
                            echo '<td><button class="btn btn-outline-success" type="submit" id="btnsubmit" >Schedule</button>
                                </form></td>';
                            echo '<td><button class="btn btn-outline-danger" type="button"   onclick="cancelrequest(' .$row['requestid']. ')" >Cancel</button></td>';   
                            echo '</tr>';
                            }
                          ?>
                        
                      </tbody>
                    </table>
                  </div>
                  </div>
              </div>
            </div>
                </div>
              </div>

            </div>
          </div>
        </div>

<div class="modal fade" id="cancelModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Request Cancel Reason</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="reqcancel" >
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Request ID:</label>
            <input type="text" class="form-control" id="reqid" name="reqid" >
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="cancelmsg" name="cancelmsg"></textarea>
          </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="cancelsubmit">Send message</button>
      </div>
        </form>
      </div>
    </div>
  </div>
</div>
         <!-- /page content -->
         <script type="text/javascript">
            $('#btnsubmit').click(function(){
                         
                schedulein.formSubmitValidation();
            });

var schedulein = { 
   formSubmitValidation:function(){
   schedulein.validate();
     if($('#schedulerequest').valid() ===  false){
          return;
      }else{
        $("#schedulerequest").submit(function(event){
          var formData = $('#schedulerequest').serialize();
          event.preventDefault();
          //alert('ok');
          $.ajax({ 
            url: "<?php echo FORMURL; ?>project/requestschedule",
            type:'POST',
            data: formData,
            dataType: 'JSON',
            success:function(data){
             if(data.success==1){
             alert("Request Scheduled.");
             location.reload();
             // window.location.href = "http://localhost/bikemistri/index.php/project/openinitializepage";
             //window.open('http://localhost/bikemistri/index.php/project/initializerequest', '_blank');
            }else{
              $('#errormsg').text(data.msg);
            }
            }
          });
        });
      }    
   },

     validate:function(){

          $("#schedulerequest").validate(
          {
          ignore:"",
          rules:{
          'sdate':{
             required: true
          },
          'stime':{
            required: true,
          },
        },

          messages:{

          'sdate':{
          required: "This field is required.",
          },
          'stime':{
          required: "This field is required.",
          },
      },
 submitHandler: function(form) { return true; }
 });
}
}

          function cancelrequest(id){
              $('#reqid').val(id);
              $('#cancelModal').modal();
             }

              $('#cancelsubmit').click(function(){
                         
                 cancelreq.formSubmitValidation();
            });

var cancelreq = { 
   formSubmitValidation:function(){
   cancelreq.validate();
     if($('#reqcancel').valid() ===  false){
          return;
      }else{
        $("#reqcancel").submit(function(event){
          var formData = $('#reqcancel').serialize();
          event.preventDefault();
          //alert('ok');
          $.ajax({ 
            url: "<?php echo FORMURL; ?>project/requestcancel",
            type:'POST',
            data: formData,
            dataType: 'JSON',
            success:function(data){
             if(data.success==1){
            alert('Request Canceled.');
            location.reload();
            }
            }
          });
        });
      }    
   },

     validate:function(){

          $("#reqcancel").validate(
          {
          ignore:"",
          rules:{
          'reqid':{
             required: true
          },
          'cancelmsg':{
            required: true,
          },
        },

          messages:{

          'reqid':{
          required: "This field is required.",
          },
          'cancelmsg':{
          required: "This field is required.",
          },
      },
 submitHandler: function(form) { return true; }
 });
}
}
         </script>   

        <!-- footer content -->
        <?php include ('common/footer.php')?>
        <!-- /footer content -->
      </div>
    </div>

</body>
</html>