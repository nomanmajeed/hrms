<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>View Employees Salary</h3>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Employee Salary Details <small>sub-title</small></h2>
                    
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
                    <table id="datatable-fixed-header" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Employee Id</th>
                          <th>Employee Name</th>
                          <th>Employee Email</th>
                          <th>Gender</th>
                          <th>Bank Name</th>
                          <th>Branch No.</th>
                          <th>Branch Address</th>
                          <th>Account No.</th>
                          <th>Designation</th>
                          <th>Department</th>
                          <th>Total Salary</th>
                          <th>Basic Salary</th>
                          <th>Travelling Allounce</th>
                          <th>House Allounce</th>
                          <th>Medical Allounce</th>
                          <th>Lunch Allounce</th>
                          <th>Actions</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                        foreach ($user->result() as $user): 
                      ?>
                        <tr>
                          <td><?php echo $user->user_id; ?></td>
                          <td><?php echo $user->user_name; ?></td>
                          <td><?php echo $user->user_email; ?></td>
                          <td><?php echo $user->user_gender; ?></td>
                          <td><?php echo $user->bank_name; ?></td>
                          <td><?php echo $user->branch_no; ?></td>
                          <td><?php echo $user->branch_name; ?></td>
                          <td><?php echo $user->account_no; ?></td>
                          <td><?php echo $user->designation_name; ?></td>
                          <td><?php echo $user->department_name; ?></td>
                          <td><?php echo $user->total_salary; ?></td>
                          <td><?php echo $user->basic_salary; ?></td>
                          <td><?php echo $user->travelling_allounce; ?></td>
                          <td><?php echo $user->house_allounce; ?></td>
                          <td><?php echo $user->medical_allounce; ?></td>
                          <td><?php echo $user->lunch_allounce; ?></td>
                          <td>
                          <a href="<?php echo base_url(); ?>admin/AdminDashboard/printSalary/<?php echo $user->user_id; ?>">
                            <button class="btn btn-sm btn-success"><i class="fa fa-print"></i></button>
                          </a>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                      </tbody>
                      
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
       