<!-- menu profile quick info -->

            <div class="profile clearfix">
              
              <div class="profile_pic">
               <!--<img src="uploads/admin.jpg" alt="..." class="img-circle profile_img" height="60px">-->
                <?php  echo '<img src="uploads/' . $executive_details['image'] . '" alt="..." class="img-circle profile_img" height="60px">'; ?>
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                
                <h2><?php echo $executive_details['username']; ?></h2>
            <?php
          //}
          ?>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General <?php //echo $admin_details['username']; ?></h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-user"></i> Assign Employee Job <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url().'executive/executivedashboard/addEmployeeJob'; ?>">Assign Job</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-user"></i> Assign Role <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url().'executive/executivedashboard/assignRole'; ?>">Role</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-eye"></i> View Employees <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url().'executive/executivedashboard/viewEmployee'; ?>">View</a></li>
                    </ul>
                  </li>
              </div>
            </div>
            <!-- /sidebar menu -->

           