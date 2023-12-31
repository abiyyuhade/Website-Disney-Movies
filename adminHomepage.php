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

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- <script src="https://cdn.tailwindcss.com"></script> -->
        <style>
            body {
                margin: 0;
                padding: 0;
                font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            }
            button {
                background-color: transparent;
                border: none;
                padding: 0;
                margin: 0;
                font-size: inherit;
                font-family: inherit;
                color: inherit;
                cursor: pointer;
                text-align: inherit;
                text-decoration: none;
                appearance: none;
                -webkit-appearance: none;
            }
            img {
                border: 0;
                margin: 0;
                padding: 0;
                display: inline-block;
                max-width: 100%;
                height: auto;
            }
            p {
                margin: 0;
                padding: 0;
            }
        </style>
        <title>Document</title>
    </head>
    <body>
        <div style="display: flex">
            <div style="width: 25%; height: 200%; border-right: 1px solid #e2e8f0; border-color: #e2e8f0; display: flex; flex-direction: column">
                <img src="assets/images/disney-logo.png" alt="" style="height: 4rem; object-fit: contain; margin-top: 2rem" />
                <div style="display: flex; width: 80%; padding-top: 0.5rem; padding-bottom: 0.5rem; border-radius: 0.75rem; background-color: #474e9c; color: white; margin-left: auto; margin-right: auto; margin-top: 2rem">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 2rem; height: 2rem; margin-left: 2rem; margin-top: auto; margin-bottom: auto">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z"
                        />
                    </svg>
                    <p style="font-size: 1.5rem; margin-left: 1rem">Dashboard</p>
                </div>
                <div style="display: flex; width: 80%; padding-top: 0.5rem; padding-bottom: 0.5rem; border-radius: 0.75rem; margin-left: auto; margin-right: auto; margin-top: 2rem">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 2rem; height: 2rem; margin-left: 2rem; margin-top: auto; margin-bottom: auto">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 01-1.125-1.125M3.375 19.5h1.5C5.496 19.5 6 18.996 6 18.375m-3.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125m0 3.75h-1.5A1.125 1.125 0 0118 18.375M20.625 4.5H3.375m17.25 0c.621 0 1.125.504 1.125 1.125M20.625 4.5h-1.5C18.504 4.5 18 5.004 18 5.625m3.75 0v1.5c0 .621-.504 1.125-1.125 1.125M3.375 4.5c-.621 0-1.125.504-1.125 1.125M3.375 4.5h1.5C5.496 4.5 6 5.004 6 5.625m-3.75 0v1.5c0 .621.504 1.125 1.125 1.125m0 0h1.5m-1.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125m1.5-3.75C5.496 8.25 6 7.746 6 7.125v-1.5M4.875 8.25C5.496 8.25 6 8.754 6 9.375v1.5m0-5.25v5.25m0-5.25C6 5.004 6.504 4.5 7.125 4.5h9.75c.621 0 1.125.504 1.125 1.125m1.125 2.625h1.5m-1.5 0A1.125 1.125 0 0118 7.125v-1.5m1.125 2.625c-.621 0-1.125.504-1.125 1.125v1.5m2.625-2.625c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125M18 5.625v5.25M7.125 12h9.75m-9.75 0A1.125 1.125 0 016 10.875M7.125 12C6.504 12 6 12.504 6 13.125m0-2.25C6 11.496 5.496 12 4.875 12M18 10.875c0 .621-.504 1.125-1.125 1.125M18 10.875c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125m-12 5.25v-5.25m0 5.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125m-12 0v-1.5c0-.621-.504-1.125-1.125-1.125M18 18.375v-5.25m0 5.25v-1.5c0-.621.504-1.125 1.125-1.125M18 13.125v1.5c0 .621.504 1.125 1.125 1.125M18 13.125c0-.621.504-1.125 1.125-1.125M6 13.125v1.5c0 .621-.504 1.125-1.125 1.125M6 13.125C6 12.504 5.496 12 4.875 12m-1.5 0h1.5m-1.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125M19.125 12h1.5m0 0c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h1.5m14.25 0h1.5"
                        />
                    </svg>
                    <a href="adminMovie.php" style="font-size: 1.5rem; margin-left: 1rem; text-decoration: none;">Movie</a>
                </div>
                <div style="display: flex; width: 80%; padding-top: 0.5rem; padding-bottom: 0.5rem; border-radius: 0.75rem; margin-left: auto; margin-right: auto; margin-top: 2rem">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 2rem; height: 2rem; margin-left: 2rem; margin-top: auto; margin-bottom: auto">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                    </svg>
                    <a href="adminCharacter.php" style="font-size: 1.5rem; margin-left: 1rem; text-decoration: none;">Character</a>
                </div>
                <div style="display: flex; width: 80%; padding-top: 0.5rem; padding-bottom: 0.5rem; border-radius: 0.75rem; margin-left: auto; margin-right: auto; margin-top: 15em; margin-bottom: 2rem">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 2rem; height: 2rem; margin-left: 2rem; margin-top: auto; margin-bottom: auto">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                    </svg>

                    <a href="signOut.php" style="font-size: 1.5rem; margin-left: 1rem; text-decoration: none;">Sign Out</a>
                </div>
            </div>
            <div style="width: 75%; display: flex; flex-direction: column; padding-left: 4rem; border-left: 1px solid #e2e8f0; border-color: #e2e8f0">
                <p style="font-weight: 500; font-size: 3.75rem; margin-top: 8rem">Welcome Back, Admin!</p>
                <div style="display: flex; margin-top: 2rem">
                    <div style="width: 25%"><img src="assets/images/admin-dashboard.jpeg" alt="" /></div>
                    <div style="width: 75%">
                        <p style="font-size: 1.25rem; font-weight: 300; line-height: 1.75; padding-left: 8rem; padding-right: 8rem; text-align: justify">
                            Disney merupakan salah satu perusahaan hiburan terkemuka di dunia. Perusahaan yang terkenal pula sebagai The Walt Disney Company tak dapat dilepaskan dari peran sang pendirinya yakni Walt Disney dalam memulai karirnya. Karir Walt pertama kali dimulai sejak 16 Oktober 1923 saat dia menandatangani kontrak dengan M. J. Winkler untuk produksi pertamanya yakni Alice Comedies. Sejak saat inilah dimulai perjalanan panjang Disney yang pada awalnya dikenal sebagai The Disney
                            Brothers Studio.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <footer style="position: fixed; bottom: 0; background-color: #474e9c; width: 100%; height: 80px; display: flex; align-items: center; color: white;">
            <p style="margin-left: 20px;">©2023, Disney</p>
        </footer>
    </body>
</html>
