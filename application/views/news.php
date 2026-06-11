<!-- ======= Hero Section ======= -->

<section class="inner-banner d-flex align-items-center">

  <div class="container" data-aos="zoom-out" data-aos-delay="100">
    <div class="row">
      <div class="col-xl-12 text-center">
        <h1>News</h1>
        <h6><span><a href="index.html">Home</a></span> > News </h6>
      </div>
    </div>
  </div>

</section><!-- End Hero -->

<main id="main">


  <!-- ======= About Section ======= -->
  <section class="section-inner">
    <div class="container aos-init aos-animate" data-aos="fade-up">

      <div class="row">

      <?php if(count($datlist)>0){
              foreach($datlist as $datlist1){?>
        <div class="col-lg-4   aos-init aos-animate" data-aos="fade-left" data-aos-delay="100">
          <article class="news">

            <div class="news-img">
              <a href="#"> 
                <img src="<?php echo base_url();?>uploads/<?php echo $folder;?>/<?php echo $datlist1['image'];?>" alt="<?php echo $datlist1['name'];?>" class="img-fluid"></a> 
            </div>
            <div class="news-content">
              <h2 class="news-title">
                <a href="#"> <?php echo nl2br($datlist1['name']);?></a>
              </h2>
 

 
              <p id="shws<?php echo $datlist1['id'];?>" style="display:none;"> <?php echo  strip_tags($datlist1['description']) ;?></p>
              
 
              <div class="news-meta">
                <ul>

                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><time
                        datetime="<?php echo $datlist1['date'];?>"><?php echo date("M d, Y",strtotime($datlist1['date']));?> </time></a></li>

                </ul>
              </div>
              <div>
              <button   class="button-2 shw" onclick="show('<?php echo $datlist1['id'];?>')">View More  </button>
              </div>
            </div>

          </article>
        </div>
        <?php 
                 }
               }     
             ?>     


      </div>

    </div>
  </section>
  <!-- End About Section -->

  <script
  src="https://code.jquery.com/jquery-3.6.3.js"
  integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
  crossorigin="anonymous"></script>
<script>
function show(id){
  
  $("#shws"+id).toggle(); 
} 
  </script>


</main><!-- End #main -->