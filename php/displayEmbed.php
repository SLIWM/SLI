<?php
// Include the database connection
include_once('connections/db.php');

// Function to fetch iframe content from the database and display it
function fetchAndDisplayIframe($type) {
    global $conn;  // Use the global $conn variable from db.php

    // Query to retrieve iframe content from the database
    $sql = "SELECT * FROM embed WHERE isActive = 1 and type =$type limit 5";  // Adjust the query as needed to retrieve all active iframes
    $result = $conn->query($sql);
    $bool = 0;
    // Check if we have any results
    if ($result->num_rows > 0) {
        // Loop through each row in the result set
        while ($row = $result->fetch_assoc()) {
            $iframeContent = $row['iframe'];
            $Title = $row['title'];
            $description = $row['description'];
            $shortText = substr($description, 0, 450);
            $date = $row['serviceDate'];       

            echo  '
            <div class="container section-padding">
                <div class="row">
                    <div class="col-lg-6 col-12 mb-4 mb-lg-0 d-flex align-items-center">
                        <div class="services-info">
                            <h2 class="text-white mb-4"> '. $Title . '</h2>
                            

                            '. $shortText .' . . .
                            
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="about-text-wrap">
                            <div class="col-lg-12 col-12">
                                <div>
                                    <div class="video-container">
                                        ' . $iframeContent . '  <!-- Output the iframe content -->
                                    </div>
                                </div>
                            </div>
                        </div>
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
