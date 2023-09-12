<?php
session_start(); //Start the current session
session_destroy(); //Destroy it! So we are logged out now
header("location:http://localhost/abhi_project/drive-download-20230908T120124Z-001/index.php?msg=Successfully Logged out"); // Move back to login.php with a logout message
?>
