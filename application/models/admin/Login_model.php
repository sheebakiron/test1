<?php
class Login_model extends CI_model{
 
 
 
 function __construct() {
      
		$this->userTb2 = 'slogin';	
		
    }
 

public function login_user($username,$pass){
 
  $this->db->select('*');
  $this->db->from('admin');
  $this->db->where('k_username',$username);
  //$this->db->where('k_password',$pass);

  $this->db->where('k_isactive',0);

 $query=$this->db->get();
 $user = $query->row();
$hashpass=md5($pass);
$dbpass=$user->k_password;
 //return $query->row_array();
//admin@asig@#$
if(!empty($user)){ 
    if($hashpass==$dbpass){
        return $query->row_array();
    }else {
            
                return false;
            }
/*if($this->verifyHashedPassword($pass, $user->k_password)){
  
 
                return $query->row_array();
            } else {
            
                return false;
            }*/
        } else {
            return false;
          }



 
}

function verifyHashedPassword($plainPassword, $hashedPassword)
    {  
        return password_verify($plainPassword, $hashedPassword) ? true : false;
    }


public function login_student($username,$pass){
 
  $this->db->select('*');
  $this->db->from('courses');
  $this->db->where('courses',$username);
  $this->db->where('year',$pass);
  $this->db->where('isactive',0);
 
  if($query=$this->db->get())
  {
      return $query->row_array();
  }
  else
  {
    return false;
  }
}

public function login_teacher($username,$pass){
 
  $this->db->select('*');
  $this->db->from('slogin');
  $this->db->where('username',$username);
  $this->db->where('password',$pass);
  $this->db->where('isactive',0);
 

  if($query=$this->db->get())
  {
      return $query->row_array();
  }
  else
  {
    return false;
  }
}

public function update_password($data,$id) {
        if(!empty($data) && !empty($id)){
            
            $update = $this->db->update($this->userTb2, $data, array('id'=>$id));
            return $update?true:false;
        }else{
            return false;
        }
    }


 
}
 
 
?>