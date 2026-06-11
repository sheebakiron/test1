<!-- ======= Hero Section ======= -->

<section   class="inner-banner d-flex align-items-center">

  <div class="container" data-aos="zoom-out" data-aos-delay="100">
    <div class="row">
      <div class="col-xl-12 text-center">
        <h1>Join Us</h1>
        <h6><span><a href="index.html">Home</a></span> > Career </h6>
      </div>
    </div>
  </div>

</section><!-- End Hero -->

<main id="main">
  

  <!-- ======= Contact Section ======= -->
 
  <section id="contact" class="contact">
    <div class="container">

      <div class="row mt-5 justify-content-center d-none" data-aos="fade-up">
        <div class="col-lg-10 text-center">
        <p>
          Every day, we refine, iterate and explore how to make work better for everyone. 
          Join us in creating a better future of work that’s more connected, inclusive and flexible.
        </p>
        </div>
        </div>
        <!--  -->

       
        <?php if(count($datlist)>0){
          $c=1;
              foreach($datlist as $datlist1){
                if($c%2==1) {?>
               <div class="row mt-5 " data-aos="fade-up"><!--justify-content-center -->
               <?php }
                ?>
            <div class="col-lg-6 ">
            <div class="career-box">
              <h3><?php echo $datlist1['name'];?></h3>
              <p id="shw<?php echo $datlist1['id'];?>"> <?php echo nl2br($datlist1['smalldescription']);?></p>
              <p id="shws<?php echo $datlist1['id'];?>" style="display:none;"> <?php echo strip_tags($datlist1['description']);?></p>
              <button   class="button-2 shw" onclick="show('<?php echo $datlist1['id'];?>')">View Job <i class="bi bi-arrow-right"></i></button>
            </div>
            </div>
            
            <?php 
             if($c%2==0)  {?>
              </div>
              <?php }
            $c++;
                 }
               }     
             ?>     


        <!--  -->
             

      <div class="row mt-5 justify-content-center" data-aos="fade-up">
        <div class="col-lg-10 job-form text-center">
          <h4>
            We'd like to hear from you!
          </h4>
          <p>
            
            If you have any questions before applying, you can fill the form below. or send your latest resume.
          </p>
          <form action='<?php echo base_url();?>admin/Email' method="post" role="form" class="php-email-form">
          <input type="hidden" name="page" value="career">
            <div class="row">
              <div class="col-md-6 form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required="">
              </div>
              <div class="col-md-6 form-grou  mt-md-0">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required="">
              </div>
            </div>
            <div class="form-group ">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required="">
            </div>
            <div class="form-group ">
              <textarea class="form-control" name="message" rows="5" placeholder="Message" required=""></textarea>
            </div>
            
            <div class="text-center mt-3"><button type="submit">Send Message</button></div>
            <div class="loading"  >Sending...</div>
              <div class="error-message"  id="err_msg"></div> 
            <div class="sent-message" >Your message has been sent. Thank you!</div>
          </form>
        </div>

      </div>

    </div>
  </section><!-- End Contact Section -->
  <script
  src="https://code.jquery.com/jquery-3.6.3.js"
  integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
  crossorigin="anonymous"></script>
<script>
function show(id){
  $("#shw"+id).toggle(); 
  $("#shws"+id).toggle(); 
} 
  </script>


</main><!-- End #main -->