<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>New Employee Record Entry</h3>
              </div>

            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Bank Details <small>sub title</small></h2>
                    
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
                    <form method="post" action="<?php echo base_url(); ?>admin/AdminDashboard/addEmployeeBankValidation" enctype="multipart/form-data" class="form-horizontal form-label-left">
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Bank Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" name="bank_name" placeholder="Bank Name" type="text">
                                <span class="fa fa-university form-control-feedback right" aria-hidden="true"></span>
                            </div>
                            <span class="text-danger"><?php echo form_error('bank_name'); ?></span>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Branch No. <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="tel" name="branch_no" placeholder="Branch No." class="form-control col-md-7 col-xs-12">
                              <span class="fa fa-university form-control-feedback right" aria-hidden="true"></span>
                            </div>
                            <span class="text-danger"><?php echo form_error('branch_no'); ?></span>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Branch Address
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <textarea name="branch_address" class="form-control col-md-7 col-xs-12"></textarea>
                              <span class="fa fa-university form-control-feedback right" aria-hidden="true"></span>
                            </div>
                            <!--<span class="text-danger"><?php //echo form_error('branch_address'); ?></span> -->
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Account No. <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" name="account_no" placeholder="Account No." type="text">
                                <span class="fa fa-university form-control-feedback right" aria-hidden="true"></span>
                            </div>
                            <span class="text-danger"><?php echo form_error('account_no'); ?></span>
                        </div>
                        
                        
                      	<div class="ln_solid"></div>
                      	<div class="form-group">
                          <div class="col-md-6 col-md-offset-3">
                            <button type="reset" class="btn btn-default">Cancel</button>
                            <button type="submit" class="btn btn-success">Submit</button>
                          </div>
                        </div>
                      
                    </form>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <form method="post" action="<?php echo base_url(); ?>admin/AdminDashboard/addEmployeeQualification" enctype="multipart/form-data" class="form-horizontal form-label-left">
                          <button type="submit" name="previous" class="btn  btn-primary" >Previous</button> 
                      </form>
                      
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->