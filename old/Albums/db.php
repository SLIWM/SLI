<?php
// db.php - Handles database connection and data fetching
include '../SALTANDLIGHTBackOffice/connections/db.php';

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
