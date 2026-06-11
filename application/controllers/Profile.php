<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

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
		$this->load->model('Profilemodel');
		if (!$this->session->userdata('login_status')) {
			redirect('home/Login');
		}
	}
	
	 
	 public function index()
	{
		$data['profile']=$this->Profilemodel->listProfile();
		$this->load->view('includes/header');
		$this->load->view('profile',$data);
		$this->load->view('includes/footer');
	}

	 public function edit_profile()
	{
		$data['profile']=$this->Profilemodel->listProfile();
		$this->load->view('includes/header');
		$this->load->view('edit-profile',$data);
		$this->load->view('includes/footer');
	}
	public function update_profile()
	{

			$this->form_validation->set_rules('name','name', 'required');
			$this->form_validation->set_rules('email', 'email', 'required|valid_email');
            $this->form_validation->set_rules('phone', 'contact number', 'required|min_length[8]');
			if($this->input->post('email')!='')//to check email validation only if email is entered during updation
			$checkemailexist=$this->Profilemodel->getProfileByEmail();
			else
			$checkemailexist='TRUE'; 

			if (($this->form_validation->run() == FALSE) or ($checkemailexist == FALSE))
			{
				if($checkemailexist == FALSE)
			{
				$this->session->set_flashdata('email_error', 'Email id already exist');
			}
			$this->edit_profile();
		    }
		    else
			{
				//Update details after validation
				$UpdateprofileDetails=$this->Profilemodel->UpdateprofileDetails();
				$this->session->set_flashdata('message', 'Profile Details updated successfully.');

				$this->index();
			}
	}

	 public function work_order()
	{
		//$data['profile']=$this->Profilemodel->listProfile();
		$this->load->view('includes/header');
		$this->load->view('work-order');
		$this->load->view('includes/footer');
	}
}
?>