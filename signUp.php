<?php
include "inc/functions.php";

if (isset($_POST['signUp'])) {
    if(signUp($_POST) > 0) {
        echo "
            <script>
                alert('Successfully Create a New User');
                document.location.href = 'login.php';
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
    <title>Sign Up</title>
</head>

<body>
    <form action="" method="post">
        <!-- First Name -->
        <label for="firstName">First Name</label>
        <input type="text" name="firstName" id="firstName" required autocomplete="off">

        <!-- Last Name -->
        <label for="lastName">Last Name</label>
        <input type="text" name="lastName" id="lastName" required autocomplete="off">

        <!-- Email -->
        <label for="email">Email</label>
        <input type="text" name="email" id="email" required autocomplete="off">

        <!-- Password -->
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>

        <!-- Confirm Password -->
        <label for="confPassword">Confirm Password</label>
        <input type="password" name="confPassword" id="confPassword" required>

        <button type="submit" name="signUp">Sign Up</button>
    </form>
</body>

</html>