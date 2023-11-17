<?php
session_start();
include "inc/functions.php";

if (!isset($_SESSION['signedIn'])) {
    header("Location: signIn.php");
    exit;
}

if ($_SESSION['role'] !== 'Admin') {
    header("Location: index.php");
    exit;
}

$movie = query("SELECT * FROM movies");

$character = query("SELECT characters.*, movies.title AS movie_title FROM characters LEFT JOIN movies ON characters.id_movies = movies.id");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h3>Table Movies</h3>
    <a href="movie/addMovie.php">Add Data</a><br><br>
    <table>
        <tr>
            <th>No.</th>
            <th>Title</th>
            <th>Synopsis</th>
            <th>Release Year</th>
            <th>Director</th>
            <th>Thumbnail</th>
            <th>Banner</th>
            <th>Action</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach ($movie as $row) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $row['title']; ?></td>
                <td><?= $row['synopsis']; ?></td>
                <td><?= $row['year']; ?></td>
                <td><?= $row['director']; ?></td>
                <td>
                    <img src="assets/upload/images/<?= $row['thumbnail'] ?>" width="75">
                </td>
                <td>
                    <img src="assets/upload/images/<?= $row['banner'] ?>" width="75">
                </td>
                <td>
                    <a href="movie/editMovie.php?id=<?= $row['id']; ?>">Edit</a> |
                    <a href="movie/deleteMovie.php?id=<?= $row['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </table><br><br>

    <h3>Table Characters</h3>
    <a href="characters/addCharacter.php">Add Data</a><br><br>
    <table>
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Movie Name</th>
            <th>Picture</th>
            <th>Action</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach ($character as $row) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $row['name']; ?></td>
                <td><?= $row['movie_title']; ?></td>
                <td>
                    <img src="assets/upload/images/<?= $row['picture'] ?>" width="75">
                </td>
                <td>
                    <a href="characters/editCharacter.php?id=<?= $row['id']; ?>">Edit</a> |
                    <a href="characters/deleteCharacter.php?id=<?= $row['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </table><br><br>

    <a href="signOut.php">Sign Out</a>
</body>

</html>