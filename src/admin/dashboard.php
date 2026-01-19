<?php
    session_start();

    $role = null;

    if (isset($_COOKIE['role'])) {
        $role = $_COOKIE['role'];
    }

    if ($role !== 'admin') {
        echo "<h2>Access Denied</h2>";
        echo "You are not an admin.";
        exit;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Admin Dashboard</title>
    </head>
    <body>

        <h1>Admin Dashboard</h1>

        <p>Welcome, Admin!</p>

    <ul>
        <li>View all users</li>
        <li>Delete posts</li>
        <li>System configuration</li>
    </ul>

    </body>
</html>
