<?php
// embed_list.php - Display a paginated list of all embeds

include_once("../../connections/db.php");
include_once('../sidebar.php');

// Pagination settings
$limit = 10; // Number of records per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit;

// Fetch total records for pagination
$totalQuery = "SELECT COUNT(*) as total FROM embed";
$totalResult = $conn->query($totalQuery);
$totalRow = $totalResult->fetch_assoc();
$totalRecords = $totalRow['total'];
$totalPages = ceil($totalRecords / $limit);

// Fetch paginated results
$sql = "SELECT * FROM embed order by 1 desc LIMIT $start, $limit";
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
    <link href="../../css/sidebar.css" rel="stylesheet">

</head>
<body>

<?php showSidebar(); ?> 

    <div class="container" style="margin-left: 250px; padding-top: 20px;">
        <h1 class="text-center mb-4">Embed List</h1>

        <div class="content">
            <div class="container mt-5">
                <div class="d-flex justify-content-end mb-3">
                    <a href="embed_details.php" class="btn btn-primary btn-sm">Create New Embed</a>
                </div>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Type</th>
                            <th>Label</th>
                            <th>Is Active</th>
                            <th>Created Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $typeText = ($row['type'] == 2) ? 'YouTube' : (($row['type'] == 1) ? 'Facebook' : 'Unknown');
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $typeText . "</td>";
                                echo "<td>" . $row['title'] . "</td>";
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
