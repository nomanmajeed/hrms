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
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                    <table id="datatable-fixed-header" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th scope="col" colspan="4" style="color: green" ><h2 align="center">Salary Details</h2></th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                        foreach ($user->result() as $user): 
                      ?>
                        <tr>
                          <td style="color: black"><b>Employee Name:</b></td>
                          <td><?php echo $user->user_name; ?></td>
                          <td style="color: black"><b>Employee Email:</b></td>
                          <td><?php echo $user->user_email; ?></td>
                        </tr>
                        <tr>
                          
                        </tr>
                        <tr>
                          <td style="color: black"><b>Bank Name:</b></td>
                          <td><?php echo $user->bank_name; ?></td>
                          <td style="color: black"><b>Branch Address:</b></td>
                          <td><?php echo $user->branch_name; ?></td>
                        </tr>
                        <tr>
                          <td style="color: black"><b>Branch No.:</b></td>
                          <td><?php echo $user->branch_no; ?></td>
                          <td style="color: black"><b>Account No.:</b></td>
                          <td><?php echo $user->account_no; ?></td>
                        </tr>
                        <tr>
                          <td style="color: black"><b>Designation:</b></td>
                          <td><?php echo $user->designation_name; ?></td>
                          <td style="color: black"><b>Department:</b></td>
                          <td><?php echo $user->department_name; ?></td>
                        </tr>
                        <tr>
                          <td colspan="3" style="color: green">Basic Salary</td>
                          <td style="color: red"><?php echo $user->basic_salary; ?></td>
                        </tr>
                        <tr>
                          <td colspan="3" style="color: green">Travelling Allounce</td>
                          <td style="color: red"><?php echo $user->travelling_allounce; ?></td>
                        </tr>
                        <tr>
                          <td colspan="3" style="color: green">House Allounce</td>
                          <td style="color: red"><?php echo $user->house_allounce; ?></td>
                        </tr>
                        <tr>
                          <td colspan="3" style="color: green">Lunch Allounce</td>
                          <td style="color: red"><?php echo $user->lunch_allounce; ?></td>
                        </tr>
                        <tr>
                          <td colspan="3" style="color: green">Medical Allounce</td>
                          <td style="color: red"><?php echo $user->medical_allounce; ?></td>
                        </tr>
                        <tr>
                          <td colspan="3" style="color: green">Total Salary</td>
                          <td style="color: red"><?php echo $user->total_salary; ?></td>
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
       