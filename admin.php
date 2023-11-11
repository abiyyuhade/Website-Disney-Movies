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

$user = query("SELECT * FROM users WHERE role = 'User'");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Admin Brok</h1>

    <h3>Table Users</h3>
    <a href="user/addUser.php">Add Data</a><br><br>
    <table>
        <tr>
            <th>No.</th>
            <th>Email</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Action</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach ($user as $row) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $row['email']; ?></td>
                <td><?= $row['firstName']; ?></td>
                <td><?= $row['lastName']; ?></td>
                <td>
                    <a href="user/editUser.php?id=<?= $row['id']; ?>">Edit</a>|
                    <a href="user/deleteUser.php?id=<?= $row['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </table>

    <a href="signOut.php">Sign Out</a>
</body>

</html>