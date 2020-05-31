<!-- menu profile quick info -->

            <div class="profile clearfix">
              
              <div class="profile_pic">
                <?php 
                  foreach ($employee_details->result() as $emp)
                ?>
               <?php  echo '<img src="uploads/' . $emp->user_image_name . '" alt="..." class="img-circle profile_img" height="60px">'; ?>
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                
                <h2><?php echo $emp->user_name; ?></h2>
            <?php
                $id=$emp->user_id;
                //echo $id;
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
                  <li><a><i class="fa fa-eye"></i> View Employee Role <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url().'employee/employeedashboard/viewEmployeeRole/'.$id; ?>">View</a></li>
                    </ul>
                  </li>
              </div>
            </div>
            <!-- /sidebar menu -->

           