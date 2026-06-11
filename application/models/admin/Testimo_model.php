<?php
class Testimo_model extends CI_model{
 
  function __construct() {
        $this->userTbl = 'testimonials';
        
    }
 
public function insert_gallery($data = array()) {
       
        //insert user data to users table
        $insert = $this->db->insert($this->userTbl, $data);
        
        //return the status
        if($insert){
            return $this->db->insert_id();;
        }else{
            return false;
        }
    }
    
    function getgallery(){
            $this->db->select("*");
            $this->db->from("testimonials");
            
            $this->db->where("isactive",0);
            $query=$this->db->get();
            return $query->result_array();
        
    }
    
    
function editgallery($id){
            $this->db->select("*");
            $this->db->from($this->userTbl);
            $this->db->where("id",$id);
            $query=$this->db->get();
            return $query->result_array();
        
    }
    
public function update_gallery($data, $id) {
        if(!empty($data) && !empty($id)){
            
            $update = $this->db->update($this->userTbl, $data, array('id'=>$id));
            return $update?true:false;
        }else{
            return false;
        }
    }
    
    
    
    public function delete_gallery($id){
         if(!empty($id)){
           $data = array(
                
                'isactive' => 1 );
            $update = $this->db->update($this->userTbl, $data, array('id'=>$id));
            return $update?true:false;
        }else{
            return false;
        }
    }
    
    
    
    function get_title($id){
            $this->db->select("*");
            $this->db->from('service');
            $this->db->where("cat_id",$id);
            $this->db->where("isactive",0);

            $query = $this->db->get();
            
           $result = $query->result_array(); 

           return $result;

    }
}