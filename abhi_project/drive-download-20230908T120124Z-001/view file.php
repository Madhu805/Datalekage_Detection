<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Data Leakage Detection</title>
    <link rel="stylesheet" href="style.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<?php
session_start(); // Start the session

if (!isset($_SESSION['name'])) {
    echo "Please Login";
    // $_SESSION['error'] = "Please Login First";
    echo "<script type=\"text/javascript\">" . " alert('Please Login'); " . "</script>";
} elseif (!$_SESSION['name']) {
    header("Location: http://localhost/data lekage detection/adminlogin.php");
} else {
    define('ADMIN', $_SESSION['name']); // Get the user name from the previously registered super global variable
    // include'includes/conn.php';
}
?>

<body class="body">

<header class="mainHeader">
    <img src="img/logo.gif">
    <nav>
        <ul>
            <li><a href="user.php">Home</a></li>
            <li><a href="viewmsg.php">View msg</a></li>
            <li class="active"><a href="view file.php">View Articles</a></li>
            <li><a href="viewkey.php">View Key</a></li>
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
                <p class="post-info">This Admin menu displays articles.</p>
            </footer>

            <content>
                <p>
                    <table align="center" cellpadding="9" cellspacing="2" width="100%">
                        <tr bgcolor="green">
                            <th>Article Name</th>
                            <th>Date</th>
                            <th>Detail</th>
                            <th>Download</th>
                            <th>Ask KEY</th>
                        </tr>
                        <?php
                        $row = "";
                        $con = mysqli_connect("localhost", "root", "", "dataleker");
                        if (!$con) {
                            echo('Could not connect: ' . mysqli_connect_error());
                        } else {
                            $sql = 'SELECT * FROM presentation';
                            $retval = mysqli_query($con, $sql);
                            if (!$retval) {
                                die('Could not get data: ' . mysqli_error($con));
                            }
                            while ($row = mysqli_fetch_assoc($retval)) {
                                echo "<tr bgcolor='white'>";
                                echo "<td>{$row['subject']}</td>";
                                echo "<td>{$row['time']}</td>";
                                echo "<td>{$row['fname']}</td>";
                                echo "<td><a href='detail.php?id={$row['subject']}'>Download</a></td>";
                                echo "<td><a href='key.php?id={$row['subject']}&f={$row['fname']}'>Ask for Key</a></td>";
                                echo "</tr>";
                            }
                        }
                        mysqli_close($con);
                        ?>
                    </table>
                </p>
            </content>

        </article>
    </div>
    <aside class="top-sidebar">
        <article>
            <h2>Welcome: <?php echo $_SESSION['name']/*Echo the username */ ?></h2>
            <li><a href="logout.php">Logout</a></li>
        </article>
    </aside>
</div>

<footer class="mainFooter">
    <p>Project Design by: Manisha,Meghana,Abhilash</p>
</footer>

</body>
</html>
