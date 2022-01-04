<!DOCTYPE html>
<html>
<head>
	

	<title>Create Profile</title>
    <?php include ('common/header.php')?>
 <style>
     .error{
        color:red;
     }
 </style>

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
                            <h3>Insert Mechanic</h3>
                        </div>
                        

                        <div class="title_right">
                            <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search for...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">Go!</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 ">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Registration Form</h2>
                                    <p id="successmsg" style="color:green;font-size:18px;text-align:center;"></p>
                                    <p id="errormsg" style="color:red;font-size:18px;text-align:center;"></p>
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
                                    <form id="mechanicform" class="form-horizontal form-label-left" method="post">

                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">First Name <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" id="first-name" name="first-name" class="form-control" value="<?php echo set_value('first-name');?>">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Last Name <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" id="last-name" name="last-name"  class="form-control" value="<?php echo set_value('last-name');?>">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="father-name">Father's Name <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" id="father-name" name="father-name"  class="form-control" value="<?php echo set_value('father-name');?>">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label for="email-id" class="col-form-label col-md-3 col-sm-3 label-align">Email ID<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input id="emailid" class="form-control" type="text" name="emailid" value="<?php echo set_value('emailid');?>">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label for="age" class="col-form-label col-md-3 col-sm-3 label-align">Age<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input id="age" class="form-control" type="number" name="age" value="<?php echo set_value('age');?>">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label for="phoneno" class="col-form-label col-md-3 col-sm-3 label-align">Phone No. 1 <span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input id="phoneno1" class="form-control" type="text" name="phoneno1" value="<?php echo set_value('phoneno1');?>">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label for="phoneno" class="col-form-label col-md-3 col-sm-3 label-align">Phone No. 2</label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input id="phoneno2" class="form-control" type="text" name="phoneno2">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label for="phoneno" class="col-form-label col-md-3 col-sm-3 label-align">Phone No. 3</label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input id="phoneno3" class="form-control" type="text" name="phoneno3">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label for="address" class="col-form-label col-md-3 col-sm-3 label-align">Address<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input id="address" class="form-control" type="text" name="address" value="<?php echo set_value('address');?>">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label for="pincode" class="col-form-label col-md-3 col-sm-3 label-align">Pincode<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input id="pincode" class="form-control" type="text" name="pincode" value="<?php echo set_value('pincode');?>">
                                            </div>
                                        </div>
                                        <div class="ln_solid"></div>
                                        <div class="item form-group">
                                            <div class="col-md-6 col-sm-6 offset-md-3">
                                                <button class="btn btn-primary" type="button">Cancel</button>
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
         <!-- /page content -->   
          <script type="text/javascript">
       
        $(document).ready(function(){

            $('#btnsubmit').click(function(){
                         
                         mechin.formSubmitValidation();
            });

var mechin = { 
   formSubmitValidation:function(){
   mechin.validate();
     if($('#mechanicform').valid() ===  false){
          return;
      }else{
        $("#mechanicform").submit(function(event){
          var formData = $('#mechanicform').serialize();
          event.preventDefault();
          //alert('ok');
          $.ajax({ 
            url: "<?php echo FORMURL; ?>project/mechinsert",
            type:'POST',
            data: formData,
            dataType: 'JSON',
            success:function(data){
               // print_r("OK");
             if(data.success==1){
             $('#successmsg').text(data.msg);
            $('#customerform').trigger("reset");
            }else{
              $('#errormsg').text(data.msg);
            }
                }
          });
        });
      }    
   },

     validate:function(){

          $("#mechanicform").validate(
          {
          ignore:"",
          rules:{
          'first-name':{
             required: true
          },
          'last-name':{
            required: true,
          },
          'father-name':{
            required:true,
          },
          'emailid':{
            required:true,
            email:true
          },
          'age':{
            required:true,
            range:[25,45],
          },
          'address':{
            required:true,
          },
          'pincode':{
            required:true,
            maxlength:6,
            number:true,
          },
          'phoneno1':{
            required:true,
            maxlength:10,
            number:true,
          },
          'phoneno2':{
            required:true,
            maxlength:10,
            number:true,
          },
        },

          messages:{

          'first-name':{
          required: "This field is required.",
          },
          'last-name':{
          required: "This field is required.",
          },

          'father-name':{
          required: "This field is required.",
          },
          'age':{
          required: "This field is required.",
          },
          'address':{
          required: "This field is required.",
          },
          'pincode':{
          required: "This field is required.",
          maxlength:"Pincode Must be 6 digit",
            number:"Pincode Number Inavalid"
          },
          'emailid':{
          required: "This field is required.",
          email:"Please enter your registered email"
          },
          'phoneno1':{
            required:"This firld is required",
            maxlength:"Mobile Must be 10 digit",
            number:"Mobile Number Inavalid"
          },
          'phoneno2':{
            required:"This firld is required",
            maxlength:"Mobile Must be 10 digit",
            number:"Mobile Number Inavalid"
          }
      },
 submitHandler: function(form) { return true; }
 });
}
}

            // $("#btnsubmit").click(function(e){
            //     e.preventDefault();
            //     $.ajax({
            //         type:'post',
            //         url:"<?php echo FORMURL; ?>project/mechinsert",
            //         data:$("#customerform").serialize(),
            //         dataType:'json',
            //         success:function(data){
            //             if(data.success==1){
            //  $('#successmsg').text(data.msg);
            // $('#customerform').trigger("reset");
            // }else{
            //   $('#errormsg').text(data.msg);
            // }
            //     }
            //     });
            //  });
        });
    </script>

        <!-- footer content -->
        <?php 
        include ('common/footer.php');
        ?>
        <!-- /footer content -->
      </div>
    </div>

   

</body>
</html>