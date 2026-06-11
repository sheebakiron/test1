<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class testimonials extends CI_Controller {
	
	public function __construct(){
 
        parent::__construct();
  			$this->load->helper('url');
  	 		$this->load->model('admin/testimo_model');
        $this->load->library('session');
 
}

	
public function addtest(){
        $data = array();
        $userData = array();
     
                   $userData = array(
                
				'name' => $this->security->xss_clean($this->input->post('name')),
				'designation' => $this->security->xss_clean($this->input->post('designation')),
				'description' => $this->security->xss_clean($this->input->post('description')),
				'rating' => $this->security->xss_clean($this->input->post('rating')));

            
                $insert = $this->testimo_model->insert_gallery($userData);
              
                if($insert)
				{
                    $this->session->set_flashdata('success_msg', 'Successfully');
                    redirect('admin/testimonials/view_testimonials');
                }else
				{
                    $data['error_msg'] = 'Some problems occured, please try again.';
                }
            
        
       
     
    
        
        }

       
    



public function add_testimonials()
{
	$data = array();
    $islog = $this->session->userdata('user_id');
    if($islog!=NULL)
    {
		
        
        $this->load->view('admin/includes/header');
        $this->load->view('admin/includes/sidebar');
        $this->load->view('admin/add_testimonials',$data);
        $this->load->view('admin/includes/footer');
    }
    else
    { 
       redirect('/login');	
    }
}




public function view_testimonials(){
			$data=array();
		$islog = $this->session->userdata('user_id');
		if($islog!=NULL)
		{
	    //$data['galcat']=$this->gallery_model->getgalcat();	 
		$data['gallery']=$this->testimo_model->getgallery();	
	
		$this->load->view('admin/includes/header');
        $this->load->view('admin/includes/sidebar');
        $this->load->view('admin/view_testimonials',$data);
        $this->load->view('admin/includes/footer');
			
		}
		else{
			
		redirect('/login');	
		}
		}
		
		
		
		public function delete_testimonials($id){
			
		$islog = $this->session->userdata('user_id');
		if($islog!=NULL)
		{
		$delete=$this->testimo_model->delete_gallery($id);	
		
		redirect('admin/testimonials/view_testimonials');	
			
		}
		else{
			
		redirect('/login');	
		}
		}
		
		
		public function edit_testimonials($id){
			
		$islog = $this->session->userdata('user_id');
		if($islog!=NULL)
		{
			
		$data['editgallery']=$this->testimo_model->editgallery($id);
		
		
        $this->load->view('admin/includes/header');
        $this->load->view('admin/includes/sidebar');
        $this->load->view('admin/edit_testimonials',$data);
        $this->load->view('admin/includes/footer1');		
			
		}
		else
		{
			
		redirect('/login');	
		}
		}
		
		
	
		public function update_testi(){
			
		$islog = $this->session->userdata('user_id');
		if($islog!=NULL)
		{
			
		 if($this->input->post('id')){
			 $upload=1;
		
			
			 
			 
		$userData = array(
                
				'name' => $this->security->xss_clean($this->input->post('name')),
				'designation' => $this->security->xss_clean($this->input->post('designation')),
				'description' => $this->security->xss_clean($this->input->post('description')),
				'rating' => $this->security->xss_clean($this->input->post('rating')));
				
				$id= $this->input->post('id');
			 
			 
		 $update = $this->testimo_model->update_gallery($userData,$id);
                if($update){
                    $this->session->set_flashdata('success_msg', 'Your Updation was successfull');
                    redirect('admin/testimonials/view_testimonials');
                }else{
                    $data['error_msg'] = 'Some problems occured, please try again.';
                }
			
		
  
}
}
		else{
			
		redirect('/login');	
		}
		}
       }
       ?>