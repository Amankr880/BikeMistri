<!DOCTYPE html>
<html>
<head>
	

	<title>Assign Mech</title>
    <?php include ('common/header.php')?>
    <!-- <script type="text/javascript">
        function checkCookie() {
        var username = getCookie("username");
            if (username != "") {
                alert("Welcome again " + username);
            } else {
                username = prompt("Please enter your name:", "");
                if (username != "" && username != null) {
                setCookie("username", username, 365);
    }
  }
}
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
                                    <h2>Assign Mech</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                  <form id="searchmech" data-parsley-validate="" class="form-horizontal form-label-left"  method="post"> 

                                        <div class="item form-group">
                                            <label for="contact" class="col-form-label col-md-3 col-sm-3 label-align">Pincode</label>
                                            <div class="col-md-6 col-sm-6 input-group mb-3">
                                                <input id="pincode" class="form-control" type="text" name="pincode" value="<?php echo set_value('pincode');?>">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary" type="button" id="btnsearch" name="btnsearch">Search</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    <div id="showmech">
                                    <form id="assignmech" data-parsley-validate="" class="form-horizontal form-label-left"  method="post"> 
                                      <input type="hidden" name="requestid" id="requestid" value="<?php  echo $requestid ?>">
                                      <div class="form-group row">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align">Select Mech<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <select class="select2_multiple form-control" name="mech" id="mech">
                                                    <option value="">Select Mech</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align">Request Type<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <select class="select2_multiple form-control" name="rtype" id="rtype">
                                                    <option value="">Select Type</option>
                                                    <option value="Full_Service">Full Service</option>
                                                    <option value="maintenance">Maintenance</option>
                                                    <option value="Parts_Change">Parts Change</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="ln_solid"></div>
                                        <div class="item form-group">
                                            <div class="col-md-6 col-sm-6 offset-md-3">
                                                <button class="btn btn-primary" type="reset">Reset</button>
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
            $("#showmech").hide();
            $('#btnsearch').click(function(){
                  var pincode = $('#pincode').val();
                  if(pincode != '')
                  {
                   $.ajax({
                    url:"<?php echo FORMURL; ?>project/getmechdata",
                    method:"POST",
                    data:{pincode:pincode},
                    success:function(data)
                    {
                      if(data != ''){
                      $('#mech').html(data);
                      $("#showmech").show();
                      }else{
                        alert("No Mechanic Found At This Pincode");
                        $("#showmech").hide();
                      }
                    }
                   });
                  }
                  else
                  {
                    $("#showmech").hide();
                    alert("Please Enter Pincode!");
                  }
                 });

            $('#btnsubmit').click(function(){
                         
                mechassign.formSubmitValidation();
            });

var mechassign = { 
   formSubmitValidation:function(){
   mechassign.validate();
     if($('#assignmech').valid() ===  false){
          return;
      }else{
        $("#assignmech").submit(function(event){
          var formData = $('#assignmech').serialize();
          event.preventDefault();
          //alert('ok');
          $.ajax({ 
            url: "<?php echo FORMURL; ?>project/Requestassign",
            type:'POST',
            data: formData,
            dataType: 'JSON',
            success:function(data){
                console.log(data);

             if(data.success==1){
            //  $('#successmsg').text(data.msg);
            // $('#customerform').trigger("reset");
             alert("Request Inserted. Redirect to Running Request");
             // window.location.href = "http://localhost/bikemistri/index.php/project/openinitializepage";
             window.open('http://localhost/bikemistri/index.php/project/runningrequest', '_blank');
            }else{
              $('#errormsg').text(data.msg);
            }
            }
          });
        });
      }    
   },

     validate:function(){

          $("#assignmech").validate(
          {
          ignore:"",
          rules:{
          'mech':{
             required: true
          },
          'rtype':{
            required: true,
          },
        },

          messages:{

          'mech':{
          required: "This field is required.",
          },
          'rtype':{
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