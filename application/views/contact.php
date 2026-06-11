 <!-- ======= Hero Section ======= -->

 <section   class="inner-banner d-flex align-items-center">

<div class="container" data-aos="zoom-out" data-aos-delay="100">
  <div class="row">
    <div class="col-xl-12 text-center">
      <h1>Contact Us</h1>
      <h6><span><a href="index.html">Home</a></span> > Contact Us </h6>
    </div>
  </div>
</div>

</section><!-- End Hero -->

<main id="main">


<section id="contact" class="contact">
  <div class="container aos-init aos-animate" data-aos="fade-up">
    <?php
   /* if($this->session->flashdata('message')) {
   $message = $this->session->flashdata('message');
echo ' <div class="alert alert-success" role="alert">';
if(isset($message)){ echo $message; }
echo '</div>';
   $this->session->unset_userdata('message');
 }*/ 
 ?>


    <div class="row mt-5">

      <div class="col-lg-4">
        <div class="info">
          <div class="address">
            <i class="bi bi-geo-alt"></i>
            <h4>Location:</h4>
            <p>FLOOR-10, GULF TOWER, QIBLA, KUWAIT CITY, KUWAIT</p>
          </div>

          <div class="email">
            <i class="bi bi-envelope"></i>
            <h4>Email:</h4>
            <p> info@asigwll.com</p>
          </div>

          <div class="phone">
            <i class="bi bi-phone"></i>
            <h4>Call:</h4>
            <p>   00965 22243860 /61/62/63/64</p>
          </div>
          <div class="phone">
            <i class="bi bi-printer"></i>
            <h4>Fax:</h4>
            <p> 00965 22426795</p>
          </div>
          <div class="phone">
            <i class="bi bi-clock"></i>
            <h4>Time:</h4>
            <p>   Sun - Thu (08:00 - 17:30)</p>
          </div>

        </div>

      </div>

      <div class="col-lg-8 mt-5 mt-lg-0">

        <form action='<?=base_url();?>admin/Email' method="post" role="form" class="php-email-form">
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
          <div class="form-group  ">
            <textarea class="form-control" name="message" rows="5" placeholder="Message" required=""></textarea>
          </div>
          <div class="my-3">
            <div class="loading"  >Sending...</div>
              <div class="error-message" id="err_msg"  ></div> 
            <div class="sent-message">Your message has been sent. Thank you!</div>
          </div>
          <div class="text-center"><button type="submit">Send Message</button></div>
        </form>

      </div>

    </div>

    <div  class="row mt-5">
      <iframe style="border:0; width: 100%; height: 350px;" src=" https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2458.7789421984066!2d47.959134384811456!3d29.363304354628426!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3fcf84df78d518ad%3A0x454b90ace2a7f1df!2sASIGWLL!5e0!3m2!1sen!2sin!4v1676306941348!5m2!1sen!2sin" frameborder="0" allowfullscreen=""></iframe>
    </div>
  </div>
</section>

</main><!-- End #main -->