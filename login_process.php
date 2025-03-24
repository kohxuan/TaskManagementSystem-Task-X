<?php
session_start(); //For login - To initiate a new session
include 'db_1.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    //Replace with your authentication logic (e.g., checking a user/ password combination)
    //For simplicity, we'll use a hardcoded username and password here.
    // $validUsername = "najmi";
    // $validPassword = "najmi";

    $username = mysqli_real_escape_string($conn, $username); //See difference between mysqli_real_escape_string and no
    $password = mysqli_real_escape_string($conn, $password); //For security purpose (Disable the hacking code)

    /*if ($username == $validUsername && $password == $validPassword){
        $_SESSION['username'] = $username; //Hold the data and bring across every pages (Called Global Functions) - To hold the data
        header("Location: index.php"); //Redirect to the welcome page after successful insertion.
    }
    else{
        header("Location: invalid_login.php");
    }*/

    //For simplicity, we'll use a basic SQL query. Ensure to hash passwords in a production environment
    $sql = "SELECT * FROM users WHERE username = '$username'"; //Check is there any username matched
    $result = $conn->query($sql);

    if ($result->num_rows == 1) { //Authentication successful
        $row = $result->fetch_assoc(); //Hasil checking username
        $hashed_password = $row['password'];

        if (password_verify($password, $hashed_password)) {
            $_SESSION['users_id'] = $row['users_id'];
            $_SESSION['username'] = $username;
            header("Location: index.php");
        } else {
            echo "<script>alert('Invalid login credentials. Please check your username and password and try again.'); window.location.href='login.php';</script>";
            // header("Location: invalid_login.php");
        }
    } else { //Authentication failed
        echo "<script>alert('Invalid login credentials. Please check your username and password and try again.'); window.location.href='login.php';</script>";
        // header("Location: invalid_login.php");
    }

    $conn->close();
}
?>