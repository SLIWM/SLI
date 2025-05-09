<?php
// album_list.php - Display a list of all albums

include_once("../../connections/db.php");

// Fetch all albums from the database
$sql = "SELECT * FROM album";
$result = $conn->query($sql);
include_once('../sidebar.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Album List</title>

    <!-- Bootstrap 4 CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

 
   <!-- Link to sidebar.css -->
   <link href="../../css/sidebar.css" rel="stylesheet">

<!-- Link to custom.css -->

</head>
<body>

<?php showSidebar(); ?> 

    <div class="container" style="margin-left: 250px; padding-top: 20px;">
    <h1 class="text-center mb-4">Album List</h1>

        <!-- Table displaying all albums -->
        <div class="content">
        <div class="container mt-5">
                <!-- Create New Album Button (Aligned to the right) -->
                <div class="d-flex justify-content-end mb-3">
                    <a href="album_details.php" class="btn btn-primary btn-sm">Create New Album</a>
                </div>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Label</th>
                            <th>Is Active</th>
                            <th>Created Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['ID'] . "</td>";
                                echo "<td>" . $row['Label'] . "</td>";
                                echo "<td>" . ($row['isActive'] ? 'Yes' : 'No') . "</td>";
                                echo "<td>" . $row['CreatedDate'] . "</td>";
                                echo "<td>
                                        <a href='album_details.php?id=" . $row['ID'] . "' class='btn btn-info btn-sm'>Edit</a>
                                      </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5' class='text-center'>No albums found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>
