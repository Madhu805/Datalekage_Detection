<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data Leakage Detection</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="body">
    <header class="mainHeader">
        <img src="img/logo.gif">
        <nav>
            <ul>
                <li><a href="admin.php">Home</a></li>
                <li><a href="upload.php">Publish Article</a></li>
                <li class="active"><a href="viewfile.php">View File</a></li>
                <li><a href="leakfile.php">Leak User</a></li>
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
                    <p class="post-info">Delete the users. </p>
                </footer>

                <content>
                    <p>
                        <table align="center" cellpadding="9" cellspacing="2" width="100%">
                            <tr bgcolor="green">
                                <th>Article Subject</th>
                                <th>Article Key</th>
                                <th>File Name</th>
                                <th>Upload Date</th>
                                <th>Delete</th>
                            </tr>
                            <?php
session_start(); // Start the session
// Rest of your code

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
        echo '<tr bgcolor="white">';
        echo '<td>' . $row['subject'] . '</td>';
        echo '<td>' . $row['Topic'] . '</td>';
        echo '<td>' . $row['fname'] . '</td>';
        echo '<td>' . $row['time'] . '</td>';
        echo '<td><a href="m_article.php?id=' . $row['subject'] . '">Delete</a></td>';
        echo '</tr>';
    }

    echo '</table>';
}

mysqli_close($con);
?>

                        </table>
                    </p>
                </content>
            </article>
        </div>
    </div>
    <aside class="top-sidebar">
        <article>
            <h2>Welcome: <?php echo $_SESSION['name']; /*Echo the username */ ?></h2>
        </article>
    </aside>
</body>
</html>
