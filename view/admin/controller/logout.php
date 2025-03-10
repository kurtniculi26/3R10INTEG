<?php
session_start();

unset( $_SESSION['auth']);
unset( $_SESSION['user_type']);
unset( $_SESSION['authUser']);

$_SESSION['message'] =  "Logout Successfully!";
$_SESSION['code'] = "success";
header("Location: ../../../Login.php");
exit(0);
?>