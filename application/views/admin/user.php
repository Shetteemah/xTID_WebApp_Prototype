<?php $this->load->view('admin/head'); ?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="/assets/admin/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <?php $this->load->view('admin/topbar'); ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php $this->load->view('admin/sidebar'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">User Details</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Home</a></li>
              <li class="breadcrumb-item active">User Details</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
			<div class="row">
				
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Personal Details</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body" style="display: block;">
				
				
				   <div class="form-group">
                <label for="inputName">Account Status</label>
                <p>
						<?php 
					 	switch($row->status){
							case 0:
								echo '<span class="badge badge-warning">Pending</span>';
								break;
							case 1:
								echo '<span class="badge badge-success">Approved</span>';
								break;
							case 2:
								echo '<span class="badge badge-danger">Rejected</span>';
								break;
						}
					 
					 
					     ?>
				</p>
              </div>
				
              <div class="form-group">
                <label for="inputName">Full Name</label>
                <p><?php echo $row->user_fname.' '.$row->user_lname; ?></p>
              </div>
			
				
				
				
				
			 <div class="form-group">
                <label for="inputName">Email Address</label>
                <p>
					
					<?php echo $row->user_email; ?>
				 
				 
				 
				 </p>
              </div>
				<div class="form-group">
                <label for="inputName">Password</label>
                <p><?php echo $row->user_password; ?></span></p>
              </div>
			
			   <div class="form-group">
                <label for="inputName">DOB</label>
                <p><?php echo $row->dob; ?></p>
              </div>
			
			  <div class="form-group">
                <label for="inputName">Document Type</label>
                <p><?php echo $row->typeofcard; ?></p>
              </div>
			
			
			<?php if($row->typeofcard == 'passport'){ ?>
			
			
				 <div class="form-group">
                <label for="inputName">File Download</label>
                <p><a href="<?php echo base_url('documents/'.$row->passportfile); ?>">Click here to download</a></p>
              </div>
			 <div class="form-group">
                <label for="inputName">Passport Number</label>
                <p><?php echo $row->passportnumber; ?></p>
              </div>
			 <div class="form-group">
                <label for="inputName">Passport Expiry Date</label>
                <p><?php echo $row->passportexp; ?></p>
              </div>
			<?php } ?>
			
			
						<?php if($row->typeofcard == 'idcard'){ ?>
			
			
				 <div class="form-group">
                <label for="inputName">File Download</label>
                <p><a href="<?php echo base_url('documents/'.$row->idcardfile); ?>">Click here to download</a></p>
              </div>
			 <div class="form-group">
                <label for="inputName">IdCard Number</label>
                <p><?php echo $row->idcardnumber; ?></p>
              </div>
			 <div class="form-group">
                <label for="inputName">Card Expiry Date</label>
                <p><?php echo $row->idcardexp; ?></p>
              </div>
			<?php } ?>
			
			
				 <div class="form-group">
                <label for="inputName">Selfi with Card</label>
               <p><a href="<?php echo base_url('documents/'.$row->selftwithcard); ?>">Click here to download</a></p>
              </div>
              
              
              
              
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-12">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">More Details</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body" style="display: block;">
					<form action="/admin/updateaccountstatus" method="post">
              <div class="form-group">
                <label for="inputEstimatedBudget">Account Status</label>
               
				  <select class="form-control" name="status">
					  <option value="0" <?php echo ($row->status == 0) ? 'selected' : '' ?>>Pending</option>
					  <option value="1" <?php echo ($row->status == 1) ? 'selected' : '' ?>>Accepted</option>
					  <option value="2" <?php echo ($row->status == 2) ? 'selected' : '' ?>>Rejected</option>
				  </select>
              </div>
			
              <div class="form-group">
                <label for="inputSpentBudget">Message For User</label>
                <input type="hidden" name="userid" value="<?php echo $row->user_id; ?>">
				  <textarea class="form-control"  rows="4" name="message"><?php echo $row->usermessage; ?></textarea>
              </div>
              <div class="form-group">
               <button class="btn btn-success" type="submit">Update Status</button>
              </div>
            </div>
			</form>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php $this->load->view('admin/footer'); ?>
</div>
<!-- ./wrapper -->


<?php $this->load->view('admin/scripts'); ?>

	
	
	
</body>