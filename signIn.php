<?php 
session_start();
include "inc/functions.php";

if(isset($_POST['signIn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row['password'])) {
            $_SESSION['signedIn'] = true;
            $_SESSION['role'] = $row['role'];

            if ($row['role'] === 'Admin') {
                header("Location: admin.php");
            } else {
                header("Location: index.php");
            }
            exit;
        }
    }

    $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
</head>

<body>
    <form action="" method="post">
        <!-- Email -->
        <label for="email">Email</label>
        <input type="text" name="email" id="email" autocomplete="off" required>

        <!-- Password -->
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>

        <button type="submit" name="signIn">Sign In</button> <br> <br>

        <a href="signUp.php">Sign Up</a>
    </form>
</body>

</html>