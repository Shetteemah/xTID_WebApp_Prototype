
<!-- head section start -->
<?php $this->load->view('home/head'); ?>
<!-- head section end -->

<!--content part -->
<div class="container-fluid bg-default h-100">

	
	<div class="row h-100">
<div class="col-md-4 offset-md-4 align-self-center">
<div class="card">
<div class="card-body">
<div class="logodiv text-center">
<img src="/assets/home/img/logo.png" height="100" width="100" class="img-fluid text-center" alt="">
</div>
<form method="post" id="loginForm">
<div class="form-group">
<label for="username" class="font-weight-bold"><?php echo $this->lang->line(1); ?></label>
<input type="text" name="username" id="username" class="form-control br0">
</div>
<div class="form-group">
<label for="username" class="font-weight-bold"><?php echo $this->lang->line(3); ?></label>
<input type="password" name="pass" id="pass" class="form-control br0">
</div>
<div class="form-group text-center">
<button class="btn btn-primary br0 font16 pl-5 pr-5" type="button" id="loginBtn"><?php echo $this->lang->line(4); ?></button>
<p class="pt-2"><a href="/signup" class="text-primary"><?php echo $this->lang->line(5); ?></a></p>
</div>
<div class="form-group">
<div class="res text-center">
</div>
</div>
</form>
</div>
</div>
</div>
</div>
	
	
	
</div>
<!--content part end-->



<!--footer part -->
<?php $this->load->view('home/head'); ?>
<!--footer part end -->