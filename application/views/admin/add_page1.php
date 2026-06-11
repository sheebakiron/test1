<style>#results td:hover{
		background-color:rgba(58, 87, 149, 0.28);
		
	}</style>
  <script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
				
                    <h3 class="page-header">Add <?php echo $title;?> </h3>
                                              <h3 style="color:#337ab7;"><?php echo $this->session->flashdata('upload_error'); ?></h3>

					 
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
			
            <div class="col-lg-12">

           
<form method="post" action="<?php echo base_url() ?>admin/Pages/addpage" enctype="multipart/form-data" onSubmit="document.getElementById('submit').disabled=true;">

<input   type="hidden" name="folder" value="<?php echo $folder; ?>">
<input   type="hidden" name="table" value="<?php echo $table; ?>">
<input   type="hidden" name="category" value="<?php echo $type; ?>">
<input   type="hidden" name="page" value="<?php echo $page; ?>">
<input   type="hidden" name="editid" value="<?php echo $editid; ?>">
 
  <?php if(count($catarr)>0){?>
    <div class="col-lg-5" style="border: 1px solid #e1e6ef;">
 <div class="form-group">
    <label > Category</label>
    <select name="category" class="form-control" required="">
    <option value="">---Select---</option>
    <?php
    foreach($catarr as $catarr1){?> 
  <option value="<?php echo $catarr1['id'];?>"><?php echo $catarr1['name']; ;?></option> 
   <?php }?>
   </select>
   </div>
  </div>
  <?php
  }
  ?>
   
   <?php if(count($tabs)>0){
   // $excludearr=explode("@@@",$excludearr);
    ?> 
    <?php
    foreach($listdatas as $listdatas1) {
        
        ?>
    <div class="col-lg-5"  >
 <div class="form-group">
    <?php
    $inputtype='';
    $label='';
    $dispval='';
    
     if(isset($editvals[0][$listdatas1]) && $editvals[0][$listdatas1]){$dispval=$editvals[0][$listdatas1];}   
     if (in_array($listdatas1, $textdatas)) {
            $label='<label > '.$listdatas1.' </label>';
         $inputtype='<input   type="text" name="'.$listdatas1.'" value="'.$dispval.'" class="form-control"  >';
        }
        
        if (in_array($listdatas1, $imgdatas)) {
            $label='<label > '.$listdatas1.' </label>';
            $inputtype='<input   type="file" name="'.$listdatas1.'" class="form-control"  >';
            if(isset($editvals[0][$listdatas1]) && $editvals[0][$listdatas1]!=''){
            $inputtype.='<br><img  src="'.base_url().$upfolder.$picfolder.$editvals[0][$listdatas1].'" style="width: 150px; height: 150px;" >';
            }
            
        }
       
        if (in_array($listdatas1, $datedatas)) {
            $label='<label > '.$listdatas1.' </label>';
            $inputtype='<input   type="date" name="'.$listdatas1.'" class="form-control" value="'.$dispval.'"  >';
        }
        if (in_array($listdatas1, $descdatas)) {
            $label='<label > '.$listdatas1.' </label>';
            $inputtype='<textarea name="'.$listdatas1.'" class="form-control"  >'.$dispval.'</textarea>';
        }
        if (in_array($listdatas1, $fckdescdatas)) {
          $label='<label > '.$listdatas1.' </label>';
          $inputtype="<textarea name='editor1'>'.$dispval.'</textarea>
          <script>
                  CKEDITOR.replace( 'editor1' );
          </script>";
          
      }
        if (in_array($listdatas1, $statdatas)) {
        if(count($tabsstat)>0){
            $label='<label > '.$listdatas1.' </label>';
            foreach($statdatas as $ind){
            $inputtypes=' <select name="'.$ind.'" class="form-control">';
             
            foreach($dropdatas[$ind] as $val=>$dropdatas1){
                if($dispval==$val){
                $inputtypes.='<option value="'.$val.'" selected>'.$dropdatas1.'</option>';
                }else{
                $inputtypes.='<option value="'.$val.'">'.$dropdatas1.'</option>'; 
                }
            } 
            $inputtypes.='</select>';
          }
         $inputtype=$inputtypes;  
        }
       }
echo $label;
        ?> 
     
    
    <?php echo $inputtype; ?>
    </div>
  </div>
  <?php
  
   }
    ?>
    
  
  <?php
  }
  ?>

  

  
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

