<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
		$this->load->model('Homemodel');
		 
	}
	
	 
	 public function index()
	{
	/*	$table='pages';
		$data='*'; 
		$type=1;
		$where=array('isactive'=>0,'category'=>$type);
		$order='id desc';
		$clients=$this->Homemodel->getPages($table,$where,$data,$order);*/
		$data['clients']=$this->Homemodel->getClients();
	  
		//$data['clients']=$clients;
		//get seo details
		$uri=uri_string();
	    $uri_url=explode("/",$uri);
		$landpage='index';
		if($uri_url[0]!=''){
		$landpage=$uri_url[0];
		} 
		$where=array('pages'=>$landpage);
		$seodata['seoDetails']=$this->Homemodel->getPages('seo_table',$where,'*','id desc');
		$this->load->view('includes/header',$seodata);
		//get seo details
		$this->load->view('home',$data);
		$this->load->view('includes/footer');
	}
	public function clients()
	{ 
		$order='id desc'; 
		$clients=$this->getPages(1,'clients','clients',$order); 
	}
	public function agencies()
	{  
		$order='id desc'; 
		$clients=$this->getPages(2,'agencies','agencies',$order); 
	}
	public function news()
	{  
		$clients=$this->getPages(3,'news','news'); 
	}
	public function career()
	{  
		$clients=$this->getPages(4,'career','career'); 
	}
	 public function about()
	{
		//$data['testimonials']=$this->Homemodel->getTestimonials();
		$data=[];
		//get seo details
		$uri=uri_string();
	    $uri_url=explode("/",$uri);
		$landpage='index';
		if($uri_url[0]!=''){
		$landpage=$uri_url[0];
		} 
		$where=array('pages'=>$landpage);
		$seodata['seoDetails']=$this->Homemodel->getPages('seo_table',$where,'*','id desc');
		$this->load->view('includes/header',$seodata);
		//get seo details
		$this->load->view('about',$data);
		$this->load->view('includes/footer');
	}
	 public function gallery()
	{
         
        $data['gallery2']=$this->Homemodel->getGallery2();

		//get seo details
		$uri=uri_string();
	    $uri_url=explode("/",$uri);
		$landpage='index';
		if($uri_url[0]!=''){
		$landpage=$uri_url[0];
		} 
		$where=array('pages'=>$landpage);
		$seodata['seoDetails']=$this->Homemodel->getPages('seo_table',$where,'*','id desc');
		$this->load->view('includes/header',$seodata);
		//get seo details
		$this->load->view('gallery',$data);
		$this->load->view('includes/footer');
	}
	 public function services()
	{
		//get seo details
		$uri=uri_string();
	    $uri_url=explode("/",$uri);
		$landpage='index';
		if($uri_url[0]!=''){
		$landpage=$uri_url[0];
		} 
		$where=array('pages'=>$landpage);
		$seodata['seoDetails']=$this->Homemodel->getPages('seo_table',$where,'*','id desc');
		$this->load->view('includes/header',$seodata);
		//get seo details
		$this->load->view('service');
		$this->load->view('includes/footer');
	}
	 public function service2()
	{
		//get seo details
		$uri=uri_string();
	    $uri_url=explode("/",$uri);
		$landpage='index';
		if($uri_url[0]!=''){
		$landpage=$uri_url[0];
		} 
		$where=array('pages'=>$landpage);
		$seodata['seoDetails']=$this->Homemodel->getPages('seo_table',$where,'*','id desc');
		$this->load->view('includes/header',$seodata);
		//get seo details
		$this->load->view('service2');
		$this->load->view('includes/footer');
	}
	public function quote()
	{
		//get seo details
		$uri=uri_string();
	    $uri_url=explode("/",$uri);
		$landpage='index';
		if($uri_url[0]!=''){
		$landpage=$uri_url[0];
		} 
		$where=array('pages'=>$landpage);
		$seodata['seoDetails']=$this->Homemodel->getPages('seo_table',$where,'*','id desc');
		$this->load->view('includes/header',$seodata);
		//get seo details
		$this->load->view('quote');
		$this->load->view('includes/footer');
	}
	public function contact()
	{
		//get seo details
		$uri=uri_string();
	    $uri_url=explode("/",$uri);
		$landpage='index';
		if($uri_url[0]!=''){
		$landpage=$uri_url[0];
		} 
		$where=array('pages'=>$landpage);
		$seodata['seoDetails']=$this->Homemodel->getPages('seo_table',$where,'*','id desc');
		$this->load->view('includes/header',$seodata);
		//get seo details
		$this->load->view('contact');
		$this->load->view('includes/footer');
	}
	 
