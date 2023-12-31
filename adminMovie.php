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

$movie = query("SELECT * FROM movies");
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
        <div style="width: 25%; height: 100%; border-right: 1px solid #e2e8f0; border-color: #e2e8f0; display: flex; flex-direction: column">
            <img src="assets/images/disney-logo.png" alt="" style="height: 4rem; object-fit: contain; margin-top: 2rem" />
            <div style="display: flex; width: 80%; padding-top: 0.5rem; padding-bottom: 0.5rem; border-radius: 0.75rem; margin-left: auto; margin-right: auto; margin-top: 2rem">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 2rem; height: 2rem; margin-left: 2rem; margin-top: auto; margin-bottom: auto">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                </svg>
                <a href="adminHomepage.php" style="font-size: 1.5rem; margin-left: 1rem; text-decoration: none;">Dashboard</a>
            </div>
            <div style="display: flex; width: 80%; padding-top: 0.5rem; padding-bottom: 0.5rem; border-radius: 0.75rem; margin-left: auto; background-color: #474e9c; color: white; margin-right: auto; margin-top: 2rem">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 2rem; height: 2rem; margin-left: 2rem; margin-top: auto; margin-bottom: auto">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 01-1.125-1.125M3.375 19.5h1.5C5.496 19.5 6 18.996 6 18.375m-3.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125m0 3.75h-1.5A1.125 1.125 0 0118 18.375M20.625 4.5H3.375m17.25 0c.621 0 1.125.504 1.125 1.125M20.625 4.5h-1.5C18.504 4.5 18 5.004 18 5.625m3.75 0v1.5c0 .621-.504 1.125-1.125 1.125M3.375 4.5c-.621 0-1.125.504-1.125 1.125M3.375 4.5h1.5C5.496 4.5 6 5.004 6 5.625m-3.75 0v1.5c0 .621.504 1.125 1.125 1.125m0 0h1.5m-1.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125m1.5-3.75C5.496 8.25 6 7.746 6 7.125v-1.5M4.875 8.25C5.496 8.25 6 8.754 6 9.375v1.5m0-5.25v5.25m0-5.25C6 5.004 6.504 4.5 7.125 4.5h9.75c.621 0 1.125.504 1.125 1.125m1.125 2.625h1.5m-1.5 0A1.125 1.125 0 0118 7.125v-1.5m1.125 2.625c-.621 0-1.125.504-1.125 1.125v1.5m2.625-2.625c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125M18 5.625v5.25M7.125 12h9.75m-9.75 0A1.125 1.125 0 016 10.875M7.125 12C6.504 12 6 12.504 6 13.125m0-2.25C6 11.496 5.496 12 4.875 12M18 10.875c0 .621-.504 1.125-1.125 1.125M18 10.875c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125m-12 5.25v-5.25m0 5.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125m-12 0v-1.5c0-.621-.504-1.125-1.125-1.125M18 18.375v-5.25m0 5.25v-1.5c0-.621.504-1.125 1.125-1.125M18 13.125v1.5c0 .621.504 1.125 1.125 1.125M18 13.125c0-.621.504-1.125 1.125-1.125M6 13.125v1.5c0 .621-.504 1.125-1.125 1.125M6 13.125C6 12.504 5.496 12 4.875 12m-1.5 0h1.5m-1.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125M19.125 12h1.5m0 0c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h1.5m14.25 0h1.5" />
                </svg>

                <p style="font-size: 1.5rem; margin-left: 1rem">Movie</p>
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
            <p style="font-weight: 500; font-size: 2.5rem; margin-top: 2rem">Table Movie</p>
            <a href="movie/addMovie.php">
                <button style="border-radius: 0.5rem; color: white; background-color: #474e9c; width: 8rem; padding-top: 0.25rem; padding-bottom: 0.25rem; margin-top: 1rem; padding-left: 1rem">+ Add Data</button>
            </a>
            <div style="margin-top: 1.5rem; margin-bottom: 1.5rem; border-radius: 0.5rem">
                <table style="width: 100%; border-collapse: collapse; border-radius: 0.5rem">
                    <thead>
                        <tr style="background-color: #474e9c; color: white">
                            <th style="padding: 0.5rem 1rem; font-weight: 400; border-top-left-radius: 0.5rem">No</th>
                            <th style="padding: 0.5rem 1rem; font-weight: 400">Title</th>
                            <th style="padding: 0.5rem 1rem; font-weight: 400">Synopsis</th>
                            <th style="padding: 0.5rem 1rem; font-weight: 400">Release Year</th>
                            <th style="padding: 0.5rem 1rem; font-weight: 400">Director</th>
                            <th style="padding: 0.5rem 1rem; font-weight: 400">Thumbnail</th>
                            <th style="padding: 0.5rem 1rem; font-weight: 400">Banner</th>
                            <th style="padding: 0.5rem 1rem; font-weight: 400; border-top-right-radius: 0.5rem">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($movie as $row) : ?>
                            <tr style="text-align: center; font-size: 0.75rem">
                                <td style="border: 1px solid #e2e8f0; padding: 0.5rem 1rem"><?= $i; ?></td>
                                <td style="border: 1px solid #e2e8f0; padding: 0.5rem 1rem"><?= $row['title']; ?></td>
                                <td style="border: 1px solid #e2e8f0; padding: 0.5rem 1rem; text-align: justify"><?= $row['synopsis']; ?></td>
                                <td style="border: 1px solid #e2e8f0; padding: 0.5rem 1rem"><?= $row['year']; ?></td>
                                <td style="border: 1px solid #e2e8f0; padding: 0.5rem 1rem"><?= $row['director']; ?></td>
                                <td style="border: 1px solid #e2e8f0; padding: 0.5rem 1rem">
                                    <img src="assets/upload/images/<?= $row['thumbnail'] ?>" alt="thumbnail">
                                </td>
                                <td style="border: 1px solid #e2e8f0; padding: 0.5rem 1rem">
                                    <img src="assets/upload/images/<?= $row['banner'] ?>" alt="banner">
                                </td>
                                <td style="border: 1px solid #e2e8f0; padding: 0.5rem 1rem">
                                    <div style="display: flex">
                                        <a href="movie/editMovie.php?id=<?= $row['id']; ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 1.5rem; height: 1.5rem; background-color: #8b5cf6; border-radius: 0.375rem">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                            </svg>
                                        </a>
                                        <a href="movie/deleteMovie.php?id=<?= $row['id']; ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 1.5rem; height: 1.5rem; background-color: #f56565; border-radius: 0.375rem; margin-left: 0.375rem">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <footer style="bottom: 0; background-color: #474e9c; width: 100%; height: 80px; display: flex; align-items: center; color: white;">
        <p style="margin-left: 20px;">©2023, Disney</p>
    </footer>
</body>

</html>