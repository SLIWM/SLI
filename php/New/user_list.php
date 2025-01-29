<?php
// user_list.php - Display a list of all users

include_once("../../connections/db.php");
include_once("check_session.php");

// Fetch all users from the database
$sql = "SELECT * FROM user";
$result = $conn->query($sql);
include_once('../sidebar.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>

    <!-- Bootstrap 4 CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Link to sidebar.css -->
    <link href="../../css/sidebar.css" rel="stylesheet">

    <!-- Link to custom.css -->


</head>

<body>

<?php showSidebar(); ?> 

    <div class="container" style="margin-left: 250px; padding-top: 20px;">
        <h1 class="text-center">User List</h1>

        <!-- Table displaying all users -->
        <div class="content">
        <div class="container mt-5">
                <!-- Create New User Button (Aligned to the right) -->
                <div class="d-flex justify-content-end mb-3">
                    <a href="user_details.php" class="btn btn-primary btn-sm">Create New User</a>
                </div>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Is Active</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['ID'] . "</td>";
                                echo "<td>" . $row['Username'] . "</td>";
                                echo "<td>" . $row['Email'] . "</td>";
                                echo "<td>" . ($row['IsActive'] ? 'Yes' : 'No') . "</td>";
                                echo "<td>
                                        <a href='user_details.php?id=" . $row['ID'] . "' class='btn btn-info btn-sm'>Edit</a>
                                        <a href='User/delete_user.php?id=" . $row['ID'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete?\")'>Delete</a>
                                      </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5' class='text-center'>No users found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>