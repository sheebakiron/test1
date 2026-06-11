<?php
class Page_model extends CI_model{
 
  function __construct() {
        $this->userTbl = 'pages';
        
    }
 
public function insert_page($data,$table) {
       
        //insert user data to users table
        $insert = $this->db->insert($table, $data);
        
        //return the status
        if($insert){
            return $this->db->insert_id();;
        }else{
            return false;
        }
    }
    
    function getpage($data,$table,$where){
            $this->db->select($data);
            $this->db->from($table);
            if(count($where)>0){
                foreach($where as $filed=>$val){
                    $this->db->where($filed,$val);
                }
            }
            
            $query=$this->db->get();
            return $query->result_array();
        
    }
    
    
function editpage($data,$table,$where){
            $this->db->select($data);
            $this->db->from($table);
            if(count($where)>0){
                foreach($where as $filed=>$val){
                    $this->db->where($filed,$val);
                }
            }
            $query=$this->db->get();
            return $query->result_array();
        
    }
    
public function update_page($data,$table,$where=array()) {
        if(!empty($data)){
            
            $update = $this->db->update($table, $data, $where);//array('id'=>$id)
            return $update?true:false;
        }else{
            return false;
        }
    }
    
    
    
    public function delete_page($id,$table,$data,$where){
         if(!empty($id)){
           
            $update = $this->db->update($table, $data, $where);
            return $update?true:false;
        }else{
            return false;
        }
    }
    function gettabs($table){
        $fields = $this->db->field_data($table);
        return $fields;
       /* foreach ($fields as $field)
        {
        echo $field->name;
        echo $field->type;
        echo $field->max_length;
        echo $field->primary_key;
        }
        */
        
    }
   //nov11
   public function did_delete_row($where,$table){
    $this -> db -> where($where);
    $this -> db -> delete($table);
   }
}