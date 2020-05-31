<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Assign Role</h3>
              </div>

            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>User Role <small>sub title</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <?php 
                        if ($success=$this->session->flashdata('success')) {
                    ?>  
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="alert alert-dismissible alert-success">
                            <?php echo $success; ?>
                          </div>
                        </div>
                      </div>

                    <?php    
                        }else if($error=$this->session->flashdata('error')) {
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
                    <form method="post" action="<?php echo base_url(); ?>admin/AdminDashboard/assignRoleValidation"  class="form-horizontal form-label-left">
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">User Id <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" name="user_id"  type="text" placeholder="Enter User Id">
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                            <span class="text-danger"><?php echo form_error('user_id'); ?></span>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Email <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="email" name="email" placeholder="Enter User Email" class="form-control col-md-7 col-xs-12">
                              <span class="fa fa-envelope-o form-control-feedback right" aria-hidden="true"></span>
                            </div>
                            <span class="text-danger"><?php echo form_error('email'); ?></span>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Password <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" name="password"  type="password" placeholder="Enter User Password">
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                            <span class="text-danger"><?php echo form_error('password'); ?></span>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Confirm Password <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" name="confirm_password"  type="password" placeholder="Enter Confirmation Password">
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                            <span class="text-danger"><?php echo form_error('confirm_password'); ?></span>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Role <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="select2_single form-control" name="role" tabindex="-1">
                                  <option disabled selected>Choose your Role</option>
                                  <?php  
                                  foreach ($role->result() as $r){
                                  ?>       
                                  <option value="<?php echo $r->role_id;?>"><?php echo $r->role_name; ?></option>
                                  <?php    
                                  }
                                  ?>
                                </select>
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                            <span class="text-danger"><?php echo form_error('role'); ?></span>
                        </div>          
                      <div class="ln_solid"></div>
                        <div class="form-group">
                          <div class="col-md-6 col-md-offset-3">
                            <button type="reset" class="btn btn-default">Cancel</button>
                            <button type="submit" class="btn btn-success">Submit</button>
                          </div>
                        </div>
                        
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->