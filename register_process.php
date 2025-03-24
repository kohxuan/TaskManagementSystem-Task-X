<?php
session_start(); //For login - To initiate a new session
include 'db_1.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){  //register.php
    $username = $_POST['username'];
    $password = $_POST['password'];

    //Preventing SQL injection attacks.
    $username = mysqli_real_escape_string($conn, $username);
    $password = password_hash(mysqli_real_escape_string($conn, $password), PASSWORD_DEFAULT);

    // Check if the username alreagy exists
    $check_sql = "SELECT * FROM users WHERE username = '$username'";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows > 0){
        // echo "<script>alert('Username already exists. Please choose a different username.');</script>";
        echo '<script>window.onload = function() {
            alert("Username already exists. Please choose a different username.");
            window.history.back();
          }</script>';
        exit;
    }
    else{
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

        if ($conn->query($sql) === TRUE){
            echo "<script>
                    alert('Registration successful. You can now login.');
                    window.location.href = 'login.php'; // Redirect to login page
                  </script>";
            //echo "<script>alert('Registration successful. You can now login.');</script>";
        }
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Result</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #EC7063;
            text-align: center;
        }
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            border: 2px solid #FF0000;
            background-color: #fff;
            z-index: 1;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .popup button {
            cursor: pointer;
        }
    </style>
</head>
<body>
    <!-- Pop-up window -->
    <div id="myPopup" class="popup" style="display: none;">
        <p>Username already exists. Please choose a different username.</p>
        <button onclick="hidePopup()" class="btn btn-outline-dark">Back</button>
    </div>
</body>
</html>