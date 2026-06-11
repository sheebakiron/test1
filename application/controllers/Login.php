<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */


	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Loginmodel');
				$this->load->helper('form');

		
	}
	
public function userlogin()
	{

		$this->form_validation->set_rules('uname', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE)
        {
        	
        $this->load->view('includes/header');
		$this->load->view('login');
		$this->load->view('includes/footer');
        }
        else
        {
            $data=$this->Loginmodel->checkLogin();
            if($data!="")
			{
				$loginusername=$data[0]['name'];//Username of current login user
			 	$loginid=$data[0]['id'];//Id of current login user
				$userrole=$data[0]['phone'];
				//echo $roleid=$data[0]['userroleid'];//Role of current login user
				$this->session->set_userdata('loginusername',$loginusername);
				$this->session->set_userdata('loginid',$loginid);
				$this->session->set_userdata('role',$userrole);
				
				$this->session->set_userdata('login_status',true);
				
			  redirect('Profile');

			}
			else
			{
				$this->session->set_flashdata('errmessage','Invalid username or password');
				redirect('Home/login');//show message username or password valid or not
			}
        }
    }


    public function logout()
	{
		$this->session->sess_destroy();
		redirect('Home/login');
	}
}