<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {
	
	public function __construct(){
 
        parent::__construct();
  			$this->load->helper('url');
  	 		$this->load->model('admin/gallery_model');
        $this->load->library('session');
 
}

	
public function addgallery(){
        $data = array();
        $userData = array();
       $upload=1;
			if(!empty($_FILES['image']['name'])){
                $config['upload_path'] = './uploads/gallery/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['image']['name'];
                
				//echo $config['upload_path'];die;
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
               // echo $config['upload_path'];die;
                if($this->upload->do_upload('image')){
                    $uploadData = $this->upload->data();
                    $picture = $uploadData['file_name'];
                }else{
                    $upload=0;
                   $uploaderr=$this->upload->display_errors();

                }
            }else{
                $picture = '';
            }
            if($upload!=0)
            {
           $userData = array(
                
				'category' => $this->security->xss_clean($this->input->post('category')),
				'name'=>$this->security->xss_clean($this->input->post('name')),
				'image'=>$picture);

            
                $insert = $this->gallery_model->insert_gallery($userData);
              
                if($insert)
				{
                    $this->session->set_flashdata('success_msg', 'Successfully');
                    redirect('admin/gallery/view_gallery');
                }else
				{
                    $data['error_msg'] = 'Some problems occured, please try again.';
                }
            
        
       
     }
     else
        {   

       
        $this->session->set_flashdata('upload_error', $uploaderr);
        redirect('admin/gallery/add_gallery');
        }
        
        }

       
    



public function add_gallery()
{
	$data = array();
    $islog = $this->session->userdata('user_id');
    if($islog!=NULL)
    {
		
        
        $this->load->view('admin/includes/header');
        $this->load->view('admin/includes/sidebar');
        $this->load->view('admin/add_gallery',$data);
        $this->load->view('admin/includes/footer');
    }
    else
    { 
       redirect('/login');	
    }
}




public function view_gallery(){
			$data=array();
		$islog = $this->session->userdata('user_id');
		if($islog!=NULL)
		{
	    //$data['galcat']=$this->gallery_model->getgalcat();	 
		$data['gallery']=$this->gallery_model->getgallery();	
	
		$this->load->view('admin/includes/header');
        $this->load->view('admin/includes/sidebar');
        $this->load->view('admin/view_gallery',$data);
        $this->load->view('admin/includes/footer');
			
		}
		else{
			
		redirect('/login');	
		}
		}
		
		
		
		public function delete_gallery($id){
			
		$islog = $this->session->userdata('user_id');
		if($islog!=NULL)
		{
		$delete=$this->gallery_model->delete_gallery($id);	
		
		redirect('admin/gallery/view_gallery');	
			
		}
		else{
			
		redirect('/login');	
		}
		}
		
		
		public function edit_gallery($id){
			
		$islog = $this->session->userdata('user_id');
		if($islog!=NULL)
		{
			
		$data['editgallery']=$this->gallery_model->editgallery($id);
		
		
        $this->load->view('admin/includes/header');
        $this->load->view('admin/includes/sidebar');
        $this->load->view('admin/edit_gallery',$data);
        $this->load->view('admin/includes/footer');		
			
		}
		else
		{
			
		redirect('/login');	
		}
		}
		
		
	
		public function update_gallery(){
			
		$islog = $this->session->userdata('user_id');
		if($islog!=NULL)
		{
			
		 if($this->input->post('id')){
			 $upload=1;
			 if(!empty($_FILES['image']['name'])){
			
		$config['upload_path'] = './uploads/gallery/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('image'))
        {
          $uploaderr=$this->upload->display_errors();
                    $upload=0;     
        }
        else
        {
            $upload_data=$this->upload->data();
            $picture=$upload_data['file_name'];
        }
    }
    else{
                $picture=$this->input->post('old_image');
            }
			 if($upload!=0)
			 {
			 
			 
		$userData = array(
                
				'category'=>$this->security->xss_clean($this->input->post('category')),
				'name'=>$this->security->xss_clean($this->input->post('name')),

			    'image'=>$picture);
				
				$id= $this->input->post('id');
			 
			 
		 $update = $this->gallery_model->update_gallery($userData,$id);
                if($update){
                    $this->session->set_flashdata('success_msg', 'Your Updation was successfull');
                    redirect('admin/gallery/view_gallery');
                }else{
                    $data['error_msg'] = 'Some problems occured, please try again.';
                }
			
		
    }
    else
		{
		 $this->session->set_flashdata('upload_error', $uploaderr);
		
        redirect('admin/gallery/view_gallery');
        }
}
}
		else{
			
		redirect('/login');	
		}
		}
	//workfiles	
		public function view_workfiles(){
			$data=array();
		$islog = $this->session->userdata('user_id');
		if($islog!=NULL)
		{
	    //$data['galcat']=$this->gallery_model->getgalcat();	 
		$data['gallery']=$this->gallery_model->getworkorder();	
	
		$this->load->view('admin/includes/header');
        $this->load->view('admin/includes/sidebar');
        $this->load->view('admin/view_workfiles',$data);
        $this->load->view('admin/includes/footer');
			
		}
		else{
			
		redirect('/login');	
		}
		}
			public function delete_workfiles($id){
			
		$islog = $this->session->userdata('user_id');
		if($islog!=NULL)
		{
		$delete=$this->gallery_model->delete_workfiles($id);	
		
		redirect('admin/gallery/view_workfiles');	
			
		}
		else{
			
		redirect('/login');	
		}
		}
		public function edit_workfiles($id){
			
		$islog = $this->session->userdata('user_id');
		if($islog!=NULL)
		{
		$delete=$this->gallery_model->edit_workfiles($id);	
		
		redirect('admin/gallery/view_workfiles');	
			
		}
		else{
			
		redirect('/login');	
		}
		}
       }
       ?>