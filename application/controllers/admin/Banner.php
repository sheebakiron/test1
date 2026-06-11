<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class banner extends CI_Controller {
	
	public function __construct(){
 
        parent::__construct();
  			$this->load->helper('url');
  	 		$this->load->model('admin/banner_model');
        $this->load->library('session');
 
}



		
		public function addimage(){
        $data = array();
        $userData = array();
			$upload=1;
             $ot = count($_FILES['files']['name']);
			    for($i=0;$i<$ot;$i++)
{
if(!empty($_FILES['files']['name'][$i])){
$_FILES['file']['name'] = $_FILES['files']['name'][$i];
          $_FILES['file']['type'] = $_FILES['files']['type'][$i];
          $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
          $_FILES['file']['error'] = $_FILES['files']['error'][$i];
          $_FILES['file']['size'] = $_FILES['files']['size'][$i];
                $config['upload_path'] = './uploads/banner/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['files']['name'][$i];
                
				
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('file')){
                    $uploadData = $this->upload->data();
                    $picture = $uploadData['file_name'];
                }else{
                   $upload=0;
                   $uploaderr=$this->upload->display_errors();                }
            }else{
                $picture = '';
            }
           if($upload!=0)
           {
           $userData = array(
                
                'image'=> $picture);
            
                $insert = $this->banner_model->insert_gallery($userData);
             
               
            
        }
        else
        {   

       
        $this->session->set_flashdata('upload_error', $uploaderr);
        redirect('admin/banner/add_banner');
        }
    }
        if($insert)
				{
                    $this->session->set_flashdata('success_msg', 'Successfully');
                    redirect('admin/banner/view_banner');
                }else
				{
                    $data['error_msg'] = 'Some problems occured, please try again.';
                }
       
     
       
    }



public function add_banner()
{
	$data = array();
    $islog = $this->session->userdata('user_id');
    if($islog!=NULL)
    {
		
        
        $this->load->view('admin/includes/header');
        $this->load->view('admin/includes/sidebar');
        $this->load->view('admin/add_banner');
        $this->load->view('admin/includes/footer');
    }
    else
    { 
       redirect('/login');	
    }
}




public function view_banner(){
			$data=array();
		$islog = $this->session->userdata('user_id');
		if($islog!=NULL)
		{
	    //$data['galcat']=$this->banner_model->getgalcat();	 
		$data['gallery']=$this->banner_model->getgallery();	
	
		$this->load->view('admin/includes/header');
        $this->load->view('admin/includes/sidebar');
        $this->load->view('admin/view_banner',$data);
        $this->load->view('admin/includes/footer1');
			
		}
		else{
			
		redirect('/login');	
		}
		}
		
		
		
		public function delete_banner($id){
			
		$islog = $this->session->userdata('user_id');
		if($islog!=NULL)
		{
		$delete=$this->banner_model->delete_gallery($id);	
		
		redirect('admin/banner/view_banner');	
			
		}
		else{
			
		redirect('/login');	
		}
		}
		
		
		public function edit_banner($id){
			
		$islog = $this->session->userdata('user_id');
		if($islog!=NULL)
		{
			
		$data['editgallery']=$this->banner_model->editgallery($id);
		
		
        $this->load->view('admin/includes/header');
        $this->load->view('admin/includes/sidebar');
        $this->load->view('admin/edit_banner',$data);
        $this->load->view('admin/includes/footer1');		
			
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
                    $upload=0;             }
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
                
				'title' => strip_tags($this->input->post('title')),
			'image'=> $picture);
			 				$id= $this->input->post('id');

				
		 $update = $this->banner_model->update_gallery($userData,$id);

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
       }
		?>