<?php
include "../inc/functions.php";

$movie = query("SELECT id, title FROM movies");

if(isset($_POST['addCaster'])) {
    if(addCharacter($_POST) > 0) {
        echo "
            <script>
                alert('Successfully Create a New Character');
                document.location.href = '../admin.php';
            </script>
        ";
    } else {
        echo mysqli_error($conn);
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
    <h1>Add Data Character</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <!-- Mame -->
        <label for="name">Name</label>
        <input type="text" name="name" id="name" autocomplete="off" required><br><br>

        <!-- Movie -->
        <label for="movie">Movie Name</label>
            <select name="movie" id="movie" required>
                <?php foreach ($movie as $row) : ?>
                    <option value="<?= $row['id'] ?>"><?= $row['title'] ?></option>
                <?php endforeach; ?>
            </select><br><br>

        <!-- Picture -->
        <label for="picture">Picture</label>
        <input type="file" name="picture" id="picture"><br><br>

        <!-- Button Submit -->
        <button type="submit" name="addCaster">Submit</button>
    </form>
</body>

</html>