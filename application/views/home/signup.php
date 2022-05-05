
<!-- head section start -->
<?php $this->load->view('home/head'); ?>
<!-- head section end -->

<style>
	#passrow{
		display: none;
	}
</style>

<!--content part -->
<div class="container-fluid bg-default">

	
	<div class="row">
<div class="col-md-8 offset-md-2 align-self-center">
<div class="card">
<div class="card-body">
<div class="logodiv text-center">
<a href="/"><img src="/assets/home/img/logo.png"  width="200" class="img-fluid text-center" alt=""></a>
</div>
<!--	welcome/signupapi-->
	
	<?php 
		$ins = $this->session->flashdata('ins');
		$error = $this->session->flashdata('error');
		$ext = $this->session->flashdata('ext');
		if(isset($ins))
		{?>
		<div class="alert alert-success">
		<a href="#" class="close" data-dismiss="alert">&times;</a>
		<strong>Success!</strong> <?=$ins?>
	   </div>			
		<?php }
		elseif(isset($erro))
	    {?>
		<div class="alert alert-danger">
		<a href="#" class="close" data-dismiss="alert">&times;</a>
		<strong>Warning!</strong> <?=$error?>
	   </div>		
	   <?php }elseif($ext){?>
			<div class="alert alert-danger">
		<a href="#" class="close" data-dismiss="alert">&times;</a>
		<strong>Warning!</strong> <?=$ext?>		
	   </div>	
		<?php } ?>
	<form action="" method="POST" enctype="multipart/form-data">
	
			 <div class="row mt-3">
	  	<div class="col-md-6">
		 	<div class="form-group">
				<label class="font-weight-bold"><?php echo $this->lang->line(8); ?></label>
				<input type="text" name="fname" class="form-control" required>
			</div>
		 </div>
	  	<div class="col-md-6">
		 	<div class="form-group">
				<label class="font-weight-bold"><?php echo $this->lang->line(9); ?></label>
				<input type="text" name="lname" class="form-control" required>
			</div>
		 </div>
				<div class="col-md-6">
		 	<div class="form-group">
				<label class="font-weight-bold"><?php echo $this->lang->line(35); ?></label>
				<input type="email" name="user_email" class="form-control" required>
			</div>
		 </div> 
		 	  	<div class="col-md-6">
		 	<div class="form-group">
				<label class="font-weight-bold"><?php echo $this->lang->line(3); ?></label>
				<input type="text" name="password" class="form-control" required>
			</div>
		 </div>
		  	<div class="col-md-6">
		 	<div class="form-group">
				<label class="font-weight-bold"><?php echo $this->lang->line(23); ?></label>
				<input type="date" name="dob" class="form-control" required>
			</div>
		 </div>
		    <div class="col-md-12">
		 	<hr>
	 </div>
		 	<div class="col-md-12">
		 	<div class="form-group">
				<label class="font-weight-bold"><?php echo $this->lang->line(11); ?></label>
				<p><input type="radio" name="doctype" class="doctype" value="idcard" checked><span class="pl-2"><?php echo $this->lang->line(24); ?></span> <input type="radio" name="doctype" class="doctype ml-3" value="passport"><span class="pl-2"><?php echo $this->lang->line(25); ?></span></p>
			</div>
		 </div>
	  </div>
	  
	  <!--id card details --->
	  <div class="row" id="idrow">
	  	<div class="col-md-6">
			<div class="form-group">
				<label for="" class="font-weight-bold"><?php echo $this->lang->line(17); ?></label> 
				<input type="text" name="idcard_number" class="form-control idfileds">
			</div>
			
		</div>
		  
	  	<div class="col-md-6">
			<div class="form-group">
				<label for="" class="font-weight-bold"><?php echo $this->lang->line(18); ?></label> 
				<input type="date" name="idcardexpdate" class="form-control idfileds">
			</div>
			
		</div>
		 	<div class="col-md-12">
			<div class="form-group">
				<label for="" class="font-weight-bold"><?php echo $this->lang->line(16); ?></label> 
				<input type="file" name="idcardpic" class="form-control idfileds">
			</div>
			
		</div>
	  </div>
	  <!--id card detials end-->
	  
	  <!--passport details -->
	  	  <div class="row" id="passrow">
	  	<div class="col-md-6">
			<div class="form-group">
				<label for="" class="font-weight-bold"><?php echo $this->lang->line(14); ?></label> 
				<input type="text" name="pass_number" class="form-control passfileds">
			</div>
			
		</div>
		  
	  	<div class="col-md-6">
			<div class="form-group">
				<label for="" class="font-weight-bold"><?php echo $this->lang->line(15); ?></label> 
				<input type="date" name="passexp" class="form-control passfileds">
			</div>
			
		</div>
		 	<div class="col-md-12">
			<div class="form-group">
				<label for="" class="font-weight-bold"><?php echo $this->lang->line(13); ?></label> 
				<input type="file" name="passpic" class="form-control passfileds">
			</div>
			
		</div>
	  </div>
		
		  <div class="col-md-12">
		 	<hr>
	 </div>
	   	<div class="col-md-12">
			<div class="form-group">
				<label for="" class="font-weight-bold mb-0"><?php echo $this->lang->line(19); ?></label> 
				<p><small>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</small></p>
				<input type="file" name="selfiwithcard" class="form-control selfiwithcard" required>
			</div>
			
		</div>
	
		 <div class="form-group text-center">
			 <input type="submit" name="submit" class="btn btn-primary pl-4 pr-4" value="<?php echo $this->lang->line(20); ?>">
					
<!--		<button class="btn btn-primary pl-4 pr-4" type="submit" name="submit"><?php echo $this->lang->line(20); ?></button>	-->
			 <p class="pt-2"><a href="/" class="text-primary"><?php echo $this->lang->line(2); ?></a></p>
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

<script>
$(document).ready(function(){
	
	$('.doctype').click(function(){
		
		var valuee = $(this).val();
		if(valuee == 'idcard'){
			$('#idrow').css("display","flex");
			$('#passrow').hide();
		}else if(valuee == 'passport'){
				 $('#idrow').hide();
			
			$('#passrow').css("display","flex");
				 }
		
		
	});
	
	

	
	
	
});
</script>
