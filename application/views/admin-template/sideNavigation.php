<!-- menu profile quick info -->

            <div class="profile clearfix">
              <div class="profile_pic">
               <!--<img src="uploads/admin.jpg" alt="..." class="img-circle profile_img" height="60px">-->
                <?php  echo '<img src="uploads/' . $admin_details['image'] . '" alt="..." class="img-circle profile_img" height="60px">'; ?>
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                
                <h2><?php echo $admin_details['username']; ?></h2>
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
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-user"></i> Add Employee <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url().'admin/admindashboard/addEmployeePersonal'; ?>">Add Personal Information</a></li>
                      <li><a href="<?php echo base_url().'admin/admindashboard/addEmployeeQualification'; ?>">Add Qualification</a></li>
                      <li><a href="<?php echo base_url().'admin/admindashboard/addEmployeeBank'; ?>">Add Bank Details</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-eye"></i> View Employees <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url().'admin/admindashboard/viewEmployee'; ?>">View</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-money"></i> Generate Salary Slips <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url().'admin/admindashboard/viewEmployeeSalary'; ?>">View Salary</a></li>
                    </ul>
                  </li>
              </div>
            </div>
            <!-- /sidebar menu -->

           