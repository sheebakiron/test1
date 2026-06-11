<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {
	
	public function __construct(){
 
        parent::__construct();
  			$this->load->helper('url');
  	 		$this->load->model('admin/login_model');
        $this->load->library('session');
 
}

	
	public function index()
	{
		$this->load->view('admin/login');
	}
	
	
	function login_user(){
  $user_login=array(
 
  'user_name'=>$this->input->post('username'),
  'user_password'=>$this->input->post('password'));
 
  $data=$this->login_model->login_user($user_login['user_name'],$user_login['user_password']);
      if($data)
      {
        $this->session->set_userdata('user_id',$data['k_id']);
        $this->session->set_userdata('user_name',$data['k_username']);
        redirect('admin/admin/dashboard'); 
      }
      else{
        $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
        redirect('login/');
      }
 
 
}



function login_student(){
  $user_login=array(
 
  'course'=>$this->input->post('course'),
  'year'=>$this->input->post('year'));
 
    $data=$this->login_model->login_student($user_login['course'],$user_login['year']);
      if($data)
      {
        $this->session->set_userdata('stud_id',$data['id']);
        $this->session->set_userdata('course',$data['courses']);
		 $this->session->set_userdata('year',$data['year']);
        redirect('student/dashboard');
		
      }
    else{
		  
        $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
        redirect('http://mecollege.ac.in/student_login.php');
      }
 
 
}


function login_teacher(){
  $user_login=array(
 
  'username'=>$this->input->post('username'),
  'password'=>$this->input->post('password'));
 
    $data=$this->login_model->login_teacher($user_login['username'],$user_login['password']);
      if($data)
      {
        $this->session->set_userdata('user_id',$data['id']);
        $this->session->set_userdata('username',$data['username']);
		 $this->session->set_userdata('password',$data['password']);
        redirect('teachers/dashboard');
		
      }
      else
	  {
        $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
        redirect('http://mecollege.ac.in/faculty_login.php');
      }
 
 
}




public function changepassword()
{
    $islog = $this->session->userdata('user_id');
    if($islog!=NULL)
    {

        
        $this->load->view('includes/header');
        $this->load->view('includes/sidebarteach');
        $this->load->view('changepassword');
        $this->load->view('includes/footer');
    }
    else
    {
 
      redirect('/login');	
    }
}




function updatepassword(){
  $user_login=array(
  'password'=>$this->input->post('password'));
 $islog = $this->session->userdata('user_id');
    $data=$this->login_model->update_password($user_login,$islog);
      if($data)
      {
         $this->session->set_flashdata('success_msg', 'Updated Successfully.');
        redirect('teachers/dashboard');
		
      }
      else
	  {
        $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
        redirect('teachers/dashboard');
      }
 
 
}



public function logout(){
	$this->session->unset_userdata('user_id');
	$this->session->unset_userdata('user_name');
	$this->session->sess_destroy();
	redirect('admin/login/');
	
}

public function logoutstud(){
	$this->session->unset_userdata('stud_id');
	$this->session->unset_userdata('user_name');
	$this->session->sess_destroy();
	redirect('http://mecollege.ac.in/student_login.php');
	
}

public function logoutteach(){
	$this->session->unset_userdata('user_id');
	$this->session->unset_userdata('user_name');
	$this->session->sess_destroy();
	redirect('http://mecollege.ac.in/faculty_login.php');
	
}


}

?>
