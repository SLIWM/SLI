<?php
// Include the database script
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Creative - Start Bootstrap Theme</title>
    <!-- Favicon-->
    <link rel="stylesheet" href="../css/saltandlight.css">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap Icons-->
    <!-- Google fonts-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Qwitcher+Grypen:wght@400;700&display=swap" rel="stylesheet">
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />

    <link href="../css/styles.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/Nav.css">
    
</head>
<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="50">
<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-body-tertiary transparent">
    <div class="container-fluid">
      <img src="../img/logo/SLILOGO.png" alt="" width="30" height="24" class="d-inline-block align-text-top" style="margin-right:10px">
      SALT AND LIGHT
      
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="navbar-nav ms-auto py-0">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item"><a class="nav-link" aria-current="page" href="#about">About</a></li>
            <li class="nav-item"><a class="nav-link" href="album.php">Albums</a></li>
            <li class="nav-item"><a class="nav-link" href="#followus">Follow Us</a></li>
            <li class="nav-item"><a class="nav-link" href="#!">Contact</a></li>
          
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    window.addEventListener('scroll', function () {
      const navbar = document.querySelector('.navbar');
      if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
        navbar.classList.remove('transparent');
      } else {
        navbar.classList.add('transparent');
        navbar.classList.remove('scrolled');
      }
    });
  </script>

    <div class="hero-image">
        <div class="hero-text">
            <h1 class="qwitcher-grypen-bold display-1">Salt and Light Albums<br></h1>
        </div>
    </div>

    <section class="page-section ">
        <div class="container px-3 px-lg-3 text-center">
            <h2>Our Albums</h2>
        </div>
    </section>

    <!-- Portfolio -->
    <div id="portfolio">
        <div class="container-fluid p-0">
            <?php foreach ($albums as $album): ?>
                <div class="row g-0 mb-5">
                    <h3 class="text-center mt-3"><?php echo htmlspecialchars($album['Label']); ?></h3>
                    <?php if (!empty($album['Files'])): ?>
                        <?php foreach ($album['Files'] as $file): ?>
                            <div class="col-lg-4 col-sm-6">
                                <a class="portfolio-box" href="<?php echo htmlspecialchars($file['Path']); ?>" title="<?php echo htmlspecialchars($file['Label']); ?>">
                                    <img class="img-fluid" src="../SALTANDLIGHTBackOffice/php/New/<?php echo htmlspecialchars($file['Path']); ?>" alt="<?php echo htmlspecialchars($file['Label']); ?>" />
                                    <div class="portfolio-box-caption">
                                        <div class="project-name"><?php echo htmlspecialchars($file['Label']); ?></div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="text-center">No files in this album.</p>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Bootstrap JS and your other scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
