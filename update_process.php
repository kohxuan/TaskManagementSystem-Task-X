<?php
session_start();
include 'db_1.php';

// Retrieve user_id from the session
$users_id = $_SESSION['users_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $color = $_POST['color'];
    $due_date = $_POST['due_date'];
    $priority = $_POST['priority'];
    $category = $_POST['category'];
    $completion_status = $_POST['completion_status']; // Add this line

    // Use a prepared statement to prevent SQL injection
    $sql = "UPDATE notes SET title=?, content=?, color=?, due_date=?, priority=?, category=?, completion_status=? WHERE id=? AND users_id=?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssi", $title, $content, $color, $due_date, $priority, $category, $completion_status, $id, $users_id);

    // Execute the statement
    if ($stmt->execute()) {
        header("Location: index.php"); // Redirect to the main page after successful update.
    } else {
        echo "<script>alert('Error: " . $stmt->error . "'); 
        window.location.href='index.php';</script>";
    }

    // Close the prepared statement
    $stmt->close();
}

$conn->close();
?>