<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $seoDetails[0]['metatitle'];?></title>
  <meta content="<?php echo $seoDetails[0]['metadescription'];?>" name="description">
  <meta content="<?php echo $seoDetails[0]['metakeywords'];?>" name="keywords">

  <!-- Favicons -->
  <link href="<?=base_url()?>assets/img/favicon.png" rel="icon">
  <link href="<?=base_url()?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?=base_url()?>assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?=base_url()?>assets/css/style.css" rel="stylesheet">
 
</head>

<body>

  <div class="header-1">
    <div class="container  align-items-center">
      <div class="row">
        <div class="col-md-8">
          <ul>
            <li><span><i class="bi bi-envelope"></i></span> <a href="mailto:info@asigwll.com"> info@asigwll.com</a></li>
            <li><span><i class="bi bi-telephone-fill"></i></span> <a href="#"> 00965 22243860 / 61/62/63/64 </a></li>
          </ul>
        </div>
        <div class="col-md-4 justify-content-md-end d-md-flex">
          <ul class="social-icon">
            <li><a href="#"><i class="bi bi-facebook"></i></a></li>
            <li><a href="#"><i class="bi bi-twitter"></i></a></li>
            <li><a href="#"><i class="bi bi-instagram"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <header id="header" class="align-items-center sticky-top">
    <div class="col-md-12">
      <div class="container  align-items-center">
        <div class="row">
          <div class="col-lg-2">
            <h1 class="logo me-auto"><a href="index.html">
              <img src="<?=base_url()?>assets/img/asig-logo.png" class="img-fluid"> </a>
              <i class="bi bi-list mobile-nav-toggle"></i> </h1>
          </div>
          <div class="col-md-10 my-auto">
            <nav id="navbar" class="navbar order-last order-lg-0">
              <ul>
                <li><a class="nav-link scrollto " href="<?=base_url()?>Home/index">Home</a></li>
                <li><a class="nav-link scrollto" href="<?=base_url()?>Home/about">About Us</a></li>
                <li class="dropdown"><a class="nav-link scrollto dropdown" href="<?=base_url()?>Home/services">Services</a>
				 <ul class="dropdown-content">
    <a href="<?=base_url()?>services/kuwait">Kuwait</a>
    <a href="<?=base_url()?>services/Saudi-Arabia">Saudi Arabia</a>
    <a href="<?=base_url()?>services/qatar">Qatar</a>
  </ul>  
				 </li>
                <li><a class="nav-link scrollto" href="<?=base_url()?>Home/clients">Clients</a></li>
                <li><a class="nav-link scrollto" href="<?=base_url()?>Home/agencies">Agencies</a></li>
                
                <li><a class="nav-link scrollto" href="<?=base_url()?>Home/gallery">Gallery</a></li>
                <li><a class="nav-link scrollto" href="<?=base_url()?>Home/news">News</a></li>
                <li><a class="nav-link scrollto" href="<?=base_url()?>Home/career">Career</a></li>
                <li><a class="nav-link scrollto" href="<?=base_url()?>Home/contact">Contact</a></li>
				
              </ul>
            
            </nav><!-- .navbar -->
          </div>
        </div>
      </div>
    </div>

  </header><!-- End Header -->