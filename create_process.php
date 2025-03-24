<?php
session_start();
include 'db_1.php';

// Retrieve user_id from the session
$users_id = $_SESSION['users_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $color = $_POST['color'];
    $due_date = $_POST['due_date'];
    $priority = $_POST['priority'];
    $category = $_POST['category'];
    $completion_status = $_POST['completion_status']; // Added this line

    // Use a prepared statement to prevent SQL injection
    $sql = "INSERT INTO notes (title, content, color, due_date, priority, category, users_id, completion_status) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssis", $title, $content, $color, $due_date, $priority, $category, $users_id, $completion_status);

    // Execute the statement
    if ($stmt->execute()) {
        header("Location: index.php"); // Redirect to the main page after successful insertion.
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the prepared statement
    $stmt->close();
}

$conn->close();
?>
