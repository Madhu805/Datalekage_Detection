<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Data Leakage Detection</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="body">
<?php
session_start();

if (!isset($_SESSION['name'])) {
    echo "Please Login";
    echo "<script>alert('Please Login');</script>";
    header("Location: http://localhost/data-leakage-detection/adminlogin.php");
    exit; // Terminate the script
}

define('ADMIN', $_SESSION['name']);

$con = mysqli_connect("localhost", "root", "", "dataleker");
if (!$con) {
    die('Could not connect: ' . mysqli_connect_error());
}

$id = mysqli_real_escape_string($con, $_GET['id']); // Sanitize user input

$qry = "SELECT * FROM presentation WHERE subject = '$id'";
$result = mysqli_query($con, $qry);

if (!$result) {
    die('Query error: ' . mysqli_error($con));
}

?>

<header class="mainHeader">
    <img src="img/logo.gif" alt="Logo">
    <nav>
        <ul>
            <li><a href="user.php">Home</a></li>
            <li><a href="viewmsg.php">View msg</a></li>
            <li class="active"><a href="view_file.html">View Articles</a></li>
            <li><a href="viewkey.php">View Key</a></li>
        </ul>
    </nav>
</header>

<div class="mainContent1">
    <div class="content">
        <article class="topcontent1">
            <header>
                <h2><a href="#" rel="bookmark" title="Permalink to this POST TITLE">User Menu</a></h2>
            </header>
            <footer>
                <p class="post-info">This user menu uses one-time passwords.</p>
            </footer>
            <content>
                <p>
                    <h4>LOCK FILE</h4>
                    <div align="center" style="background-color: #FFF2EF">
                    <?php
                    $row = mysqli_fetch_array($result); // Fetch the first record
                    if ($row) {
                        echo '
    
                        <form name="frm" id="frm" method="post" action="detail1.php?id=' . htmlspecialchars($row["subject"]) . '&amp;file=' . htmlspecialchars($row["fname"]) . '">
        
                        <table>
                                    <tr>
                                    <td>Enter Key</td>
                                    <td><input type="text" name="s1" id="s1"></td>
                                    </tr>
                                    <tr>
                                    <td></td>
                                    <td><input type="hidden" name="s2" id="s2" value="' . htmlspecialchars($row["Topic"]) . '"></td>
                                    </tr>
                                    </table>
                                    <input type="submit" name="encr" value="Download">
                                    </form>';
                                }
                    ?>

                    </div>
                </p>
            </content>
        </article>
    </div>
    <aside class="top-sidebar">
        <article>
            <h2>Welcome: <?php echo htmlspecialchars($_SESSION['name']); ?></h2>
            <ul>
                <li><a href="logout.php">Logout</a></li>
            </ul>
            <p></p>
        </article>
    </aside>
</div>

<footer class="mainFooter">
    <p>Project Design by: <a href="http://1stwebdesigner.com">Vaibhav, Mukesh, Kaustubh</a></p>
</footer>

</body>
</html>
