<?php
session_start();
$docroot = 'C:/xampp/htdocs/abhi_project/drive-download-20230908T120124Z-001';

$username = $_POST['username']; // Set UserName
$password = $_POST['password']; // Set Password
$msg = '';

if (isset($username, $password)) {
    ob_start();
    
    $dbC = mysqli_connect('localhost', 'root', '', 'dataleker'); // Replace with your database credentials
    
    if (!$dbC) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    $myusername = mysqli_real_escape_string($dbC, $username);
    $mypassword = mysqli_real_escape_string($dbC, $password);

    $sql = "SELECT * FROM customers WHERE username = '$myusername' AND password = '$mypassword'";
    $result = mysqli_query($dbC, $sql);

    // Check if the query was successful
    if ($result) {
        $count = mysqli_num_rows($result);

        if ($count == 1) {
            // Register session variables and redirect to user.php
            $_SESSION['admin'] = $myusername;
            $_SESSION['password'] = $password;
            $_SESSION['name'] = $myusername;
            header("location: User.php");
        } else {
            $msg = "Wrong Username or Password. Please retry";
            header("location: index.html?msg=$msg");
        }
    } else {
        // Handle query error here
        echo "Error: " . mysqli_error($dbC);
    }

    mysqli_close($dbC);
    ob_end_flush();
} else {
    header("location: index.php?msg=Please enter some username and password");
}
?>
