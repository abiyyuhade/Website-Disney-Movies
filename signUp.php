<?php
include "inc/functions.php";

if (isset($_POST['signUp'])) {
    if(signUp($_POST) > 0) {
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
        <script src="https://cdn.tailwindcss.com"></script>
        <title>Document</title>
        <style>
            body {
                background: linear-gradient(to top right, #474e9c, #e387b8);
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
                <div class="w-[60%] p-4 mx-auto mt-16 flex flex-col">
                    <img src="disney-logo-white.png" alt="" class="h-16 object-contain mt-4" />
                    <div class="font-medium text-white text-center text-4xl mb-4">Sign Up to Your Account</div>
                    <div class="flex justify-between">
                        <div class="w-[50%]">
                            <p class="font-bold text-xl mb-2">First Name</p>
                            <input type="text" class="border-[2px] border-white rounded-lg h-12 ps-2" name="firstName" placeholder="Input your first name" />
                        </div>
                        <div class="w-[50%]">
                            <p class="font-bold text-xl mb-2">Last Name</p>
                            <input type="text" class="border-[2px] border-white rounded-lg h-12 ps-2 w-full" name="lastName" placeholder="Input your last name" />
                        </div>
                    </div>
                    <p class="font-bold text-xl mt-4 mb-2">Email</p>
                    <input type="text" class="border-[2px] border-white rounded-lg h-12 ps-2" name="email" placeholder="Input your email" />
                    <p class="font-bold text-xl mt-4 mb-2">Password</p>
                    <input type="text" class="border-[2px] border-white rounded-lg h-12 ps-2" name="password" placeholder="Password" />
                    <p class="font-bold text-xl mt-4 mb-2">Confirm Password</p>
                    <input type="text" class="border-[2px] border-white rounded-lg h-12 ps-2" name="confPassword" placeholder="Confirm Password" />
                    <button class="mt-16 bg-[#474e9c] text-white font-bold p-2 text-xl rounded-md" name="signUp">Sign Up</button>
                    <div class="flex mt-4 h-fit mx-auto">
                        <p class="me-2 text-[#d9dae5]">already have an account?</p>
                        <p class="text-[#474e9c]">Sign In</p>
                    </div>
                </div>
            </div>
            <div class="w-[50%]">
                <img src="disney-img.png" alt="" class="mt-16 mb-[30%] h-[45em]" />
            </div>
        </div>
    </body>
</html>
