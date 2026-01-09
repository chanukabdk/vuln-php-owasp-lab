<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard</title>
    </head>
    <body>

        <h1>Dashboard</h1>

        <p>Welcome to the central control panel.</p>

        <hr>

        <h3>User Information</h3>

        <p>
            Username:
            <?php
                if (isset($_SESSION['user'])) {
                    echo $_SESSION['user'];
                } else {
                    echo "Guest";
                }
            ?>
        </p>

        <hr>

        <h3>Navigation</h3>

        <ul>
            <li><a href="posts.php">View Posts</a></li>
            <li><a href="file_upload.php">File Upload</a></li>
            <li><a href="admin.php">Admin Panel</a></li>
            <li><a href="auth/logout.php">Logout</a></li>
        </ul>
    </body>
</html>