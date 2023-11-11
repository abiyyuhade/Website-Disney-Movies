<?php
include "../inc/functions.php";

if (isset($_POST['addUser'])) {
    if(signUp($_POST) > 0) {
        echo "
            <script>
                alert('Successfully Create a New User');
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
    <h1>Add Data User</h1>
    <form action="" method="post">
        <!-- Email -->
        <label for="email">Email</label>
        <input type="text" name="email" id="email" autocomplete="off" required><br><br>

        <!-- Password -->
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required><br><br>

        <!-- Confirm Password -->
        <label for="confPassword">Confirm Password</label>
        <input type="password" name="confPassword" id="confPassword" required><br><br>

        <!-- First Name -->
        <label for="firstName">First Name</label>
        <input type="text" name="firstName" id="firstName" autocomplete="off" required><br><br>

        <!-- Last Name -->
        <label for="lastName">Last Name</label>
        <input type="text" name="lastName" id="lastName" autocomplete="off" required><br><br>

        <!-- Button Submit -->
        <button type="submit" name="addUser">Submit</button><br><br>
    </form>
</body>

</html>