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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
    <style>
        body {
            background: linear-gradient(to top right, #474e9c 30%, #e387b8 70%);
        }

        input {
            background-color: transparent;
        }

        input::placeholder {
            color: white !important;
        }
    </style>
</head>

<body>
    <div class="flex text-white">
        <div class="w-[50%]">
            <form action="" method="post">
                <div class="w-[60%] p-4 mx-auto mt-[15%] flex flex-col">
                    <img src="assets/images/disney-logo-white.png" alt="" class="h-16 object-contain mt-4" />
                    <div class="font-bold text-white text-center text-5xl">Welcome Back!</div>
                    <p class="text-center text-lg mb-4 text-gray-100">Sign in for timeless tales and magical wonders.</p>
                    <p class="font-bold text-xl mt-4 mb-2">Email</p>
                    <input type="text" class="border-[2px] border-white rounded-lg h-12 ps-2" name="email" placeholder="Input your email" />
                    <p class="font-bold text-xl mt-4 mb-2">Password</p>
                    <input type="password" class="border-[2px] border-white rounded-lg h-12 ps-2" name="password" placeholder="Password" />
                    <button class="mt-16 bg-white text-[#474e9c] font-bold p-2 text-xl rounded-md" name="signIn">Sign In</button>
                    <div class="flex mt-4 h-fit mx-auto">
                        <p class="me-2 text-[#d9dae5]">Don't have an account yet?</p>
                        <p class="text-[#474e9c]">Sign Up</p>
                    </div>
                </div>
            </form>
        </div>
        <div class="w-[50%]">
            <img src="assets/images/disney-img.png" alt="" class="mt-16 mb-[30%] h-[45em]" />
        </div>
    </div>
</body>

</html>