<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChangePassword extends CI_Controller {

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
	 * @see https://codeigniter.com/client_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('ChangePassword_model');
		
        if (!$this->session->userdata('login_status')) {
			redirect('home/Login');
		}
	}

	// Edit roles
	public function updatepass()
	{
		if(isset($_POST['passwordSubmit']))
		{
			// echo "here";exit();
			$this->form_validation->set_rules('opassword','old password', 'required|callback_password_check',array('required'=>'This field is required'));
			$this->form_validation->set_rules('npassword', 'new password', 'required',array('required'=>'This field is required'));
            $this->form_validation->set_rules('cpassword', 'confirm password', 'required|matches[npassword]',array('matches' => 'password missmatches.','required'=>'This field is required'));
			//$this->form_validation->set_message('check_default', 'Please select a Hotel ');
			if($this->input->post('npassword')!='')//to check passord alredy exist
			$checkpasswordexist=$this->ChangePassword_model->getProfileByPassword($this->security->xss_clean($this->input->post('npassword')));
			else
			$checkpasswordexist='TRUE';
			if (($this->form_validation->run() == FALSE) or ($checkpasswordexist == FALSE))
			{
				
				if($checkpasswordexist == FALSE)
				{
					$this->session->set_flashdata('password_error', 'Password already exist');
				}
				
      						$this->load->view('includes/header');
		$this->load->view('update-password');
		$this->load->view('includes/footer');

			}
			else
			{
				//Update details after validation
				$UpdateprofileDetails=$this->ChangePassword_model->UpdatePassword($this->security->xss_clean($this->input->post('npassword')));
				if($UpdateprofileDetails)
				$data=$this->ChangePassword_model->listProfile();
				$user_email=$data['email'];
				$user_name=$data['username'];
				$user_password=$this->security->xss_clean($this->input->post('npassword'));
				$this->load->library('email');
                $this->email->from('colortone.co.in', 'Colortone');
                $this->email->to($user_email);
                $loginLink=base_url().'Home/login';
                $this->email->subject('Colortone user Login credentials');
                $this->email->message('your username is : '.$user_name.' and password is : '.$user_password.' Go to the login page '.$loginLink);
					if($this->email->send())
					{
						
						$this->session->set_flashdata('message','New password sent to your email');
							    	//	$this->session->sess_destroy();

						redirect('Profile');

					}
					else
					{
					        //show_error($this->email->print_debugger());

						$this->session->set_flashdata('errorEmailValidate','Email sending error');
						redirect('Home/change_password');

				 }

			}
		}	
		else
		{
			redirect('Home/change_password');

		}
	}


    function password_check()
	{
		
            if ($this->input->post('opassword'))
		{
            $resultPas = $this->ChangePassword_model->matchOldPassword($this->security->xss_clean($this->input->post('opassword')));
			if($resultPas==0)
            {
                $this->form_validation->set_message('password_check', 'Invalid Password');
                return FALSE;
            }
		
		else
		{ 
			return TRUE;
		}
	}
}

	
}
?>
