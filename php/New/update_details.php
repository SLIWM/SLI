<?php
// Include the database connection
include_once("../../connections/db.php");

// Initialize variables
$id = $title = $eventDate = $details = '';
$isEditing = false;
$update = [
    'id' => '', 'Title' => '', 'eventDate' => '', 'Details' => '', 'isActive' => 1
];

// Check if we're editing an update
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM sli.updates WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $update = $result->fetch_assoc();
    $isEditing = true;
}

// Handle form submission for save or update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['saveUpdate'])) {
        $title = $_POST['title']; // New title field
        $eventDate = $_POST['eventDate']; // Event Date field
        $details = $_POST['details']; // Details field
        $isActive = isset($_POST['isActive']) ? 1 : 0;  // Checkbox for isActive

        if ($isEditing) {
            // Update existing update
            $stmt = $conn->prepare("UPDATE sli.updates SET Title = ?, eventDate = ?, Details = ?, isActive = ? WHERE ID = ?");
            $stmt->bind_param("sssii", $title, $eventDate, $details, $isActive, $id);
        } else {
            // Insert new update
            $stmt = $conn->prepare("INSERT INTO sli.updates (Title, eventDate, Details, isActive) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("sssi", $title, $eventDate, $details, $isActive);
        }

        if ($stmt->execute()) {
            $updateID = $isEditing ? $id : $conn->insert_id;
            header('Location: update_details.php?id=' . $updateID);
            exit();
        } else {
            echo "Error: " . $conn->error;
        }
    }
}

include_once('../sidebar.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Details</title>
    <link href="../../css/sidebar.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
</head>
<body>
    <?php showSidebar(); ?>

    <div class="content">
        <div class="container mt-5">
            <h1 class="text-center"> <?= $isEditing ? 'Edit Update' : 'Create Update' ?> </h1>
            <form method="post" class="mt-4">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?= htmlspecialchars($update['Title']) ?>" required>
                </div>
                <div class="form-group">
                    <label for="eventDate">Event Date</label>
                    <input type="date" class="form-control" id="eventDate" name="eventDate" value="<?= htmlspecialchars($update['eventDate']) ?>" required>
                </div>
                <div class="form-group">
                    <label for="details">Details</label>
                    <textarea class="form-control" id="details" name="details" rows="5" required><?= htmlspecialchars($update['Details']) ?></textarea>
                </div>
                <script> CKEDITOR.replace('details'); </script>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="isActive" name="isActive" <?= isset($update['isActive']) && $update['isActive'] ? 'checked' : '' ?>>
                    <label class="form-check-label" for="isActive">Is Active</label>
                </div>
                <button type="submit" name="saveUpdate" class="btn btn-primary btn-sm mt-3">
                    <?= $isEditing ? 'Update Update' : 'Create Update' ?>
                </button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
