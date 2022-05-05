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
            <h1 class="m-0">Employee Details</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Home</a></li>
              <li class="breadcrumb-item active">Employee Details</li>
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
              <h3 class="card-title">Employee Details</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
			 <form action="/admin/addempapi" method="post">
            <div class="card-body" style="display: block;">
				
                <?php if(isset($row->id) and !empty($row->id)){ ?>
				<input type="hidden" name="id" value="<?php echo $row->id; ?>">
				<?php } ?>
			
				 <div class="form-group">
                <label for="inputName">Username</label>
                <input type="text" name="uname" value="<?php echo (!empty($row->staff_username)) ? $row->staff_username : '' ?>" required id="uname" class="form-control">
              </div>
			  <div class="form-group">
                <label for="inputName">Password</label>
                <input type="text" value="<?php echo (!empty($row->staff_username)) ? $row->staff_username : '' ?>" name="pass" id="upass" class="form-control">
              </div>
				 <div class="form-group">
                <label for="inputName">Role</label>
                <select name="role" id="" class="form-control">
				 	<option value="1" <?php echo (!empty($row->staff_role) and $row->staff_role == 1) ? 'selected' : '' ?>>Admin</option>
				 <option value="0" <?php echo (isset($row->staff_role) and $row->staff_role == 0) ? 'selected' : '' ?>>Manager</option>
				 </select>
              </div>
			 <div class="form-group">
                <label for="inputName">Status</label>
                <select name="status" id="" class="form-control">
				 	<option value="1" <?php echo (!empty($row->staff_status) and $row->staff_status == 1) ? 'selected' : '' ?>>Active</option>
				 <option value="0" <?php echo (isset($row->staff_status) and $row->staff_status == 0) ? 'selected' : '' ?>>Inactive</option>
				 </select>
              </div>
				
				 <div class="form-group">
               <button class="btn btn-success" type="submit">Submit</button>
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