<!-- ======= Hero Section ======= -->

<section   class="inner-banner d-flex align-items-center">

  <div class="container" data-aos="zoom-out" data-aos-delay="100">
    <div class="row">
      <div class="col-xl-12 text-center">
        <h1>Gallery</h1>
        <h6><span><a href="index.html">Home</a></span> > Gallery </h6>
      </div>
    </div>
  </div>

</section><!-- End Hero -->

<main id="main">
  
  <section class="section-inner">
    <div class="container aos-init aos-animate" data-aos="fade-up">
  
      <div class="row mb-4">
        <?php
        foreach($gallery2 as $row1)
                {
                  ?>
        <a href="<?php echo base_url();?>/uploads/gallery/<?=$row1['image'];?>" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-4">
          <img src="<?php echo base_url();?>/uploads/gallery/<?php echo $row1['image'];?>" class="img-fluid">
        </a>
        <?php
      }
      ?>
      </div>
     

    </div>
  </section>


</main><!-- End #main -->
<script src="<?php echo base_url();?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url();?>/assets/vendor/glightbox/js/glightbox.min.js"></script>  
<script src="https://cdn.jsdelivr.net/npm/bs5-lightbox@1.8.2/dist/index.bundle.min.js"></script>