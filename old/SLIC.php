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
    <?php showNav(1); ?> 
    <!-- Navbar End -->


    <!-- Hero Start -->
    <div class="container-fluid pt-5 bg-primary hero-header">
        <div class="container pt-5">
            <div class="row g-5 pt-5">
                <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                    <h1 class="display-4 text-white mb-4 animated slideInRight">Salt and Light Church</h1>
                    <p class="text-white mb-4 animated slideInRight">We are blessed to welcome you! May God’s grace be with you. </br>Please feel free to reach out to us</p>
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
    <br>
    <div class="text-center">
<h1 class="display-1">Department of Harvest</h1>


</div>
<br>

    <div class="container-fluid py-5">
        <!-- Remnant -->
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="about-img">
                        <img class="img-fluid" src="img/Remnant.jpg">
                    </div>
                </div>
                
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">  
                    
                <div class="col-12 wow fadeIn" data-wow-delay="0.1s">                  
                    <h1 class="mb-3">Young Remnant</h1>
                    <p class="mb-4"><i>"So too, at the present time there is a remnant chosen by grace."</i> – Romans 11:5. <br> <br>
                    God has always preserved a faithful remnant—a people who remain steadfast in His truth, even in challenging times. 
                        Here, we share sermons that encourage and equip believers to stand firm in their faith, walk in obedience, and live as God’s chosen people.</p>
                </div>  
            <!-- Team End    <div class="col-12 wow fadeIn" data-wow-delay="0.1s">
                                    <div class="team-item bg-white text-center rounded p-4 pt-0">
                                        <img class="img-fluid rounded-circle p-4" src="img/team-1.jpg" alt="">
                                        <h5 class="mb-0">Boris Johnson</h5>
                                        <small>Founder & CEO</small>
                                        <div class="d-flex justify-content-center mt-3">
                                            <a class="btn btn-square btn-primary m-1" href=""><i
                                                    class="fab fa-facebook-f"></i></a>
                                            <a class="btn btn-square btn-primary m-1" href=""><i
                                                    class="fab fa-twitter"></i></a>
                                            <a class="btn btn-square btn-primary m-1" href=""><i
                                                    class="fab fa-instagram"></i></a>
                                            <a class="btn btn-square btn-primary m-1" href=""><i
                                                    class="fab fa-linkedin-in"></i></a>
                                        </div>
                                    </div>
                </div>            --> 
                </div>
            </div>
        </div>
        <!-- End Remnant-->    
        <hr class="hr" />
        <!-- Youth -->
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                               
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">  
                    
                <div class="col-12 wow fadeIn" data-wow-delay="0.1s">                  
                    <h1 class="mb-3">Youth Ambassador for Christ</h1>
                    <p class="mb-4"><i>"Let no one despise you for your youth, but set the believers an example in speech, in conduct, in love, in faith, in purity."</i> – 1 Timothy 4:12. <br> <br>
                    This is a space where young hearts are encouraged, challenged, and empowered to live boldly for Christ. Our messages are designed to help you grow in faith, navigate life’s challenges, and embrace the purpose God has for you.</p>
                </div>  
    
                </div>

                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="about-img">
                        <img class="img-fluid" src="img/YAFC/YAFC.jpg">
                    </div>
                </div>
            </div>
        </div>
        <!-- End Youth--> 
        <hr class="hr" />
      
        <!-- SLI KIDS -->
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="about-img">
                        <img class="img-fluid" src="img/SLIKIDS/SLIKIDS.jpg">
                    </div>
                </div>
                
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">  
                    
                <div class="col-12 wow fadeIn" data-wow-delay="0.1s">                  
                    <h1 class="mb-3">Salt and Light Kids</h1>
                    <p class="mb-4"><i>"Start children off on the way they should go, and even when they are old they will not turn from it."</i> – Proverbs 22:6 (NIV) <br> <br>
                    Salt and Light Kids is a vibrant, Christ-centered ministry dedicated to nurturing the spiritual growth of children. Our mission is to raise up young disciples who reflect the love, truth, and light of Jesus in their daily lives. Just as Jesus called His followers to be the salt of the earth 
                    and the light of the world, we encourage every child to live out their faith boldly, making a positive impact in their homes, schools, and communities.</p>
                </div>  
    </div>
</div>
</div>
</div>
<hr class="hr" />
<!-- SLI KIDS END -->

        <!-- Men and Women -->
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                               
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">  
                    
                <div class="col-12 wow fadeIn" data-wow-delay="0.1s">                  
                    <h1 class="mb-3">Men and Women</h1>
                    <p class="mb-4"><i>"You are the salt of the earth... You are the light of the world... let your light shine before others, that they may see your good deeds and glorify your Father in heaven"</i> – Matthew 5:13-16 (NIV) <br> <br>
                    Salt and Light Men & Women is a ministry devoted to strengthening the spiritual lives of men and women, equipping them to walk boldly in their God-given identity and purpose. Together, we pursue deeper relationship with Christ, build authentic community, and grow as leaders in our homes, churches, and the world. Rooted in biblical truth, this ministry empowers men and women to live out their faith, encourage one another, and reflect the love and light of Jesus in every aspect of life.</p>
                </div>  
    
                </div>

                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="about-img">
                        <img class="img-fluid" src="img/Men and Women/MW.jpg">
                    </div>
                </div>
            </div>
        </div>
<!-- Men and Women END -->
<hr class="hr" />



 

  <?php iniFooter(1); ?> 
</body>

</html>