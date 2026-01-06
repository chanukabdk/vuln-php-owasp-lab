<?php
session_start();
require __DIR__ . '/../includes/db.php';

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $stmt = $pdo->query($sql);
    $user = $stmt->fetch();

    if ($user) {
        $_SESSION['user'] = $user['username'];
        echo "Login successful! Welcome " . $_SESSION['user'];
    } else {
        echo "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
    </head>
    <body>

        <h2>Login</h2>

        <form method="POST">
            Username:<br>
            <input type="text" name="username"><br><br>

            Password:<br>
            <input type="password" name="password"><br><br>

            <input type="submit" name="login" value="Login">
        </form>

    </body>
</html>
