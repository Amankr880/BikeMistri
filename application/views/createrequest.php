<!DOCTYPE html>
<html>
<head>
	

	<title>Create Request</title>
    <?php include ('common/header.php')?>
    <!-- <script type="text/javascript">
        $(document).ready(function(e){
            e.preventDefault();
            
        });
    </script> -->

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
            

            <!-- menu profile quick info -->
            
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <?php include ('common/adminsidebar.php')?>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <?php include ('common/admintopnav.php')?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main" style="min-height: 3831px;">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Create Request</h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 ">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Search Customer</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="http://localhost/TestProject/production/form.html#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a class="dropdown-item" href="http://localhost/TestProject/production/form.html#">Settings 1</a>
                                                </li>
                                                <li><a class="dropdown-item" href="http://localhost/TestProject/production/form.html#">Settings 2</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?>
                                    <br>
                                    <form id="search" data-parsley-validate="" class="form-horizontal form-label-left"  method="post"> 
                                        <div class="item form-group">
                                            <label for="contact" class="col-form-label col-md-3 col-sm-3 label-align">Phone No. or Email ID</label>
                                            <div class="col-md-6 col-sm-6 input-group mb-3">
                                                <input id="contact" class="form-control" type="text" name="contact" value="<?php echo set_value('contact');?>">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary" type="button" id="btnsearch" name="btnsearch">Search</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div id="msg">
                                            
                                     </div>
                                     <div id="request">
                                     <form id="createrequest" data-parsley-validate="" class="form-horizontal form-label-left"  method="post">
                                      <input type="hidden" name="uid"  id="uid">
                                       <input type="hidden" name="email"  id="email">
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align">Select Company<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <select name="company" class="select2_multiple form-control" id="company">
                                                    <option value="">Select Company</option>
                                                    <?php
                                                    foreach($company as $row){
                                                        echo '<option value="'.$row['id'].$row['company'].'">'.$row['company'].'</option>';
                                                    }
                                                    ?>
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align">Select Bike<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <select class="select2_multiple form-control" name="bike" id="bike">
                                                    <option value="">Select Bike</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label for="phoneno" class="col-form-label col-md-3 col-sm-3 label-align">Registration No.<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input id="registration" class="form-control" type="text" name="registration" style="text-transform:uppercase">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <div class="col-md-6 col-sm-6 offset-md-3">
                                                <button class="btn btn-primary" type="reset">Reset</button>
                                                <!-- <input type="submit" value="Submit" id="btnsubmit" name="btnsubmit" class="btn btn-success"> -->
                                                <button class="btn btn-primary" type="submit" id="btnsubmit" name="btnsubmit">Submit</button>
                                            </div>
                                        </div>

                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>   
                </div>
            </div>
        
         <!-- /page content --> 
          <script type="text/javascript">
        $(document).ready(function(){
            $("#request").hide();
                 $('#btnsearch').click(function(){
                  var contact = $('#contact').val();
                  if(contact != '')
                  {
                   $.ajax({
                    url:"<?php echo FORMURL; ?>project/getcusdata",
                    method:"POST",
                    data:{contact:contact},
                    success:function(data)
                    {
                      if(data != ''){
                        $('#msg').html(data);
                     $("#request").show();
                     var myid=  $('#myuserid').text();
                     var email= $('#myemail').text();
                     $('#uid').val(myid);
                     $('#email').val(email);
                   }else{
                    $('#msg').html('No Data found.');
                   $("#request").hide();

                   }
                     
                    }
                   });
                   }
                  else
                  {
                   $('#msg').html('Please enter Data !');
                   $("#request").hide();
                  }
                 });

                 $('#company').change(function(){
                  var company_id = $('#company').val();
                  if(company_id != '')
                  {
                   $.ajax({
                    url:"<?php echo FORMURL; ?>project/getmodel",
                    method:"POST",
                    data:{company_id:company_id},
                    success:function(data)
                    {
                     $('#bike').html(data);
                    }
                   });
                  }
                  else
                  {
                   $('#bike').html('<option value="">Select Bike</option>');
                  }
                 });
                 // 
                 // 
            $('#btnsubmit').click(function(){
                         
                requestin.formSubmitValidation();
            });

var requestin = { 
   formSubmitValidation:function(){
   requestin.validate();
     if($('#createrequest').valid() ===  false){
          return;
      }else{
        $("#createrequest").submit(function(event){
          var formData = $('#createrequest').serialize();
          event.preventDefault();
          //alert('ok');
          $.ajax({ 
            url: "<?php echo FORMURL; ?>project/requestinsert",
            type:'POST',
            data: formData,
            dataType: 'JSON',
            success:function(data){
                console.log(data);

             if(data.success==1){
            //  $('#successmsg').text(data.msg);
            // $('#customerform').trigger("reset");
             alert("Request Inserted. Redirect to Initialize Request");
             // window.location.href = "http://localhost/bikemistri/index.php/project/openinitializepage";
             window.open('http://localhost/bikemistri/index.php/project/initializerequest', '_blank');
            }else{
              $('#errormsg').text(data.msg);
            }
            }
          });
        });
      }    
   },

     validate:function(){

          $("#createrequest").validate(
          {
          ignore:"",
          rules:{
          'company':{
             required: true
          },
          'bike':{
            required: true,
          },
          'registration':{
            required:true,
          },
        },

          messages:{

          'company':{
          required: "This field is required.",
          },
          'bike':{
          required: "This field is required.",
          },

          'registration':{
          required: "This field is required.",
          },
      },
 submitHandler: function(form) { return true; }
 });
}
}
        });
    </script>  

        <!-- footer content -->
        <?php include ('common/footer.php')?>
        <!-- /footer content -->
      </div>
    </div>

   

</body>
</html>