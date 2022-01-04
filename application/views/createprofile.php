<!DOCTYPE html>
<html>
<head>
	

	<title>Create Profile</title>
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
                            <h3>Create Profile</h3>
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
                                    <form id="customerform" data-parsley-validate="" class="form-horizontal form-label-left"  method="post">

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
                                            <label class="col-form-label col-md-3 col-sm-3 label-align">Gender<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <div id="gender" class="btn-group" data-toggle="buttons">
                                                    <label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                        <input type="radio" name="gender" value="male" class="join-btn" data-parsley-multiple="gender"> &nbsp; Male &nbsp;
                                                    </label>
                                                    <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                        <input type="radio" name="gender" value="female" class="join-btn" data-parsley-multiple="gender"> Female
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label for="email-id" class="col-form-label col-md-3 col-sm-3 label-align">Email ID<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input id="emailid" class="form-control" type="text" name="emailid" value="<?php echo set_value('emailid');?>">
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
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align">State<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <select name="state" class="select2_multiple form-control" id="state">
                                                    <option value="">Select state</option>
                                                    <?php
                                                    foreach($state as $row){
                                                        echo '<option value="'.$row['id'].$row['state'].'">'.$row['state'].'</option>';
                                                    }
                                                    ?>
                                                    </select>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align">City<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <select class="select2_multiple form-control" name="city" id="city">
                                                    <option value="">Select City</option>
                                                </select>
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

        <!-- footer content -->
        <?php include ('common/footer.php')?>
        <!-- /footer content -->
      </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){

                 $('#state').change(function(){
                  var state_id = $('#state').val();
                  if(state_id != '')
                  {
                   $.ajax({
                    url:"<?php echo FORMURL; ?>project/getcity",
                    method:"POST",
                    data:{state_id:state_id},
                    success:function(data)
                    {
                     $('#city').html(data);
                    }
                   });
                  }
                  else
                  {
                   $('#city').html('<option value="">Select City</option>');
                  }
                 });











            // $("#state").change(function(){
            // var stateId=$(this).val();
            //     $.ajax({
            //         method:"POST",
            //         url:"<?php //echo //FORMURL; ?>project/getcity",
            //         data:{id:stateId},
            //         // dataType:'json',
            //         success:function(response){
            //             console.log('ok');
            //             console.log(response);
            //             var len=response.length;
            //             $('#city').empty();
            //             console.log(len);
            //             console.log(response[0]);
            //             for(i=0; i<len;i++){
            //                 $('#city').append("<option value='"+response[i].id+"'>"+response[i].city+"</option>");

            //         }
            //         }
            //     });
            // });

            $("#btnsubmit").click(function(e){
                e.preventDefault();
                $.ajax({
                    type:'post',
                    url:"<?php echo FORMURL; ?>project/custinsert",
                    data:$("#customerform").serialize(),
                    dataType:'json',
                    success:function(data){
                        if(data.success==1){
             $('#successmsg').text(data.msg);
            $('#customerform').trigger("reset");
            }else{
              $('#errormsg').text(data.msg);
            }
                }
                });
             });
        });
    </script>

</body>
</html>