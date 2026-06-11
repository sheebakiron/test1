<?php
class Banner_model extends CI_model{
 
  function __construct() {
        $this->userTbl = 'banner';
		$this->userTb2 = 'banner';
		
    }
 

	
	
	//  gallery category start
	
	public function insert_galcat($data = array()) {
       
        //insert user data to users table
        $insert = $this->db->insert($this->userTbl, $data);
        
        //return the status
        if($insert){
            return $this->db->insert_id();;
        }else{
            return false;
        }
    }
	
	
	
 
		
function getgalcat(){
            $this->db->select("*");
            $this->db->from($this->userTbl);
			$this->db->where("isactive",0);
            $query=$this->db->get();
            return $query->result_array();
        
    }
	
	
function editgalcat($id){
            $this->db->select("*");
            $this->db->from($this->userTbl);
			$this->db->where("id",$id);
            $query=$this->db->get();
            return $query->result_array();
        
    }
	
public function update_galcat($data, $id) {
        if(!empty($data) && !empty($id)){
            
            $update = $this->db->update($this->userTbl, $data, array('id'=>$id));
            return $update?true:false;
        }else{
            return false;
        }
    }
    
	
	
	public function delete_galcat($id){
         if(!empty($id)){
           $data = array(
                
				'isactive' => 1 );
            $update = $this->db->update($this->userTbl, $data, array('id'=>$id));
            return $update?true:false;
        }else{
            return false;
        }
    }
	
	
	
	////////////////////////////////////////////////////////////////////////
	
	
	
	public function insert_gallery($data = array()) {
       
        //insert user data to users table
        $insert = $this->db->insert($this->userTb2, $data);
        
        //return the status
        if($insert){
            return $this->db->insert_id();;
        }else{
            return false;
        }
    }
	
	function getgallery(){
            $this->db->select("*");
            $this->db->from("banner as a");
			$this->db->where("a.isactive",0);
            $query=$this->db->get();
            return $query->result_array();
        
    }
	
	
function editgallery($id){
            $this->db->select("*");
            $this->db->from($this->userTb2);
			$this->db->where("id",$id);
            $query=$this->db->get();
            return $query->result_array();
        
    }
	
public function update_gallery($data, $id) {
        if(!empty($data) && !empty($id)){
            
            $update = $this->db->update($this->userTb2, $data, array('id'=>$id));
            return $update?true:false;
        }else{
            return false;
        }
    }
    
	
	
public function delete_gallery($id){
         if(!empty($id)){
           $data = array(
                
                'isactive' => 1 );
            $update = $this->db->update($this->userTb2, $data, array('id'=>$id));
            return $update?true:false;
        }else{
            return false;
        }
    }


}
 
 
?>