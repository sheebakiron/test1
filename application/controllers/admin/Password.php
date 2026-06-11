<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
class Password extends CI_Controller{

	  public function __construct()
	  {
	  	parent::__construct();
	  	$this->load->helper('url');
  	 	$this->load->model('admin/password_model');
        $this->load->library('session');
	  }

	  public function change_pass()
	  {
	  	$islog=$this->session->userdata('user_id');
	  	if($islog!=null)
	  	{
	  		$this->load->view('admin/includes/header');
	  		$this->load->view('admin/includes/sidebar');
	  		$this->load->view('admin/change_password');
	  		$this->load->view('admin/includes/footer');

	  	}
	  	else
		{
			
		redirect('/login');	
		}
	  }

function verifyHashedPassword($plainPassword, $hashedPassword)
    {  
        return password_verify($plainPassword, $hashedPassword) ? true : false;
    }


       public function change_password()
       {	$islog=$this->session->userdata('user_id');
	     $data = array();
         $userData = array();
		
		$data=$this->password_model->view_details($islog);
		$oldpass=$data['k_password'];
	    $op=$this->input->post('opassword');

        

        if($this->input->post('opassword')){
        	if($this->verifyHashedPassword($op, $oldpass)){
        	
			if(($this->input->post('npassword'))==($this->input->post('cpassword'))){
			    

			
           $userData = array(
                
 		
                'k_password'=>password_hash($this->input->post('npassword'), PASSWORD_DEFAULT));
            
                    

                 $update = $this->password_model->update_details($userData,$islog);
                if($update){
                    $this->session->set_flashdata('success_msg', 'Your Updation was successfull');
                    redirect('admin/admin/dashboard');
                }else{
                    $data['error_msg'] = 'Some problems occured, please try again.';
                }
            
        }
        else
        {
             $this->session->set_flashdata('pass_msg', 'Password Missmatches');
            
                    redirect('admin/password/change_pass');
        }
       
        }
        else
        {
        	$this->session->set_flashdata('pass_msg','Incorrect password, please try again');
        	                    redirect('admin/password/change_pass');
        	                    

        }
       
    }

}


	  public function update_acc()
       {
	  	$islog=$this->session->userdata('user_id');
	  	if($islog!=null)
	  	{
	  		$this->load->view('admin/includes/header');
	  		$this->load->view('admin/includes/sidebar');
	  		$this->load->view('admin/update_account');
	  		$this->load->view('admin/includes/footer');

	  	}
	  	else
		{
			
		redirect('/login');	
		}
	  }

 public function update_account()
       {	$islog=$this->session->userdata('user_id');
	     $data = array();
         $userData = array();
        if($this->input->post('username')){
           $userData = array(
                'k_username'=>$this->input->post('username'),
                'mail_id'=>$this->input->post('email'));
                 $update = $this->password_model->update_details($userData,$islog);
                if($update){
                    $this->session->set_flashdata('success_msg', 'Your Updation was successfull');
                    redirect('admin/admin/dashboard');
                }else{
                    $data['error_msg'] = 'Some problems occured, please try again.';
                }
            
        }
        
       
    }

}

?>