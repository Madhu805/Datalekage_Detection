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
                                    mysqli_select_db($con,"dataleker");
$sql = "insert into askkey (user, filename, status, reciver,k) values ('$_SESSION[name]','$id','no','admin','')";
$result = mysqli_query($con,$sql) or die ("Could not insert data into DB: " . $mysqli -> error);
//echo '<script language="javascript">alert("Thank You!! for asking for key")</script>';
header("Location: user.php");
exit;
}
?>