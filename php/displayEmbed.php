<?php
// Include the database connection
include_once('connections/db.php');

// Function to fetch iframe content from the database and display it
function fetchAndDisplayIframe() {
    global $conn;  // Use the global $conn variable from db.php

    // Query to retrieve iframe content from the database
    $sql = "SELECT iframe FROM embed WHERE isActive = 1";  // Adjust the query as needed to retrieve all active iframes
    $result = $conn->query($sql);

    // Check if we have any results
    if ($result->num_rows > 0) {
        // Loop through each row in the result set
        while ($row = $result->fetch_assoc()) {
            $iframeContent = $row['iframe'];  // Get the iframe content

            // Display each iframe
            echo '<div class="col-lg-5 col-12">
                    <div>
                        <div>
                            ' . $iframeContent . '  <!-- Output the iframe content -->
                        </div>
                    </div>
                  </div>';
        }
    } else {
        // If no iframe is found, show a message
        echo '<div class="col-lg-5 col-12">
                <div>
                    <div>
                        <p>No iframe available.</p>
                    </div>
                </div>
              </div>';
    }
}
?>
