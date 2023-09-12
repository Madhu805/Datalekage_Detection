<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection parameters
    $host = "localhost";  // Change to your database host
    $username = "root";  // Change to your database username
    $password = "";  // Change to your database password
    $database = "dataleker";  // Change to your database name

    // Create a database connection
    $conn = mysqli_connect($host, $username, $password, $database);

    // Check the connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Get form data
    $name = $_POST["name"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["mail"];

    // Perform SQL query to insert data into the "customers" table
    $sql = "INSERT INTO customers (name, username, password, email) VALUES ('$name', '$username', '$password', '$email')";

    if (mysqli_query($conn, $sql)) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
