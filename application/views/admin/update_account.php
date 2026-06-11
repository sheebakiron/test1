<style>#results td:hover{
		background-color:rgba(58, 87, 149, 0.28);
		
	}</style>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
							                        <h3 style="color:#337ab7;"><?php echo $this->session->flashdata('pass_msg'); ?></h3>

                    <h3 class="page-header">Update Account </h3>
					 
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">

            <div class="col-lg-12">

           
<form method="post" action="<?= base_url() ?>admin/password/update_account" enctype="multipart/form-data">

   <div class="col-lg-5" style="border: 1px solid #e1e6ef;">
 <div class="form-group">
    <label >User Name</label>
    <input type="text"  name="username" class="form-control" required>
  </div>
  </div>
 
  <div class="col-lg-5" style="border: 1px solid #e1e6ef;">
 <div class="form-group">
    <label >Email</label>
    <input type="email"  name="email" class="form-control" required>
  </div>
  </div>

  <div class="col-lg-5" style="border: 1px solid #e1e6ef;">
  <br><br><br><br><br>
  </div>
  
  
  
  <div class="col-lg-5" >
  <div class="form-group">
    <button style="margin-top: 18px; float:right;" name="submit" class="btn btn-primary" > save</button>
  </div>
  
</form></div>
 <div class="col-lg-5" style="border: 1px solid #e1e6ef;">
   </div></div>
</div>
</div>
</div>