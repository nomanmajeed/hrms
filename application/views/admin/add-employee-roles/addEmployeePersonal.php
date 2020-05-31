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
                    <h2>Personal Information <small>sub title</small></h2>
                    
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
                    <form method="post" action="<?php echo base_url(); ?>admin/AdminDashboard/addEmployeePersonalValidation" enctype="multipart/form-data" class="form-horizontal form-label-left">
                        
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Profile Image <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="file" name="profile_image"  col-xs-12">
                            </div>
                            <span class="text-danger"><?php if(isset($error_upload)) echo $error_upload; ?></span>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Full Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input class="form-control col-md-7 col-xs-12"  name="fname" placeholder="e.g Noman Majeed" type="text" value="<?php echo set_value('fname'); ?>">
                              <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                            <span class="text-danger"><?php echo form_error('fname'); ?></span>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Cnic <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input name="cnic" class="form-control col-md-7 col-xs-12" type="text"  data-inputmask="'mask': '99999-9999999-9'" value="<?php echo set_value('cnic'); ?>">
                              <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                            <span class="text-danger"><?php echo form_error('cnic'); ?></span>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Email <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="email" name="email" placeholder="e.g abc@abc.com" class="form-control col-md-7 col-xs-12" value="<?php echo set_value('email'); ?>">
                              <span class="fa fa-envelope-o form-control-feedback right" aria-hidden="true"></span>
                            </div>
                            <span class="text-danger"><?php echo form_error('email'); ?></span>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Confirm Email <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="email" name="confirm_email" placeholder="e.g abc@abc.com" class="form-control col-md-7 col-xs-12" value="<?php echo set_value('confirm_email'); ?>">
                              <span class="fa fa-envelope-o form-control-feedback right" aria-hidden="true"></span>
                            </div>
                            <span class="text-danger"><?php echo form_error('confirm_email'); ?></span>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Mobile <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="tel" name="mobile" placeholder="e.g 03xxxxxxxxx" class="form-control col-md-7 col-xs-12" value="<?php echo set_value('mobile'); ?>">
                              <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                            </div>
                            <span class="text-danger"><?php echo form_error('mobile'); ?></span>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Country</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="select2_single form-control" name="country" tabindex="-1">
                                <option disabled selected>Choose your Country</option>
                                <?php  
                                foreach ($country->result() as $c){
                                ?>       
                                <option value="<?php echo $c->country_id;?>"<?php echo set_select('country',$c->country_id); ?>><?php echo $c->country_name; ?></option>
                                <?php    
                                }
                                ?>
                              </select>
                              <span class="fa fa-globe form-control-feedback right" aria-hidden="true"></span>
                            </div>
                            <span class="text-danger"><?php echo form_error('country'); ?></span>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">City <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="select2_single form-control" name="city" tabindex="-1">
                                <option disabled selected>Choose your City</option>
                                <?php  
                                foreach ($city->result() as $city){
                                ?>       
                                <option value="<?php echo $city->city_id;?>"<?php echo set_select('city',$city->city_id); ?>><?php echo $city->city_name; ?></option>
                                <?php    
                                }
                                ?>
                              </select>
                              <span class="fa fa-globe form-control-feedback right" aria-hidden="true"></span>
                            </div>
                            <span class="text-danger"><?php echo form_error('city'); ?></span>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Address <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <textarea name="address" placeholder="Postal Address" class="form-control col-md-7 col-xs-12" ><?php echo set_value('address'); ?></textarea>
                            </div>
                            <span class="text-danger"><?php echo form_error('address'); ?></span>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Date of Birth</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input class="form-control col-md-7 col-xs-12" name="dob" placeholder="e.g 12/11/1995" type="text" value="<?php echo set_value('dob'); ?>">
                              <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                            </div>
                            <span class="text-danger"><?php echo form_error('dob'); ?></span>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              	<div class="btn-group" data-toggle="buttons">
                                	<label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                  	<input type="radio" name="gender" value="male" data-parsley-multiple="gender" <?php //echo set_radio('gender', 'male', TRUE); ?>> &nbsp; Male &nbsp;
                                	</label>
                                	<label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                  	<input type="radio" name="gender" value="female" data-parsley-multiple="gender" <?php //echo set_radio('gender', 'female'); ?>> Female
                                	</label>
                                </div>
                            </div>
                            <span class="text-danger"><?php echo form_error('gender'); ?></span>
                        </div>
                      	<div class="ln_solid"></div>
                      	<div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="reset" class="btn btn-default">Cancel</button>
                          <button type="submit" name="save" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                      
                      
                    </form>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <form method="post" action="<?php echo base_url(); ?>admin/AdminDashboard/addEmployeeQualification" enctype="multipart/form-data" class="form-horizontal form-label-left">
                        <div >
                          <button type="submit" name="next" class="btn pull-right btn-primary" >Next</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->