<?php
// db.php - Database connection script
$host = 'localhost';    // Your MySQL host (usually localhost)
$username = 'u329590524';     // Your MySQL username
$password = 'Coramdeo123';         // Your MySQL password
$dbname = 'u329590524_sli';        // Database name

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
