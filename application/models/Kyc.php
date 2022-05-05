<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kyc extends CI_Model {
	
	
	function cehckadmin($e,$p){
		
		$this->db->where('staff_username',$e);
		$this->db->where('staff_password',$p);
		$this->db->where('staff_status',1);
		$query = $this->db->get('staff');
		if($query->num_rows() > 0){
			
			return array('status' => 'success' , 'message' => '' , 'data' => $query->row());
			
		}else{
			return array('status' => 'error' , 'message' => '');
		}
		
		
		
	}
	
	
	//check user 
	function checkuser($e,$p){
		
		$this->db->where('user_email',$e);
		$this->db->where('user_password',$p);
		//$this->db->where('staff_status',1);
		$query = $this->db->get('users');
		if($query->num_rows() > 0){
			
			return array('status' => 'success' , 'message' => '' , 'row' => $query->row());
			
		}else{
			return array('status' => 'error' , 'message' => '');
		}
		
		
		
	}
	
	
	/// get user documents
	function getdocuments(){
		$this->db->select('documents.*,users.user_fname,users.user_lname,users.user_id');
	$this->db->from('documents');
	$this->db->join('users', 'users.user_id = documents.doc_user_id','left');
	$query =  $this->db->get()->result_array();
	return $query;
	}
	
	
	/// get users 
	function getusers(){
		$this->db->select('users.*,documents.doc_status');
	$this->db->from('users');
	$this->db->join('documents', 'documents.doc_user_id = users.user_id','left');
	$query =  $this->db->get()->result_array();
	return $query;
	}
	
	
	function getstaff(){
		return $this->db->get('staff')->result_array();
	}
	
	
	// get single user details 
	function getuser($id){
		$this->db->where('user_id',$id);
		$query = $this->db->get('users');
		return array('rows' => $query->num_rows() , 'row' => $query->row());
	}
	
	
		function getdoc($id){
		$this->db->select('documents.*,users.*');
	$this->db->from('documents');
	$this->db->where('documents.doc_user_id',$id);
	$this->db->join('users', 'users.user_id = documents.doc_user_id','left');
	$query =  $this->db->get();
	return array('rows' => $query->num_rows() , 'row' => $query->row());
	}
	
	
	
	
	
	
}




?>