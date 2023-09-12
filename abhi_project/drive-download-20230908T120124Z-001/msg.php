<?php
// Start a session for error reporting
session_start();

// Get our POSTed variables
$a1 = $_POST['a1'];
$a2 = $_POST['a2'];
$a3 = $_POST['a3'];

// Create a MySQLi connection
$mysqli = new mysqli("localhost", "root", "", "dataleker");

// Check the connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Escape user inputs to prevent SQL injection
$sender = $_SESSION['name'];
$email = $mysqli->real_escape_string($a1);
$receiver = $mysqli->real_escape_string($a2);
$message = $mysqli->real_escape_string($a3);

// Prepare and execute the SQL query
$sql = "INSERT INTO msg (sender, email, reciver, msg) VALUES ('$sender', '$email', '$receiver', '$message')";
if ($mysqli->query($sql) === TRUE) {
    header("Location: admin.php");
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}

// Close the database connection
$mysqli->close();
?>
