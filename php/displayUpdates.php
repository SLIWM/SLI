<?php
// Include the database connection
include_once('connections/db.php');

function fetchAndDisplayUpdates($page = 1, $limit = 5) {
    global $conn;

    // Calculate the offset for pagination
    $offset = ($page - 1) * $limit;

    // Query to retrieve the total number of active updates
    $count_sql = "SELECT COUNT(*) AS total FROM sli.updates WHERE isActive = 1";
    $count_result = $conn->query($count_sql);
    $total_rows = $count_result->fetch_assoc()['total'];
    $total_pages = ceil($total_rows / $limit);

    // Query to retrieve paginated results
    $sql = "SELECT * FROM sli.updates WHERE isActive = 1 ORDER BY eventDate DESC LIMIT $limit OFFSET $offset";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $title = $row['Title'];
            $description = $row['Details'];
            $shortText = substr($description, 0, 400);
            $date = $row['eventDate'];
            $updateID = $row['ID'];

            echo '
            <div class="col-md-6 news-item wow fadeIn" data-wow-delay="0.1s" style="white-space: normal;word-wrap: break-word;overflow-wrap: break-word;">
                <h3>' . htmlspecialchars($title) . '</h3>
                <p class="date">' . date('F j, Y', strtotime($date)) . '</p>
                <p class="content" >
                    ' . $shortText . '...
                </p>
                <a href="#" class="read-more">Read more...</a>
            </div>';
        }

        // Display Pagination update_details.php?id=' . $updateID . '
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
        echo '<div class="col-lg-5 col-12"><p>No updates available.</p></div>';
    }
}
?>
