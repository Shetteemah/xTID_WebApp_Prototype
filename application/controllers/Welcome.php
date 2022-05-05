<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	public function index()
	{
		$this->load->view('home/login');
	}
	
	
	
	
	///admin view
	public function adminlogin(){
	
		$this->load->view('admin/login');
		
		
	}
	
	public function doc_ver(){
		if(isset($_POST['verify'])){
//			echo '<pre>';
			//print_r($_POST);
			//die;
//			echo '<br>';
//			echo '<pre>';
//			print_r($_FILES);
			
			if($_POST['d_doctype'] == 'edu'){				
				 $uni = array(
				  'doc_user_id'=>$this->session->userid,	 
				  'doc_type' => 'edu',
				  'doc_uni_name'=>strip_tags($_POST['uniname']),
				  'doc_country'=>strip_tags($_POST['conname']),
				  'doc_state'=>strip_tags($_POST['state']),				 
				  'doc_city'=>strip_tags($_POST['city'])					 
				  );
				if($_FILES['edu_cert']['error'] == 0){
				$doc = $_FILES['edu_cert'];
				$df = $this->img_upload($doc,'documents/');
				$uni['doc_police_file'] = $df;					
				}
				$this->db->where('doc_user_id' ,$this->session->userid);
				$c = $this->db->get('documents');
				if($c->num_rows() == 0){				    
				$this->db->insert('documents' ,$uni);
				if($this->db->affected_rows() > 0){
				 redirect(base_url('welcome/dashboard'));
				}	
			   }
			   else{
					$this->db->where('doc_user_id' ,$this->session->userid);
					$upd= $this->db->update('documents' ,$uni);
				   if($upd){
					    redirect(base_url('welcome/dashboard'));
				   }
				}	
			}
			elseif($_POST['d_doctype'] == 'pass'){				
				 $uni = array(
				  'doc_user_id'=>$this->session->userid,	 
				  'doc_type' => 'police_report',
				  'doc_file_number'=>strip_tags($_POST['pnumber']),
				  'doc_country'=>strip_tags($_POST['conname2']),
				  'doc_state'=>strip_tags($_POST['state2']),
				  'doc_city'=>strip_tags($_POST['city2'])           
				  );
				if($_FILES['p_report']['error'] == 0){
				$doc = $_FILES['p_report'];
				$df = $this->img_upload($doc,'documents/');
				$uni['doc_police_file'] = $df;					
				}
				$this->db->where('doc_user_id' ,$this->session->userid);
				$c = $this->db->get('documents');
				if($c->num_rows() == 0){				    
				$this->db->insert('documents' ,$uni);
				if($this->db->affected_rows() > 0){
					
					 redirect(base_url('welcome/dashboard'));
				}	
			   }
			   else{
					$this->db->where('doc_user_id' ,$this->session->userid);
					$upd= $this->db->update('documents' ,$uni);
				   if($upd){
					   redirect(base_url('welcome/dashboard'));
				   }
				}	
				
				
			}
			
		}
	}
	
	/// dashboard 
	public function dashboard(){
		if(isset($_POST['submit'])){
			
			$update_array =array(
			'user_fname'=> strip_tags($_POST['fname']),
			'user_lname'=>strip_tags($_POST['lname']),
			'user_email'=>strip_tags($_POST['user_email']),
			'user_password'=>strip_tags($_POST['password']),
			'dob'=>strip_tags($_POST['dob']),
			'typeofcard'=>strip_tags($_POST['typeofcard']),
			'idcardnumber'=>strip_tags($_POST['idcard_number']),
			'idcardexp'=>strip_tags($_POST['idcardexpdate']),
			'passportnumber'=>strip_tags($_POST['passportnumber']),
			'passportexp'=>strip_tags($_POST['passportexp']),
			'status'=>0	
			);	
			
			if($_FILES['idcardpic']['error'] == 0){
				$img1 = $_FILES['idcardpic'];
				$img = $this->img_upload($img1,'documents/');
				$signup_array['idcardfile'] = $img;
			}
		   elseif($_FILES['passpic']['error'] == 0){
			   $img2 = $_FILES['passpic'];
				$imgg = $this->img_upload($img2,'documents/');
				$signup_array['passportfile'] = $imgg;
		   }
		  if($_FILES['selfiwithcard']['error'] == 0){
				$imgselfe = $_FILES['selfiwithcard'];
				$imgsl = $this->img_upload($imgselfe,'documents/');
				$signup_array['selftwithcard'] = $imgsl;
			}	
			$this->db->where('user_id' ,$this->session->userid);				
			$upd = $this->db->update('users' ,$update_array);
			if($upd){
				$this->session->set_flashdata('success','Data Submited for Review');
		    //redirect(base_url('welcome/signup'));
			}
			else{
				$this->session->set_flashdata('error','Error occur while Updating data.Please try again !');
		   // redirect(base_url('welcome/signup'));
			}
			
		}
		
		$this->load->view('home/dashboard');
	}
	
	
	
	// sign up
	
	public function signup(){
		if(isset($_POST['submit'])){         
			
		   $this->db->where('user_email' ,$_POST['user_email']);
		   $user_check = $this->db->get('users');	
					
			if($user_check->num_rows() == 0){
				
			$signup_array =array(
			'user_fname'=>strip_tags($_POST['fname']),
			'user_lname'=>strip_tags($_POST['lname']),
			'user_email'=>strip_tags($_POST['user_email']),
			'user_password'=>strip_tags($_POST['password']),
			'dob'=>strip_tags($_POST['dob']),
			'typeofcard'=>strip_tags($_POST['doctype']),
			'idcardnumber'=>strip_tags($_POST['idcard_number']),
			'idcardexp'=>strip_tags($_POST['idcardexpdate']),
			'passportnumber'=>strip_tags($_POST['pass_number']),
			'passportexp'=>strip_tags($_POST['passexp']),
			'status'=>0	
			);	
				
			
			if($_FILES['idcardpic']['error'] == 0){
				$img1 = $_FILES['idcardpic'];
				$img = $this->img_upload($img1,'documents/');
				$signup_array['idcardfile'] = $img;
			}
		   elseif($_FILES['passpic']['error'] == 0){
			   $img2 = $_FILES['passpic'];
				$imgg = $this->img_upload($img2,'documents/');
				$signup_array['passportfile'] = $imgg;
		   }
		  if($_FILES['selfiwithcard']['error'] == 0){
				$imgselfe = $_FILES['selfiwithcard'];
				$imgsl = $this->img_upload($imgselfe,'documents/');
				$signup_array['selftwithcard'] = $imgsl;
			}	
							
			$this->db->insert('users' ,$signup_array);
			if($this->db->affected_rows() > 0){
				$this->session->set_flashdata('ins','Your Account has been successfully created and your profile are under reivew. we will send you an email once your account will approved meanwhile you can check status in your dashobard.');
		    redirect(base_url('welcome/signup'));			
			}
			else{
				$this->session->set_flashdata('error','Error occur while creating account.Please try again !');
		    redirect(base_url('welcome/signup'));
			}
			}
			else{
				$this->session->set_flashdata('ext','User account already exists.Please login or sign up with new email!');
		    redirect(base_url('welcome/signup'));
			}
			
			
		}
		$this->load->view('home/signup');
	}
	function img_upload($image="",$path="")
	 {
           if($image['size'] > 10){
              $img = time()."-".str_replace(' ','',$image['name']);
              move_uploaded_file($image['tmp_name'],$path.$img);
              return $img;
              }else{
                return false;
              }
     }
	/// logout
	
	function logout(){
		session_destroy();
		redirect('/');
	}
	
	
	
	
	//// admin login api 
	function adminloginapi(){
		
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			
			
			$email = strip_tags($this->input->post('email'));
			$pass = strip_tags($this->input->post('pass'));
			
			/// check admin 
			$response = $this->kyc->cehckadmin($email,$pass);
			
			if($response['status'] == 'success'){
				
				$user = $response['data'];
				
					$newdata = array(
					'userid'  => $user->id,
					'role'     => $user->staff_role,
					'logged_in' => TRUE
					);

					$this->session->set_userdata($newdata);
				
					$this->session->set_flashdata('success','You Have successfully logged in');
				redirect('/admin');
				
				
			}else{
				
				$this->session->set_flashdata('error','Username and password incorrect');
				redirect('/wp-admin');
				
			}
			
			
			
		//its a get
		} else{
			echo 'invalid page access';
		}

		
		
		
	}
	
		/////user login api 
	function user_login_api(){
		$res = array( 'status' => 'error', 'message' => 'invalid' );
		if ( $this->input->is_ajax_request()and $this->input->server( 'REQUEST_METHOD' ) == 'POST' ) {
			
			$username = $this->input->post('username');
			$pass = $this->input->post('pass');
			$cehckuser = $this->kyc->checkuser($username,$pass);
			if($cehckuser['status'] == 'success'){
				
				$sessionData = array(
				 'userid' => $cehckuser['row']->user_id,
				 //'admin_type' => $checkAdmin['row']->type
				);
				
				$this->session->set_userdata($sessionData);
				$res = array( 'status' => 'success', 'message' => 'You have successfully logged in');
				
			}else{
				$res = array( 'status' => 'error', 'message' => 'Email and password incorrect');
			}
			
		}else{
			$res = array( 'status' => 'error', 'message' => 'invalid page access');
		}
		echo json_encode($res);
	}
	
	///sign up api 
	function signupapi(){
		if ( $this->input->is_ajax_request()and $this->input->server( 'REQUEST_METHOD' ) == 'POST' ) {
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		
			
		//form validation
		$this->form_validation->set_rules('fname', 'First Name', 'required|min_length[2]|max_length[12]');
		$this->form_validation->set_rules('lname', 'Last Name', 'required|min_length[2]|max_length[12]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[4]|max_length[12]');
		$this->form_validation->set_rules('email', 'Email', 'required|min_length[6]|max_length[400]|valid_email');	
		$this->form_validation->set_rules('dob', 'Date of Birth', 'required|min_length[4]|max_length[12]');
			
			
			
		$fname = strip_tags($this->input->post('fname'));
		$lname = strip_tags($this->input->post('lname'));
		$password = strip_tags($this->input->post('password'));
		$dob = strip_tags($this->input->post('dob'));
		$doctype = strip_tags($this->input->post('doctype'));
		$idcard_number = strip_tags($this->input->post('idcard_number'));
		$idcardexpdate = strip_tags($this->input->post('idcardexpdate'));
		$pass_number = strip_tags($this->input->post('pass_number'));
		$passexp = strip_tags($this->input->post('passexp'));
			
		}else{
			echo show_404();
		}
		
	}
	
	
	
}
