<style>#results td:hover{
		background-color:rgba(58, 87, 149, 0.28);
		
	}</style>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
				
                    <h3 class="page-header">Add Baner </h3>
		                                                    <h3 style="color:#337ab7;"><?php echo $this->session->flashdata('upload_error'); ?></h3>
			 
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
			
            <div class="col-lg-12">

           
<form method="post" action="<?= base_url() ?>/admin/banner/addimage" enctype="multipart/form-data" onSubmit="document.getElementById('submit').disabled=true;">

 
 
 
  
 
 

<div class="col-lg-5" style="border: 1px solid #e1e6ef;">
   <div class="form-group">
   <label > Photo</label>
    <input type="file" name="files[]" class="form-control" required="" multiple="">
  </div>
  </div>



 



  <div class="col-lg-5" style="border: 1px solid #e1e6ef;">
  <br><br><br>
  </div>
  
  
  
  <div class="col-lg-5" >
  <div class="form-group">
    <button style="margin-top: 18px; float:right;" name="submit" class="btn btn-primary" id="submit"> save</button>
  </div>
  
</form></div>
 <div class="col-lg-5" style="border: 1px solid #e1e6ef;">
   </div></div>
</div>
</div>
</div>

