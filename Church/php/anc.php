<?php
require_once 'config.php'; // provides $conn (mysqli)

class ANC {
    private $db; // mysqli

    public function __construct($db) {
        $this->db = $db;
    }

    // =====================================================
    // CREATE (Add new content with or without image)
    // =====================================================
    public function create() {
        $data = json_decode(file_get_contents("php://input"), true);

        $content_title = $data['content_title'] ?? '';
        $announcement_title = $data['announcement_title'] ?? '';
        $details = $data['details'] ?? '';
        $upload_date = date("Y-m-d H:i:s");
        $exp_date = $data['exp_date'] ?? '';

        $stmt = $this->db->prepare("
            INSERT INTO content (content_title, announcement_title, details, upload_date, exp_date)
            VALUES (?, ?, ?, ?, ?)
        ");
        $stmt->bind_param("sssss", $content_title, $announcement_title, $details, $upload_date, $exp_date);

        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "id" => $this->db->insert_id]);
        } else {
            echo json_encode(["status" => "error", "message" => $stmt->error]);
        }
    }

    // =====================================================
    // READ ALL (with pagination)
    // =====================================================
    public function readAll() {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 5;
        $offset = ($page - 1) * $limit;

        $countQuery = "SELECT COUNT(*) AS total FROM content";
        $countResult = $this->db->query($countQuery);
        $total = $countResult ? $countResult->fetch_assoc()['total'] : 0;

        $sql = "SELECT * FROM content ORDER BY id DESC LIMIT ?, ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ii", $offset, $limit);
        $stmt->execute();
        $result = $stmt->get_result();

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        
        echo json_encode([
            "status" => "success",
            "data" => $data,
            "page" => $page,
            "limit" => $limit,
            "total" => $total,
            "pages" => ceil($total / $limit)
        ]);
    }

    // =====================================================
    // UPDATE EXISTING CONTENT
    // =====================================================
    public function update() {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            echo json_encode(["status" => "error", "message" => "Missing ID"]);
            return;
        }

        $data = json_decode(file_get_contents("php://input"), true);

        $content_title = $data['content_title'] ?? '';
        $announcement_title = $data['announcement_title'] ?? '';
        $details = $data['details'] ?? '';
        $exp_date = $data['exp_date'] ?? '';

        $stmt = $this->db->prepare("
            UPDATE content 
            SET content_title=?, announcement_title=?, details=?, exp_date=? 
            WHERE id=?
        ");
        $stmt->bind_param("ssssi", $content_title, $announcement_title, $details, $exp_date, $id);

        if ($stmt->execute()) {
            echo json_encode(["status" => "success"]);
        } else {
            echo json_encode(["status" => "error", "message" => $stmt->error]);
        }
    }

    // =====================================================
    // DELETE CONTENT
    // =====================================================
    public function delete() {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            echo json_encode(["status" => "error", "message" => "Missing ID"]);
            return;
        }

        // Delete image file first (if exists)
        $res = $this->db->query("SELECT photo_path FROM content WHERE id = $id");
        if ($res && $row = $res->fetch_assoc()) {
            $imagePath = '../ANC_Images/' . $row['photo_path'];
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $stmt = $this->db->prepare("DELETE FROM content WHERE id = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo json_encode(["status" => "success"]);
        } else {
            echo json_encode(["status" => "error", "message" => $stmt->error]);
        }
    }

    // =====================================================
    // UPLOAD / UPDATE IMAGE
    // =====================================================
    public function uploadImage() {
        if (!isset($_FILES['image'])) {
            echo json_encode(["status" => "error", "message" => "No image uploaded"]);
            return;
        }

        $content_id = $_POST['content_id'] ?? null;
        if (!$content_id) {
            echo json_encode(["status" => "error", "message" => "Missing content_id"]);
            return;
        }

        $uploadDir = '../ANC_Images/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $imageName = time() . '_' . basename($_FILES['image']['name']);
        $targetFile = $uploadDir . $imageName;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            // Delete old image if updating
            $res = $this->db->query("SELECT photo_path FROM content WHERE id = $content_id");
            if ($res && $row = $res->fetch_assoc()) {
                $oldImage = $uploadDir . $row['photo_path'];
                if (file_exists($oldImage)) {
                    unlink($oldImage);
                }
            }

            $stmt = $this->db->prepare("UPDATE content SET photo_path=? WHERE id=?");
            $stmt->bind_param("si", $imageName, $content_id);

            if ($stmt->execute()) {
                echo json_encode(["status" => "success", "message" => "Image uploaded successfully"]);
            } else {
                echo json_encode(["status" => "error", "message" => $stmt->error]);
            }
        } else {
            echo json_encode(["status" => "error", "message" => "Failed to move uploaded file"]);
        }
    }

    // =====================================================
    // FETCH RECENT ACTIVE ANNOUNCEMENTS
    // =====================================================
    public function getRecentContent() {
        $sql = "
            SELECT photo_path, content_title, announcement_title 
            FROM content 
            WHERE exp_date > NOW()
            ORDER BY id DESC 
            LIMIT 5
        ";

        $result = $this->db->query($sql);
        if (!$result) {
            echo json_encode(["status" => "error", "message" => "Query failed: " . $this->db->error]);
            return;
        }

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode(["status" => "success", "data" => $data]);
    }
}

// =======================
// ROUTER
// =======================
$controller = new ANC($conn);

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'create': $controller->create(); break;
        case 'readAll': $controller->readAll(); break;
        case 'update': $controller->update(); break;
        case 'delete': $controller->delete(); break;
        case 'uploadImage': $controller->uploadImage(); break;
        case 'getRecentContent': $controller->getRecentContent(); break;
        default:
            echo json_encode(["status" => "error", "message" => "Invalid action"]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "No action specified"]);
}
?>
