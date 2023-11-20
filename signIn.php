<?php
session_start();
include "inc/functions.php";

if (isset($_POST['signIn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row['password'])) {
            $_SESSION['signedIn'] = true;
            $_SESSION['role'] = $row['role'];
            $_SESSION['firstName'] = $row['firstName'];
            $_SESSION['lastName'] = $row['lastName'];

            if ($row['role'] === 'Admin') {
                header("Location: adminHomepage.php");
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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <style>
        body {
            background: linear-gradient(to top right, #474e9c 30%, #e387b8 70%);
            font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        }

        input {
            background-color: transparent;
        }

        input::placeholder {
            color: white !important;
        }

        .container1 {
            display: flex;
            padding: 1rem;
            flex-direction: column;
            width: 60%;
            margin-top: 15%;
            margin-left: auto;
        }

        .text1 {
            font-size: 3rem;
            line-height: 1;
            font-weight: 700;
            text-align: center;
            color: #ffffff;
        }

        .text2 {
            margin-bottom: 1rem;
            font-size: 1.125rem;
            line-height: 1.75rem;
            text-align: center;
            color: #f3f4f6;
        }

        .inputs {
            border-radius: 0.5rem;
            border: solid 2px #ffffff;
            height: 3rem;
            padding-left: 1rem;
            color: white;
        }

        .text3 {
            margin-bottom: 0.5rem;
            margin-top: 1rem;
            font-size: 1.25rem;
            line-height: 1.75rem;
            font-weight: 700;
        }

        .button1 {
            padding: 0.5rem;
            margin-top: 4rem;
            border-radius: 0.375rem;
            font-size: 1.25rem;
            line-height: 1.75rem;
            font-weight: 700;
            background-color: #ffffff;
            color: #474e9c;
        }

        .image1 {
            object-fit: contain;
            margin-top: 1rem;
            height: 4rem;
        }
    </style>
</head>

<body>
    <div style="display: flex; color: #ffffff">
        <div style="width: 50%">
            <form action="" method="post">
                <div class="container1">
                    <img src="assets/images/disney-logo-white.png" alt="" class="image1" />
                    <div class="text1">Welcome Back!</div>
                    <p class="text2">Sign in for timeless tales and magical wonders.</p>
                    <p class="text3">Email</p>
                    <input type="text" class="inputs" name="email" placeholder="Input your email" autocomplete="off" required />
                    <p class="text3">Password</p>
                    <input type="password" class="inputs" name="password" placeholder="Password" />
                    <button class="button1" name="signIn">Sign In</button>
                    <div style="display: flex; margin-top: 1rem; height: fit-content; margin-left: auto; margin-right: auto">
                        <p style="color: #d9dae5; margin-right: 1rem">Don't have an account yet?</p>
                        <a href="signUp.php" style="color: #dac0ff; text-decoration: none; margin-top: 16px;">Sign Up</a>
                        <!-- <p style="color: #dac0ff">Sign Up</p> -->
                    </div>
            </form>
        </div>
    </div>
    <div style="width: 50%; margin-left: 6rem">
        <img src="assets/images/disney-img.png" alt="" style="margin-top: 4rem; margin-bottom: 30%; height: 45em" />
    </div>
    </div>
</body>

</html>