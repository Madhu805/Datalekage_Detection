<?php
// Start a session for error reporting
session_start();
 // Get our POSTed variables
$id = $_GET['id'];
 $con = mysqli_connect("localhost","root","");
                                if (!$con)
                                    echo('Could not connect: ' . $mysqli -> error);
                                else
                                {
                                    mysqli_select_db($con,"dataleakage");
$sql = "delete from register where username='$id'";
$result = mysqli_query($conn,$sql) or die ("Could not insert data into DB: " . $mysqli -> error);
header("Location: admin.php");
exit;
}
?>
