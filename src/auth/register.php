<?php
require __DIR__ . '/../includes/db.php';

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    $pdo->exec($sql);

    echo "User registered successfully!";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
    </head>
    <body>

        <h2>User Registration</h2>

        <form method="POST">
            Username: <br>
            <input type="text" name="username"><br><br>

            Password: <br>
            <input type="password" name="password"><br><br>

            <input type="submit" name="register" value="Register">
        </form>

    </body>
</html>
