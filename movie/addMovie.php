<?php
include "../inc/functions.php";

if(isset($_POST['addMovie'])) {
    if(addMovie($_POST)) {
        echo "
            <script>
            alert('The new movie has been successfully added!');
            document.location.href = '../admin.php';
            </script>
        ";
    } else {
        echo "
            <script>
            alert('Failed to add the new movie. Please check your input and try again.');
            </script>
    ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Add Data Movie</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <!-- Title -->
        <label for="title">Title</label>
        <input type="text" name="title" id="title" autocomplete="off" required><br><br>
        
        <!-- Synopsis -->
        <label for="synopsis">Story Line</label>
        <textarea name="synopsis" id="synopsis" cols="30" rows="10"></textarea><br><br>
        
        <!-- Release Year -->
        <label for="year">Release Year</label>
        <input type="number" name="year" id="year" autocomplete="off" required><br><br>
        
        <!-- Director -->
        <label for="director">Director</label>
        <input type="text" name="director" id="director" autocomplete="off" required><br><br>
        
        <!-- Thumbnail -->
        <label for="thumbnail">Thumbnail</label>
        <input type="file" name="thumbnail" id="thumbnail"><br><br>

        <!-- Banner -->
        <label for="banner">Banner</label>
        <input type="file" name="banner" id="banner"><br><br>

        <!-- Button Submit -->
        <button type="submit" name="addMovie">Submit</button>
    </form>
</body>
</html>