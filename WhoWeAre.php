<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="UTF-8">
    <title>Who we are</title>
    <link rel="icon" type="image/png" href="img/logo/SLILOGO.png">
    <!-- Other head content like CSS, meta tags -->
</head>
<?php

include_once('php/nav.php');

?>
<?php iniHeader(1); ?>



<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <?php showNav(1); ?> 
    <!-- Navbar End -->


    <!-- Hero Start -->
    <div class="container-fluid pt-5 bg-primary hero-header">
        <div class="container pt-5">
            <div class="row g-5 pt-5">
                <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                    <h1 class="display-4 text-white mb-4 animated slideInRight">Who we are</h1>
                    <p class="text-white mb-4 animated slideInRight">우리는 세상의 소금과 빛입니다</p>
                </div>
                <div class="col-lg-6 align-self-end text-center text-lg-end">
                    <img class="img-fluid" src="img/hero-img.png" alt="" style="max-height: 400px;">
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->


    <!-- Full Screen Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: rgba(20, 24, 62, 0.7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn btn-square bg-white btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="input-group" style="max-width: 600px;">
                        <input type="text" class="form-control bg-transparent border-light p-3"
                            placeholder="Type search keyword">
                        <button class="btn btn-light px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Full Screen Search End -->

    <!-- <div class="container p-5 text-center" style="background-color:#ffffff;">
    <h1 class="display-3">We exist to Honor God and Make Disciples.</h1>
    <p class="lead">We desire to honor God in every area of life. Our starting point, goal, and motive is the honor of God. This is foundational for understanding why we do what we do. It is all about Him, not us. We follow Jesus and help others follow Him. We make disciples by engaging culture and community, establishing biblical foundations, equipping believers to minister, and empowering disciples to make disciples.</p>
 
    <div><br></div>
    
  </div> -->
   

<!-- Who are we  -->
<section class="py-3 py-md-5">
  <div class="container">
    <div class="row gy-3 gy-md-4 gy-lg-0 align-items-lg-center">
      <div class="col-12 col-lg-6 col-xl-5">
        <img class="img-fluid rounded" loading="lazy" src="./img/whoweare/Img3.jpg" alt="About 1">
      </div>
      <div class="col-12 col-lg-6 col-xl-7">
        <div class="row justify-content-xl-center">
          <div class="col-12 col-xl-11">
            <h2 class="mb-3">Who Are We?</h2>
            <p class="lead fs-4 text-secondary mb-3">We exist to Honor God and Make Disciples.</p>
            <p class="mb-5">We desire to honor God in every area of life. Our starting point, goal, and motive is the honor of God. This is foundational for understanding why we do what we do. It is all about Him, not us. We follow Jesus and help others follow Him. We make disciples by engaging culture and community, establishing biblical foundations, equipping believers to minister, and empowering disciples to make disciples.</p>
             
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>





    


    <!-- Team Start -->

 
<div class="container p-5 my-5 border text-center" style="background-color:#fef0e4;">
   <section class="showcase">
            <div class="container-fluid p-0">
                <div class="row g-0">
                    <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('img/whoweare/img2.jpg')"></div>
                    <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                        <h2>Discipleship is Relationship</h2>
                        <p class="lead mb-0">The relationships that are built in church and a Victory group can help you pursue your walk with God.</p>
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col-lg-6 text-white showcase-img" style="background-image: url('img/whoweare/img1.jpg')"></div>
                    <div class="col-lg-6 my-auto showcase-text">
                        <h2>We Want You Here</h2>
                        <p class="lead mb-0">We are one family with multiple campuses across the community.</p>
                    </div>
                </div>
            
            </div>
        </section>
  </div>


 

  <?php iniFooter(1); ?> 
</body>

</html>