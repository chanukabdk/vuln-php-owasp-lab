<?php
    session_start();
    require __DIR__ . '/includes/db.php';

    if (isset($_POST['submit'])) {

        $title = $_POST['title'];
        $content = $_POST['content'];

        if (isset($_SESSION['user'])) {
            $username = $_SESSION['user'];
        } else {
            $username = 'guest';
        }

        $sql = "INSERT INTO posts (user_id, title, content)
            VALUES (1, '$title', '$content')";

        $pdo->exec($sql);

        echo "Post created successfully!";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Posts</title>
    </head>
    <body>

        <h1>Posts</h1>

        <a href="dashboard.php">Back to Dashboard</a>

        <hr>

        <h2>Create a Post</h2>

        <form method="POST">
            Title:<br>
            <input type="text" name="title"><br><br>

            Content:<br>
            <textarea name="content" rows="5" cols="40"></textarea><br><br>

            <input type="submit" name="submit" value="Post">
        </form>

        <hr>

        <h2>All Posts</h2>

        <?php
            $sql = "SELECT * FROM posts ORDER BY created_at DESC";
            $stmt = $pdo->query($sql);

            while ($post = $stmt->fetch()) {
                echo "<h3>" . $post['title'] . "</h3>";
                echo "<p>" . $post['content'] . "</p>";
                echo "<hr>";
            }
        ?>

    </body>
</html>