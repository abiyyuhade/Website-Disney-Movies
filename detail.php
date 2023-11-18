<?php
session_start();
include "inc/functions.php";

if (isset($_SESSION['signedIn']) && $_SESSION['signedIn'] === true) {
    $firstName = $_SESSION['firstName'];
    $lastName = $_SESSION['lastName'];
}

$id = $_GET['id'];

$movies = query("SELECT * FROM movies WHERE id = $id");


$charactersData = query("SELECT characters.name AS character_name, characters.picture AS characters_picture 
                FROM characters 
                WHERE characters.id_movies = $id");

$characters = [];
foreach ($charactersData as $character) {
    if ($character['character_name'] && !in_array($character['character_name'], $characters)) {
        $characters[] = $character;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
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

        a {
            text-decoration: none;
            color: #fff;
        }
    </style>
    <title>Document</title>
</head>

<body style="margin: 0; padding: 0; background-color: #474e9c">
    <?php foreach ($movies as $data) : ?>
        <div style="background-image: url('assets/upload/images/<?= $data['banner']; ?>'); 
            height: 35em; 
            background-repeat: no-repeat; 
            background-position: center; 
            display: flex; 
            justify-content: center">
            <div style="left: 0%; display: flex; align-items: center; margin-top: 2rem; margin-right: 2rem; position: absolute; top: 10px; right: 10px; z-index: 10; justify-content:space-between;">
                <button onclick="goBack()" style="margin-left: 20px;"><i style="color: white; font-size: 20px;" class="fa-solid fa-left-long"></i></button>
                <div style="display: flex; align-items:center;">
                    <p style="margin-right: 1em; color: white;"><?php echo $firstName . ' ' . $lastName; ?></p>
                    <a href="signOut.php">Sign Out</a>
                </div>
            </div>
            <div style="position: absolute; 
                top: 0; 
                right: 0; 
                bottom: 0; 
                left: 0; 
                background-image: linear-gradient(to top, transparent, transparent, #474e9c); 
                background-position: top; 
                height: 35em"></div>
            <div style="position: absolute; 
                top: 0; 
                right: 0; 
                bottom: 0; 
                left: 0; 
                background-image: linear-gradient(to bottom, transparent, transparent, #474e9c); 
                background-position: 
                bottom; 
                height: 35em"></div>
        </div>

        <!-- Movie Title -->
        <div style="font-weight: bold; 
            font-size: 3.125rem; 
            color: white; 
            text-align: center; 
            z-index: 50; 
            position: relative; 
            letter-spacing: 0.4em; 
            margin-top: -0.8em">
            <?= $data['title']; ?>
        </div>
        <div style="display: flex; flex-direction: column; margin-top: 1rem; padding: 8rem">
            <!-- Release Year -->
            <div style="display: flex">
                <p style="font-weight: bold; color: white; width: 10rem; font-size: 1.25rem">Release Year</p>
                <p style="color: white; width: 16rem; font-size: 1.25rem"><?= $data['year']; ?></p>
            </div>

            <!-- Director -->
            <div style="display: flex">
                <p style="font-weight: bold; color: white; width: 10rem; font-size: 1.25rem">Director</p>
                <p style="color: white; width: 16rem; font-size: 1.25rem"><?= $data['director']; ?></p>
            </div>

            <!-- Synopsis -->
            <div style="display: flex">
                <p style="font-weight: bold; color: white; width: 16rem; font-size: 1.25rem">Synopsis</p>
            </div>
            <div>
                <p style="color: white; margin-top: 1rem; font-size: 1.25rem"><?= $data['synopsis']; ?></p>
            </div>

            <!-- Character -->
            <div style="display: flex">
                <p style="font-weight: bold; color: white; width: 16rem; font-size: 1.25rem; margin-top: 4rem">Character</p>
            </div>
            <div style="display: flex; flex-wrap: wrap">
                <?php foreach ($characters as $character) : ?>
                    <div style="display: flex; flex-direction: column; width: 10em; height: 16rem; margin-top: 2rem; margin-right: 8rem">
                        <img src="assets/upload/images/<?= $character['characters_picture']; ?>" alt="" />
                        <p style="color: white; font-size: 1.125rem"><?= $character['character_name']; ?></p>
                    </div>
                <?php endforeach; ?>
                <!-- <div style="display: flex; flex-direction: column; width: 10em; height: 16rem; margin-top: 2rem; margin-right: 8rem">
                        <img src="Rectangle 645.png" alt="" />
                        <p style="color: white; font-size: 1.125rem">Wade Ripple</p>
                    </div>
                    <div style="display: flex; flex-direction: column; width: 10em; height: 16rem; margin-top: 2rem; margin-right: 8rem">
                        <img src="Rectangle 646.png" alt="" />
                        <p style="color: white; font-size: 1.125rem">Bernie Lumen</p>
                    </div>
                    <div style="display: flex; flex-direction: column; width: 10em; height: 16rem; margin-top: 2rem; margin-right: 8rem">
                        <img src="Rectangle 647.png" alt="" />
                        <p style="color: white; font-size: 1.125rem">Cinder Lumen</p>
                    </div>
                    <div style="display: flex; flex-direction: column; width: 10em; height: 16rem; margin-top: 2rem; margin-right: 8rem">
                        <img src="Rectangle 649.png" alt="" />
                        <p style="color: white; font-size: 1.125rem">Clod</p>
                    </div>
                    <div style="display: flex; flex-direction: column; width: 10em; height: 16rem; margin-top: 2rem; margin-right: 8rem">
                        <img src="Rectangle 650.png" alt="" />
                        <p style="color: white; font-size: 1.125rem">Brook Ripple</p>
                    </div>
                    <div style="display: flex; flex-direction: column; width: 10em; height: 16rem; margin-top: 2rem; margin-right: 8rem">
                        <img src="Rectangle 651.png" alt="" />
                        <p style="color: white; font-size: 1.125rem">Gale</p>
                    </div>
                    <div style="display: flex; flex-direction: column; width: 10em; height: 16rem; margin-top: 2rem; margin-right: 8rem">
                        <img src="Rectangle 652.png" alt="" />
                        <p style="color: white; font-size: 1.125rem">Fern</p>
                    </div> -->
            </div>
        <?php endforeach; ?>
        </div>
        <footer style="width: 100%; background-color: white; height: 75px; display: flex; align-items:center; justify-content:flex-start;">
            <p style="margin-left: 50px; font-weight: bold;">&copy; 2023, Disney</p>
        </footer>

        <script>
            function goBack() {
                window.history.back();
            }
        </script>
</body>

</html>