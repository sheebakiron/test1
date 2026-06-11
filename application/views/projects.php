<!-- ======= Hero Section ======= -->
<style>
.pagelinkss{

}

</style>
<section   class="inner-banner d-flex align-items-center">

  <div class="container" data-aos="zoom-out" data-aos-delay="100">
    <div class="row">
      <div class="col-xl-12 text-center">
        <h1>Projects</h1>
        <h6><span><a href="<?php echo base_url();?>">Home</a></span> > Projects </h6>
      </div>
    </div>
  </div>

</section><!-- End Hero -->

<main id="main">
  
  <section id="services" class="services gray-bg">
      <div class="container my-4">

 <div class="row g-4">
 <?php
        foreach($datlist as $row1)
                {
			//	$wherecats=array('id'=>$row1['category']);
		  
		//  $clientcats=$this->Homemodel->getPages('pages',$wherecats,'name','');
		 
                  ?>
       
       
  <div class="col-sm-6 col-md-3">
    <div class="project-card">
      <div class="client-box">
        <a href="<?php echo base_url();?>/uploads/projects/<?php echo $row1['image'];?>" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-4">
         <?php if($row1['image'] != ""){?>
          <img src="<?php echo base_url();?>/uploads/projects/<?php echo $row1['image'];?>" class="img-fluid">
		  <?php }else{?>
		    <img src="<?php echo base_url();?>/uploads/projects/no_img.jpg" class="img-fluid">
			<?php }?>
        </a>
      </div>
      <div class="agency-box">
        <h4><?php echo $row1['name'];?></h4>
         <?php if(strlen($row1['client']) > 1){?>
        <h4>Client: <?php echo $row1['client'];?></h4>
        <?php }?>
         <a href="<?php echo base_url();?>project-details/<?php echo $row1['id'];?>/<?php echo str_replace(")","-",str_replace("(","-",str_replace(",","-",str_replace(":","-",str_replace("&","and",str_replace("/","--",str_replace(" ","-",$row1['name'])))))));?>">
          <button class="button-2">View <i class="bi bi-arrow-right"></i></button>
        </a>
      </div>
    </div>
  </div>
 <?php
      }
	  echo $pagination_links;
      ?>
    



    


    

</div>



</div></section>


</main><!-- End #main -->
<script src="<?php echo base_url();?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url();?>/assets/vendor/glightbox/js/glightbox.min.js"></script>  
<script src="https://cdn.jsdelivr.net/npm/bs5-lightbox@1.8.2/dist/index.bundle.min.js"></script>