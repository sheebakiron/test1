<section class="inner-banner d-flex align-items-center">

    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <div class="row">
        <div class="col-xl-12 text-center">
          <span class="inner_banner_h1">Services</span> 
          <h6><span><a href="<?php echo base_url();?>home">Home</a></span> > <a href="<?php echo base_url();?>Home/services">Services</a> > <?php echo str_replace("-"," ",$seoSubpage);?></h6>
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

<?php if($seoDetails[0]['h1_title'] !=""){?>
<section class="get-quote1">
      <div class="container aos-init aos-animate" data-aos="fade-up">

        <div class="row">
          <div class="col-md-8 my-auto">
            <h1  ><?php echo $seoDetails[0]['h1_title'];?></h1>
          </div></div></div></section>
		  <?php
		  }
		  ?>
    <!-- ======= About Section ======= -->
	<?=$subbody?>
    
    </section>


    <!-- End About Section -->


  </main><!-- End #main -->