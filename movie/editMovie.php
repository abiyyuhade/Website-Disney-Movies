<?php 
include "../inc/functions.php";

$id = $_GET['id'];

$data = query("SELECT * FROM movies WHERE id = '$id'")[0];

if(isset($_POST['editMovie'])) {
    if(editMovie($_POST) > 0) {
        echo "
            <script>
            alert('The movie has been successfully updated!');
            document.location.href = '../admin.php';
            </script>
        ";
    } else {
        echo "
            <script>
            alert('Failed to update the movie. Please check your input and try again.');
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
    <h1>Edit Data Movie</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <!-- Id -->
        <input type="hidden" name="id" value="<?= $data['id']; ?>">

        <!-- Title -->
        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="<?= $data['title']; ?>" autocomplete="off" required><br><br>
        
        <!-- Synopsis -->
        <label for="synopsis">Story Line</label>
        <textarea name="synopsis" id="synopsis" cols="30" rows="10"><?= $data['synopsis']; ?></textarea><br><br>
        
        <!-- Release Year -->
        <label for="year">Release Year</label>
        <input type="number" name="year" id="year" value="<?= $data['year']; ?>" autocomplete="off" required><br><br>
        
        <!-- Director -->
        <label for="director">Director</label>
        <input type="text" name="director" id="director" value="<?= $data['director']; ?>" autocomplete="off" required><br><br>
        
        <!-- Current Picture -->
        <label for="currentPicture">Current Picture</label>
        <img src="../assets/upload/images/<?= $data['picture']; ?>" alt="" id="currentPicture" width="75"><br><br>
        

        <!-- Picture -->
        <label for="picture">Picture</label>
        <input type="file" name="picture" id="picture"><br><br>

        <!-- Button Submit -->
        <button type="submit" name="editMovie">Submit</button>
    </form>
</body>
</html>