<?php
// file_list.php - List all files

include_once("../../connections/db.php");
include_once('../sidebar.php');

// Fetch all files from the database
$sql = "SELECT f.ID, f.Label, f.FileName, f.UploadedDate, u.Username AS UploadedBy, f.IsActive FROM files f JOIN user u ON f.UploadedBy = u.ID";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File List</title>

    <!-- Bootstrap 4 CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

     <!-- Link to sidebar.css -->
     <link href="../../css/sidebar.css" rel="stylesheet">

<!-- Link to custom.css -->

</head>
<body>
<?php showSidebar(); ?> 
<div class="content">
<div class="container mt-5">
        <h1 class="text-center mb-4">File List</h1>
        <div class="d-flex justify-content-end mb-3">
        <a href="file_details.php" class="btn btn-primary btn-sm mb-3">Add New File</a>

        </div>

        <!-- Table for files -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Label</th>
                    <th>File Name</th>
                    <th>Uploaded By</th>
                    <th>Uploaded Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?= $row['ID'] ?></td>
                        <td><?= $row['Label'] ?></td>
                        <td><?= $row['FileName'] ?></td>
                        <td><?= $row['UploadedBy'] ?></td>
                        <td><?= $row['UploadedDate'] ?></td>
                        <td><?= $row['IsActive'] ? 'Active' : 'Inactive' ?></td>
                        <td>
                            <a href="file_details.php?id=<?= $row['ID'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <!-- Add delete functionality if needed -->
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    </div>

</body>
</html>
