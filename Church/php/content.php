<?php
require_once 'config.php'; // contains $conn (mysqli)

class ContentController
{
    private $db; // mysqli

    public function __construct($db)
    {
        $this->db = $db;
    }

    // ==============================
    // CREATE CONTENT
    // ==============================
    public function create()
    {
        $rawData = file_get_contents("php://input");
        $data = json_decode($rawData, true);

        $upload_date = date("Y-m-d H:i:s");

        $stmt = $this->db->prepare("
            INSERT INTO content (photo_path, content_title, announcement_title, upload_date, Details, exp_date)
            VALUES (?, ?, ?, ?, ?, ?)
        ");
        $stmt->bind_param(
            "ssssss",
            $data['photo_path'],
            $data['content_title'],
            $data['announcement_title'],
            $upload_date,
            $data['Details'],
            $data['exp_date']
        );

        if ($stmt->execute()) {
            echo json_encode([
                "status" => "success",
                "message" => "Content created successfully",
                "id" => $this->db->insert_id
            ]);
        } else {
            echo json_encode(["status" => "error", "message" => $stmt->error]);
        }
    }

    // ==============================
    // READ ALL CONTENT (with pagination)
    // ==============================
    public function readAll()
    {
        $page =1;
        $limit = 1;
        $offset = ($page - 1) * $limit;

        $countResult = $this->db->query("SELECT COUNT(*) as total FROM content");
        $total = $countResult->fetch_assoc()['total'];

        $query = "SELECT * FROM content ORDER BY upload_date DESC LIMIT $limit OFFSET $offset";
        $result = $this->db->query($query);

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode([
            "page" => $page,
            "limit" => $limit,
            "total" => $total,
            "data" => $data
        ]);
    }

    // ==============================
    // READ ONE CONTENT ITEM
    // ==============================
    public function readOne($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM content WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $content = $result->fetch_assoc();

        if ($content) {
            echo json_encode(["status" => "success", "content" => $content]);
        } else {
            http_response_code(404);
            echo json_encode(["status" => "error", "message" => "Content not found"]);
        }
    }

    // ==============================
    // UPDATE CONTENT
    // ==============================
    public function update($id)
    {
        $rawData = file_get_contents("php://input");
        $data = json_decode($rawData, true);

        $stmt = $this->db->prepare("
            UPDATE content
            SET photo_path = ?, content_title = ?, announcement_title = ?, Details = ?, exp_date = ?
            WHERE id = ?
        ");
        $stmt->bind_param(
            "sssssi",
            $data['photo_path'],
            $data['content_title'],
            $data['announcement_title'],
            $data['Details'],
            $data['exp_date'],
            $id
        );

        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Content updated successfully"]);
        } else {
            echo json_encode(["status" => "error", "message" => $stmt->error]);
        }
    }

    // ==============================
    // DELETE CONTENT (with image deletion)
    // ==============================
    public function delete($id)
    {
        $rawData = file_get_contents("php://input");
        $data = json_decode($rawData, true);
        $photoPath = $data['photo_path'] ?? '';

        // Delete image file if it exists
        if (!empty($photoPath) && strtolower($photoPath) !== 'dont_delete_this_image.png') {
            $filePath = "C:\\xampp\\htdocs\\eCommerce\\BackOffice\\contentUploads\\" . $photoPath;
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        $stmt = $this->db->prepare("DELETE FROM content WHERE id = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Content deleted successfully"]);
        } else {
            echo json_encode(["status" => "error", "message" => $stmt->error]);
        }
    }

    // ==============================
    // IMAGE UPLOAD FOR CONTENT
    // ==============================
    public function uploadImage()
    {
        if (!isset($_FILES['image'])) {
            echo json_encode(["status" => "error", "message" => "No image uploaded"]);
            return;
        }

        $uploadDir = '../../BackOffice/contentUploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $imageName = time() . '_' . basename($_FILES['image']['name']);
        $targetFile = $uploadDir . $imageName;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            echo json_encode([
                "status" => "success",
                "message" => "Image uploaded successfully",
                "photo_path" => $imageName
            ]);
        } else {
            echo json_encode(["status" => "error", "message" => "Failed to move uploaded file"]);
        }
    }
}

// =======================
// ROUTER
// =======================
$controller = new ContentController($conn);

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'create':
            $controller->create();
            break;
        case 'readAll':
            $controller->readAll();
            break;
        case 'readOne':
            $controller->readOne($_GET['id'] ?? 0);
            break;
        case 'update':
            $controller->update($_GET['id'] ?? 0);
            break;
        case 'delete':
            $controller->delete($_GET['id'] ?? 0);
            break;
        case 'uploadImage':
            $controller->uploadImage();
            break;
        default:
            echo json_encode(["status" => "error", "message" => "Invalid action"]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "No action specified"]);
}
