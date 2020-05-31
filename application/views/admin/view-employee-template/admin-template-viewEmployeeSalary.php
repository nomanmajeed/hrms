<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
?>
<!DOCTYPE html>
<html lang="en">
  <!-- HEAD SECTION-->
  <?php  $this->load->view('admin-template/head');?>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-home"></i> <span>Admin!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- SIDE NAVIGATION -->
            <?php  $this->load->view('admin-template/sideNavigation');?>
          </div>
        </div>

        <!-- TOP NAVIGATION-->
        <?php  $this->load->view('admin-template/topNavigation');?>

        <!-- PAGE CONTENT AREA/ DASHBOARD -->
        <?php  $this->load->view("admin/view-employee-roles/viewEmployeeSalary");?>

        <!-- FOOTER -->
        <?php  $this->load->view('admin-template/footer');?>
      </div>
    </div>

    
  </body>
</html>
