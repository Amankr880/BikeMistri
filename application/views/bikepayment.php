<!DOCTYPE html>
<html>
<head>
	

	<title>Payment</title>
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

            <br/>

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
                            <h3>Payment</h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 ">
                            <div class="x_panel">
                                <div class="x_content">
                                    <form id="search" data-parsley-validate="" class="form-horizontal form-label-left"  method="post" action="<?php echo FORMURL?>project/onlinepayment"> 
                                      <div class="item form-group">
                                            <label for="contact" class="col-form-label col-md-3 col-sm-3 label-align">Order Id:</label>
                                            <div class="col-md-6 col-sm-6 input-group mb-3">
                                                <input id="ORDER_ID" class="form-control" type="text" name="ORDER_ID" value="<?php echo $orderid;  ?>">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label for="contact" class="col-form-label col-md-3 col-sm-3 label-align">Request Id:</label>
                                            <div class="col-md-6 col-sm-6 input-group mb-3">
                                                <input id="requestid" class="form-control" type="text" name="requestid" value="<?php  echo $requestid ?>">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label for="contact" class="col-form-label col-md-3 col-sm-3 label-align">Amount:</label>
                                            <div class="col-md-6 col-sm-6 input-group mb-3">
                                                <input id="TXN_AMOUNT" class="form-control" type="number" name="TXN_AMOUNT">
                                            </div>
                                        </div>
                                        <input type="hidden" id="INDUSTRY_TYPE_ID" name="INDUSTRY_TYPE_ID" value="<?php echo $industrytype;  ?>">
                                        <input type="hidden"  id="CHANNEL_ID" name="CHANNEL_ID" value="<?php echo $channel;   ?>">
                                        <input type="hidden"  id="CUST_ID" name="CUST_ID" autocomplete="off" tabindex="5" value="<?php echo $customerid;  ?>">
                                        <div class="item form-group">
                                            <div class="col-md-6 col-sm-6 offset-md-3">
                                                <!-- <input type="submit" value="Submit" id="btnsubmit" name="btnsubmit" class="btn btn-success"> -->
                                                <button class="btn btn-outline-success" type="submit" id="btnsubmit" name="btnsubmit">Submit</button>
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

        <!-- footer content -->
        <?php include ('common/footer.php')?>
        <!-- /footer content -->
      </div>
    </div>

</body>
</html>

<!-- <div class="input-group-append">
                                                    <button class="btn btn-primary" type="button" id="btnsearch" name="btnsearch">Search</button>
                                                </div> -->