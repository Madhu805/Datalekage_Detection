<?php
session_start(); // Start the session

if (!isset($_SESSION['name'])) {
    echo "Please Login";
    // Redirect to the login page
    echo "<script type=\"text/javascript\">" . " alert('Please Login'); " . "</script>";
} if (!$_SESSION['name']) {
    echo  header("Location: http://localhost/data%20lekage%20detaction/adminlogin.php");
}

else {

    define('ADMIN', $_SESSION['name']); // Get the username from the previously registered super global variable
    header('Content-Type: text/html; charset=utf-8');
    // include 'config.php'; // Include your database connection code if necessary
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data Leakage Detection</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="style.css" type="text/css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body class="body">
<header class="mainHeader">
    <img src="img/logo.gif">
    <nav>
        <ul>
            <li><a href="admin.php">Home</a></li>
            <li><a href="upload.php">Publish Article</a></li>
            <li><a href="view file.php">View File</a></li>
            <li class="active"><a href="leakfile.php">Leak User</a></li>
        </ul>
    </nav>
</header>

<div class="mainContent1">
    <div class="content">
        <article class="topcontent1">
            <header>
                <h2><a href="#" rel="bookmark" title="Permalink to this POST TITLE"> Admin Login</a></h2>
            </header>

            <footer>
                <p class="post-info">Upload the latest article.</p>
            </footer>

            <content>
                <p>
                    <?php
                    if (!empty($_POST)) {
                        $con = mysqli_connect("localhost", "root", "", "dataleker");
                        if (!$con) {
                            echo ('Could not connect: ' . mysqli_connect_error());
                        } else {

                            if (file_exists("Download/" . $_FILES["file"]["name"])) {
                                echo '<script language="javascript">alert(" Sorry!! Filename Already Exists...")</script>';
                            } else {
                                move_uploaded_file($_FILES["file"]["tmp_name"],
                                    "Download/" . $_FILES["file"]["name"]);
                                $sql = "INSERT INTO presentation(subject,topic,fname,time) VALUES ('" . $_POST["sub"] . "','" . $_POST["pre"] . "','" .
                                    $_FILES["file"]["name"] . "','" . date("d/m/Y") . "');";
                                if (!mysqli_query($con, $sql)) {
                                    echo ('Error : ' . mysqli_error($con));
                                } else {
                                    echo '<script language="javascript">alert("Thank You!! File Uploded")</script>';
                                }
                            }
                        }
                        mysqli_close($con);
                    }
                    ?>
                </p>

                <form id="form3" enctype="multipart/form-data" method="post" action="upload.php">
                    <table width="552" height="200" style="border-radius: 10px; box-shadow: 0 0 2px 2px #888;
            	font-family:'Comic Sans MS';font-size: 14px;">
                        <tr>
                            <td><label for="sub">Subject: </label></td>
                            <td><input type="text" name="sub" id="sub"/></td>
                        </tr>
                        <tr>
                            <td valign="top" align="left">Key:</td>
                            <td valign="top" align="left"><input type="text" name="pre" cols="50" rows="10"
                                                                 id="pre"></td>
                        </tr>
                        <tr>
                            <td><label for="file">File:</label></td>
                            <td><input type="file" name="file" id="file"/></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center"><input type="submit" name="upload" id="upload"
                                                                 value="Upload File"/></td>
                        </tr>
                    </table>
                </form>
            </content>
        </article>
    </div>

    <aside class="top-sidebar">
        <article>
            <h2>Welcome: <?php echo $_SESSION['name']/*Echo the username */ ?></h2>
            <li><a href="logout.php">Logout</a></li>
            <p>
                <?php
                {
                    $row = "";
                    $con = mysqli_connect("localhost", "root", "", "dataleker");
                    if (!$con) {
                        echo ('Could not connect: ' . mysqli_connect_error());
                    } else {
                        $sql = 'SELECT * FROM register';
                        $retval = mysqli_query($con, $sql);
                        if (!$retval) {
                            die('Could not get data: ' . mysqli_error($con));
                        }
                        while ($row = mysqli_fetch_assoc($retval)) {
                            echo " UserName: {$row['username']} " .

                                "<hr><br>";
                        }
                    }
                    mysqli_close($con);
                }
                ?>
            </p>
        </article>
    </aside>
</div>

</div>

<footer class="mainFooter">
    <p>Project Design by:<a href="http://1stwebdesigner.com">Vaibhav, Mukesh, Kaustubh</a></p>
</footer>

</body>
</html>
