<?php
require_once '../../connections/db.php'; // Include the database connection file

class Embed {
    private $conn;
    private $table = "embed";

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Create a new record
    public function create($type, $iframe, $isActive) {
        $sql = "INSERT INTO $this->table (type, iframe, createdDate, isActive) VALUES (?, ?, NOW(), ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('isi', $type, $iframe, $isActive);
        return $stmt->execute();
    }

    // Read all records
    public function readAll() {
        $sql = "SELECT * FROM $this->table ORDER BY createdDate DESC";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Read a single record by ID
    public function readById($id) {
        $sql = "SELECT * FROM $this->table WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Update a record by ID
    public function update($id, $type, $iframe, $isActive) {
        $sql = "UPDATE $this->table SET type = ?, iframe = ?, isActive = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('isii', $type, $iframe, $isActive, $id);
        return $stmt->execute();
    }

    // Delete a record by ID
    public function delete($id) {
        $sql = "DELETE FROM $this->table WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }
}

// Example usage
try {
    $embed = new Embed($conn);

    // Create a new record
    $embed->create(1, "<iframe src='https://example.com'></iframe>", 1);

    // Read all records
    $records = $embed->readAll();
    print_r($records);

    // Read a single record
    $record = $embed->readById(1);
    print_r($record);

    // Update a record
    $embed->update(1, 2, "<iframe src='https://example2.com'></iframe>", 0);

    // Delete a record
    $embed->delete(1);

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
