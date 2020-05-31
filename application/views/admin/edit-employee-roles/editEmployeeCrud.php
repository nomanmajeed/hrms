<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Edit Employee Record</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                              <button class="btn btn-default" type="button">Go!</button>
                          </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
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
                    <form method="post" action="<?php echo base_url(); ?>admin/AdminDashboard/editEmployeeCrudValidation" class="form-horizontal form-label-left">
                      <h2 style="color: green">Edit Personal Information <small>sub title</small></h2>
                      <div class="ln_solid"></div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">User Id <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input class="form-control col-md-7 col-xs-12"  name="user_id" type="text" value="<?php echo $details->user_id; ?>" readonly>  
                              <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                            <span class="text-danger"><?php echo form_error('user_id'); ?></span>
                      </div>
                      <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Full Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input class="form-control col-md-7 col-xs-12"  name="fname" placeholder="e.g Noman Majeed" type="text" value="<?php echo $details->user_name; ?>">
                              <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                            <span class="text-danger"><?php echo form_error('fname'); ?></span>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Cnic <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input name="cnic" class="form-control col-md-7 col-xs-12" type="text"  data-inputmask="'mask': '99999-9999999-9'" value="<?php echo $details->user_cnic; ?>">
                              <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                            <span class="text-danger"><?php echo form_error('cnic'); ?></span>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Email <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="email" name="email" placeholder="e.g abc@abc.com" class="form-control col-md-7 col-xs-12" value="<?php echo $details->user_email; ?>">
                              <span class="fa fa-envelope-o form-control-feedback right" aria-hidden="true"></span>
                            </div>
                            <span class="text-danger"><?php echo form_error('email'); ?></span>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Confirm Email <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="email" name="confirm_email" placeholder="e.g abc@abc.com" class="form-control col-md-7 col-xs-12" value="<?php echo $details->user_email; ?>">
                              <span class="fa fa-envelope-o form-control-feedback right" aria-hidden="true"></span>
                            </div>
                            <span class="text-danger"><?php echo form_error('confirm_email'); ?></span>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Mobile <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="tel" name="mobile" placeholder="e.g 03xxxxxxxxx" class="form-control col-md-7 col-xs-12" value="<?php echo $details->user_phone; ?>">
                              <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                            </div>
                            <span class="text-danger"><?php echo form_error('mobile'); ?></span>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Country</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="select2_single form-control" name="country" tabindex="-1">
                                <option value="<?php echo $details->country_id;?>"><?php echo $details->country_name; ?></option>
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
                                <option value="<?php echo $details->city_id;?>"><?php echo $details->city_name; ?></option>
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
                              <textarea name="address" placeholder="Postal Address" class="form-control col-md-7 col-xs-12" ><?php echo $details->user_address; ?></textarea>
                            </div>
                            <span class="text-danger"><?php echo form_error('address'); ?></span>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Date of Birth</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input class="form-control col-md-7 col-xs-12" name="dob" placeholder="e.g 12/11/1995" type="text" value="<?php echo $details->user_dob; ?>">
                              <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                            </div>
                            <span class="text-danger"><?php echo form_error('dob'); ?></span>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="select2_single form-control" name="gender" tabindex="-1">
                                <option><?php echo $details->user_gender; ?></option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                              </select>
                              <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                            <span class="text-danger"><?php echo form_error('gender'); ?></span>
                        </div>
                        <br>
                        <br>
                        <h2 style="color: green">Edit Qualification Details <small>sub title</small></h2>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Degree Level</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="select2_single form-control" name="degree_level" tabindex="-1">
                                    <option><?php echo $details->degree_level; ?></option>
                                    <option>SSC</option>
                                    <option>HSSC</option>
                                    <option>Bachelor</option>
                                    <option>Masters</option>
                                    <option>Doctoral</option>
                                </select>
                                <span class="fa fa-graduation-cap form-control-feedback right" aria-hidden="true"></span>
                            </div>
                            <span class="text-danger"><?php echo form_error('degree_level'); ?></span>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Degree Title <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" name="degree_title" placeholder="Degree Title" type="text" value="<?php echo $details->degree_title; ?>">
                                <span class="fa fa-graduation-cap form-control-feedback right" aria-hidden="true"></span>
                            </div>
                            <span class="text-danger"><?php echo form_error('degree_title'); ?></span>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Major subjects <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <textarea  name="major_subjects" class="form-control col-md-7 col-xs-12"><?php echo $details->major_subjects; ?></textarea>
                            </div>
                            <span class="text-danger"><?php echo form_error('major_subjects'); ?></span>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">College <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" name="college" placeholder="College" type="text" value="<?php echo $details->college_name; ?>">
                                <span class="fa fa-university form-control-feedback right" aria-hidden="true"></span>
                            </div>
                            <span class="text-danger"><?php echo form_error('college'); ?></span>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Date Enrolled</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" name="date_enrolled" class="form-control" data-inputmask="'mask': '99/99/9999'" value="<?php echo $details->date_enrollment; ?>">
                              <span class="fa fa-calendar-o form-control-feedback right" aria-hidden="true"></span>
                            </div>
                            <span class="text-danger"><?php echo form_error('date_enrolled'); ?></span>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Date Completion</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" name="date_completion" class="form-control" data-inputmask="'mask': '99/99/9999'" value="<?php echo $details->date_completion; ?>">
                              <span class="fa fa-calendar-o form-control-feedback right" aria-hidden="true"></span>
                            </div>
                            <span class="text-danger"><?php echo form_error('date_completion'); ?></span>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Grade <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="select2_single form-control" name="grade" tabindex="-1">
                                    <option><?php echo $details->grade; ?></option>
                                    <option>A</option>
                                    <option>A-</option>
                                    <option>B</option>
                                    <option>C</option>
                                    <option>D</option>
                                    <option>F</option>
                                </select>
                                <span class="fa fa-graduation-cap form-control-feedback right" aria-hidden="true"></span>
                            </div>
                            <span class="text-danger"><?php echo form_error('grade'); ?></span>
                        </div>
                        <br>
                        <br>
                        <h2 style="color: green">Edit Bank Details <small>sub title</small></h2>
                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Bank Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" name="bank_name" placeholder="Bank Name" type="text" value="<?php echo $details->bank_name; ?>">
                                <span class="fa fa-university form-control-feedback right" aria-hidden="true"></span>
                            </div>
                            <span class="text-danger"><?php echo form_error('bank_name'); ?></span>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Branch No. <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="tel" name="branch_no" placeholder="Branch No." class="form-control col-md-7 col-xs-12" value="<?php echo $details->branch_no; ?>">
                              <span class="fa fa-university form-control-feedback right" aria-hidden="true"></span>
                            </div>
                            <span class="text-danger"><?php echo form_error('branch_no'); ?></span>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Branch Address <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <textarea name="branch_address" class="form-control col-md-7 col-xs-12"><?php echo $details->branch_name; ?></textarea>
                              <span class="fa fa-university form-control-feedback right" aria-hidden="true"></span>
                            </div>
                            <span class="text-danger"><?php echo form_error('branch_address'); ?></span>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Account No. <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" name="account_no" placeholder="Account No." type="text" value="<?php echo $details->account_no; ?>">
                                <span class="fa fa-university form-control-feedback right" aria-hidden="true"></span>
                            </div>
                            <span class="text-danger"><?php echo form_error('account_no'); ?></span>
                        </div>
                        <br>
                        <br>
                        <h2 style="color: green">Edit Job Details <small>sub title</small></h2>
                        <?php //echo $designation->result(); ?>
                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Designation <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="select2_single form-control" name="designation" tabindex="-1">
                                <option value="<?php echo $details->designation_id;?>><?php echo $details->designation_name; ?></option>
                                <?php  
                                foreach ($designation->result() as $designation){
                                ?>       
                                <option value="<?php echo $designation->designation_id;?>"<?php echo set_select('designation',$designation->designation_id); ?>><?php echo $designation->designation_name; ?></option>
                                <?php    
                                }
                                ?>
                              </select>
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                            <span class="text-danger"><?php echo form_error('designation'); ?></span>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Department</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="select2_single form-control" name="department" tabindex="-1">
                                <option value="<?php echo $details->department_id;?>><?php echo $details->department_name; ?></option>
                                <?php  
                                foreach ($department->result() as $department){
                                ?>       
                                <option value="<?php echo $department->department_id;?>"<?php echo set_select('department',$department->department_id); ?>><?php echo $department->department_name; ?></option>
                                <?php    
                                }
                                ?>
                              </select>
                                <span class="fa fa-university form-control-feedback right" aria-hidden="true"></span>
                            </div>
                            <span class="text-danger"><?php echo form_error('department'); ?></span>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Project <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="select2_single form-control" name="project" tabindex="-1">
                                <option value="<?php echo $details->project_id;?>><?php echo $details->project_name; ?></option>
                                <?php  
                                foreach ($project->result() as $project){
                                ?>       
                                <option value="<?php echo $project->project_id;?>"<?php echo set_select('project',$project->project_id); ?>><?php echo $project->project_name; ?></option>
                                <?php    
                                }
                                ?>
                              </select>
                              <span class="fa fa-briefcase form-control-feedback right" aria-hidden="true"></span>
                            </div>
                            <span class="text-danger"><?php echo form_error('project'); ?></span>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Project Location <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="select2_single form-control" name="location" tabindex="-1">
                                <option value="<?php echo $details->location_id;?>><?php echo $details->location_name; ?></option>
                                <?php  
                                foreach ($location->result() as $location){
                                ?>       
                                <option value="<?php echo $location->location_id;?>"<?php echo set_select('location',$location->location_id); ?>><?php echo $location->location_name; ?></option>
                                <?php    
                                }
                                ?>
                              </select>
                              <span class="fa fa-globe form-control-feedback right" aria-hidden="true"></span>
                            </div>
                            <span class="text-danger"><?php echo form_error('location'); ?></span>
                        </div>
                        <div class="item form-group">
                            <label for="datehire" class="control-label col-md-3 col-sm-3 col-xs-12">Date Hire</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="input-group date" id="myDatepicker2">
                                  <input type="text" name="date_hire" class="form-control" value="<?php echo $details->user_date_hire; ?>">
                                  <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                  </span>
                                </div>
                            </div>
                            <span class="text-danger"><?php echo form_error('date_hire'); ?></span>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Salary <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" name="salary" placeholder="Salary" type="text" value="<?php echo $details->total_salary; ?>">
                                <span class="fa fa-money form-control-feedback right" aria-hidden="true"></span>
                            </div>
                            <span class="text-danger"><?php echo form_error('salary'); ?></span>
                        </div>

                      	<div class="ln_solid"></div>
                      	<div class="form-group">
                          <div class="col-md-6 col-md-offset-3">
                            <button type="reset" class="btn btn-default">Cancel</button>
                            <button type="submit" name="update" class="btn btn-success">Update</button>
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