<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data Leakage Detection</title>
    <meta charset="utf-8" />
    
    <link rel="stylesheet" href="style.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<?php
session_start(); // Start the session

if (!isset($_SESSION['name'])) {
    echo "Please Login";
    //$_SESSION['error'] = "Please Login First";
    echo "<script type=\"text/javascript\"> alert('Please Login'); </script>";
} elseif (!$_SESSION['name']) {
    header("Location: http://localhost/data_leakage_detection/adminlogin.php");
} else {
    define('ADMIN', $_SESSION['name']); // Get the username from the previously registered super global variable
    header('Content-Type: text/html; charset=utf-8');
    //include'includes/conn.php';
}
?>

<body class="body">
    <header class="mainHeader">
        <img src="img/logo.gif">
        <nav>
            <ul>
                <li><a href="admin.php">Home</a></li>
                <li><a href="upload.php">Publish Article</a></li>
                <li class="active"><a href="#">Leak User</a></li>
                <li><a href="sendkey.php">SendKey</a></li>
            </ul>
        </nav>
    </header>

    <div class="mainContent1">
        <div class="content">    
            <article class="topcontent1">    
                <header>
                    <h2><a href="#" rel="bookmark" title="Permalink to this POST TITLE">Admin Menu</a></h2>
                </header>

                <footer>
                    <p class="post-info">This Admin menu is for unauthorized users.</p>
                </footer>

                <content>
                    <p>
                        <table align="center" cellpadding="9" cellspacing="2" width="10">
                            <tr bgcolor="green">
                                <td>ID</td><td>Unauthorized User</td><td>Date</td><td>Send Message</td>
                            </tr>

                            <?php
                            $con = mysqli_connect("localhost", "root", "", "dataleker");
                            if (!$con) {
                                echo ('Could not connect: ' . $mysqli->error);
                            } else {
                                $qry = "SELECT * FROM leaker";
                                $result = mysqli_query($con, $qry);
                                while ($w1 = mysqli_fetch_array($result)) {
                                    echo '<tr bgcolor="white">
                                            <td>' . $w1["id"] . '</td>
                                            <td>' . $w1["name"] . '</td>
                                            <td>' . $w1["time"] . '</td>
                                            <td>
                                                <a href="sendmsg.php?name=' . $w1["name"] . '">Click</a>
                                            </td>
                                          </tr>';
                                }
                            }
                            ?>
                        </table>
                    </p>
                </content>
            </article>
        </div>

        <aside class="top-sidebar">
            <article>
                <h2>Welcome: <?php echo $_SESSION['name']; /* Echo the username */ ?></h2>
                <li><a href="logout.php">Logout</a></li>

                <p></p>
            </article>
        </aside>    
    </div>
</body>
</html>
