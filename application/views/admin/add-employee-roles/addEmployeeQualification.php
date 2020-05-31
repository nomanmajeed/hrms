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
                    <h2>Qualification <small>sub title</small></h2>
                    
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
                    <form method="post" action="<?php echo base_url(); ?>admin/AdminDashboard/addEmployeeQualificationValidation" class="form-horizontal form-label-left">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Degree Level</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="select2_single form-control" name="degree_level" tabindex="-1">
                                    <option disabled selected>Choose your Degree Level</option>
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
                                <input class="form-control col-md-7 col-xs-12" name="degree_title" placeholder="Degree Title" type="text">
                                <span class="fa fa-graduation-cap form-control-feedback right" aria-hidden="true"></span>
                            </div>
                            <span class="text-danger"><?php echo form_error('degree_title'); ?></span>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Major subjects <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <textarea  name="major_subjects" class="form-control col-md-7 col-xs-12"></textarea>
                            </div>
                            <span class="text-danger"><?php echo form_error('major_subjects'); ?></span>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">College <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" name="college" placeholder="College" type="text">
                                <span class="fa fa-university form-control-feedback right" aria-hidden="true"></span>
                            </div>
                            <span class="text-danger"><?php echo form_error('college'); ?></span>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Date Enrolled</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" name="date_enrolled" class="form-control" data-inputmask="'mask': '99/99/9999'">
                              <span class="fa fa-calendar-o form-control-feedback right" aria-hidden="true"></span>
                            </div>
                            <span class="text-danger"><?php echo form_error('date_enrolled'); ?></span>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Date Completion</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" name="date_completion" class="form-control" data-inputmask="'mask': '99/99/9999'">
                              <span class="fa fa-calendar-o form-control-feedback right" aria-hidden="true"></span>
                            </div>
                            <span class="text-danger"><?php echo form_error('date_completion'); ?></span>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Grade <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="select2_single form-control" name="grade" tabindex="-1">
                                    <option disabled selected>Choose your Grade</option>
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
                      <form method="post" action="<?php echo base_url(); ?>admin/AdminDashboard/addEmployeePersonal" enctype="multipart/form-data" class="form-horizontal form-label-left">
                          <button type="submit" name="previous" class="btn  btn-primary" >Previous</button> 
                      </form>
                      <form method="post" action="<?php echo base_url(); ?>admin/AdminDashboard/addEmployeeBank" enctype="multipart/form-data" class="form-horizontal form-label-left">
                          <button type="submit" name="next" class="btn pull-right btn-primary" >Next</button>
                      </form>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->