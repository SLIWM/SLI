<?php
// Include the database connection
include_once("../../connections/db.php");

// Initialize variables
$id = $type = $label = $iframe = $isActive = '';
$isEditing = false;
$embed = ['id' => '', 'type' => '', 'label' => '', 'iframe' => '', 'createdDate' => '', 'isActive' => 1];

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
        $label = $_POST['label']; // Get the label from the form
        $iframe = $_POST['iframe'];
        $isActive = isset($_POST['isActive']) ? 1 : 0;  // Checkbox for isActive
        $createdDate = date('Y-m-d H:i:s');  // Current date for creation

        if ($isEditing) {
            $stmt = $conn->prepare("UPDATE embed SET type = ?, label = ?, iframe = ?, isActive = ? WHERE id = ?");
            $stmt->bind_param("sssii", $type, $label, $iframe, $isActive, $id);
        } else {
            $stmt = $conn->prepare("INSERT INTO embed (type, label, iframe, createdDate, isActive) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssi", $type, $label, $iframe, $createdDate, $isActive);
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Embed Details</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Link to Sidebar CSS -->
    <link href="../../css/sidebar.css" rel="stylesheet">

    <!-- Link to Custom CSS -->
    <link href="../../css/custom.css" rel="stylesheet">
</head>
<body>
    <div class="sidebar">
        <h3 class="text-center text-white mb-4">Menu</h3>
        <a href="dashboard.php">Dashboard</a>
        <a href="user_list.php">Users</a>
        <a href="role_list.php">Roles</a>
        <a href="position_list.php">Positions</a>
        <a href="embed_list.php">Embeds</a>
        <a href="file_list.php">Files</a>
        <a href="user_details.php">User Details</a>

        <!-- Logout Button -->
        <div class="text-center mt-4">
            <button class="logout-btn" onclick="window.location.href='logout.php'">Logout</button>
        </div>
    </div>

    <div class="container mt-5">
        <h1 class="text-center"><?= $isEditing ? 'Edit Embed' : 'Create Embed' ?></h1>

        <form method="post" class="mt-4">
            <!-- Embed Type -->
            <div class="form-group">
                <label for="type">Embed Type</label>
                <input type="number" class="form-control" id="type" name="type" value="<?= $embed['type'] ?>" required>
            </div>

            <!-- Embed Label -->
            <div class="form-group">
                <label for="label">Embed Label</label>
                <input type="text" class="form-control" id="label" name="label" value="<?= $embed['label'] ?>" required>
            </div>

            <!-- Iframe Content -->
            <div class="form-group">
                <label for="iframe">Iframe Content</label>
                <textarea class="form-control" id="iframe" name="iframe" rows="5" required><?= $embed['iframe'] ?></textarea>
            </div>

            <!-- Is Active Checkbox -->
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="isActive" name="isActive"
                    <?= isset($embed['isActive']) && $embed['isActive'] ? 'checked' : '' ?>>
                <label class="form-check-label" for="isActive">Is Active</label>
            </div>

            <!-- Submit Button -->
            <button type="submit" name="saveEmbed" class="btn btn-primary btn-sm mt-3">
                <?= $isEditing ? 'Update Embed' : 'Create Embed' ?>
            </button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
