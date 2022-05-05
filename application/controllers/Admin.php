<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	
	//construst function 
	public function __construct() {
		parent::__construct();
		if (!$this->session->userid) {
			redirect( '/wp-admin' );
			exit();
		}



	}
	
	
	///admin dashboard
	public function index()
	{
		$this->load->view('admin/dashboard');
	}
	
	
	///users view
	public function users(){
		$data['users'] = $this->kyc->getusers();
		$this->load->view('admin/users',$data);
	}
	
	
	//user details 
	public function user($id=0){
		$response = $this->kyc->getuser($id);
		if($response['rows'] > 0){
			$data['row'] = $response['row'];
			$this->load->view('admin/user',$data);
		}
		else{
			$this->session->set_flashdata('error','User Not Found');
			redirect('/admin');
		}
		
	}
	
	
		///documewnts view
	public function documents(){
		$data['documents'] = $this->kyc->getdocuments();
		$this->load->view('admin/documents',$data);
	}
	
	//user document
		public function document($id=0){
		$response = $this->kyc->getdoc($id);
		if($response['rows'] > 0){
			$data['row'] = $response['row'];
			$this->load->view('admin/document',$data);
		}else{
			$this->session->set_flashdata('error','Document Not Found');
			redirect('/admin');
		}
	}
	
	
		///staff view
	public function staff(){
		if($this->session->role == 1){
		$data['users'] = $this->kyc->getstaff();
		$this->load->view('admin/staff',$data);
		}else{
			redirect('/admin');
		}
	}
	
	
	///create employee
	public function create_employee(){
		if($this->session->role == 1){
		$this->load->view('admin/create_emp');
			}else{
			redirect('/admin');
		}
	}
	
	
	
	public function employee($id){
		if($this->session->role == 1){
		$data['row'] = $this->db->get_where('staff',array('id' => $id))->row();
		$this->load->view('admin/create_emp',$data);
				}else{
			redirect('/admin');
		}
	}
	
	
	
	
	
	
	
	
	
	//apis

	
	
	
	function delete_user($userid){
		$this->db->where('user_id',$userid);
		$this->db->delete('users');
		
		
		$this->db->where('doc_user_id',$userid);
		$this->db->delete('documents');
		
		$this->session->set_flashdata('success','User Account Hasbeen Deleted');
			redirect('/admin');
	}
	
	
	
	//// delete employee
	
		function delete_employee($userid){
		$this->db->where('id',$userid);
		$this->db->delete('staff');
		
		
		$this->session->set_flashdata('success','Employee Account Has been Deleted');
			redirect('/admin');
	}
	
	
	
	
		//add employee
	 function addempapi(){
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			
			$uname = $this->input->post('uname');
			$pass = $this->input->post('pass');
			$role = $this->input->post('role');
			$status = $this->input->post('status');
			$id = $this->input->post('id');
			
			$data = array(
				
				'staff_username' => $uname,
				'staff_password' => $pass,
				'staff_role' => $role,
				'staff_status' => $status
			
			);
			
			
			if(!empty($id)){
				$this->db->where('id',$id);
				$this->db->update('staff',$data);
				$this->session->set_flashdata('success','Employee Details has been updated');
			redirect('/admin');
				die;
			}else{
				$this->db->insert('staff',$data);
				$this->session->set_flashdata('success','New Employee has been created');
			redirect('/admin');
			}
			
			
			
			
			
			
			
		}else{
			echo 'invalid page access';
		}
	 }
	
	
		function updatedocstatus(){
			
		require('vendor/autoload.php');
		
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			
			$status = $this->input->post('status');
			$userid = $this->input->post('userid');
			$message = $this->input->post('message');
			
			
			///update user account status
			$this->db->where('doc_user_id',$userid);
			$this->db->update('documents',array('doc_status' => $status, 'doc_message' => $message));
			
			if($status != 0){
				
				//send email to user about account 
				/////trigger pusher event here
				$app_id = '1062642';
				$app_key = 'a83f0f6ec57ddadcbafc';
				$app_secret = '8561e44870e77fa479aa';
				$app_cluster = 'ap2';

				$pusher = new Pusher\Pusher($app_key, $app_secret, $app_id, ['cluster' => $app_cluster]);
				
				
					$data['message'] =  array(
					'userid' =>  $userid,
					);
				
					$pusherChannel = 'my-channel';
					$event = $pusher->trigger($pusherChannel, 'comman', $data);
				
				
			}
			
			$this->session->set_flashdata('success','User Documents has been updated');
			redirect('/admin');
			
			
			
			
			
		}else{
			echo 'invalid page access';
		}
		
	}
	
	
	
	
	function updateaccountstatus(){
		
		////include pusher
		require('vendor/autoload.php');
		
		
		
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			
			$status = $this->input->post('status');
			$userid = $this->input->post('userid');
			$message = $this->input->post('message');
			
			
			///update user account status
			$this->db->where('user_id',$userid);
			$this->db->update('users',array('status' => $status, 'usermessage' => $message));
			
			if($status != 0){
				
				//send email to user about account 
				$app_id = '1062642';
				$app_key = 'a83f0f6ec57ddadcbafc';
				$app_secret = '8561e44870e77fa479aa';
				$app_cluster = 'ap2';

				$pusher = new Pusher\Pusher($app_key, $app_secret, $app_id, ['cluster' => $app_cluster]);


				$data['message'] =  array(
				'userid' =>  $userid,
				);

				$pusherChannel = 'my-channel';
				$event = $pusher->trigger($pusherChannel, 'comman', $data);

				
				
				
				
				/////trigger pusher event here
				
				
			}
			
			$this->session->set_flashdata('success','User profile has been updated');
			redirect('/admin');
			
			
			
			
			
		}else{
			echo 'invalid page access';
		}
		
	}
	
	
	
	
	
	
}
