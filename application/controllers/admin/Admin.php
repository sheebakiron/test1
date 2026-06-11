<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {
	
	public function __construct(){
 
        parent::__construct();
  			$this->load->helper('url');
  	 		$this->load->model('admin/admin_model');
       
 
}

	
	public function dashboard()
{
    $islog = $this->session->userdata('user_id');
    if($islog!=NULL)
    {

        
        $this->load->view('admin/includes/header');
        $this->load->view('admin/includes/sidebar');
        $this->load->view('admin/dashboard');
        $this->load->view('admin/includes/footer');
    }
    else
    {
 
      redirect('/login');	
    }
}

	public function index()
	{
		$this->load->view('admin/login');
	}


//map details


public function addmap(){
        $data = array();
        $userData = array();
        if($this->input->post('parentid')){
          
           $userData = array(
                
				'parentid' => strip_tags($this->input->post('parentid')),
				'name' => strip_tags($this->input->post('name')),
                'lat' => strip_tags($this->input->post('lat')),
				'long' => strip_tags($this->input->post('long')),
                'desc' => strip_tags($this->input->post('desc')) );
            
                $insert = $this->admin_model->insert_map($userData);
                if($insert){
                    $this->session->set_userdata('success_msg', 'Your registration was successfully. Please login to your account.');
                    redirect('admin/view_map');
                }else{
                    $data['error_msg'] = 'Some problems occured, please try again.';
                }
            
        }
       
     
       
    }



public function add_map()
{
    $islog = $this->session->userdata('user_id');
    if($islog!=NULL)
    {

        
        $this->load->view('includes/header');
        $this->load->view('includes/sidebar');
        $this->load->view('add_map');
        $this->load->view('includes/footer');
    }
    else
    { 
       redirect('/login');	
    }
}




public function view_map(){
			$data=array();
		$islog = $this->session->userdata('user_id');
		if($islog!=NULL)
		{
		$data['map']=$this->admin_model->getRows();	
	
		$this->load->view('includes/header');
        $this->load->view('includes/sidebar');
        $this->load->view('view_map',$data);
        $this->load->view('includes/footer1');
			
		}
		else{
			
		redirect('/login');	
		}
		}
		
		
		
		public function delete($id){
			
		$islog = $this->session->userdata('user_id');
		if($islog!=NULL)
		{
		$delete=$this->admin_model->delete($id);	
		
		redirect('admin/view_map');	
			
		}
		else{
			
		redirect('/login');	
		}
		}
		
		
		public function edit_map($id){
			
		$islog = $this->session->userdata('user_id');
		if($islog!=NULL)
		{
			

		$data['editmap']=$this->admin_model->editmap($id);
		
		
        $this->load->view('includes/header');
        $this->load->view('includes/sidebar');
        $this->load->view('edit_map',$data);
        $this->load->view('includes/footer1');		
			
		}
		else{
			
		redirect('/login');	
		}
		}
		
		
		public function update_map(){
			
		$islog = $this->session->userdata('user_id');
		if($islog!=NULL)
		{
			
		 if($this->input->post('name')){
			 
			 $userData = array(
                
				'parentid' => strip_tags($this->input->post('parentid')),
				'name' => strip_tags($this->input->post('name')),
                'lat' => strip_tags($this->input->post('lat')),
				'long' => strip_tags($this->input->post('long')),
                'desc' => strip_tags($this->input->post('desc')) );
				
				$id= $this->input->post('mapid');
			 
			 
		 $update = $this->admin_model->update_maps($userData,$id);
                if($update){
                    $this->session->set_flashdata('success_msg', 'Your Updation was successfully');
                    redirect('admin/view_map');
                }else{
                    $data['error_msg'] = 'Some problems occured, please try again.';
                }
			
		}
		else{
			
		redirect('/login');	
		}
		}

		}
		
		
		
//family details		
		
		
		
		public function add_member()
{
    $islog = $this->session->userdata('user_id');
    if($islog!=NULL)
    {

        
        $this->load->view('includes/header');
        $this->load->view('includes/sidebar');
        $this->load->view('add_mr');
        $this->load->view('includes/footer');
    }
    else
    { 
       redirect('/login');	
    }
}

public function add_member_mrs()
{
    $islog = $this->session->userdata('user_id');
    if($islog!=NULL)
    {

        
        $this->load->view('includes/header');
        $this->load->view('includes/sidebar');
        $this->load->view('add_mrs');
        $this->load->view('includes/footer');
    }
    else
    { 
       redirect('/login');	
    }
}

 
 
    public function registration(){
        $data = array();
        $userData = array();
        if($this->input->post('name')){
          
            
			 if(!empty($_FILES['groupimage']['name'])){
                $config['upload_path'] = 'uploads/images/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['groupimage']['name'];
                
				
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('groupimage')){
                    $uploadData = $this->upload->data();
                    $picture = $uploadData['file_name'];
                }else{
                    $picture = '';
                }
            }else{
                $picture = '';
            }
           if(!empty($_FILES['image']['name'])){
                $config['upload_path'] = 'uploads/images/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['image']['name'];
                
				
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('image')){
                    $uploadData = $this->upload->data();
                    $picture2 = $uploadData['file_name'];
                }else{
                    $picture2 = '';
                }
            }else{
                $picture2 = '';
            }
           

            $userData = array(
                'branchno' => strip_tags($this->input->post('branchno')),
                'name' => strip_tags($this->input->post('name')),
				'parentid' => strip_tags($this->input->post('parentid')),
                'generation' => strip_tags($this->input->post('generation')),
                'housename' => strip_tags($this->input->post('housename')),
                'po' => strip_tags($this->input->post('po')),
                'panchayath' => strip_tags($this->input->post('panchayath')),
                'district' => strip_tags($this->input->post('district')),
                'pin' => strip_tags($this->input->post('pin')),
                'brno' => strip_tags($this->input->post('brno')),
                'chartno' => strip_tags($this->input->post('chartno')),
                'dob' => strip_tags($this->input->post('dob')),
                'dom' => strip_tags($this->input->post('dom')),
                'isdead' => strip_tags($this->input->post('isdead')),
                'dod' => strip_tags($this->input->post('dod')),
                'lphone' => strip_tags($this->input->post('lphone')),
                'whatsapp' => strip_tags($this->input->post('whatsapp')),
                'mobile1' => strip_tags($this->input->post('mobile1')),
                'mobile2' => strip_tags($this->input->post('mobile2')),
                'email' => strip_tags($this->input->post('email')),
                'occupation' => strip_tags($this->input->post('occupation')),
                'achievements' => strip_tags($this->input->post('achievements')),
				'loc_url' => strip_tags($this->input->post('locurl')),
                'dname' => strip_tags($this->input->post('wname')),
                'dsmr' => strip_tags($this->input->post('wdmr')),
                'dsmrs' => strip_tags($this->input->post('wdmrs')),
                'dhousename' => strip_tags($this->input->post('whousename')),
                'dplase' => strip_tags($this->input->post('wplase')),
                'ddob' => strip_tags($this->input->post('wdob')),
                'disdead' => strip_tags($this->input->post('wisdead')),
                'ddod' => strip_tags($this->input->post('wdod')),
                'dwhatsappno' => strip_tags($this->input->post('whatsappno')),
                'dmobile' => strip_tags($this->input->post('wmobile')),
                'demail' => strip_tags($this->input->post('wemail')),
                'doccupation' => strip_tags($this->input->post('woccupation')),
                'dachievements' => strip_tags($this->input->post('wachievements')),
                'dgroupimage' => $picture,
				'image' => $picture2,
				'pageno' => strip_tags($this->input->post('pageno'))
                
            );

            
                $insert = $this->admin_model->insert($userData);
                if($insert){
                    $this->session->set_flashdata('success_msg', ' success');
				
                    redirect('admin/view_family');
                }else{
					 $this->session->set_flashdata('error_msg', 'Some problems occurred, please try again.');
                    $data['error_msg'] = 'Some problems occured, please try again.';
                }
            
        }
       
     
       
    }
	
	
	
	
	
	public function registrationmrs(){
        $data = array();
        $userData = array();
        if($this->input->post('name')){
          
            
			 if(!empty($_FILES['dgroupimage']['name'])){
                $config['upload_path'] = 'uploads/images/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['dgroupimage']['name'];
                
				
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('dgroupimage')){
                    $uploadData = $this->upload->data();
                    $picture1 = $uploadData['file_name'];
                }else{
                    $picture1 = '';
                }
            }else{
                $picture1 = '';
            }
			
			if(!empty($_FILES['image']['name'])){
                $config['upload_path'] = 'uploads/images/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['image']['name'];
                
				
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('image')){
                    $uploadData = $this->upload->data();
                    $picture2 = $uploadData['file_name'];
                }else{
                    $picture2 = '';
                }
            }else{
                $picture2 = '';
            }
           

           $userData = array(
                'name' => strip_tags($this->input->post('name')),
				'parentid' => strip_tags($this->input->post('parentid')),
                'generation' => strip_tags($this->input->post('generation')),
                'housename' => strip_tags($this->input->post('housename')),
                'po' => strip_tags($this->input->post('po')),
                'panchayath' => strip_tags($this->input->post('panchayath')),
                'district' => strip_tags($this->input->post('district')),
                'pin' => strip_tags($this->input->post('pin')),
                'brno' => strip_tags($this->input->post('brno')),
                'chartno' => strip_tags($this->input->post('chartno')),
                'dob' => strip_tags($this->input->post('dob')),
                'dom' => strip_tags($this->input->post('dom')),
                'isdead' => strip_tags($this->input->post('isdead')),
                'dod' => strip_tags($this->input->post('dod')),
                'lphone' => strip_tags($this->input->post('lphone')),
                'whatsapp' => strip_tags($this->input->post('whatsapp')),
                'mobile1' => strip_tags($this->input->post('mobile1')),
                'mobile2' => strip_tags($this->input->post('mobile2')),
                'email' => strip_tags($this->input->post('email')),
                'occupation' => strip_tags($this->input->post('occupation')),
                'achievements' => strip_tags($this->input->post('achievements')),
				'loc_url' => strip_tags($this->input->post('locurl')),
                'dname' => strip_tags($this->input->post('wname')),
                'dsmr' => strip_tags($this->input->post('wdmr')),
                'dsmrs' => strip_tags($this->input->post('wdmrs')),
                'dhousename' => strip_tags($this->input->post('whousename')),
                'dplase' => strip_tags($this->input->post('wplase')),
                'ddob' => strip_tags($this->input->post('wdob')),
                'disdead' => strip_tags($this->input->post('wisdead')),
                'ddod' => strip_tags($this->input->post('wdod')),
                'dwhatsappno' => strip_tags($this->input->post('whatsappno')),
                'dmobile' => strip_tags($this->input->post('wmobile')),
                'demail' => strip_tags($this->input->post('wemail')),
                'doccupation' => strip_tags($this->input->post('woccupation')),
                'dachievements' => strip_tags($this->input->post('wachievements')),
                'dgroupimage' => $picture1,
				'image' => $picture2,
				'ismale' => 1,
				'pageno' => strip_tags($this->input->post('pageno'))
            );
            
                 $insert = $this->admin_model->insert($userData);
                if($insert){
                    $this->session->set_flashdata('success_msg', ' success');
				
                    redirect('admin/view_family');
                }else{
					 $this->session->set_flashdata('error_msg', 'Some problems occurred, please try again.');
                    $data['error_msg'] = 'Some problems occured, please try again.';
                }
            
        }
       
     
       
    }
	
	
	
	public function view_family(){
			$data=array();
		$islog = $this->session->userdata('user_id');
		if($islog!=NULL)
		{
		$data['family']=$this->admin_model->family_list();	
		$data['gender']='0';
		
		$this->load->view('includes/header');
        $this->load->view('includes/sidebar');
        $this->load->view('family_details',$data);
        $this->load->view('includes/footer1');
			
		}
		else{
			
		redirect('/login');	
		}
		}
		
		
		public function view_family_mrs(){
			$data=array();
		$islog = $this->session->userdata('user_id');
		if($islog!=NULL)
		{
		$data['family']=$this->admin_model->family_list_mrs();
		$data['gender']='1';			
	
		$this->load->view('includes/header');
        $this->load->view('includes/sidebar');
        $this->load->view('family_details',$data);
        $this->load->view('includes/footer1');
			
		}
		else{
			
		redirect('/login');	
		}
		}
		
		
		
	
		
		
		public function edit_familymr($id){
			
		$islog = $this->session->userdata('user_id');
		if($islog!=NULL)
		{
			
		$data['editfamily']=$this->admin_model->edit_family($id);

        $this->load->view('includes/header');
        $this->load->view('includes/sidebar');
        $this->load->view('edit_family_details',$data);
        $this->load->view('includes/footer1');		
			
		}
		else{
			
		redirect('/login');	
		}
		}
		
		
		public function edit_familymrs($id){
			
		$islog = $this->session->userdata('user_id');
		if($islog!=NULL)
		{
			
		$data['editfamily']=$this->admin_model->edit_family($id);

        $this->load->view('includes/header');
        $this->load->view('includes/sidebar');
        $this->load->view('edit_family_detailsmrs',$data);
        $this->load->view('includes/footer1');		
			
		}
		else{
			
		redirect('/login');	
		}
		}
		
		
		public function update_familymr(){
			
		$islog = $this->session->userdata('user_id');
		if($islog!=NULL)
		{
			
			
			if(!empty($_FILES['groupimage']['name'])){
			
		$config['upload_path'] = 'uploads/images/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('groupimage'))
        {
            $error = array('error' => $this->upload->display_errors());
        }
        else
        {
            $upload_data=$this->upload->data();
            $picture1=$upload_data['file_name'];
        }
    }
    else{
                $picture1=$this->input->post('old_groupimage');
            }
			
			
			if(!empty($_FILES['image']['name'])){
			
		$config['upload_path'] = 'uploads/images/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('image'))
        {
            $error = array('error' => $this->upload->display_errors());
        }
        else
        {
            $upload_data=$this->upload->data();
            $picture2=$upload_data['file_name'];
        }
    }
    else{
                $picture2=$this->input->post('old_image');
            }
			
		 if($this->input->post('name')){
			 
			 $userData = array( 
				 'name' => strip_tags($this->input->post('name')),
				'parentid' => strip_tags($this->input->post('parentid')),
                'generation' => strip_tags($this->input->post('generation')),
                'housename' => strip_tags($this->input->post('housename')),
                'po' => strip_tags($this->input->post('po')),
                'panchayath' => strip_tags($this->input->post('panchayath')),
                'district' => strip_tags($this->input->post('district')),
                'pin' => strip_tags($this->input->post('pin')),
                'brno' => strip_tags($this->input->post('brno')),
                'chartno' => strip_tags($this->input->post('chartno')),
                'dob' => strip_tags($this->input->post('dob')),
                'dom' => strip_tags($this->input->post('dom')),
                'isdead' => strip_tags($this->input->post('isdead')),
                'dod' => strip_tags($this->input->post('dod')),
                'lphone' => strip_tags($this->input->post('lphone')),
                'whatsapp' => strip_tags($this->input->post('whatsapp')),
                'mobile1' => strip_tags($this->input->post('mobile1')),
                'mobile2' => strip_tags($this->input->post('mobile2')),
                'email' => strip_tags($this->input->post('email')),
                'occupation' => strip_tags($this->input->post('occupation')),
                'achievements' => strip_tags($this->input->post('achievements')),
				'loc_url' => strip_tags($this->input->post('locurl')),
                'dname' => strip_tags($this->input->post('wname')),
                'dsmr' => strip_tags($this->input->post('wdmr')),
                'dsmrs' => strip_tags($this->input->post('wdmrs')),
                'dhousename' => strip_tags($this->input->post('whousename')),
                'dplase' => strip_tags($this->input->post('wplase')),
                'ddob' => strip_tags($this->input->post('wdob')),
                'disdead' => strip_tags($this->input->post('wisdead')),
                'ddod' => strip_tags($this->input->post('wdod')),
                'dwhatsappno' => strip_tags($this->input->post('whatsappno')),
                'dmobile' => strip_tags($this->input->post('wmobile')),
                'demail' => strip_tags($this->input->post('wemail')),
                'doccupation' => strip_tags($this->input->post('woccupation')),
                'dachievements' => strip_tags($this->input->post('wachievements')),
                'dgroupimage' => $picture1,
				'image' => $picture2,
				'pageno' => strip_tags($this->input->post('pageno')) );
				
				$id= $this->input->post('id');
			 
			 
		 $update = $this->admin_model->update_family($userData,$id);
                if($update){
                    $this->session->set_flashdata('success_msg', 'Your Updation was successfully');
                    redirect('admin/view_family');
                }else{
                    $data['error_msg'] = 'Some problems occured, please try again.';
                }
			
		}
		else{
			
		redirect('user/login');	
		}
		}
		redirect('/login');	

		}
		
		
		
		
		public function update_familymrs()
		{
			
			
		$islog = $this->session->userdata('user_id');
		if($islog!=NULL)
		{
			
			
			if(!empty($_FILES['groupimage']['name'])){
			
		$config['upload_path'] = 'uploads/images/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('groupimage'))
        {
            $error = array('error' => $this->upload->display_errors());
        }
        else
        {
            $upload_data=$this->upload->data();
            $picture1=$upload_data['file_name'];
        }
    }
    else{
                $picture1=$this->input->post('old_groupimage');
            }
			
			
			if(!empty($_FILES['image']['name'])){
			
		$config['upload_path'] = 'uploads/images/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('image'))
        {
            $error = array('error' => $this->upload->display_errors());
        }
        else
        {
            $upload_data=$this->upload->data();
            $picture2=$upload_data['file_name'];
        }
    }
    else{
                $picture2=$this->input->post('old_image');
            }
			
			
		 if($this->input->post('name')){
			 
			 $userData = array( 
			   
				'name' => strip_tags($this->input->post('name')),
				'parentid' => strip_tags($this->input->post('parentid')),
                'generation' => strip_tags($this->input->post('generation')),
                'housename' => strip_tags($this->input->post('housename')),
                'po' => strip_tags($this->input->post('po')),
                'panchayath' => strip_tags($this->input->post('panchayath')),
                'district' => strip_tags($this->input->post('district')),
                'pin' => strip_tags($this->input->post('pin')),
                'brno' => strip_tags($this->input->post('brno')),
                'chartno' => strip_tags($this->input->post('chartno')),
                'dob' => strip_tags($this->input->post('dob')),
                'dom' => strip_tags($this->input->post('dom')),
                'isdead' => strip_tags($this->input->post('isdead')),
                'dod' => strip_tags($this->input->post('dod')),
                'lphone' => strip_tags($this->input->post('lphone')),
                'whatsapp' => strip_tags($this->input->post('whatsapp')),
                'mobile1' => strip_tags($this->input->post('mobile1')),
                'mobile2' => strip_tags($this->input->post('mobile2')),
                'email' => strip_tags($this->input->post('email')),
                'occupation' => strip_tags($this->input->post('occupation')),
                'achievements' => strip_tags($this->input->post('achievements')),
				'loc_url' => strip_tags($this->input->post('locurl')),
                'dname' => strip_tags($this->input->post('wname')),
                'dsmr' => strip_tags($this->input->post('wdmr')),
                'dsmrs' => strip_tags($this->input->post('wdmrs')),
                'dhousename' => strip_tags($this->input->post('whousename')),
                'dplase' => strip_tags($this->input->post('wplase')),
                'ddob' => strip_tags($this->input->post('wdob')),
                'disdead' => strip_tags($this->input->post('wisdead')),
                'ddod' => strip_tags($this->input->post('wdod')),
                'dwhatsappno' => strip_tags($this->input->post('whatsappno')),
                'dmobile' => strip_tags($this->input->post('wmobile')),
                'demail' => strip_tags($this->input->post('wemail')),
                'doccupation' => strip_tags($this->input->post('woccupation')),
                'dachievements' => strip_tags($this->input->post('wachievements')),
                'dgroupimage' => $picture1,
				'image' => $picture2,
				'ismale' => 1,
				'pageno' => strip_tags($this->input->post('pageno')) );
				
				$id= $this->input->post('id');
			 
			 
		 $update = $this->admin_model->update_family($userData,$id);
                if($update){
					
                    $this->session->set_flashdata('success_msg', 'Your Updation was successfully');
                    redirect('admin/view_family_mrs');
                }else{
					
					print_r($userData);
					 exit();
                    $data['error_msg'] = 'Some problems occured, please try again.';
                }
			
		}
		else{
			
		redirect('/login');	
		}
		}
       redirect('/login2');	
		}
		
		
		public function delete_family($id){
			
		$islog = $this->session->userdata('user_id');
		if($islog!=NULL)
		{
		
			 $userData = array('isactive' => 1);
				
			 
		 $delete = $this->admin_model->delete_family($userData,$id);
                if($delete)
				{
                    $this->session->set_flashdata('success_msg', 'Deleted  successfully');
                    redirect('admin/view_family');
                }
				else
				{
                    $data['error_msg'] = 'Some problems occured, please try again.';
					
					
                }
		
		}
		redirect('/login');	
		
		}
	
	
	
	
	
	
	
	public function children()
{
    $islog = $this->session->userdata('user_id');
    if($islog!=NULL)
    {

        
        $this->load->view('includes/header');
        $this->load->view('includes/sidebar');
        $this->load->view('children');
        $this->load->view('includes/footer');
    }
    else
    {
 
      redirect('/login');	
    }
}



	
	
	public function add_children()
{
	
$result = $this->admin_model->batchInsert($_POST);
  if($result)
				{
                    $this->session->set_flashdata('success_msg', '  success');
                    redirect('admin/children');
                }
				else
				{
                    $data['error_msg'] = 'Some problems occured, please try again.';
					
					
                }
}


