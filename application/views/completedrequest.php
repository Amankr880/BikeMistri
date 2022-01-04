<!DOCTYPE html>
<html>
<head>
	<title>Completed Request</title>
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
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>COMPLETED REQUEST</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Payment</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <?php
                            if(isset($responsecode)){
                            ?>
                            <p><?php echo $responsecode; ?></p>
                            <?php
                          }

                            ?>
                            <div class="card-box table-responsive">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Request ID</th>
                          <th>Customer ID</th>
                          <th>Vehicle Detail</th>
                          <th>RegistrationNo.</th>
                          <th>Request Status</th>
                          <th>Payment</th>
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
                            echo '<td><button class="btn btn-outline-success" type="button"   onclick="payment(' .$row['requestid'].','.$row['customerid']. ')" >Pay</button></td>';
                            // echo '<td><button class="btn btn-outline-success" type="button"   onclick=" payment($data=array('$rid=>$row['requestid'],$cid=>$row['customerid']'))" >Pay</button></td>';
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


         <!-- /page content -->  
         <script type="text/javascript">
           function payment(rid,cid){
              var ruid=rid;
              var cuid=cid;
              //console.log(rid);
              window.open('http://localhost/bikemistri/index.php/project/onlinepayment?requestid='+ruid+'&customerid='+cuid);
             }

         </script> 

        <!-- footer content -->
        <?php include ('common/footer.php')?>
        <!-- /footer content -->
      </div>
    </div>

</body>
</html>