<?php
    if (isset($_POST['upload'])) {

        $uploadDir = __DIR__ . '/uploads/';
        $fileName = $_FILES['file']['name'];
        $tmpName = $_FILES['file']['tmp_name'];

        if(move_uploaded_file($tmpName, $uploadDir . $fileName)) {
            echo "File uploaded successfully: <a href='uploads/$fileName'>$fileName</a>";
        } else {
            echo "Upload failed";
        }

    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Vulnerable File Upload</title>
    </head>
    <body>

        <h2>Upload a File</h2>

        <form method="POST" enctype="multipart/form-data">
            <input type="file" name="file"><br><br>
            <input type="submit" name="upload" value="Upload">
        </form>

    </body>
</html>