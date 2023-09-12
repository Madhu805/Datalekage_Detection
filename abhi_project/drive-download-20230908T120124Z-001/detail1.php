<?php 
session_start();

// Establish a mysqli database connection
$con = mysqli_connect("localhost", "root", "", "dataleker");
if (!$con) {
    die('Could not connect: ' . mysqli_connect_error());
}

$k1 = mysqli_real_escape_string($con, $_POST['s1']);
$k2 = mysqli_real_escape_string($con, $_POST['s2']);

if ($k1 === $k2) {
    $file = './Download/' . $_GET['id'];
    $title = $_GET['id'];

    header("Pragma: public");
    header('Content-disposition: attachment; filename=' . $title);
    header('Content-Transfer-Encoding: binary');
    ob_clean();
    flush();

    $chunksize = 1 * (1024 * 1024); // how many bytes per chunk
    if (filesize($file) > $chunksize) {
        $handle = fopen($file, 'rb');
        $buffer = '';

        while (!feof($handle)) {
            $buffer = fread($handle, $chunksize);
            echo $buffer;
            ob_flush();
            flush();
        }

        fclose($handle);
    } else {
        readfile($file);
    }
} else {
    echo "Call the admin";

    // Insert data into the 'leaker' table
    $sql = "INSERT INTO leaker (name, time) VALUES ('" . $_SESSION['name'] . "','" . date("d/m/Y") . "')";
    $result = mysqli_query($con, $sql);
    if (!$result) {
        die("Could not insert data into DB: " . mysqli_error($con));
    }

    header("Location: Askadmin.php");
}

// Close the database connection
mysqli_close($con);
?>
