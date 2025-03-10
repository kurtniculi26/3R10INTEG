<?php
session_start();
include("../dB/config.php");
include("../sweetalert.php");


if(isset($_POST['login'])){

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    // Fetch user details
    $login_query = "SELECT `userId`, `firstName`, `lastName`, `email`, `password`, `phoneNumber`, `verification`, `role` 
                    FROM `users`
                    WHERE email = '$email'
                    LIMIT 1;";

    $login_query_run = mysqli_query($conn, $login_query);

    // Check if query executed successfully
    if(!$login_query_run) {
        die("Query Failed: " . mysqli_error($conn));
    }

    // Check if user exists
    if(mysqli_num_rows($login_query_run) > 0) {
        $data = mysqli_fetch_assoc($login_query_run);

        $storedPassword = $data['password']; // Hashed password
        $userId = $data['userId'];
        $fullName = $data['firstName'] . ' ' . $data['lastName'];
        $emailAddress = $data['email'];
        $verification = $data['verification'];
        $userRole = $data['role'];

        // Debugging password match
        if (!password_verify($password, $storedPassword)) {
            $_SESSION['message'] = "Incorrect password!";
            $_SESSION['code'] = "error";
            header("Location: ../login.php");
            exit();
        }

        // If password is correct, store session data
        $_SESSION['auth'] = true;
        $_SESSION['userRole'] = $userRole;
        $_SESSION['authUser'] = [
            'userId' => $userId,
            'fullName' => $fullName,
            'emailAddress' => $emailAddress,
        ];
        
        // Redirect based on role
        if($userRole == 'admin'){
            $_SESSION['message'] = "Login successful";
            $_SESSION['code'] = "success";
            header("Location: ../view/admin/index.php");
        } elseif($userRole == 'user'){
            $_SESSION['message'] = "Login successful";
            $_SESSION['code'] = "success";
            header("Location: ../view/users/index.php");
        } else {
            header("Location: ../login.php");
        }
        exit();

    } else {
        $_SESSION['message'] = "No user found with that email!";
        $_SESSION['code'] = "error";
        header("Location: ../login.php");
        exit();
    }
}
?>