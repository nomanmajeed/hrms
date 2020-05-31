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
              <a class="site_title"><i class="fa fa-home"></i> <span>Admin!</span></a>
              <?php //echo $admin_details['username']; ?>
            </div>

            <div class="clearfix"></div>

            <!-- SIDE NAVIGATION -->
            <?php  $this->load->view('admin-template/sideNavigation');?>
          </div>
        </div>

        <!-- TOP NAVIGATION-->
        <?php  $this->load->view('admin-template/topNavigation');?>
        <!-- top navigation -->
        
        <!-- /top navigation -->

        <!-- PAGE CONTENT AREA/ DASHBOARD -->
        <?php  $this->load->view("admin/".$page);?>

        <!-- FOOTER -->
        <?php  $this->load->view('admin-template/footer');?>
      </div>
    </div>

    <!-- W3School success message alert -->
    <?php include('js.php'); ?>
  </body>
</html>
