<style>#results td:hover{
		background-color:rgba(58, 87, 149, 0.28);
		
	}</style>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Edit Gallery</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            <div class="col-lg-12">

           
<form method="post" action="<?= base_url() ?>/admin/gallery/update_gallery" enctype="multipart/form-data"  >


 <?php
  foreach($editgallery as $row)
  {
  ?>
 
 
  
  <div class="col-lg-5" style="border: 1px solid #e1e6ef;">
  <div class="form-group" >
    <label >Title</label>
    <input type="text" class="form-control" value="<?=$row['title'];?>" name="title">
  </div>
  </div>
   
   <input type="hidden"  name="id" value="<?= $row['id'] ?>"  class="form-control"  >


  <div class="col-lg-5" style="border: 1px solid #e1e6ef;">
  <div class="form-group">
   <label >Photo</label>
    <input type="file"  name="image" class="form-control"  >
  <input type="hidden" value="<?= $row['image'] ?>" name="old_image" class="form-control"  >
  </div>
  </div>


  <div class="col-lg-5" >
  <div class="form-group">
    <button style="margin-top: 18px; float:right;" name="submit" class="btn btn-primary" > Update</button>
  </div>
  
</form></div>
 <div class="col-lg-5" style="border: 1px solid #e1e6ef;">
   </div></div>
</div>
</div>
</div>

<?php

  } ?>
