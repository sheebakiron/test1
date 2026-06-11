<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
        $this->load->helper('form');
		
		$this->load->model('Registermodel');
	}
	public function register()
	{
		$data=$this->Registermodel->insertUser();//$data is an array returns inserted client details email,password 
	 
				$user_name=$data[1];
				$user_email=$data[2];
				$user_password=$data[0];
				$this->load->library('email');
                $this->email->from('colortone.co.in', 'Colortone');
                $this->email->to($user_email);
                $loginLink=base_url().'Home/login';
                $this->email->subject('Colortone user Login credentials');
                $this->email->message('your username is : '.$user_name.' and password is : '.$user_password.' Go to the login page '.$loginLink);
					if($this->email->send())
					{
					
						
						$this->session->set_flashdata('message','New password sent to your email');
						    redirect('Home/login');


					}
					else
					{
					
				     $this->session->set_flashdata('error-msg','alert-danger');
			         $this->session->set_flashdata('message','Email sending error');
				     redirect('Home/start');
				 }
	}
}