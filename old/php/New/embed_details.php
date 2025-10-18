<?php
// Include the database connection
include_once("../../connections/db.php");

// Initialize variables
$id = $type = $title = $serviceDate = $description = $iframe = $isActive = '';
$isEditing = false;
$embed = [
    'id' => '', 'type' => '', 'title' => '', 'serviceDate' => '', 'description' => '',
    'iframe' => '', 'createdDate' => '', 'isActive' => 1
];

// Check if we're editing an embed
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM embed WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $embed = $result->fetch_assoc();
    $isEditing = true;
}

// Handle form submission for embed save or update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['saveEmbed'])) {
        $type = $_POST['type'];
        $title = $_POST['title']; // New title field
        $serviceDate = !empty($_POST['serviceDate']) ? $_POST['serviceDate'] : NULL; // Allow NULL values
        $description = $_POST['description']; // New description field
        $iframe = $_POST['iframe'];
        $isActive = isset($_POST['isActive']) ? 1 : 0;  // Checkbox for isActive
        $createdDate = date('Y-m-d H:i:s');  // Current date for creation

        if ($isEditing) {
            $stmt = $conn->prepare("UPDATE embed SET type = ?, title = ?, serviceDate = ?, description = ?, iframe = ?, isActive = ? WHERE id = ?");
            $stmt->bind_param("issssii", $type, $title, $serviceDate, $description, $iframe, $isActive, $id);
        } else {
            $stmt = $conn->prepare("INSERT INTO embed (type, title, serviceDate, description, iframe, createdDate, isActive) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("isssssi", $type, $title, $serviceDate, $description, $iframe, $createdDate, $isActive);
        }

        if ($stmt->execute()) {
            $embedID = $isEditing ? $id : $conn->insert_id;
            header('Location: embed_details.php?id=' . $embedID);
            exit();
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
include_once('../sidebar.php');
?>

<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Embed Details</title>
    <link href="../../css/sidebar.css" rel="stylesheet">

    <!-- Link to Custom CSS -->
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tiny.cloud/1/YOUR_API_KEY/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

  
</head>
<body>
    <?php showSidebar(); ?> 

    <div class="content">
        <div class="container mt-5">
            <h1 class="text-center"> <?= $isEditing ? 'Edit Embed' : 'Create Embed' ?> </h1>
            <form method="post" class="mt-4">
                <div class="form-group">
                    <label for="type">Embed Type</label>
                    <input type="number" class="form-control" id="type" name="type" value="<?= htmlspecialchars($embed['type']) ?>" required>
                </div>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?= htmlspecialchars($embed['title']) ?>" required>
                </div>
                <div class="form-group">
                    <label for="serviceDate">Service Date</label>
                    <input type="date" class="form-control" id="serviceDate" name="serviceDate" value="<?= htmlspecialchars($embed['serviceDate']) ?>">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="5"><?= htmlspecialchars($embed['description']) ?></textarea>
                </div>
                <script> CKEDITOR.replace('description'); </script>
                <div class="form-group">
                    <label for="iframe">Iframe Content</label>
                    <textarea class="form-control" id="iframe" name="iframe" rows="5" required><?= htmlspecialchars($embed['iframe']) ?></textarea>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="isActive" name="isActive" <?= isset($embed['isActive']) && $embed['isActive'] ? 'checked' : '' ?>>
                    <label class="form-check-label" for="isActive">Is Active</label>
                </div>
                <button type="submit" name="saveEmbed" class="btn btn-primary btn-sm mt-3">
                    <?= $isEditing ? 'Update Embed' : 'Create Embed' ?>
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

