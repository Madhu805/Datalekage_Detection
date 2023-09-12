<?php
// Start a session for error reporting
session_start();
// Get our POSTed variables
$a1 = $_POST['a1'];
$a2 = $_POST['a2'];
$a3 = $_POST['a3'];

// Establish a MySQLi connection
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "dataleker";

$mysqli = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

// Check if the connection was successful
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$sql = "UPDATE askkey SET k=?, status='yes' WHERE filename=? AND user=?";
$stmt = $mysqli->prepare($sql);

// Bind parameters and execute the query
$stmt->bind_param("sss", $a2, $a3, $a1);

if ($stmt->execute()) {
    // Successful update, redirect to admin.php
    header("Location: admin.php");
    exit;
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$mysqli->close();
?>
