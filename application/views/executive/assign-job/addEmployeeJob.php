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
                    <h2>Job Details <small>sub title</small></h2>
                    
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
                    <form method="post" action="<?php echo base_url(); ?>executive/ExecutiveDashboard/addEmployeeJobValidation" class="form-horizontal form-label-left">
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Designation <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="select2_single form-control" name="designation" tabindex="-1">
                                <option disabled selected>Designation</option>
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
                                <option disabled selected>Choose your Department</option>
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
                                <option disabled selected>Choose your Project</option>
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
                                <option disabled selected>Choose your Project Location</option>
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
                                  <input type="text" name="date_hire" class="form-control">
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
                                <input class="form-control col-md-7 col-xs-12" name="salary" placeholder="Salary" type="text">
                                <span class="fa fa-money form-control-feedback right" aria-hidden="true"></span>
                            </div>
                            <span class="text-danger"><?php echo form_error('salary'); ?></span>
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