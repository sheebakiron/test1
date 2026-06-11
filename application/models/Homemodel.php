<?php
class Homemodel extends CI_Model {
     public function getClients()
    {
     
     $this->db->select('*');
	$this->db->from('pages');
	$this->db->where('isactive',0);
	$this->db->where('category',1);
	$this->db->order_by("id", "desc");
    $this->db->limit(12);  
	$query = $this->db->get();//echo $this->db->last_query();  die();
	return $query->result_array();

    }
    public function getGallery1()
    {
     
     $this->db->select('*');
	$this->db->from('gallery');
	$this->db->where('isactive',0);
	$this->db->where('category','Digital Offset');
	$query = $this->db->get();//echo $this->db->last_query();  die();
	return $query->result_array();

    }

     public function getGallery2()
    {
     
     $this->db->select('*');
	$this->db->from('gallery');
	$this->db->where('isactive',0);
	$this->db->where('category','3');
	$query = $this->db->get();//echo $this->db->last_query();  die();
	return $query->result_array();

    }
     public function getSingleBanner()
    {
     
     $this->db->select('*');
	$this->db->from('banner');
	$this->db->where('isactive',0);
	$this->db->order_by('id');
	$query = $this->db->get();//echo $this->db->last_query();  die();
	return $query->row_array();

    }
    public function getBanner($id)
    {
     
     $this->db->select('*');
	$this->db->from('banner');
	$this->db->where('isactive',0);
	$this->db->where('id!=',$id);

	$this->db->order_by('id');
	$query = $this->db->get();//echo $this->db->last_query();  die();
	return $query->result_array();

    }
    public function getTestimonials()
    {
     
     $this->db->select('*');
	$this->db->from('testimonials');
	$this->db->where('isactive',0);
	$this->db->order_by('id');
	$query = $this->db->get();//echo $this->db->last_query();  die();
	return $query->result_array();

    }
     public function getGallery()
    {
     
     $this->db->select('*');
	$this->db->from('gallery');
	$this->db->where('isactive',0);
	$this->db->order_by('id');
	$query = $this->db->get();//echo $this->db->last_query();  die();
	return $query->result_array();

    }
	public function insertData($data,$table)
	{
		$arr=[];
		 if(count($data)>0){
			foreach($data as $ind=>$data1){
				$arr[$ind]=$this->security->xss_clean($data1);
			}
		 }
        $this->db->insert($table,$arr);
	    
	
    }
	public function selData($data,$table,$where,$ord,$limit)
	{
		$this->db->select($data);
	    $this->db->from($table);
		if(count($where)>0){
			foreach($where as $field=>$val){
				$this->db->where($field,$val); 
			}
		}
		if($ord!=''){
		    foreach($ord as $field1=>$val1){
             $this->db->order_by($field1,$val1);
		    }
		}
		if($limit!=''){
			
		}
	   
		$query = $this->db->get();//echo $this->db->last_query();  die();
		return $query->result_array();
    }
	public function delData($data,$table,$where)
	{
		$this->db->select($data);
	    $this->db->from($table);
		if(count($where)>0){
			foreach($where as $field=>$val){
				$this->db->where($field,$val); 
			}
		}
		$query = $this->db->get(); 
	    $arr= $query->result_array(); 
		if(count($arr)>0)
		{
			foreach($arr as $arr1){
				$path_to_file = 'uploads/workfiles/'.$arr1[$data];
				@unlink($path_to_file);
			}
		}
	   
		if(count($where)>0){
			foreach($where as $field=>$val){
				$this->db->where($field,$val); 
			}
		}
        $this -> db -> delete($table);
    }
	public function getPages($table,$where,$data,$order)
    {
     
     $this->db->select($data);
	$this->db->from($table); 
	if(count($where)>0){
		foreach($where as $filed=>$val){
			$this->db->where($filed,$val);
		}
	}

	$this->db->order_by($order);
	$query = $this->db->get();//echo $this->db->last_query();  die();
	return $query->result_array();

    }
    //-----------
    public function getLtPages($table,$where,$data,$order,$limit,$like,$likekeyword)
    {
     
     $this->db->select($data);
	$this->db->from($table); 
	if(count($where)>0){
		foreach($where as $filed=>$val){
			$this->db->where($filed,$val);
		}
	}
    if($like != ""){
        $this->db->like($likekeyword,$like);
    }
	$this->db->order_by($order);
	$this->db->limit($limit);  
	$query = $this->db->get(); // echo $this->db->last_query();  die();
	return $query->result_array();

	//$this->db->order_by("id", "desc");
   // $this->db->limit($limit);  
	//$query = $this->db->get();//echo $this->db->last_query();  die();
//	return $query->result_array();

    }
	//pagination
	public function get_totalpage( $qry )
    {
     $query = $this->db->query($qry);
	 $count = $query->num_rows();
	 return $count;
    }
	public function get_pagination( $page,$qry,$count )
    {
    
	
    // Create the pagination links
    $this->load->library('pagination');
    $this->load->helper('url');

    $paging_conf = [
        'uri_segment'      => 3,
        'per_page'         => 1,
        'total_rows'       => $count,
        'base_url'         => site_url('projects?page='),
        'first_url'        => site_url('projects'),
        'use_page_numbers' => TRUE
    ];
    $this->pagination->initialize($paging_conf);

    // Create the paging buttons for the view
    $this->load->vars('pagination_links', $this->pagination->create_pagelinks());
	// The pagination offset
    $offset = $page * $paging_conf['per_page'] - $paging_conf['per_page'];

    // Get our set of foos
	 $querys=$qry.'LIMIT ' . $offset . ', ' . $paging_conf['per_page'];
	$query = $this->db->query($querys);
    //.$query = $this->db->get($table, $paging_conf['per_page'], $offset);
	if( $query->num_rows() > 0 )
        return $query->result_array();

    // Else return default
    return NULL;
   }
}
?>