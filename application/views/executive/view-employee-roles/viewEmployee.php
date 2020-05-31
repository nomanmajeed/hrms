<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>View Employee</h3>
              </div>
              
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Employee Details <small>sub-title</small></h2>
                    
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
                          <th>Employee Cnic#</th>
                          <th>Employee Email</th>
                          <th>Employee Mobile#</th>
                          <th>Employee Address</th>
                          <th>Employee City</th>
                          <th>Employee Country</th>
                          <th>Employee Gender</th>
                          <th>Employee DOB</th>
                          <th>Degree Level</th>
                          <th>Degree Title</th>
                          <th>Major Subjects</th>
                          <th>College</th>
                          <th>College Grade</th>
                          <th>Bank Name</th>
                          <th>Branch No.</th>
                          <th>Branch Address</th>
                          <th>Account No.</th>
                          <th>Designation</th>
                          <th>Project </th>
                          <th>Department</th>
                          <th>Location</th>
                          <th>Salary</th>
                          <th>Hiring Date</th>
                          
                          
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                        foreach ($user->result() as $user): 
                      ?>
                        <tr>
                          <td><?php echo $user->user_id; ?></td>
                          <td><?php echo $user->user_name; ?></td>
                          <td><?php echo $user->user_cnic; ?></td>
                          <td><?php echo $user->user_email; ?></td>
                          <td><?php echo $user->user_phone; ?></td>
                          <td><?php echo $user->user_address; ?></td>
                          <td><?php echo $user->city_name; ?></td>
                          <td><?php echo $user->country_name; ?></td>
                          <td><?php echo $user->user_gender; ?></td>
                          <td><?php echo $user->user_dob; ?></td>
                          <td><?php echo $user->degree_level; ?></td>
                          <td><?php echo $user->degree_title; ?></td>
                          <td><?php echo $user->major_subjects; ?></td>
                          <td><?php echo $user->college_name; ?></td>
                          <td><?php echo $user->grade; ?></td>
                          <td><?php echo $user->bank_name; ?></td>
                          <td><?php echo $user->branch_no; ?></td>
                          <td><?php echo $user->branch_name; ?></td>
                          <td><?php echo $user->account_no; ?></td>
                          <td><?php echo $user->designation_name; ?></td>
                          <td><?php echo $user->project_name; ?></td>
                          <td><?php echo $user->department_name; ?></td>
                          <td><?php echo $user->location_name; ?></td>
                          <td><?php echo $user->total_salary; ?></td>
                          <td><?php echo $user->user_date_hire; ?></td>
                          
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
       