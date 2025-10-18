<!DOCTYPE html>
<html lang="en">


<?php include_once('php/nav.php');
include_once('php/displayUpdates.php');
?>

<?php iniHeader(1); ?>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
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
                    <h1 class="display-4 text-white mb-4 animated slideInRight">Updates and News</h1>
                    <p class="text-white mb-4 animated slideInRight">Stay updated with the latest news and events happening at Salt and Light Church. </p>
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
                    <button type="button" class="btn btn-square bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="input-group" style="max-width: 600px;">
                        <input type="text" class="form-control bg-transparent border-light p-3" placeholder="Search updates...">
                        <button class="btn btn-light px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Full Screen Search End -->

    <div class="container-fluid py-5">
        <!-- Updates Section Start -->
        <div class="container py-5">
            <div class="row g-5">

                <!-- News Item 1 -->
                <?php
                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;  // Get page number from URL
                fetchAndDisplayUpdates( $page);
            ?>

            </div>
        </div>
        <!-- Updates Section End -->

    </div>

    <!-- Footer Start -->
    <?php iniFooter(1); ?> 
    <!-- Footer End -->
</body>

</html>
