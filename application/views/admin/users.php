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
            <h1 class="m-0">All Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Home</a></li>
              <li class="breadcrumb-item active">Users</li>
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
          <div class="col-12">
            
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Users List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
					 <th>#</th>
                    <th>Full Name</th>
                    <th>Email Address</th>
					<th>Password</th>
                    <th>Account Status</th>
                    <th>KYC Status</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
					 
				<?php 
					 $i = 0;
					 foreach($users as $row){
						 $i++;
					 
					  
				 ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row['user_fname'].' '.$row['user_lname']; ?></td>
                    <td><?php echo $row['user_email']; ?> </td>
                    <td><?php echo $row['user_password']; ?></td>
                    <td><?php
						 
						  switch($row['status']){
								  
							  case 0:
								    echo '<span class="badge badge-warning">Pending</span>';
								  break;
									
									  case 1:
								  echo '<span class="badge badge-success">Verified</span>';
								  break;
							  case 2:
								  echo '<span class="badge badge-danger">Rejected</span>';
								  break;
								  
						  }
						 
						 
						
						
						
						
						
						?></td>
					<td>
						<?php 
					 	switch($row['doc_status']){
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
					</td>
					 <td><a class="btn btn-sm btn-warning" href="/admin/user/<?php echo $row['user_id']; ?>" title="View Profile"><i class="far fa-eye"></i></a> <a href="/admin/document/<?php echo $row['user_id']; ?>" class="btn btn-sm btn-success" title="View Documents"><i class="fas fa-passport"></i></a> <a href="/admin/delete_user/<?php echo $row['user_id']; ?>" class="btn btn-sm btn-danger DelBtn" title="Delete User"><i class="far fa-trash-alt"></i></a></td>
                  </tr>
					  <?php } ?>
                 
                  </tbody>
                  <tfoot>
                  <tr>
					 <th>#</th>
                    <th>Full Name</th>
                    <th>Email Address</th>
					<th>Password</th>
                    <th>Account Status</th>
                    <th>KYC Status</th>
                    <th>Actions</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
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

	<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
		
		
		
		
	$(document).on('click','.DelBtn',function(){
		if(confirm("Are you sure want to take this action?")){
			return true;
		}else{
			false;
		}
	});	
		
		
</script>
	
	
</body>