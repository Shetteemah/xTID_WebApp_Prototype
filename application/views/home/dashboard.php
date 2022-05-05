
<!-- head section start -->
<?php $this->load->view('home/head'); ?>
<!-- head section end -->
<style>
	#passrow{
		display: none;
	}
	#pRow{
		display: none;
	}
</style>
<!--content part -->
<div class="container">
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><img src="/assets/home/img/logo.png" width="150" class="img-fluid text-center" alt=""></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Dashboard <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-danger font-weight-bold" href="/logout">Logout</a>
      </li>
      
      
    </ul>
   
  </div>
</nav>		
</div>
<div class="container mt-3">


	
<div class="row mt-3">
	<div class="col-md-12">
	 <nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><?php echo $this->lang->line(6); ?></a>
    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><?php echo $this->lang->line(7); ?></a>
   
  </div>
</nav>
<div class="tab-content" id="nav-tabContent mb-3">

	<?php 
	
	     //$this->session->set_userdata($sessionData);
	 $user_id  =$this->session->userid; 
	  $this->db->where('user_id' ,$user_id);
	 $user_data =$this->db->get('users')->row();
//	  echo '<pre>';
//	 print_r($user_data);
//	
	  if($user_data->status == 1){
		  $dis='readonly'; 
	  }else{
		  $dis=''; 
	  }
	
	
	
		?>			
	

	
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
	  
	  
	  <div class="row">
	  	<div class="col-md-12">
		  	
			<?php 
			
				switch($user_data->status){
						
					case 0:
						echo '<div class="alert alert-warning alert-dismissible fade show mt-3 mb-0" role="alert">
  '.$this->lang->line(36).'
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
						break;
						
					
									case 1:
						echo '<div class="alert alert-success alert-dismissible fade show mt-3 mb-0" role="alert">
  '.$user_data->usermessage.'
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
						break;
						
						
						
									case 2:
						echo '<div class="alert alert-danger alert-dismissible fade show mt-3 mb-0" role="alert">
  '.$user_data->usermessage.'
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
						break;
						
						
						
						
						
						
						
						
						
				}
			
			
			
			
			?>
			
			
			
		  </div>
	  </div>
	  
	  
	  
	  
	  <form action="" method="POST" enctype="multipart/form-data">
	 <div class="row mt-3">
		 
	  	<div class="col-md-6">
		 	<div class="form-group">
				<label class="font-weight-bold"><?php echo $this->lang->line(8); ?></label>
				<input type="text" name="fname" class="form-control" <?=$dis?> value="<?=(isset($user_data->user_fname))?$user_data->user_fname:'';?>" required>
			</div>
		 </div>
	  	<div class="col-md-6">
		 	<div class="form-group">
				<label class="font-weight-bold"><?php echo $this->lang->line(9); ?></label>
				<input type="text" name="lname" class="form-control" <?=$dis?> value="<?=(isset($user_data->user_lname))?$user_data->user_lname:'';?>"  required>
			</div>
		 </div>
		 <div class="col-md-6">
		 	<div class="form-group">
				<label class="font-weight-bold"><?php echo $this->lang->line(35); ?></label>
				<input type="email" name="user_email" <?=$dis?> value="<?=(isset($user_data->user_email))?$user_data->user_email:'';?>"  class="form-control" required>
			</div>
		 </div>
		 	  	<div class="col-md-6">
		 	<div class="form-group">
				<label class="font-weight-bold"><?php echo $this->lang->line(3); ?></label>
				<input type="text" name="password" <?=$dis?> value="<?=(isset($user_data->user_password))?$user_data->user_password:'';?>"  class="form-control" required>
			</div>
		 </div>
		  	<div class="col-md-12">
		 	<div class="form-group">
				<label class="font-weight-bold"><?php echo $this->lang->line(23); ?></label>
				<input type="date" name="dob" <?=$dis?> value="<?=(isset($user_data->dob))?$user_data->dob:'';?>"  class="form-control" required>
			</div>
		 </div>
		    <div class="col-md-12">
		 	<hr>
	 </div>
		 	<div class="col-md-12">
		 	<div class="form-group">
				<label class="font-weight-bold"><?php echo $this->lang->line(11); ?></label>
				<p><input type="radio" name="typeofcard" <?=$dis?> class="doctype" value="idcard" <?php if($user_data->typeofcard == 'idcard'){ echo "checked"; }else{ } ?>><span class="pl-2"><?php echo $this->lang->line(24); ?></span> <input type="radio" <?=$dis?> name="typeofcard" class="doctype ml-3" <?php if($user_data->typeofcard == 'passport'){ echo "checked"; }else{ } ?> value="passport"><span class="pl-2"><?php echo $this->lang->line(25); ?></span></p>
			</div>
		 </div>
	  </div>
	  
	  <!--id card details --->
	  <div class="row" id="idrow">
	  	<div class="col-md-6">
			<div class="form-group">
				<label for="" class="font-weight-bold"><?php echo $this->lang->line(17); ?></label> 
				<input type="text" name="idcard_number" <?=$dis?> value="<?=(isset($user_data->idcardnumber))?$user_data->idcardnumber:'';?>" class="form-control idfileds">
			</div>
			
		</div>
		  
	  	<div class="col-md-6">
			<div class="form-group">
				<label for="" class="font-weight-bold"><?php echo $this->lang->line(18); ?></label> 
				<input type="date" name="idcardexpdate" value="<?=(isset($user_data->idcardexp))?$user_data->idcardexp:'';?>" <?=$dis?> class="form-control idfileds">
			</div>
			
		</div>
		 	<div class="col-md-12">
			<div class="form-group">
				<label for="" class="font-weight-bold"><?php echo $this->lang->line(16); ?></label> 
				<input type="file" name="idcardpic"  <?=$dis?> class="form-control idfileds">
			</div>
			
		</div>
	  </div>
	  <!--id card detials end-->
	  
	  <!--passport details -->
	  	  <div class="row" id="passrow">
	  	<div class="col-md-6">
			<div class="form-group">
				<label for="" class="font-weight-bold"><?php echo $this->lang->line(14); ?></label> 
				<input type="text" name="passportnumber" value="<?=(isset($user_data->passportnumber))?$user_data->passportnumber:'';?>"  <?=$dis?> class="form-control passfileds">
			</div>
			
		</div>
		  
	  	<div class="col-md-6">
			<div class="form-group">
				<label for="" class="font-weight-bold"><?php echo $this->lang->line(15); ?></label> 
				<input type="date" name="passportexp" value="<?=(isset($user_data->passportexp))?$user_data->passportexp:'';?>"  <?=$dis?> class="form-control passfileds">
			</div>
			
		</div>
		 	<div class="col-md-12">
			<div class="form-group">
				<label for="" class="font-weight-bold"><?php echo $this->lang->line(13); ?></label> 
				<input type="file" name="passpic"  <?=$dis?> class="form-control passfileds">
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
				<input type="file" name="selfiwithcard" <?=$dis?> class="form-control selfiwithcard">
			</div>
			
		</div>
	  <!--passport detail end-->
	  <div class="form-group text-center">
		<button class="btn btn-primary pl-4 pr-4" name="submit" type="submit" <?=$dis?>><?php echo $this->lang->line(20); ?></button>	  
	  </div>
	</form>
	  
	  
	  
  </div>
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
	
	  <!--document verification -->
	   <!-- data from document for userpanel-->
		<?php 
		  $this->db->where('doc_user_id' ,$this->session->userid);
		  $dd = $this->db->get('documents')->row();
		 if(isset($dd->doc_status) && $dd->doc_status == 1){
			 $dis2 ='readonly';
			 $button = FALSE;
		 }else{
			 $dis2='';
			 $button = TRUE;
		 }
		 
		  ?> 
	  
	  
	  
	  
	    <div class="row">
	  	<div class="col-md-12">
		  	
			<?php 
			if(isset($dd->doc_status)){
				switch($dd->doc_status){
						
					case 0:
						echo '<div class="alert alert-warning alert-dismissible fade show mt-3 mb-0" role="alert">
  '.$this->lang->line(37).'
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
						break;
						
					
									case 1:
						echo '<div class="alert alert-success alert-dismissible fade show mt-3 mb-0" role="alert">
  '.$dd->doc_message.'
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
						break;
						
						
						
									case 2:
						echo '<div class="alert alert-danger alert-dismissible fade show mt-3 mb-0" role="alert">
  '.$dd->doc_message.'
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
						break;
						
						
						
						
						
						
						
						
						
				}
			
			}
			
			
			?>
			
			
			
		  </div>
	  </div>
	  
	  
	  
	  
	  <?php if($button){ ?>
	  <form action="/Welcome/doc_ver" method="POST" enctype="multipart/form-data">
		<?php } ?> 
		  
		  
	  <div class="row mt-3">		
		  
	  	<div class="col-md-12">

