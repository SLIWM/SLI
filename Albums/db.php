<?php
// db.php - Handles database connection and data fetching

// Database connection settings
$host = 'localhost';    // Your MySQL host
$username = 'u329590524_sli2009';     // Your MySQL username
$password = 'Coramdeo123';         // Your MySQL password
$database = 'u329590524_sli';        // Database name

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch albums and their files
$query = "
    SELECT 
        a.ID AS AlbumID, 
        a.Label AS AlbumLabel, 
        f.ID AS FileID, 
        f.Label AS FileLabel, 
        f.Path 
    FROM 
        Album a
    LEFT JOIN 
        Files f ON a.ID = f.AlbumID
    WHERE 
        a.isActive = 1 AND f.IsActive = 1
    ORDER BY 
        a.`order` ASC, f.UploadedDate DESC";

$result = $conn->query($query);

// Initialize array to store data
$albums = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $albumId = $row['AlbumID'];
        if (!isset($albums[$albumId])) {
            $albums[$albumId] = [
                'Label' => $row['AlbumLabel'],
                'Files' => []
            ];
        }
        if ($row['FileID']) {
            $albums[$albumId]['Files'][] = [
                'Label' => $row['FileLabel'],
                'Path' => $row['Path']
            ];
        }
    }
}

// Close connection
$conn->close();
?>
