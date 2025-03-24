<?php
include 'db_1.php';

// Use $user_id in the query to fetch tasks for the current user
$sql = "SELECT * FROM notes WHERE users_id = $users_id";
$result = $conn->query($sql);

if ($result) {
    $count = 1; // Initialize the count variable

    while ($row = $result->fetch_assoc()) {
        echo "<tr style='background-color: " . $row["color"] . ";'>";
        echo "<td>" . $count . "</td>";
        echo "<td>" . $row["title"] . "</td>";

        $content = $row["content"];
        if (strlen($content) > 50) {
            $content = substr($content, 0, 50) . "...";
        }
        echo "<td>" . $content . "</td>";
        echo "<td>" . $row["due_date"] . "</td>";
        echo "<td>" . $row["priority"] . "</td>";
        echo "<td>" . $row["category"] . "</td>";
        echo "<td>" . $row["completion_status"] . "</td>";
        echo "<td>" . $row["created_at"] . "</td>";
        echo "<td>" . $row["updated_at"] . "</td>";
        echo "<td>
            <a href='update_form.php?id=" . $row["id"] . "' class='btn btn-outline-dark' style='margin-right: 5px;'>Edit</a>
            <a href='delete.php?id=" . $row["id"] . "' class='btn btn-outline-danger' style='margin-right: 5px;'>Delete</a>
            </td>";
        echo "</tr>";

        $count++; // Increment the count variable

    }
} else {
    echo "<script>alert('Error: " . $conn->error . "'); 
    window.location.href='index.php';</script>";
}

$conn->close();
?>