<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      
		
		<img src="/assets/home/img/fav.png" class="img-fluid brand-image img-circle elevation-3"  style="opacity: .8">
		
      <span class="brand-text font-weight-light">XTID Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/assets/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo ($this->session->role == 1) ? 'Admin' : 'Manager' ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
     

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="/admin" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
               
              </p>
            </a>

            
          </li>
			
			
			
          <li class="nav-item">
            <a href="/admin/users" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
                <span class="right badge badge-success"><?php echo $this->db->get('users')->num_rows(); ?></span>
              </p>
            </a>
          </li>
			
		 <li class="nav-item">
            <a href="/admin/documents" class="nav-link">
              <i class="nav-icon fas fa-passport"></i>
              <p>
                Documents
                <span class="right badge badge-success"><?php echo $this->db->get('documents')->num_rows(); ?></span>
              </p>
            </a>
          </li>
			
			
		<?php 
			if($this->session->role == 1){
		 ?>
		 <li class="nav-item">
            <a href="/admin/staff" class="nav-link">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>
                Staff Members
                <span class="right badge badge-success"><?php echo $this->db->get('staff')->num_rows(); ?></span>
              </p>
            </a>
          </li>
			<?php } ?>
			 <li class="nav-item bg-danger">
            <a href="/logout" class="nav-link">
             
			<i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
                
              </p>
            </a>
          </li>
		
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>