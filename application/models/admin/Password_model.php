<?php
class password_model extends CI_model{
 
  function __construct() {
		$this->userTb1 = 'admin';
		
	
    }




    public function update_details($data,$id)
    {
     if(!empty($data) && !empty($id)){
            
            $update = $this->db->update($this->userTb1, $data, array('k_id'=>$id));
            return $update?true:false;
        }else{
            return false;
        }
    }


    function view_details($islog){
            $this->db->select("*");
            $this->db->from("$this->userTb1");
            $this->db->where("k_id",$islog);
            $query=$this->db->get();
           
             return $query->row_array();
        
    }
   

 }
 ?>