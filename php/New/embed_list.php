<?php
// embed_list.php - Display a list of all embeds

include_once("../../connections/db.php");

// Fetch all embeds from the database
$sql = "SELECT * FROM embed";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Embed List</title>

    <!-- Bootstrap 4 CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Link to sidebar.css -->
    <link href="../../css/sidebar.css" rel="stylesheet">

    <!-- Link to custom.css -->
    <link href="../../css/custom.css" rel="stylesheet">

</head>
<body>

    <!-- Side Navbar -->
    <div class="sidebar">
        <h3 class="text-center text-white mb-4">Menu</h3>
        <a href="dashboard.php">Dashboard</a>
        <a href="user_list.php">Users</a>
        <a href="role_list.php">Roles</a>
        <a href="position_list.php">Positions</a>
        <a href="embed_list.php">Embeds</a>
        <a href="file_list.php">Files</a>
        <a href="user_details.php">User Details</a>
    </div>

    <div class="container" style="margin-left: 250px; padding-top: 20px;">
        <h1 class="text-center mb-4">Embed List</h1>

        <!-- Table displaying all embeds -->
        <div class="card">
            <div class="card-body">
                <!-- Create New Embed Button (Aligned to the right) -->
                <div class="d-flex justify-content-end mb-3">
                    <a href="embed_details.php" class="btn btn-primary btn-sm">Create New Embed</a>
                </div>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Type</th>
                            
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
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['type'] . "</td>";
                                
                                echo "<td>" . ($row['isActive'] ? 'Yes' : 'No') . "</td>";
                                echo "<td>" . $row['createdDate'] . "</td>";
                                echo "<td>
                                        <a href='embed_details.php?id=" . $row['id'] . "' class='btn btn-info btn-sm'>Edit</a>
                                      </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6' class='text-center'>No embeds found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>
