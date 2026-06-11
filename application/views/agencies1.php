<!-- ======= Hero Section ======= -->

  <section   class="inner-banner d-flex align-items-center">

    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <div class="row">
        <div class="col-xl-12 text-center">
          <h1>Agencies</h1>
          <h6><span><a href="index.html">Home</a></span> > Agencies </h6>
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">
    

    <!-- ======= About Section ======= -->
    <section   class="section-inner">
      <div class="container aos-init aos-animate" data-aos="fade-up">

      
          <div class="row">
          <?php if(count($datlist)>0){
            foreach($datlist as $datlist1){?>
            <div class="col-sm-6 col-md-4   content about-section1 aos-init aos-animate"
            data-aos="fade-right" data-aos-delay="100">
            <div class="client-box" style="height: 216px;">
              <img style="height:210px;" src="<?php echo base_url();?>uploads/<?php echo $folder;?>/<?php echo $datlist1['image'];?>" alt="<?php echo $datlist1['name'];?>" class="img-fluid">
            </div>
            <div class="agency-box">
              <h3><?php echo $datlist1['name'];?></h3>
              <h4>
              <?php echo nl2br($datlist1['description']);?>
              </h4>
            </div>
            </div>
            <?php }
                }
            ?>      
            
        </div>

      </div>
    </section>
    <!-- End About Section -->
 

  </main><!-- End #main -->