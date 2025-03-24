<?php
include 'db_1.php';

if (isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "DELETE FROM notes WHERE id = $id";

    if ($conn->query($sql) === TRUE){
        echo "<script>alert('Task deleted successfully'); 
        window.location.href='index.php';</script>";
    }
    else{
        echo "<script>alert('Error deleting note: " . $conn->error . "'); 
        window.location.href='index.php';</script>";
    }
}
else{
    echo "<script>alert('Invalid request. Please delete a valid task.'); 
        window.location.href='index.php';</script>";
}

$conn->close();
?>
