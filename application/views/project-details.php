<!-- ======= Hero Section ======= -->

  <section class="inner-banner d-flex align-items-center">

    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <div class="row">
        <div class="col-xl-12 text-center">
          <h1><?php echo $row[0]['name'];?>
</h1>

          <h6><span><a href="<?php echo base_url();?>">Home</a></span> > <a href="<?php echo base_url();?>/projects">Projects</a>  > <?php echo $row[0]['name'];?></h6>
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

<main id="main">
  
  <section class="section-inner">
      <div class="container aos-init aos-animate" data-aos="fade-up">

        <div class="row service-list">
          <!-- <div class="col-md-6 service-side aos-init aos-animate" data-aos="fade-left" data-aos-delay="100">
            <img src="https://asigwll.com/assets/img/transmission-network-projects.jpg" class="img-fluid" alt="">
          </div> -->
          <div class="col-md-6 service-side aos-init aos-animate" data-aos="fade-left" data-aos-delay="100">
  <div id="serviceImageSlider" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
	<?php
	             $whereid=array('project_id'=>$row_id);
                 $editimgs=$this->Homemodel->getPages('project_images',$whereid,'image',''); 
                 
				 if(count($editimgs)>0){
				 $s=0;
					 foreach($editimgs as $editimgg){
					 if(isset($editimgg['image']) && $editimgg['image']!=''){ 
				 ?>
      <div class="carousel-item <?php if($s==0){?>active<?php }?>">
        <img src="<?php echo base_url();?>uploads/projects/<?php echo $editimgg['image'];?>" class="d-block w-100 img-fluid" alt="Transmission Network Project <?php echo $s;?>">
      </div>
       
	  <?php
	  $s++;
	  }
	  }
	  }if($s==0){?>
	  <img src="<?php echo base_url();?>/uploads/projects/no_img.jpg" class="img-fluid">
	  <?php
	  } 
	  ?>
	
    </div>

    <!-- Controls -->
    <button class="carousel-control-prev" type="button" data-bs-target="#serviceImageSlider" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#serviceImageSlider" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>

    <!-- Optional indicators -->
    <div class="carousel-indicators">
      <?php  if(count($editimgs)>0){
				 $s=0;
					 foreach($editimgs as $editimggt){
					 ?>
      <button type="button" data-bs-target="#serviceImageSlider" data-bs-slide-to="<?php echo $s;?>" <?php if($s==0){ ?> class="active" <?php }?> aria-current="true"></button>
       
      <?php $s++;
      }} ?>
    </div>
  </div>
</div>

          <div class="col-md-6 my-auto content service-section1 aos-init aos-animate" data-aos="fade-right" data-aos-delay="100">
		  <?php
		 // $wherecat=array('category'=>2,'id'=>$row[0]['id']);
		  
		//  $clientcat=$this->Homemodel->getPages('pages',$wherecat,'name','');
		  ?>
            <h2><?php echo $row[0]['name'];?></h2>
            <p><?php echo $row[0]['smalldescription'];?>.</p>
            <ul><?php if(strlen($row[0]['client']) > 1){?>
                  
              <li>Client : <?php echo $row[0]['client'];?></li>
              <?php }?>
              <li>Completed Date : <?php echo date("d/m/Y",strtotime($row[0]['enddate']));?></li>
              <li>Main Contractor : <?php echo $row[0]['contractor'];?></li>
              <li>Location : <?php echo $row[0]['location'];?></li>
              <li>Scope of works : <?php echo $row[0]['description'];?>)</li>

            </ul>
            </div>

        </div>

     

    </div></section>






      <section id="services" class="services gray-bg">
      <div class="container my-4">

        <div class="section-title">
          <h2>Projects</h2>


        </div>

 <div class="row g-4">
 <?php
        foreach($datlist as $row1)
                {
                  
	//	  $wherecats=array('id'=>$row1['category']);
		  
		 // $clientcats=$this->Homemodel->getPages('pages',$wherecats,'name','');
		   
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
        <h4><?php echo $row1['client'];?></h4>
        <?php }?>
        <a href="<?php echo base_url();?>project-details/<?php echo $row1['id'];?>/<?php echo str_replace(")","-",str_replace("(","-",str_replace(",","-",str_replace(":","-",str_replace("&","and",str_replace("/","--",str_replace(" ","-",$row1['name'])))))));?>">
          <button class="button-2">View <i class="bi bi-arrow-right"></i></button>
        </a>
      </div>
    </div>
  </div>

   <?php
      }
      ?>
    



   


   

</div>

</div>

    </section>



</main><!-- End #main -->
 