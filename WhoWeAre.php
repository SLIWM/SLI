<!DOCTYPE html>
<html lang="en">
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
    <div class="container-fluid sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark p-0">
                <a href="index.html" class="navbar-brand">
                    <h1 class="text-white">AI<span class="text-dark">.</span>Tech</h1>
                </a>
                <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="index.html" class="nav-item nav-link">Home</a>
                        <a href="about.html" class="nav-item nav-link">About</a>
                        <a href="service.html" class="nav-item nav-link">Services</a>
                        <a href="project.html" class="nav-item nav-link">Projects</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu bg-light mt-2">
                                <a href="feature.html" class="dropdown-item">Features</a>
                                <a href="team.html" class="dropdown-item active">Our Team</a>
                                <a href="faq.html" class="dropdown-item">FAQs</a>
                                <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                                <a href="404.html" class="dropdown-item">404 Page</a>
                            </div>
                        </div>
                        <a href="contact.html" class="nav-item nav-link">Contact</a>
                    </div>
                    <butaton type="button" class="btn text-white p-0 d-none d-lg-block" data-bs-toggle="modal"
                        data-bs-target="#searchModal"><i class="fa fa-search"></i></butaton>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Hero Start -->
    <div class="container-fluid pt-5 bg-primary hero-header">
        <div class="container pt-5">
            <div class="row g-5 pt-5">
                <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                    <h1 class="display-4 text-white mb-4 animated slideInRight">Who we are</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center justify-content-lg-start mb-0">
                            <li class="breadcrumb-item"><a class="text-white" href="#">We are the salt and light of the world</a></li>
                            
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 align-self-end text-center text-lg-end">
                    <img class="img-fluid" src="img/hero-img.png" alt="" style="max-height: 300px;">
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


    <!-- Team Start -->
