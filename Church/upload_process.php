
<header><h1>Our Latest News</h1></header>

<div class="content-container">
    <?php
        // 1. Database connection code here ($conn)

        $sql = "SELECT photo_path, content_title, announcement_title FROM content 
        WHERE  exp_date > NOW()
        ORDER BY id DESC LIMIT 5";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // 2. Loop through results
            while($row = $result->fetch_assoc()) {
                echo "<div class='content-item'>";
                
                // Display Photo
                echo "<img src='" . htmlspecialchars($row["photo_path"]) . "' alt='" . htmlspecialchars($row["content_title"]) . "'>";
                
                // Display Titles (using a condition for announcements)
                if (!empty($row["announcement_title"])) {
                    echo "<h2>📢 " . htmlspecialchars($row["announcement_title"]) . "</h2>";
                } else {
                    echo "<h2>" . htmlspecialchars($row["content_title"]) . "</h2>";
                }
                
                echo "</div>";
            }
        } else {
            echo "<p>No content uploaded yet.</p>";
        }
        $conn->close();
        ?>
</div>
