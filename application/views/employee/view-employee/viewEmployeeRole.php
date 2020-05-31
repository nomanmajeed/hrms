<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>View Employee Role</h3>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Employee Role Details <small>sub-title</small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                    <table id="datatable-fixed-header" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th scope="col" colspan="4" style="color: green" ><h2 align="center">Employee Details</h2></th>
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
                          <td style="color: black"><b>Department:</b></td>
                          <td><?php echo $user->department_name; ?></td>
                          <td style="color: black"><b>Designation:</b></td>
                          <td><?php echo $user->designation_name; ?></td>
                        </tr>
                        <tr>
                          <td style="color: black"><b>Project:</b></td>
                          <td><?php echo $user->project_name; ?></td>
                          <td style="color: black"><b>Location:</b></td>
                          <td><?php echo $user->location_name; ?></td>
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
       