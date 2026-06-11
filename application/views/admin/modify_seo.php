<style>#results td:hover{
		background-color:rgba(58, 87, 149, 0.28);
		
	}</style>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
							                        <h3 style="color:#337ab7;"><?php echo $this->session->flashdata('pass_msg'); ?></h3>

                    <h3 class="page-header">SEO Modifications</h3>
					 
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">

            <div class="col-lg-12">

           
<form method="post" action="<?= base_url() ?>admin/admin/modify_seo" enctype="multipart/form-data">
 <div class="col-lg-5" style="border: 1px solid #e1e6ef;">
 <div class="form-group">
    <label >Pages</label>
    <select  name="pages" id="pages"  class="form-control" onchange="select_seo()" >
	<option value="">Select Page</option>
	<option value="index">Home</option>
	<option value="about">About Us</option>
	<option value="services">Services</option>
	<option value="clients">Clients</option>
	<option value="agencies">Agencies</option>
	<option value="gallery">Gallery</option>
	<option value="news">News</option>
	<option value="career">Career</option>
	<option value="contact">Contact</option>
	<option value="others">Others</option>
	</select>
  </div>
  </div>
   <div class="col-lg-5" style="border: 1px solid #e1e6ef;">
 <div class="form-group">
    <label >Title</label>
    <input type="text"  name="metatitle" id="metatitle" class="form-control" required>
  </div>
  </div>
 
  <div class="col-lg-5" style="border: 1px solid #e1e6ef;">
 <div class="form-group">
    <label >Meta Keywords</label>
    <textarea  name="metakeywords" id="metakeywords" class="form-control" ></textarea>
  </div>
  </div>
 <div class="col-lg-5" style="border: 1px solid #e1e6ef;">
   <div class="form-group">
   <label >Meta Description</label>
      <textarea  name="metadescription" id="metadescription" class="form-control" ></textarea>
  </div>
  </div>

 <div class="col-lg-5" style="border: 1px solid #e1e6ef;">
 <div class="form-group">
    <label >H1 Title</label>
    <textarea  name="h1_title" id="h1_title" class="form-control"  ></textarea>
  </div>
  </div>


  <div class="col-lg-5" style="border: 1px solid #e1e6ef;">
  <br><br><br><br><br>
  </div>
  
  
  
  <div class="col-lg-5" >
  <div class="form-group">
    <button style="margin-top: 18px; float:right;" name="submit" class="btn btn-primary" > save</button>
  </div>
   <input type="hidden"  name="metaadd"  >
</form></div>
 <div class="col-lg-5" style="border: 1px solid #e1e6ef;">
   </div></div>
</div>
</div>
</div>
<script>
function select_seo(){
var pages=$('#pages').val();
$.ajax({
url : "<?php echo base_url().'admin/admin/view_seo_det';?>",
method : "POST",
data : {pages: pages},
success: function(response){
if(response != 0){
//response = JSON.parse(data);
                $("#metatitle").val(response.metatitle);
                $("#pages").val(response.pages);
                $("#metakeywords").val(response.metakeywords);
                $("#metadescription").val(response.metadescription); 
				$("#h1_title").val(response.h1_title); 
				}else{
				$("#metatitle").val(''); 
                $("#metakeywords").val('');
                $("#metadescription").val(''); 
				$("#h1_title").val(''); 
				}
}
});
}
</script>