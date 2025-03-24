<?php
session_start();
include 'db_1.php';

// Retrieve user_id from the session
$users_id = $_SESSION['users_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
    $file = $_FILES["file"];

    if ($file["error"] == UPLOAD_ERR_OK) {
        $file_name = $file["tmp_name"];
        $file_data = array_map('str_getcsv', file($file_name));

        // Skip the first row (column titles)
        $isFirstRow = true;

        foreach ($file_data as $row) {
            // Skip the first row
            if ($isFirstRow) {
                $isFirstRow = false;
                continue;
            }

            // Assuming CSV columns match the database columns order
            $title = isset($row[1]) ? $row[1] : ''; // Adjust indexes based on your CSV structure
            $content = isset($row[2]) ? $row[2] : '';
            $color = isset($row[3]) ? $row[3] : '';
            $due_date = isset($row[4]) ? $row[4] : '';
            $priority = isset($row[5]) ? $row[5] : '';
            $category = isset($row[6]) ? $row[6] : '';
            $completion_status = isset($row[7]) ? $row[7] : '';

            // Check if completion_status is not null
            if ($completion_status !== null) {
                // Use a prepared statement to prevent SQL injection
                $sql = "INSERT INTO notes (title, content, color, due_date, priority, category, users_id, completion_status) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssssssis", $title, $content, $color, $due_date, $priority, $category, $users_id, $completion_status);

                // Execute the statement
                $stmt->execute();

                // Close the prepared statement
                $stmt->close();
            }
        }

        echo "<script>alert('Tasks imported successfully.'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Error uploading file.'); window.location.href='index.php';</script>";
    }
} else {
    echo "<script>alert('Invalid request.'); window.location.href='index.php';</script>";
}

$conn->close();
?>
