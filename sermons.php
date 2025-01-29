<?php
include_once('php/displayEmbed.php');
include_once('php/nav.php');
?>
<!doctype html>
<html lang="en">

<?php iniHeader(); ?> 

<body>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v21.0"></script>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v22.0"></script>
    <main>
        <?php showNav(); ?> 

        <section class="about-section section-padding" id="section_2">
            <div class="container">
            <?php fetchAndDisplayIframe(2); ?> 
            </div>  
        </section>


     


      
    </main>


    <?php iniFooter(); ?> 

    <!--

T e m p l a t e M o

-->

    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/click-scroll.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>