<?php
// updates_list.php - Display a paginated list of updates

include_once("../../connections/db.php");
include_once('../sidebar.php');

// Pagination settings
$limit = 10; // Number of records per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit;

// Fetch total records for pagination, filtering for active updates only
$totalQuery = "SELECT COUNT(*) as total FROM sli.updates WHERE isActive = 1";
$totalResult = $conn->query($totalQuery);
$totalRow = $totalResult->fetch_assoc();
$totalRecords = $totalRow['total'];
$totalPages = ceil($totalRecords / $limit);

// Fetch paginated results, filtering for active updates only
$sql = "SELECT * FROM sli.updates WHERE isActive = 1 ORDER BY eventDate DESC LIMIT $start, $limit";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Updates List</title>

    <!-- Bootstrap 4 CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/sidebar.css" rel="stylesheet">

</head>
<body>

<?php showSidebar(); ?> 

    <div class="container" style="margin-left: 250px; padding-top: 20px;">
        <h1 class="text-center mb-4">Updates and News List</h1>

        <div class="content">
            <div class="container mt-5">
                <div class="d-flex justify-content-end mb-3">
                    <a href="update_details.php" class="btn btn-primary btn-sm">Create New Update</a>
                </div>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Event Date</th>
                            <th>Details</th>
                            <th>Active</th> <!-- Added Active column -->
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['ID'] . "</td>";
                                echo "<td>" . $row['Title'] . "</td>";
                                echo "<td>" . date('F j, Y', strtotime($row['eventDate'])) . "</td>";
                                echo "<td>" . substr($row['Details'], 0, 100) . "...</td>";
                                // Display the status of isActive as Yes/No or Active/Inactive
                                echo "<td>" . ($row['isActive'] == 1 ? 'Active' : 'Inactive') . "</td>";
                                echo "<td>
                                        <a href='update_details.php?id=" . $row['ID'] . "' class='btn btn-info btn-sm'>Edit</a>
                                      </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6' class='text-center'>No active updates found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>

                <!-- Pagination -->
                <nav>
                    <ul class="pagination justify-content-center">
                        <?php if ($page > 1): ?>
                            <li class="page-item"><a class="page-link" href="?page=1">First</a></li>
                            <li class="page-item"><a class="page-link" href="?page=<?= $page - 1 ?>">Previous</a></li>
                        <?php endif; ?>

                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                            <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                                <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                            </li>
                        <?php endfor; ?>

                        <?php if ($page < $totalPages): ?>
                            <li class="page-item"><a class="page-link" href="?page=<?= $page + 1 ?>">Next</a></li>
                            <li class="page-item"><a class="page-link" href="?page=<?= $totalPages ?>">Last</a></li>
                        <?php endif; ?>
                    </ul>
                </nav>

            </div>
        </div>
    </div>

</body>
</html>
