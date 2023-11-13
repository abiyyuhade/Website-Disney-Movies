<?php
include "inc/functions.php";

if (isset($_POST['signUp'])) {
    if (signUp($_POST) > 0) {
        echo "
            <script>
                alert('Successfully Create a New User');
                document.location.href = 'signIn.php';
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
            border-radius: 0.5rem;
            border: solid 2px white;
            height: 3rem;
            padding-left: 1rem;
        }

        input::placeholder {
            color: white !important;
            text-indent: 10px;
        }

        .container1 {
            display: flex;
            padding: 1rem;
            flex-direction: column;
            width: 60%;
            margin-top: 15%;
            margin-left: auto;
        }

        .image1 {
            object-fit: contain;
            margin-top: 1rem;
            height: 4rem;
        }

        .text1 {
            margin-bottom: 1rem;
            font-size: 2.25rem;
            line-height: 2.5rem;
            font-weight: 500;
            text-align: center;
            color: #ffffff;
        }

        .text2 {
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
            background: #ffffff;
            color: #474e9c;
            box-shadow: none;
        }
    </style>
</head>

<body>
    <div style="display: flex; color: #ffffff">
        <div style="width: 50%">
            <form action="" method="post">
                <div class="container1">
                    <img src="assets/images/disney-logo-white.png" alt="" class="image1" />
                    <div class="text1">Sign Up to Your Account</div>
                    <div style="display: flex; justify-content: space-between">
                        <div style="width: 50%">
                            <p style="margin-bottom: 0.5rem; font-size: 1.25rem; line-height: 1.75rem; font-weight: 700">First Name</p>
                            <input type="text" name="firstName" placeholder="Input your first name" />
                        </div>
                        <div style="width: 50%">
                            <p style="margin-bottom: 0.5rem; font-size: 1.25rem; line-height: 1.75rem; font-weight: 700">Last Name</p>
                            <input type="text" style="width: 90%" name="lastName" placeholder="Input your last name" />
                        </div>
                    </div>
                    <p class="text2">Email</p>
                    <input type="text" name="email" placeholder="Input your email" />
                    <p class="text2">Password</p>
                    <input type="password" name="password" placeholder="Password" />
                    <p class="text2">Confirm Password</p>
                    <input type="password" name="confPassword" placeholder="Confirm Password" />
                    <button class="button1" name="signUp">Sign Up</button>
                    <div style="display: flex; margin-top: 1rem; height: fit-content; margin-left: auto; margin-right: auto">
                        <p style="color: #d9dae5; margin-left: 1rem">already have an account? </p>
                        <a href="signIn.php" style="color: #dac0ff; text-decoration: none; margin-top: 16px;">Sign In</a>
                        <!-- <p style="color: #dac0ff"> Sign In</p> -->
                    </div>
                </div>
            </form>
        </div>
        <div style="width: 50%; margin-left: 6rem; margin-top: 4rem">
            <img src="assets/images/disney-img.png" alt="" style="margin-top: 4rem; margin-bottom: 30%; height: 45em" />
        </div>
    </div>
</body>

</html>