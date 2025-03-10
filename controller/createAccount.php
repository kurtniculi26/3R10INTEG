<?php
include("../dB/config.php");
session_start();

if(isset($_POST['register'])){
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $phoneNumber = mysqli_real_escape_string($conn, $_POST['phoneNumber']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $birthday = mysqli_real_escape_string($conn, $_POST['birthday']);
    $role = "user"; // Automatically set the role as "user"

    // Check if passwords match
    if ($password !== $cpassword) {
        $_SESSION['status'] = "Passwords do not match";
        $_SESSION['status_code'] = "error";
        header('location:../registration.php');
        exit();
    }

    // Check if email already exists
    $checkQuery = "SELECT * FROM `users` WHERE `email` = '$email'";
    $result = mysqli_query($conn, $checkQuery);

    if (!$result) {
        die("Query Failed: " . mysqli_error($conn)); // Debugging
    }

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['message'] = "Email address is already taken";
        $_SESSION['code'] = "error";
        header('location:../registration.php');
        exit();
    }

    // Hash the password before storing it
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert user data with default role
    $query = "INSERT INTO `users`(`firstName`, `lastName`, `email`, `password`, `phoneNumber`, `gender`, `birthday`, `role`) 
              VALUES ('$firstname', '$lastname', '$email', '$hashedPassword', '$phoneNumber', '$gender', '$birthday', '$role')";

    if (mysqli_query($conn, $query)) {
        $_SESSION['message'] = "Registration successful";
        $_SESSION['code'] = "success";
        header("Location: ../login.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