public function view_children(){
		
		$data=array();
		$islog = $this->session->userdata('user_id');
		if($islog!=NULL)
		{
		$data['children']=$this->admin_model->children_list();
				
	
		$this->load->view('includes/header');
        $this->load->view('includes/sidebar');
        $this->load->view('children_details',$data);
        $this->load->view('includes/footer1');
			
		}
		else{
			
		redirect('/login');	
		}
		}
		
		
		public function delete_children($id){
			
		$islog = $this->session->userdata('user_id');
		if($islog!=NULL)
		{
		
		 $delete = $this->admin_model->delete_children($id);
                if($delete)
				{
                    $this->session->set_flashdata('success_msg', 'Deleted  successfully');
                    redirect('admin/view_children');
                }
				else
				{
                    $data['error_msg'] = 'Some problems occured, please try again.';
					
					
                }
		
		}
		redirect('/login');	
		
		}
	
	
	public function modify_seo($id='')
	{ 
			$islog = $this->session->userdata('user_id');
			$data=[];
			if($islog!=NULL)
			{ 
				//$data['editmap']=$this->admin_model->editmap($id);
				 if(isset($_POST['metaadd']))
				 {
						 $metatitle=$_POST['metatitle']; 
						 $pages=$_POST['pages'];
						 $metakeywords=$_POST['metakeywords'];
						 $metadescription=$_POST['metadescription'];
						 $h1_title=$_POST['h1_title'];
						 $userData = array( 
				        'h1_title' => strip_tags($this->input->post('h1_title')),
						'metatitle' => strip_tags($this->input->post('metatitle')),
						'metakeywords' => strip_tags($this->input->post('metakeywords')),
						'metadescription' => strip_tags($this->input->post('metadescription')), 
						'pages' => strip_tags($this->input->post('pages')) 
						);
						
						$id= $this->input->post('id');
					 
						$sel='id';$table='seo_table';$where['pages']=$pages;
						$getval=$this->admin_model->getrowlist($sel,$table,$where); 
						if(count($getval)>0){$gid=$getval[0]['id'];}else{$gid="";}
						if($gid != "")
						{
						  $this->admin_model->getmodify($userData,$gid,$table);
						}else{
						  $this->admin_model->getmodify($userData,0,$table);
						}
				 }
				 $this->load->view('admin/includes/header');
                 $this->load->view('admin/includes/sidebar');
                 $this->load->view('admin/modify_seo',$data);
                 $this->load->view('admin/includes/footer'); 
			}
			else{ 
			    redirect('/login');	
			}
	} 
	public function view_seo_det($page='')
	{ 
			$islog = $this->session->userdata('user_id');
			$data=[];
			$pages='';
			if(isset($_REQUEST['pages'])){
			   $pages=$_REQUEST['pages'];
			}
			if($islog!=NULL)
			{    $sel='*';$table='seo_table';$where['pages']=$pages;
				 $getval=$this->admin_model->getrowlist($sel,$table,$where); 
				 if(count($getval)>0){ 
				 $data['pages']=$getval[0]['pages'];
				 $data['metatitle']=$getval[0]['metatitle'];
				 $data['metakeywords']=$getval[0]['metakeywords'];
				 $data['metadescription']=$getval[0]['metadescription'];
				 $data['h1_title']=$getval[0]['h1_title'];
				 header('Content-Type: application/json; charset=utf-8');
				 
                 echo json_encode($data);
				 }else{
				 echo 0;
				 }
				 exit;
			}
			 
	} 
}

?>
