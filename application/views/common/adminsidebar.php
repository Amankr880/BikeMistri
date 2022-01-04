<!-- menu profile quick info -->
<div class="profile clearfix">
              <div class="profile_pic">
                <a href="profile.php"><img src="assets/images/aman.png" alt="..." class="img-circle profile_img"></a>
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
               <h2><?php echo $firstname;?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

	<!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="<?php echo FORMURL; ?>project/custinsert"><i class="fa fa-user-plus" aria-hidden="true"></i> Create Profile </a>
                  </li>
                  <li><a href="<?php echo FORMURL; ?>project/mechinsert"><i class="fa fa-user-plus" aria-hidden="true"></i>Insert Mechanic</a>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Requests <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo FORMURL; ?>project/createrequest">Create Request</a></li>
                      <li><a href="<?php echo FORMURL; ?>project/initializerequest">Initialize Request</a></li>
                      <li><a href="<?php echo FORMURL; ?>project/runningrequest">Running Request</a></li>
                      <li><a href="<?php echo FORMURL; ?>project/cancelrequest">Cancel Request</a></li>
                      <li><a href="<?php echo FORMURL; ?>project/completedrequest">Completed Request</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

             <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
