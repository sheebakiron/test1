
  <!-- ======= Hero Section ======= -->

  <section   class="inner-banner d-flex align-items-center">

    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <div class="row">
        <div class="col-xl-12 text-center">
          <h1>Clients</h1>
          <h6><span><a href="index.html">Home</a></span> > Clients </h6>
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">
    

    <!-- ======= About Section ======= -->
    <section   class="section-inner">
      <div class="container aos-init aos-animate" data-aos="fade-up">

        <div class="row">
         
          <div class="col-lg-12 text-center my-auto  content about-section1 aos-init aos-animate"
          data-aos="fade-right" data-aos-delay="100">
          <p >
            ASIG WLL has maintained the trust and faith of prestigious international clients such as Siemens, Hyundai, Daelim, Engineering, Mitsubishi Electric Corporation amongst many others over the span of 37 years.
          </p>
          <p>
            Within a relatively short period, ASIG WLL has established itself as a major EPC entity in the Power, Electromechanical and Telecom Infrastructure businesses in Kuwait, Middle East, Europe, Asia, Mena & CIS regions with more than 100 projects under it’s belt.

            ASIG has a 5 year contract with first right of refusal for MENA and Near East region.
          </p>
          </div>
          <div class="col-lg-12 my-auto d-none  content about-section1 aos-init aos-animate"
          data-aos="fade-right" data-aos-delay="100">
          <h3>Our Clients Logo</h3>
          </div>
          </div>
          <div class="row mt-3">
          <?php if(count($datlist)>0){
              foreach($datlist as $datlist1){?>
            <div class="col-sm-4 col-6 mb-4 my-auto  content about-section1 aos-init aos-animate"
            data-aos="fade-right" data-aos-delay="100">
            <div class="client-box">
              <img src="<?php echo base_url();?>uploads/<?php echo $folder;?>/<?php echo $datlist1['image'];?>" alt="<?php echo $datlist1['name'];?>" class="img-fluid">
              <div class="overlay">
                <div class="client-name"><?php echo $datlist1['name'];?></div>
              </div>
            </div>
            </div>
         
            <?php 
                 }
               }     
             ?>      
           
          
 
        </div>

      </div>
    </section>
    <!-- End About Section -->
 

  </main><!-- End #main -->

  