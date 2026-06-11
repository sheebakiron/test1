<?php
class Admin_model extends CI_model{
 var $userTbl;
 var $userTb3;
  function __construct() {
        $this->userTbl = 'family_details';
		$this->userTb3 = 'map';
    }
 




 public function insert($data = array()) {
       
        //insert user data to users table
        $insert = $this->db->insert($this->userTbl, $data);
        
        //return the status
        if($insert){
            return $this->db->insert_id();;
        }else{
            return false;
        }
    }
	
	
	
	
	
	function family_list(){
            $this->db->select("*");
            $this->db->from("family_details");
			$this->db->where("isactive",0);
			$this->db->where("ismale",0);
            $query=$this->db->get();
            return $query->result_array();
        
    }
	
	function family_list_mrs(){
            $this->db->select("*");
            $this->db->from("family_details");
			$this->db->where("isactive",0);
			$this->db->where("ismale",1);
            $query=$this->db->get();
            return $query->result_array();
        
    }
	
	
	function edit_family($id){
            $this->db->select("*");
            $this->db->from("family_details");
			$this->db->where("id",$id);
            $query=$this->db->get();
            return $query->result_array();
        
    }
	
	
		function select_paraent($id){
            $this->db->select("*");
            $this->db->from("family_details");
			$this->db->where("id",$id);
            $query=$this->db->get();
            return $query->result_array();
        
    }
	public function update_family($data, $id) {
        if(!empty($data) && !empty($id)){
            
            $update = $this->db->update('family_details', $data, array('id'=>$id));
            return $update?true:false;
        }else{
            return false;
        }
    }
    
	
	
	public function delete_family($data,$id){
         if(!empty($data) && !empty($id)){
            
            $update = $this->db->update('family_details', $data, array('id'=>$id));
            return $update?true:false;
        }else{
            return false;
        }
    }
	
	
	
	
	
	
	
	
	
	
	
	
	
	//  map start
	
	public function insert_map($data = array()) {
       
        //insert user data to users table
        $insert = $this->db->insert($this->userTb3, $data);
        
        //return the status
        if($insert){
            return $this->db->insert_id();;
        }else{
            return false;
        }
    }
	
	
	
 
		
function getRows(){
            $this->db->select("*");
            $this->db->from("map");
            $query=$this->db->get();
            return $query->result_array();
        
    }
	
	
	function editmap($id){
            $this->db->select("*");
            $this->db->from("map");
			$this->db->where("m_id",$id);
            $query=$this->db->get();
            return $query->result_array();
        
    }
	
	public function update_maps($data, $id) {
        if(!empty($data) && !empty($id)){
            
            $update = $this->db->update('map', $data, array('m_id'=>$id));
            return $update?true:false;
        }else{
            return false;
        }
    }
    
	
	
	public function delete($id){
        $delete = $this->db->delete('map',array('m_id'=>$id));
        return $delete?true:false;
    }
	
	
	/*end map */
	
	
	function batchInsert($data){
//get bill entries 

$count = count($data['name']);
for($i = 0; $i<$count; $i++){
$entries[] = array(
'name'=>$data['name'][$i],
'daughter'=>$data['daughter'][$i],
'refno'=>$data['refno'][$i],
'genno'=>$data['generno'][$i],
'dob'=>$data['dob'][$i],
'dom'=>$data['dom'][$i],
'dod'=>$data['dod'][$i],
'occupation'=>$data['occupation'][$i],
'achive'=>$data['achive'][$i],
'mobile'=>$data['mobile'][$i],
'parentid'=>$data['parentid']
);
}
$this->db->insert_batch('children', $entries); 
if($this->db->affected_rows() > 0)
return true;
else
return false;
}



function children_list(){
            $this->db->select("*");
            $this->db->from("family_details");
			$this->db->where("isactive",0);
            $query=$this->db->get();
            return $query->result_array();
        
    }
	
public function delete_children($id){
        $delete = $this->db->delete('children',array('parentid'=>$id));
        return $delete?true:false;
    }

public function getrowlist($sel,$table,$where){
            $this->db->select($sel);
            $this->db->from($table);
			$this->db->where($where);
            $query=$this->db->get();
            return $query->result_array();
        
    }

public function getmodify($data,$id,$table){
		if($id==0){
			$this->db->insert($table, $data);
		}else{
			$this->db->update($table, $data, array('id'=>$id));
		}
	}
 
}
 
 
?>