<?php
session_start(); // Start the session

if (!isset($_SESSION['name'])) {
    echo "Please Login";
    // Redirect to the login page
    header("Location: http://localhost/data%20lekage%20detaction/userlogin.php");
    exit(); // Stop executing the rest of the code
} else {
    define('ADMIN', $_SESSION['name']); // Get the username from the session variable
    header('Content-Type: text/html; charset=utf-8');
    // Include your database connection code if necessary
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
            <li><a href="user.php">Home</a></li>
            <li><a href="viewmsg.php">View msg</a></li>
            <li><a href="view file.php">View Article</a></li>
            <li class="active"><a href="viewkey.php">View Key</a></li>
        </ul>
    </nav>
</header>
<div class="mainContent1">
    <div class="content">
        <article class="topcontent1">
            <header>
                <h2><a href="#" rel="bookmark" title="Permalink to this POST TITLE"> View Keys</a></h2>
            </header>
            <table align="center" cellpadding="9" cellspacing="2" width="100%">
                <tr bgcolor="green">
                    <td>KeySender</td>
                    <td>filename</td>
                    <td>Keys</td>
                </tr>
                <?php
                $con = mysqli_connect("localhost", "root", "", "dataleker");
                if (!$con) {
                    die('Could not connect: ' . mysqli_error($con));
                } else {
                    $qry = "SELECT * FROM askkey WHERE user='" . $_SESSION['name'] . "'";
                    $result = mysqli_query($con, $qry);
                    while ($w1 = mysqli_fetch_array($result)) {
                        echo '<tr bgcolor="white"><td>' . $w1["reciver"] . '</td><td>' . $w1["filename"] . '</td><td>' . $w1["k"] . '</td></tr>';
                    }
                    mysqli_close($con);
                }
                ?>
            </table>
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
<footer class="mainFooter">
    <p>Project Design by: Manisha, Meghana, Abhilash</p>
</footer>
</body>
</html>
