<?php
include_once('../php/displayEmbed.php');
include_once('../php/nav.php');
?>
<!doctype html>
<html lang="en">

<?php iniHeader(0); ?> 

<body>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v21.0"></script>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v22.0"></script>
    <main>
        <?php showNav(0); ?> 

        <section class="about-section section-padding" id="section_2">
            <div class="container">
            <?php
                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;  // Get page number from URL
                fetchAndDisplayIframe(2, $page);
            ?>

            </div>  
        </section>
      
    </main>


    <?php iniFooter(); ?> 



</body>

</html>