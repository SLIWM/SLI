<?php
include_once('php/displayEmbed.php');
include_once('php/nav.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sermons</title>
    <link rel="icon" type="image/png" href="img/logo/SLILOGO.png">
    <!-- Other head content like CSS, meta tags -->
</head>

<?php iniHeader(1); ?> 

<body>


    <main>
        <?php showNav(1); ?> 
        <div class="container-fluid pt-5 bg-primary hero-header">
        <div class="container pt-5">
            <div class="row g-5 pt-5">
                <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                    <h1 class="display-4 text-white mb-4 animated slideInRight">Sermons</h1>
                    <p class="text-white mb-4 animated slideInRight">"Your word is a lamp to my feet and a light to my path." – Psalm 119:105</p>
                </div>
                <div class="col-lg-6 align-self-end text-center text-lg-end">
                    <img class="img-fluid" src="img/hero-img.png" alt="" style="max-height: 300px;">
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-5">
        <section class="about-section section-padding" id="section_2">
            <div class="container">
            <?php
                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;  // Get page number from URL
                fetchAndDisplayIframe(2, $page);
            ?>

            </div>  
        </section>
        </div>
    </main>


    <?php iniFooter(); ?> 



</body>

</html>