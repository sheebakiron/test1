<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {
    
	  public function __construct(){
 
        parent::__construct();
  	    $this->load->library('email');
}
	 
	public function index()
	{
	    
    
    if (isset($_POST['page'])) {
         
      $this->contact($_POST['page']);
    }
     
    
	}
        
        
     
     
    

public  function quote()
{
     $fromemail=$this->input->post('email');
     $toemail = "colortone@colortone.co.in";
     $data=array();
     $data['contact']=array('name'=>$this->input->post('name'),
                    'phone'=>$this->input->post('phone'),
                    'email'=>$this->input->post('email'),
                    'photobook'=>$this->input->post('photobook'),
                    'message'=>$this->input->post('message'));

    $mesg=$this->load->view('admin/template/quote',$data,true);
// or
    $config=array(
    'charset'=>'utf-8',
   'wordwrap'=> TRUE,
   'mailtype' => 'html'
   );

   $this->email->initialize($config);
   $this->email->to($toemail);
   $this->email->from($fromemail);
   $this->email->subject('Quote Request');
   $this->email->message($mesg);
   $mail = $this->email->send();
    if($mail)
   {
    $this->session->set_flashdata('message', 'Quote request send successfully');
    redirect('Home/quote');
   }
   else
  {
    show_error($this->email->print_debugger());
  }
}  

public  function contact($page)
{
     $fromemail=$this->input->post('email');
     $toemail = "info@asigwll.com";
     $data=array();
     $data['contact']=array('name'=>$this->input->post('name'),
                    'subject'=>$this->input->post('subject'),
                    'email'=>$this->input->post('email'),
                    
                    'message'=>$this->input->post('message'));

    $mesg=$this->load->view('admin/template/contact',$data,true);
// or
    $config=array(
    'charset'=>'utf-8',
   'wordwrap'=> TRUE,
   'mailtype' => 'html'
   );

   $this->email->initialize($config);
   $this->email->to($toemail);
   $this->email->from($fromemail);
   $this->email->subject($this->input->post('subject'));
   $this->email->message($mesg);
   $mail = $this->email->send();
    if($mail)
   {
    $this->session->set_flashdata('message', 'Request send successfully');
    redirect('Home/'.$page);
   }
   else
  {
   // show_error($this->email->print_debugger());
  }
}  

}
?>