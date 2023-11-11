<?php 
include "../inc/functions.php";

$id = $_GET['id'];

$data = query("SELECT * FROM users WHERE id = '$id'")[0];

if(isset($_POST['editUser'])) {
    if(editUser($_POST) > 0) {
        echo "
            <script>
            alert('User has been successfully updated!');
            document.location.href = '../admin.php';
            </script>
        ";
    } else {
        echo "
            <script>
            alert('Failed to update user. Please check your input and try again.');
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
    <h1>Edit Data User</h1>
    <form action="" method="post">
        <!-- Id -->
        <input type="hidden" name="id" value="<?= $data['id']; ?>">

        <!-- Email -->
        <label for="email">Email</label>
        <input type="text" name="email" id="email" autocomplete="off" value="<?= $data['email']; ?>" required><br><br>

        <!-- First Name -->
        <label for="firstName">First Name</label>
        <input type="text" name="firstName" id="firstName" value="<?= $data['firstName']; ?>" autocomplete="off" required><br><br>

        <!-- Last Name -->
        <label for="lastName">Last Name</label>
        <input type="text" name="lastName" id="lastName" value="<?= $data['lastName']; ?>" autocomplete="off" required><br><br>

        <!-- Button Submit -->
        <button type="submit" name="editUser">Submit</button><br><br>
    </form>
</body>

</html>