public function agenciesView($id='',$url='')
	{  
		$order='id desc'; 
		 
		$table='pages';
		$data='*'; 
		$where=array('isactive'=>0,'id'=>$id);
		$dat=$this->Homemodel->getPages($table,$where,$data,$order);
		
		$folder='agencies';
		$tmpl='agenciesView';
		$data1['datlist']=$dat;
		$data1['folder']=$folder;
		
		//get seo details
		$uri=uri_string();
	    $uri_url=explode("/",$uri);
		$landpage='index';
		if($uri_url[0]!=''){
		$landpage=$uri_url[0];
		} 
		$where=array('pages'=>$landpage);
		$seodata['seoDetails']=$this->Homemodel->getPages('seo_table',$where,'*','id desc');
		$this->load->view('includes/header',$seodata);
		//get seo details
		
		$this->load->view($tmpl,$data1);
		
		
		$this->load->view('includes/footer');
		//$clients=$this->getViews($table,$where,$data,'agenciesView','agencies',$order); 
	}
    
	public function getPages($type,$tmpl,$folder,$order='')
	{ 
		$table='pages';
		$data='*'; 
		$where=array('isactive'=>0,'category'=>$type);
		
		$dat=$this->Homemodel->getPages($table,$where,$data,$order);
		$data1['datlist']=$dat;
		$data1['folder']=$folder;
		//get seo details
		$uri=uri_string();
	    $uri_url=explode("/",$uri);
		$landpage='index';
		if($uri_url[0]!=''){
		$landpage=$uri_url[0];
		} 
		$where=array('pages'=>$landpage);
		$seodata['seoDetails']=$this->Homemodel->getPages('seo_table',$where,'*','id desc');
		$this->load->view('includes/header',$seodata);
		//get seo details
		$this->load->view($tmpl,$data1);
		$this->load->view('includes/footer');
	}

	public function getViews($table,$where,$data,$tmpl,$folder,$order='')
	{
		 
		$dat=$this->Homemodel->getPages($table,$where,$data,$order);
		$data1['datlist']=$dat;
		$data1['folder']=$folder;
		//get seo details
		$uri=uri_string();
	    $uri_url=explode("/",$uri);
		$landpage='index';
		if($uri_url[0]!=''){
		$landpage=$uri_url[0];
		}  
		$where=array('pages'=>$landpage);
		$seodata['seoDetails']=$this->Homemodel->getPages('seo_table',$where,'*','id desc');
		$this->load->view('includes/header',$seodata);
		//get seo details
		$this->load->view($tmpl,$data1);
		$this->load->view('includes/footer');
	}
//-------------subservices pages sep 26 25
	 public function subservices()
	{
		//get seo details
		$uri=uri_string(); 
	    $uri_url=explode("/",$uri);
		$landpage='index';$landpages='services';
		if($uri_url[1]!=''){
		    $landpage=$uri_url[1];
			$landpages=str_replace("-","",$uri_url[1]);
		} 
		 
		$where=array('pages'=>$landpage);
		$seodata['seoDetails']=$this->Homemodel->getPages('seo_table',$where,'*','id desc');
		$subdata['seoSubpage']=$landpage;
		 
		$this->load->view('includes/header',$seodata);
		//get seo details
		$subdata['subbody'] = $this->load->view($landpages, '', true);
		$this->load->view('subservices',$subdata);
		$this->load->view('includes/footer');
	}
	
	//-----------------------------------------
//nov10 25
	public function project_details($id,$name)
	{ 
		$table='projects';
		$data='*'; 
		$where=array('isactive'=>0);
		
		$where1=array('isactive'=>0,'id'=>$id);
		$dat1=$this->Homemodel->getPages($table,$where1,$data,$order);
		//---------------------
		$where11=array('isactive'=>0);
		$like=$dat1[0]['client'];
		$likekeyword='client';
		$lt=8;
		$dat=$this->Homemodel->getLtPages($table,$where11,$data,$order,$lt,$like,$likekeyword);
		$data1['datlist']=$dat;
		//-------------------
		$data1['row']=$dat1;
		$data1['row_id']=$id;
		$data1['folder']=$folder;
		//get seo details
		$uri=uri_string();
	    $uri_url=explode("/",$uri);
		$landpage='index';
		if($uri_url[1]!=''){
		$landpage=$uri_url[1];
		} 
		$tmpl='project-details';
		$where=array('pages'=>$landpage);
		$seodata['seoDetails']=$this->Homemodel->getPages('seo_table',$where,'*','id desc');
		$this->load->view('includes/header',$seodata);
		//get seo details
		$this->load->view($tmpl,$data1);
		$this->load->view('includes/footer');
	}
public function projects()
	{ 
		$table='projects';
		$data='*'; 
		$where=array('isactive'=>0);
		$qry='SELECT *
		FROM projects
		';
		$count=$this->Homemodel->get_totalpage( $qry );
		$page=1; 
		if(isset($_GET['page']) && $_GET['page']>0){
		      $page=$_GET['page']; 
		  }
		$dat=$this->Homemodel->get_pagination($page,$qry,$count);
		$data1['datlist']=$dat;
		$data1['folder']=$folder;
		//get seo details
		$uri=uri_string();
	    $uri_url=explode("/",$uri);
		$landpage='index';
		if($uri_url[1]!=''){
		$landpage=$uri_url[1];
		} 
		$tmpl='projects';
		$where=array('pages'=>$landpage);
		$seodata['seoDetails']=$this->Homemodel->getPages('seo_table',$where,'*','id desc');
		$this->load->view('includes/header',$seodata);
		//get seo details
		$this->load->view($tmpl,$data1);
		$this->load->view('includes/footer');
	}
	

}
