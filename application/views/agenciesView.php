<!-- ======= Hero Section ======= -->

  <section   class="inner-banner d-flex align-items-center">

    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <div class="row">
        <div class="col-xl-12 text-center">
          <h1>Agencies</h1>
          <h6><span><a href="<?php echo base_url();?>">Home</a></span> > <a href="<?php echo base_url();?>Home/agencies">Agencies</a> </h6>
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

 
    

    <!-- ======= About Section ======= -->
   
          <?php if(count($datlist)>0){
            foreach($datlist as $datlist1){
              $lid=$datlist1['id'];
              $details=$datlist1['details'];
              if($details!=''){?>
               <?php echo $datlist1['details'];?>
            
              <?php 
              } else{echo $datlist1['description'];}
            }
                }
            ?>      
            
        