<?php
session_start();
include "../inc/functions.php";

if (!isset($_SESSION['signedIn'])) {
    header("Location: ../signIn.php");
    exit;
}

if ($_SESSION['role'] !== 'Admin') {
    header("Location: ../index.php");
    exit;
}

$movie = query("SELECT id, title FROM movies");

if (isset($_POST['addCaster'])) {
    if (addCharacter($_POST) > 0) {
        echo "
            <script>
                alert('Successfully Create a New Character');
                document.location.href = '../adminCharacter.php';
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
    <div style="display: flex; flex-direction: column; padding-left: 4rem; border-left: 1px solid #e2e8f0; border-color: #e2e8f0">
        <p style="font-weight: 500; font-size: 2.5rem; margin-top: 2rem">Add Data Character</p>
        <div style="width: 60%">
            <form action="" method="post" enctype="multipart/form-data">
                <div style="display: flex; margin-top: 1rem">
                    <p style="width: 16rem; padding-top: 0.5rem; padding-bottom: 0.5rem">Name :</p>
                    <input type="text" name="name" id="name" autocomplete="off" style="padding-left: 1rem; padding-top: 0.25rem; padding-bottom: 0.25rem; border-radius: 0.5rem; border: 1px solid black; width: 100%" placeholder="Name" />
                </div>
                <div style="display: flex; margin-top: 1rem">
                    <p style="width: 16rem; padding-top: 0.5rem; padding-bottom: 0.5rem">Movie Name :</p>
                    <select name="movie" id="movie" style="padding-top: 0.25rem; padding-bottom: 0.25rem; border-radius: 0.5rem; border: 1px solid black; width: 100%">
                        <?php foreach ($movie as $row) : ?>
                            <option value="<?= $row['id'] ?>"><?= $row['title'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div style="display: flex; margin-top: 1rem">
                    <p style="width: 16rem; padding-top: 0.5rem; padding-bottom: 0.5rem">Picture :</p>
                    <div style="border-radius: 0.5rem; border: 1px solid black; width: 100%; display: flex">
                        <label for="picture" style="display: flex; align-items: center; justify-content: center; border-radius: 0.5rem; background-color: #474e9c; color: white; cursor: pointer; padding-left: 1rem; padding-right: 1rem; padding-top: 0.25rem; padding-bottom: 0.25rem; width: 50%">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 1.25rem; height: 1.25rem; margin-right: 0.5rem">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                            </svg>
                            Upload File
                        </label>
                        <input type="file" name="picture" id="picture" style="display: none;"/>
                        <div style="display: flex; align-items: center; border-radius: 0.5rem; background-color: white; color: black; padding-left: 0.5rem; padding-right: 0.5rem; cursor: pointer; margin-left: 0.25rem">No File Chosen</div>
                    </div>
                </div>
                <div style="display: flex; margin-top: 1rem">
                    <p style="width: 16rem"></p>
                    <div style="display: flex; width: 100%">
                        <button style="border-radius: 0.5rem; border: 1px solid #474e9c; padding-left: 1rem; padding-right: 1rem; padding-top: 0.25rem; padding-bottom: 0.25rem">Cancel</button>
                        <button type="submit" name="addCaster" style="border-radius: 0.5rem; background-color: #474e9c; color: white; padding-left: 1rem; padding-right: 1rem; padding-top: 0.25rem; padding-bottom: 0.25rem; margin-left: 0.25rem">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <footer style="position: fixed; bottom: 0; background-color: #474e9c; width: 100%; height: 80px; display: flex; align-items: center; color: white;">
        <p style="margin-left: 20px;">©2023, Disney</p>
    </footer>
</body>

</html>