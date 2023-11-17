<?php
include "../inc/functions.php";

$id = $_GET['id'];

$data = query("SELECT * FROM characters WHERE id = $id")[0];

$movie = query("SELECT id, title FROM movies");

if(isset($_POST['editCaster'])) {
    if(editCharacter($_POST) > 0) {
        echo "
            <script>
            alert('The caster has been successfully updated!');
            document.location.href = '../admin.php';
            </script>
        ";
    } else {
        echo "
            <script>
            alert('Failed to update the caster. Please check your input and try again.');
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
    <h1>Add Data Caster</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <!-- Id -->
        <input type="hidden" name="id" value="<?= $data['id']; ?>">

        <!-- Mame -->
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="<?= $data['name']; ?>" autocomplete="off" required><br><br>

        <!-- Movie -->
        <label for="movie">Movie Name</label>
        <select name="movie" id="movie" required>
            <?php foreach ($movie as $row) : ?>
                <option value="<?= $row['id'] ?>" <?= ($row['id'] == $data['id_movies']) ? 'selected' : ''; ?>>
                    <?= $row['title'] ?>
                </option>
            <?php endforeach; ?>
        </select><br><br><br><br>

        <!-- Current Photo -->
        <label for="currentPicture">Current Picture</label>
        <img src="../assets/upload/images/<?= $data['picture']; ?>" alt="" id="currentPicture" width="75"><br><br>

        <!-- Picture -->
        <label for="picture">Picture</label>
        <input type="file" name="picture" id="picture"><br><br>

        <!-- Button Submit -->
        <button type="submit" name="editCaster">Submit</button>
    </form>
</body>

</html>