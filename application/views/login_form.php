<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="<?php echo base_url(); ?>">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>HR Solution </title>

    <!-- Bootstrap -->
    <link href="assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="assets/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="assets/build/css/custom.min.css" rel="stylesheet">
    
  </head>

  <body class="login" style="color:teal">
    <div>
      
      <?php
        if ($error=$this->session->flashdata('error')) {
      ?>  
          <div class="row">
            <div class="col-lg-12">
              <div class="alert alert-dismissible alert-danger">
                <?php echo $error; ?>
              </div>
            </div>
          </div>

      <?php    
        }
      ?>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form  method="post" action="<?php echo base_url(); ?>LoginDashboard/loginValidation">
              <h1>Login Form</h1>
              <div>
                <input type="text" class="form-control" name="user_email" placeholder="User Email">
                <span class="text-danger"><?php echo form_error('user_email'); ?></span>
              </div>
              
              <div>
                <input type="password" class="form-control" name="user_password" placeholder="User Password">
                <span class="text-danger"><?php echo form_error('user_password'); ?></span>
              </div>
              
              <div>
                <select class="select2_single form-control" name="user_role" tabindex="-1">
                  <option disabled selected>Choose your Role</option>
                  <option value='Admin'>Admin</option>
                  <option value='Executive'>Executive</option>
                  <option value='1'>Employee</option>
                </select>
                <span class="text-danger"><?php echo form_error('user_role'); ?></span>
              </div>

              <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-1 col-md-offset-4">
                    <button type="submit" class="btn btn-success" name="login">Login</button>
                  </div>
                  <a class="reset_pass" href="#">Lost your password?</a>
                </div>
              <div>
                
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-home"></i> HR Solutions!</h1>
                  <p>©2020 All Rights Reserved. HR Solutions Company!</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
