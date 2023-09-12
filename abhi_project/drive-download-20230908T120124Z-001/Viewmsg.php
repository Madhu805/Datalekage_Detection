<?php
session_start(); // Start the session

// Check if the 'name' session variable is not set or empty
if (!isset($_SESSION['name']) || empty($_SESSION['name'])) {
    echo "Please Login";
    // Redirect the user to the login page
    header("Location: userlogin.php");
    exit(); // Stop executing the rest of the code
}

define('ADMIN', $_SESSION['name']); // Get the user name from the session variable

// Establish a database connection
$con = mysqli_connect("localhost", "root", "", "dataleker");

// Check the database connection
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Data Leakage Detection</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body class="body">
    <header class="mainHeader">
        <img src="img/logo.gif">
        <nav>
            <ul>
                <li><a href="user.php">Home</a></li>
                <li><a href="view file.php"> Article</a></li>
                <li class="active"><a href="Viewmsg.php">View Message</a></li>
                <li><a href="viewkey.php">View Key</a></li>
            </ul>
        </nav>
    </header>

    <div class="mainContent1">
        <div class="content">
            <article class="topcontent1">
                <header>
                    <h2><a href="#" rel="bookmark" title="Permalink to this POST TITLE"> View Messages</a></h2>
                </header>
                <table align="center" cellpadding="9" cellspacing="2" width="100%">
                    <tr bgcolor="green">
                        <td>Email</td><td>Keys</td>
                    </tr>
                    <?php
                    $qry = "SELECT * FROM msg WHERE reciver = '{$_SESSION['name']}'";
                    $result = mysqli_query($con, $qry);

                    while ($w1 = mysqli_fetch_array($result)) {
                        echo '</td><td>' . $w1["email"] . '</td><td>' . $w1["msg"] . '</td></tr>';
                    }
                    

                    // Close the database connection
                    mysqli_close($con);
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