<!-- Timeline -->
<div class="container-fluid">
    <div class="row">

      <div class="col">
        <div class="container my-5">
          <div class="row">
            <div class="col-md-6 offset-md-3">

              <ul class="timeline-3">
                <li>
                  <p class="" style="font-weight: bold;">2005.10</p>
                  <p>Start of SALT AND LIGHT (Philippines)<br>소금과 빛의 시작 (필리핀)
                  </p>
                </li>
                <li>
                  <p class="" style="font-weight: bold;">2008.11</p>
                  <p>Start of SALT AND LIGHT (India)<br>소금과 빛의 시작 (인도)
                  </p>
                </li>
                <li>
                  <p class="" style="font-weight: bold;">2011.04</p>
                  <p>Unified the name of organization into SALT & LIGHT INTERNATIONAL WORLD MISSION INC.<br>조직 이름을 소금과 빛
                    국제 월드 미션 주식회사로 통일
                  </p>
                </li>
                <li>
                  <p class="" style="font-weight: bold;">2012.07</p>
                  <p>MOA with City of San Pedro<br>산 페드로 시와의 양해각서
                  </p>
                </li>
                <li>
                  <p class="" style="font-weight: bold;">2012.10</p>
                  <p>Completion of construction of Salt and Light LOVE Community Center (Brgy. Landayan)<br>소금과 빛 LOVE
                    커뮤니티 센터 (브랑가이 랜다얀) 건설 완료 (2010-2012)
                  </p>
                </li>
                <li>
                  <p class="" style="font-weight: bold;">2013.05</p>
                  <p>Vision trip to Korea (Scholars and Ministers)<br>한국 비전 여행 (학자 및 목회자)
                  </p>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="container my-5">
          <div class="row">
            <div class="col-md-6 offset-md-3">

              <ul class="timeline-3">
                <li>
                  <p class="" style="font-weight: bold;">2013.09</p>
                  <p>Completion of Salt and Light Center in Chennai, India<br>인도 첸나이의 소금과 빛 센터 완공
                  </p>
                </li>
                <li>
                  <p class="" style="font-weight: bold;">2013.11</p>
                  <p>Completion of Salt and Light Church in Catmon, Batangas<br>카트몬, 바탄가스의 소금과 빛 교회 완공
                  </p>
                </li>
                <li>
                  <p class="" style="font-weight: bold;">2014.06</p>
                  <p>Started Salt and Light Bible College (Chennai, India)<br>소금과 빛 성경 대학 개설 (첸나이, 인도)
                  </p>
                </li>
                <li>
                  <p class="" style="font-weight: bold;">2015.03</p>
                  <p>Joined Global Mission Society (Missionary Sungwon & Ara)<br>글로벌 미션 사회 가입 (선교사 성원 & 아라)
                  </p>
                </li>
                <li>
                  <p class="" style="font-weight: bold;">2016.07</p>
                  <p>Ministry Cooperation with PTS College<br>PTS 대학과의 사역 협력
                  </p>
                </li>
                <li>
                  <p class="" style="font-weight: bold;">2017.06</p>
                  <p>Start of Salt and Light Daycare (with CSWD San Pedro)<br>소금과 빛 데이케어 시작 (CSWD 산 페드로와 함께)
                  </p>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="container my-5">
          <div class="row">
            <div class="col-md-6 offset-md-3">

              <ul class="timeline-3">
                <li>
                  <p class="" style="font-weight: bold;">2018.01</p>
                  <p>Completion of Salt and Light Faith Center (Brgy Cuyab)<br>소금과 빛 신앙 센터 완공 (브랑가이 쿠야브)
                  </p>
                </li>
                <li>
                  <p class="" style="font-weight: bold;">2018.05</p>
                  <p>Award Received from City of San Pedro<br>산 페드로 시로부터 받은 상
                  </p>
                  <p class="" style="font-weight: bold;">2018.05</p>
                  <p>Started Y-Tree Ministry<br>Y-Tree 사역 시작
                  </p>
                </li>
                <li>
                  <p class="" style="font-weight: bold;">2019.02</p>
                  <p>Opening of Salt and Light Health Center (with CHO San Pedro)<br>소금과 빛 건강 센터 개소 (CHO 산 페드로와 함께)
                  </p>
                </li>
                <li>
                  <p class="" style="font-weight: bold;">2020.04</p>
                  <p>Start of Online Ministry SALT & LIGHT ON (Youtube)<br>온라인 사역 시작 SALT & LIGHT ON (유튜브)
                  </p>
                </li>
                <li>
                  <p class="" style="font-weight: bold;">2020.07</p>
                  <p>Start of Online Children Ministry- Salt and Light KIDS (Youtube)<br>온라인 어린이 사역 시작 - 소금과 빛 KIDS
                    (유튜브)
                  </p>
                </li>
                <li>
                  <p class="" style="font-weight: bold;">2022.02</p>
                  <p>Completion of House of Mission (Brgy Cuyab)<br>선교의 집 완공 (브랑가이 쿠야브)
                  </p>
              </ul>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div> 
  
    <!-- Team End -->


    <!-- Newsletter Start -->
    <div class="container-fluid bg-primary newsletter py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-md-5 ps-lg-0 pt-5 pt-md-0 text-start wow fadeIn" data-wow-delay="0.3s">
                    <img class="img-fluid" src="img/newsletter.png" alt="">
                </div>
                <div class="col-md-7 py-5 newsletter-text wow fadeIn" data-wow-delay="0.5s">
                    <div class="btn btn-sm border rounded-pill text-white px-3 mb-3">Newsletter</div>
                    <h1 class="text-white mb-4">Let's subscribe the newsletter</h1>
                    <div class="position-relative w-100 mt-3 mb-2">
                        <input class="form-control border-0 rounded-pill w-100 ps-4 pe-5" type="text"
                            placeholder="Enter Your Email" style="height: 48px;">
                        <button type="button" class="btn shadow-none position-absolute top-0 end-0 mt-1 me-2"><i
                                class="fa fa-paper-plane text-primary fs-4"></i></button>
                    </div>
                    <small class="text-white-50">Diam sed sed dolor stet amet eirmod</small>
                </div>
            </div>
        </div>
    </div>
    <!-- Newsletter End -->


    <?php iniFooter(1); ?> 
 

 <!-- JAVASCRIPT FILES -->
 <script src="js/jquery.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
 <script src="js/jquery.sticky.js"></script>
 <script src="js/click-scroll.js"></script>
 <script src="js/custom.js"></script>

</body>


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top pt-2"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>