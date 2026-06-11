<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {
	
	public function __construct(){
 
        parent::__construct();
  			$this->load->helper('url');
  	 		$this->load->model('admin/Page_model');
        $this->load->library('session');
 
}

	
public function addpage(){
        $data = array();
        $userData = array();
        if($this->input->post()){
        $folder=$this->input->post('folder');
        $table=$this->input->post('table');
        $category=$this->input->post('category');
        $page=$this->input->post('page');
        $editid=$this->input->post('editid');
        if($this->input->post('editor1'))
        {
            $editor1=$this->input->post('editor1');
            if(!($this->input->post('description')))
            {
                 $_POST['description']=$editor1;
            }
        } 
        unset($_POST['editid']);unset($_POST['editor1']);
        unset($_POST['folder']); unset($_POST['table']);unset($_POST['page']);//unset($_POST['category']);
        //unset($this->input->post('folder'));
        //$userData = $this->input->post();
        }
        $upload=1; 
        $userData = $this->input->post(); 
			if(!empty($_FILES['image']['name'])){
                $config['upload_path'] = './uploads/'.$folder.'/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['image']['name'];
                
				//echo $config['upload_path'];die;
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
               // echo $config['upload_path'];die;
                if($this->upload->do_upload('image')){
                    $uploadData = $this->upload->data();
                    $picture = $uploadData['file_name'];
                    $userData['image']=$picture;
                }else{
                    $upload=0;
                   $uploaderr=$this->upload->display_errors();

                }
            }else{
                $picture = '';
            }
            if($upload!=0)
            {
           
           
                if($editid==0){
                    $insert = $this->Page_model->insert_page($userData,$table);
                }else{
                    $where=array('id'=>$editid);
                    $insert =  $this->Page_model->update_page($userData,$table,$where);
                }
              
                if($insert)
				{
                    $this->session->set_flashdata('success_msg', 'Successfully');
                    redirect('admin/Pages/view_'.$page);
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

       
     public function add_clients($id=0)
        {
                $table='pages';
                $data='*';
                $folder='clients';
                $upfolder='uploads/';
                $title='Clients';
                $type=1;
                $page='clients';
                
                $where=array('isactive'=>0);
                $tabs=$this->Page_model->gettabs($table);
                $tabsstat=array('0'=>'Yes','1'=>'No');
                $excludearr=array('id');
                $editvals=[];
                if($id!=0){
                    $whereval=array('id'=>$id);
                    $editvals=$this->Page_model->editpage($data,$table,$whereval);
                }
                //----------------
                $listdatas=array('name','image','date','isactive','description');
                $textdatas=array('name');
                $imgdatas=array('image');
                $datedatas=array('date');
                $statdatas=array('isactive');
                $descdatas=array('description');
                $fckdescdatas=array();
                $lnktitle='clients';
                $lnkid='id';
                $dropdatas['isactive']=array('0'=>'Active','1'=>'Not Active');
                $editid=$id;
                //-------------------------------------
               /* $arrdat=[];
                if(count($tabs)>0){
                    foreach($tabs as $tabs1){
                        if($tabs1->name!='id'){
                        $arrdat[]=$tabs1;
                        }
                    }
                }*/
               // $wherestat=array('status'=>1);
               // $catarr=$this->Page_model->getpage('*','category',$wherestat);
                $catarr=array();
                $this->add_page($editid,$table,$folder,$where,$data,$title,$catarr,$tabs,$excludearr,$tabsstat,$type,$page,$editvals,$id,$upfolder,$listdatas,$imgdatas,$datedatas,$statdatas,$dropdatas,$textdatas,$lnktitle,$lnkid,$descdatas,$fckdescdatas);
        } 

//-clients
public function add_agencies($id=0)
        {
                $table='pages';
                $data='*';
                $folder='agencies';
                $upfolder='uploads/';
                $title='Agencies';
                $type=2;
                $page='agencies';
                
                $where=array('isactive'=>0);
                $tabs=$this->Page_model->gettabs($table);
                $tabsstat=array('0'=>'Yes','1'=>'No');
                $excludearr=array('id');
                $editvals=[];
                if($id!=0){
                    $whereval=array('id'=>$id);
                    $editvals=$this->Page_model->editpage($data,$table,$whereval);
                }
                //----------------
                $listdatas=array('name','image','date','isactive','description');
                $textdatas=array('name');
                $imgdatas=array('image');
                $datedatas=array('date');
                $statdatas=array('isactive');
                $descdatas=array('description');
                $fckdescdatas=array();
                $lnktitle='clients';
                $lnkid='id';
                $dropdatas['isactive']=array('0'=>'Active','1'=>'Not Active');
                $editid=$id;
                
                $catarr=array();
                $this->add_page($editid,$table,$folder,$where,$data,$title,$catarr,$tabs,$excludearr,$tabsstat,$type,$page,$editvals,$id,$upfolder,$listdatas,$imgdatas,$datedatas,$statdatas,$dropdatas,$textdatas,$lnktitle,$lnkid,$descdatas,$fckdescdatas);
        } 
        //---------news-------------
        public function add_news($id=0)
        {
                $table='pages';
                $data='*';
                $folder='news';
                $upfolder='uploads/';
                $title='News';
                $type=3;
                $page='news';
                
                $where=array('isactive'=>0);
                $tabs=$this->Page_model->gettabs($table);
                $tabsstat=array('0'=>'Yes','1'=>'No');
                $excludearr=array('id');
                $editvals=[];
                if($id!=0){
                    $whereval=array('id'=>$id);
                    $editvals=$this->Page_model->editpage($data,$table,$whereval);
                }
                //----------------
                $listdatas=array('name','image','date','isactive','smalldescription','description');
                $textdatas=array('name');
                $imgdatas=array('image');
                $datedatas=array('date');
                $statdatas=array('isactive');
                $descdatas=array('smalldescription');
                $fckdescdatas=array('description');
                $lnktitle='clients';
                $lnkid='id';
                $dropdatas['isactive']=array('0'=>'Active','1'=>'Not Active');
                $editid=$id;
                
                $catarr=array();
                $this->add_page($editid,$table,$folder,$where,$data,$title,$catarr,$tabs,$excludearr,$tabsstat,$type,$page,$editvals,$id,$upfolder,$listdatas,$imgdatas,$datedatas,$statdatas,$dropdatas,$textdatas,$lnktitle,$lnkid,$descdatas,$fckdescdatas);
        } 
        //----------------------
         //---------career-------------
         public function add_career($id=0)
         {
                 $table='pages';
                 $data='*';
                 $folder='career';
                 $upfolder='uploads/';
                 $title='Career';
                 $type=4;
                 $page='career';
                 
                 $where=array('isactive'=>0);
                 $tabs=$this->Page_model->gettabs($table);
                 $tabsstat=array('0'=>'Yes','1'=>'No');
                 $excludearr=array('id');
                 $editvals=[];
                 if($id!=0){
                     $whereval=array('id'=>$id);
                     $editvals=$this->Page_model->editpage($data,$table,$whereval);
                 }
                 //----------------
                 $listdatas=array('name','date','isactive','smalldescription','description');
                 $textdatas=array('name');
                 $imgdatas=array('image');
                 $datedatas=array('date');
                 $statdatas=array('isactive');
                 $descdatas=array('smalldescription');
                 $fckdescdatas=array('description');
                 $lnktitle='clients';
                 $lnkid='id';
                 $dropdatas['isactive']=array('0'=>'Active','1'=>'Not Active');
                 $editid=$id;
                 
                 $catarr=array();
                 $this->add_page($editid,$table,$folder,$where,$data,$title,$catarr,$tabs,$excludearr,$tabsstat,$type,$page,$editvals,$id,$upfolder,$listdatas,$imgdatas,$datedatas,$statdatas,$dropdatas,$textdatas,$lnktitle,$lnkid,$descdatas,$fckdescdatas);
         } 
         //----------------------

public function add_page($editid,$table,$folder,$where,$data,$title,$catarr,$tabs,$excludearr,$tabsstat,$type,$page,$editvals,$id,$upfolder,$listdatas,$imgdatas,$datedatas,$statdatas,$dropdatas,$textdatas,$lnktitle,$lnkid,$descdatas,$fckdescdatas=array())
{
	$data = array();
    $islog = $this->session->userdata('user_id');
    if($islog!=NULL)
    {
		$data['folder']=$folder;
        $data['title']=$title;
        $data['catarr']=$catarr;
        $data['tabs']=$tabs;
        $data['excludearr']=$excludearr;
        $data['tabsstat']=$tabsstat;
        $data['table']=$table;
        $data['type']=$type;
        $data['page']=$page;
        $data['editvals']=$editvals;
        $data['upfolder']=$upfolder;
        $data['picfolder']=$folder.'/';
        //--------------------
        $data['listdatas']=$listdatas;
        $data['imgdatas']=$imgdatas;
        $data['datedatas']=$datedatas;
        $data['statdatas']=$statdatas;
        $data['dropdatas']=$dropdatas;
        $data['textdatas']=$textdatas;
        $data['lnktitle']=$lnktitle;
        $data['lnkid']=$lnkid;
        $data['descdatas']=$descdatas;
        $data['fckdescdatas']=$fckdescdatas;
        $data['editid']=$editid;
        //---------------------------
        $this->load->view('admin/includes/header');
        $this->load->view('admin/includes/sidebar');
        $this->load->view('admin/add_page',$data);
        $this->load->view('admin/includes/footer');
    }
    else
    { 
       redirect('/login');	
    }
}


public function view_clients()
{
        $table='pages';
        $data='*';
        //--------------status updation----------------
        if($this->input->get('statid')){
        $statid=$this->input->get('statid');
        $stat=$this->input->get('stat');
        $statval=0;
        if($stat==0){
            $statval=1;  
        }
        $wherestat=array('id'=>$statid);
        $userDats = array(
            'isactive'=>$statval
        );
        $this->Page_model->update_page($userDats,$table,$wherestat);
        }
        //--------------status updation----------------
        $folder='uploads/clients';
        $title='Clients';
         $where=array('isactive !='=>2,'category'=>1);
       // $where=array();
        $listdatas=array('name','image','date','isactive' );
        $textdatas=array('name');
        $imgdatas=array('image');
        $datedatas=array('date');
        $statdatas=array('isactive');
        $descdatas=array('description');
        $lnktitle='clients';
        $lnkid='id';
        $dropdatas['isactive']=array('0'=>'Active','1'=>'Not Active');

        $this->view_page($descdatas,$table,$folder,$where,$data,$title,$listdatas,$imgdatas,$datedatas,$statdatas,$dropdatas,$textdatas,$lnktitle,$lnkid);
}
//clients
//agencies
public function view_agencies()
{
        $table='pages';
        $data='*';
        //--------------status updation----------------
        if($this->input->get('statid')){
        $statid=$this->input->get('statid');
        $stat=$this->input->get('stat');
        $statval=0;
        if($stat==0){
            $statval=1;  
        }
        $wherestat=array('id'=>$statid);
        $userDats = array(
            'isactive'=>$statval
        );
        $this->Page_model->update_page($userDats,$table,$wherestat);
        }
        //--------------status updation----------------
        $folder='uploads/agencies';
        $type=2;
        $title='Agencies';
         $where=array('isactive !='=>2,'category'=>2);
       // $where=array();
        $listdatas=array('name','image','date','isactive' );
        $textdatas=array('name');
        $imgdatas=array('image');
        $datedatas=array('date');
        $statdatas=array('isactive');
        $descdatas=array('description');
        $lnktitle='agencies';
        $lnkid='id';
        $dropdatas['isactive']=array('0'=>'Active','1'=>'Not Active');

        $this->view_page($descdatas,$table,$folder,$where,$data,$title,$listdatas,$imgdatas,$datedatas,$statdatas,$dropdatas,$textdatas,$lnktitle,$lnkid);
}
//news
public function view_news()
{
        $table='pages';
        $data='*';
        //--------------status updation----------------
        if($this->input->get('statid')){
        $statid=$this->input->get('statid');
        $stat=$this->input->get('stat');
        $statval=0;
        if($stat==0){
            $statval=1;  
        }
        $wherestat=array('id'=>$statid);
        $userDats = array(
            'isactive'=>$statval
        );
        $this->Page_model->update_page($userDats,$table,$wherestat);
        }
        //--------------status updation----------------
        $folder='uploads/news';
        $type=2;
        $title='News';
         $where=array('isactive !='=>2,'category'=>3);
       // $where=array();
        $listdatas=array('name','image','date','isactive' );
        $textdatas=array('name');
        $imgdatas=array('image');
        $datedatas=array('date');
        $statdatas=array('isactive');
        $descdatas=array('description');
        $lnktitle='news';
        $lnkid='id';
        $dropdatas['isactive']=array('0'=>'Active','1'=>'Not Active');

        $this->view_page($descdatas,$table,$folder,$where,$data,$title,$listdatas,$imgdatas,$datedatas,$statdatas,$dropdatas,$textdatas,$lnktitle,$lnkid);
}
//career
public function view_career()
{
        $table='pages';
        $data='*';
        //--------------status updation----------------
        if($this->input->get('statid')){
        $statid=$this->input->get('statid');
        $stat=$this->input->get('stat');
        $statval=0;
        if($stat==0){
            $statval=1;  
        }
        $wherestat=array('id'=>$statid);
        $userDats = array(
            'isactive'=>$statval
        );
        $this->Page_model->update_page($userDats,$table,$wherestat);
        }
        //--------------status updation----------------
        $folder='uploads/career';
        $type=2;
        $title='Career';
         $where=array('isactive !='=>2,'category'=>4);
       // $where=array();
        $listdatas=array('name','date','isactive' );
        $textdatas=array('name');
        $imgdatas=array('image');
        $datedatas=array('date');
        $statdatas=array('isactive');
        $descdatas=array('description');
        $lnktitle='career';
        $lnkid='id';
        $dropdatas['isactive']=array('0'=>'Active','1'=>'Not Active');

        $this->view_page($descdatas,$table,$folder,$where,$data,$title,$listdatas,$imgdatas,$datedatas,$statdatas,$dropdatas,$textdatas,$lnktitle,$lnkid);
}
public function view_page($descdatas,$table,$folder,$where,$data,$title,$listdatas,$imgdatas,$datedatas,$statdatas,$dropdatas,$textdatas,$lnktitle,$lnkid)
{
		$data=array();
		$islog = $this->session->userdata('user_id');
		if($islog!=NULL)
		{
	    //$data['galcat']=$this->gallery_model->getgalcat();	$data,$table,$where 
		$data['lists']=$this->Page_model->getpage($data,$table,$where);	
        $data['folder']=$folder;
        $data['title']=$title;
        $data['listdatas']=$listdatas;
        $data['imgdatas']=$imgdatas;
        $data['datedatas']=$datedatas;
        $data['statdatas']=$statdatas;
        $data['dropdatas']=$dropdatas;
        $data['textdatas']=$textdatas;
        $data['lnktitle']=$lnktitle;
        $data['lnkid']=$lnkid;
        $data['descdatas']=$descdatas;
	
		$this->load->view('admin/includes/header');
        $this->load->view('admin/includes/sidebar');
        $this->load->view('admin/view_page',$data);
        $this->load->view('admin/includes/footer');
			
		}
		else
        {
		redirect('/login');	
		}
}
public function delete_career($id)
       {  
            $table='pages';
            $data = array(
                
                'isactive' => 2 );
                $where=array('id'=>$id);
                $view='career';
            $this->delete_page($id,$table,$data,$where,$view); 
		}
public function delete_news($id)
       {  
            $table='pages';
            $data = array(
                
                'isactive' => 2 );
                $where=array('id'=>$id);
                $view='news';
            $this->delete_page($id,$table,$data,$where,$view); 
		}		
public function delete_agencies($id)
       {  
            $table='pages';
            $data = array(
                
                'isactive' => 2 );
                $where=array('id'=>$id);
                $view='agencies';
            $this->delete_page($id,$table,$data,$where,$view); 
		}		
		
public function delete_clients($id)
       {  
            $table='pages';
            $data = array(
                
                'isactive' => 2 );
                $where=array('id'=>$id);
                $view='clients';
            $this->delete_page($id,$table,$data,$where,$view); 
		}
		
public function delete_page($id,$table,$data,$where,$view)
       { 
            $islog = $this->session->userdata('user_id');
            if($islog!=NULL)
            { 
            $delete=$this->Page_model->delete_page($id,$table,$data,$where); 
            redirect('admin/Pages/view_'.$view);	 
            }
            else
            { 
            redirect('/login');	
            }
        } 
     
		 
}
       ?>