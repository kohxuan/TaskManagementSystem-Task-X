<?php
include 'db_1.php';
session_start();

// Use $users_id from the session to fetch tasks for the current user
$users_id = $_SESSION['users_id'];

$sql = "SELECT id, title, content, color, due_date, priority, category, completion_status, created_at, updated_at FROM notes WHERE users_id = $users_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $tasks = $result->fetch_all(MYSQLI_ASSOC);

    // Define CSV header
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="tasks_export.csv"');

    // Open the output stream
    $output = fopen('php://output', 'w');

    // Output custom CSV column headers
    $customHeaders = array(
        'Task',
        'Task Title',
        'Task Content',
        'Color',
        'Due Date',
        'Priority',
        'Category',
        'Completion Status',
        'Created At',
        'Updated At'
    );
    fputcsv($output, $customHeaders);

    $taskNumber = 1;

    // Output data from rows
    foreach ($tasks as $task) {
        // Adjust the data array based on the desired order and columns
        $rowData = array(
            $taskNumber, // Use the counter as the 'id' column
            $task['title'],
            $task['content'],
            $task['color'],
            $task['due_date'],
            $task['priority'],
            $task['category'],
            $task['completion_status'],
            $task['created_at'],
            $task['updated_at']
        );

        // Output data to CSV
        fputcsv($output, $rowData);

        // Increment the task number counter
        $taskNumber++;
    }

    // Close the output stream
    fclose($output);
} else {
    echo "<script>alert('No tasks to export.'); window.location.href='index.php';</script>";
}

$conn->close();
?>
