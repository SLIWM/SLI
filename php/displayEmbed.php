<?php
// Include the database connection
include_once('connections/db.php');

function fetchAndDisplayIframe($type, $page = 1, $limit = 5) {
    global $conn;

    // Calculate the offset for pagination
    $offset = ($page - 1) * $limit;

    // Query to retrieve the total number of active iframes
    $count_sql = "SELECT COUNT(*) AS total FROM embed WHERE isActive = 1 AND type = $type";
    $count_result = $conn->query($count_sql);
    $total_rows = $count_result->fetch_assoc()['total'];
    $total_pages = ceil($total_rows / $limit);

    // Query to retrieve paginated results
    $sql = "SELECT * FROM embed WHERE isActive = 1 AND type = $type LIMIT $limit OFFSET $offset";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $iframeContent = $row['iframe'];
            $Title = $row['title'];
            $description = $row['description'];
            $shortText = substr($description, 0, 400);
            $date = $row['serviceDate'];

            echo '
            <div class="container section-padding">
                <div class="row">
                    <div class="col-lg-6 col-12 mb-4 mb-lg-0 d-flex align-items-center">
                        <div class="services-info">
                            <h1>'. $Title .'</h2>
                            '. $shortText .'...
                        
                        </br></br><a class="btn btn-primary rounded-pill px-4" href="https://www.youtube.com/@SaltandLightON">Show More</a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="about-text-wrap">
                            <div class="col-lg-12 col-12">
                                <div class="video-container">'. $iframeContent .'</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
        }

        // Display Pagination
        echo '<div class="container text-center mt-4">
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">';

        // Previous Button
        if ($page > 1) {
            echo '<li class="page-item"><a class="page-link" href="?page='. ($page - 1) .'">Previous</a></li>';
        }

        // Page Number Links
        for ($i = 1; $i <= $total_pages; $i++) {
            $active = ($i == $page) ? 'active' : '';
            echo '<li class="page-item '. $active .'"><a class="page-link" href="?page='. $i .'">'. $i .'</a></li>';
        }

        // Next Button
        if ($page < $total_pages) {
            echo '<li class="page-item"><a class="page-link" href="?page='. ($page + 1) .'">Next</a></li>';
        }

        echo '   </ul>
                </nav>
              </div>';
    } else {
        echo '<div class="col-lg-5 col-12"><p>No iframe available.</p></div>';
    }
}
?>