<div class="form-group">
<label class="font-weight-bold">
<?php echo $this->lang->line(11); ?>
</label>
<p><input type="radio" name="d_doctype" <?php echo $dis2; ?> class="d_doctype" value="edu" <?php if(isset($dd->doc_type) && $dd->doc_type == 'edu'){ echo "checked"; }else{ } ?>>
<span class="pl-2">
<?php echo $this->lang->line(26); ?>
</span> <input type="radio" name="d_doctype" <?php echo $dis2; ?> class="d_doctype ml-3" value="pass" <?php if(isset($dd->doc_type) && $dd->doc_type == 'police_report'){ echo "checked"; }else{ } ?>>
<span class="pl-2">
<?php echo $this->lang->line(27); ?>
</span>
</p>
</div>
		</div>
	  </div>
	  
	  
	  
	  <!--education certificate -->
	 
		  
		  
	  <div class="row" id="eduRow">
		   <div class="col-md-6">
				<div class="form-group">
			   		<label for="" class="font-weight-bold"><?php echo $this->lang->line(28); ?></label>
					<input type="text" <?php echo $dis2; ?> name="uniname" class="form-control" value="<?=(isset($dd->doc_uni_name))?$dd->doc_uni_name:'';?>" id="uniname" <?=$dis2?>>
			    </div>
		   </div>
		     <div class="col-md-6">
				<div class="form-group">
			   		<label for="" class="font-weight-bold"><?php echo $this->lang->line(29); ?></label>
					<input type="text" <?php echo $dis2; ?> name="conname" class="form-control" id="conname" value="<?=(isset($dd->doc_country))?$dd->doc_country:'';?>" <?=$dis2?>>
			    </div>
		   </div>
		     <div class="col-md-6">
				<div class="form-group">
			   		<label for="" class="font-weight-bold"><?php echo $this->lang->line(30); ?></label>
					<input type="text" <?php echo $dis2; ?> name="state" class="form-control" value="<?=(isset($dd->doc_state))?$dd->doc_state:'';?>" id="state" <?=$dis2?>>
			    </div>
		   </div>
		      <div class="col-md-6">
				<div class="form-group">
			   		<label for="" class="font-weight-bold"><?php echo $this->lang->line(31); ?></label>
					<input type="text" <?php echo $dis2; ?> name="city" class="form-control" value="<?=(isset($dd->doc_city))?$dd->doc_city:'';?>" id="city" <?=$dis2?>>
			    </div>
		   </div>
		    <div class="col-md-12">
				<div class="form-group">
			   		<label for="" class="font-weight-bold"><?php echo $this->lang->line(32); ?></label>
					<input type="file" <?php echo $dis2; ?> name="edu_cert" class="form-control" id="educert" <?=$dis2?>>
			    </div>
		   </div>
	  </div>
	  
	  <!--eucation certificate end-->
	  
	  
	  <!--police row -->
	  	  <div class="row" id="pRow">
		   <div class="col-md-6">
				<div class="form-group">
			   		<label for="" class="font-weight-bold"><?php echo $this->lang->line(33); ?></label>
					<input type="text" <?php echo $dis2; ?> name="pnumber" class="form-control" id="pnumber" value="<?=(isset($dd->doc_city))?$dd->doc_city:'';?>"  <?=$dis2?>>
			    </div>
		   </div>
		     <div class="col-md-6">
				<div class="form-group">
			   		<label for="" class="font-weight-bold"><?php echo $this->lang->line(29); ?></label>
					<input type="text" <?php echo $dis2; ?> name="conname2" class="form-control" id="conname2" value="<?=(isset($dd->doc_file_number))?$dd->doc_file_number:'';?>"  <?=$dis2?>>
			    </div>
		   </div>
		     <div class="col-md-6">
				<div class="form-group">
			   		<label for="" class="font-weight-bold"><?php echo $this->lang->line(30); ?></label>
					<input type="text" <?php echo $dis2; ?> name="state2" class="form-control" id="state2" value="<?=(isset($dd->doc_state))?$dd->doc_state:'';?>"  <?=$dis2?>>
			    </div>
		   </div>
		      <div class="col-md-6">
				<div class="form-group">
			   		<label for="" class="font-weight-bold"><?php echo $this->lang->line(31); ?></label>
					<input type="text" <?php echo $dis2; ?> name="city2" class="form-control" id="city2" value="<?=(isset($dd->doc_city))?$dd->doc_city:'';?>"  <?=$dis2?>>
			    </div>
		   </div>
		    <div class="col-md-12">
				<div class="form-group">
			   		<label for="" class="font-weight-bold"><?php echo $this->lang->line(34); ?></label>
					<input type="file" <?php echo $dis2; ?> name="p_report" class="form-control" id="p_report" <?=$dis2?>>
			    </div>
		   </div>
	  </div>
		  <?php if($button){ ?>
	   <div class="form-group text-center">
		<button class="btn btn-primary pl-4 pr-4" type="submit" name="verify" <?=$dis2?>><?php echo $this->lang->line(20); ?></button>	  
	  </div>
		  <?php } ?>
	  <!-- police row end-->
	  <?php if($button){ ?>
	  </form>
	  <?php } ?>
	  <!--document verification end-->
	  
 </div>
  
</div>
	</div>	
</div>	
	
	
</div>
<!--content part end-->



<!--footer part -->
<?php $this->load->view('home/bottom'); ?>
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
	
	
	
		$('.d_doctype').click(function(){
		
		var valuee = $(this).val();
			
		if(valuee == 'edu'){
			
			$('#eduRow').css("display","flex");
			$('#pRow').hide();
		}else if(valuee == 'pass'){
			
				 $('#eduRow').hide();
			     $('#pRow	').css("display","flex");
				 }
		
		
	});
	
	
	
});
</script>
