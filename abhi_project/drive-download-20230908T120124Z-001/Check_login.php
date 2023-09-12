<?php
session_start();
$docroot = 'C:/xampp/htdocs/abhi_project/drive-download-20230908T120124Z-001/Admin';
define($docroot, dirname(__FILE__)); // To properly get the config.php file

$username = $_POST['username']; // Set UserName
$password = $_POST['password']; // Set Password
$msg = '';

if (isset($username, $password)) {
    // Establish a database connection
    $dbC = mysqli_connect("localhost", "root", "", "dataleker");

    // Check if the connection was successful
    if (!$dbC) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    $myusername = stripslashes($username);
    $mypassword = stripslashes($password);
    $myusername = mysqli_real_escape_string($dbC, $myusername);
    $mypassword = mysqli_real_escape_string($dbC, $mypassword);

    $sql = "SELECT * FROM admin WHERE username ='$myusername' and password =('$mypassword')";
    $result = mysqli_query($dbC, $sql);

    $count = mysqli_num_rows($result);

    if ($count == 1) {
        // Register session variables and redirect
        $_SESSION['admin'] = $myusername;
        $_SESSION['password'] = $password;
        $_SESSION['name'] = $myusername;
        header("location: Admin.php");
        exit(); // Ensure that no further code is executed after redirection
    } else {
        $msg = "Wrong Username or Password. Please retry";
        header("location: index.php?msg=$msg");
        exit(); // Ensure that no further code is executed after redirection
    }
} else {
    header("location: index.php?msg=Please enter some username and password");
    exit(); // Ensure that no further code is executed after redirection
}
?>
