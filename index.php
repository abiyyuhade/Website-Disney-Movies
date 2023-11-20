<?php
session_start();
include "inc/functions.php";

if (!isset($_SESSION['signedIn'])) {
    header("Location: signIn.php");
    exit;
}

if (isset($_SESSION['signedIn']) && $_SESSION['signedIn'] === true) {
    $firstName = $_SESSION['firstName'];
    $lastName = $_SESSION['lastName'];
}

$movie = query("SELECT * FROM movies");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

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

        a {
            text-decoration: none;
            color: #fff;
        }
    </style>
</head>

<body>
    <div style="height: 8rem; width: 100%; display: flex; justify-content: space-between; align-items: center; position: absolute; top: 0; z-index: 10">
        <img src="assets/images/disney-logo-white.png" alt="" style="height: 4rem; margin-top: 2em; margin-left: 2rem" />
        <div style="display: flex; align-items: center; margin-right: 2rem;">
            <p style="margin-right: 1em; color: white;"><?php echo $firstName . ' ' . $lastName; ?></p>
            <a href="signOut.php">Sign Out</a>
        </div>
    </div>
    <div style="background-image: url('assets/images/2b5a213a4358cec157066257a87f3c5e1.png'); height: 35em; background-repeat: no-repeat; background-position: center; display: flex; justify-content: center">
        <div style="position: absolute; top: 0; right: 0; bottom: 0; left: 0; background-image: linear-gradient(to top, transparent, transparent, #474e9c); background-position: top; height: 35em"></div>
        <div style="position: absolute; top: 0; right: 0; bottom: 0; left: 0; background-image: linear-gradient(to bottom, transparent, transparent, #474e9c); background-position: bottom; height: 35em"></div>
        <div style="position: absolute; height: 20em; width: 50em; margin: 0 auto; margin-top: 10em; display: flex; flex-direction: column; justify-content: center">
            <p style="font-weight: bold; color: white; font-size: 2.5rem; text-align: center">Explore Disney's</p>
            <p style="font-weight: bold; color: white; font-size: 2.5rem; text-align: center">Enchanting Universe</p>
            <p style="font-weight: 500; color: white; font-size: 1.25rem; text-align: center; margin-top: 2em">Welcome to the magical hub where enchanting stories unfold</p>
            <button onclick="scrollToMovies()" style="font-weight: bold; font-size: 1rem; border-radius: 0.25rem; color: white; border: 2px solid white; display: inline-block; padding-left: 2rem; padding-right: 2rem; padding-top: 0.5rem; padding-bottom: 0.5rem; margin: 0 auto; margin-top: 3em">Get Started</button>
        </div>
    </div>
    <div style="height: 80em; background-color: #474e9c; display: flex; flex-direction: column">
        <div style="display: flex; flex-direction: row-reverse; margin-right: 8em">
            <div style="position: relative; width: 15%">
                <input id="searchInput" type="text" placeholder="Search" onkeyup="searchMovies()" style="
                            width: 100%;
                            padding: 10px 30px 10px 10px;
                            border: none;
                            border-bottom: 2px solid white;
                            color: #fff;
                            outline: none;
                            background-color: transparent;
                            ::placeholder {
                                color: white;
                            }
                        " />
                <div style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%); pointer-events: none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg>
                </div>
            </div>
        </div>


        <div id="movieList" style="display: flex; flex-wrap: wrap; margin-top: 4rem; padding-left: 2rem; padding-right: 2rem" id="movieContainer">
            <?php foreach ($movie as $row) : ?>
                <div class="movie" style="width: 12em; height: 22em; margin: 1.5em">
                    <a href="detail.php?id=<?= $row['id']; ?>">
                        <div style="height: 17.5em">
                            <img src="assets/upload/images/<?= $row['thumbnail']; ?>" alt="" />
                        </div>
                        <div style="display: flex; flex-direction: column">
                            <p class="movie-year" style="color: white; font-size: 0.875rem"><?= $row['year']; ?></p>
                            <p class="movie-title" style="color: white; font-weight: 500"><?= $row['title']; ?></p>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
            <!-- <div style="width: 12em; height: 22em; margin: 1.5em">
                <div style="height: 18em"><img src="Rectangle 635.png" alt="" /></div>
                <div style="display: flex; flex-direction: column">
                    <p style="color: white; font-size: 0.875rem">2016</p>
                    <p style="color: white; font-weight: 500">Moana</p>
                </div>
            </div>
            <div style="width: 12em; height: 22em; margin: 1.5em">
                <div style="height: 18em"><img src="Rectangle 636.png" alt="" /></div>
                <div style="display: flex; flex-direction: column">
                    <p style="color: white; font-size: 0.875rem">2010</p>
                    <p style="color: white; font-weight: 500">Tangled</p>
                </div>
            </div>
            <div style="width: 12em; height: 22em; margin: 1.5em">
                <div style="height: 18em"><img src="Rectangle 637.png" alt="" /></div>
                <div style="display: flex; flex-direction: column">
                    <p style="color: white; font-size: 0.875rem">2022</p>
                    <p style="color: white; font-weight: 500">Turning Red</p>
                </div>
            </div>
            <div style="width: 12em; height: 22em; margin: 1.5em">
                <div style="height: 18em"><img src="Rectangle 17.png" alt="" /></div>
                <div style="display: flex; flex-direction: column">
                    <p style="color: white; font-size: 0.875rem">2022</p>
                    <p style="color: white; font-weight: 500">Lightyear</p>
                </div>
            </div>
            <div style="width: 12em; height: 22em; margin: 1.5em">
                <div style="height: 18em"><img src="Rectangle 639.png" alt="" /></div>
                <div style="display: flex; flex-direction: column">
                    <p style="color: white; font-size: 0.875rem">2021</p>
                    <p style="color: white; font-weight: 500">Raya and the Last Dragon</p>
                </div>
            </div>
            <div style="width: 12em; height: 22em; margin: 1.5em">
                <div style="height: 18em"><img src="Rectangle 641.png" alt="" /></div>
                <div style="display: flex; flex-direction: column">
                    <p style="color: white; font-size: 0.875rem">2009</p>
                    <p style="color: white; font-weight: 500">Up</p>
                </div>
            </div>
            <div style="width: 12em; height: 22em; margin: 1.5em">
                <div style="height: 18em"><img src="Rectangle 642 (1).png" alt="" /></div>
                <div style="display: flex; flex-direction: column">
                    <p style="color: white; font-size: 0.875rem">2016</p>
                    <p style="color: white; font-weight: 500">Finding Dory</p>
                </div>
            </div>
            <div style="width: 12em; height: 22em; margin: 1.5em">
                <div style="height: 18em"><img src="Rectangle 640.png" alt="" /></div>
                <div style="display: flex; flex-direction: column">
                    <p style="color: white; font-size: 0.875rem">2012</p>
                    <p style="color: white; font-weight: 500">Brave</p>
                </div>
            </div>
            <div style="width: 12em; height: 22em; margin: 1.5em">
                <div style="height: 18em"><img src="Rectangle 643.png" alt="" /></div>
                <div style="display: flex; flex-direction: column">
                    <p style="color: white; font-size: 0.875rem">2017</p>
                    <p style="color: white; font-weight: 500">Coco</p>
                </div>
            </div> -->
        </div>
        <div style="display: flex; flex-direction: row-reverse; margin-right: 4rem">
            <p style="color: white; font-weight: bold; margin-left: 0.5rem; margin-right: 0.5rem">Next &gt</p>
            <p style="color: white; font-weight: bold; margin-left: 0.5rem; margin-right: 0.5rem">7</p>
            <p style="color: white; font-weight: bold; margin-left: 0.5rem; margin-right: 0.5rem">out of</p>
            <p style="font-weight: bold; margin-left: 0.5rem; margin-right: 0.5rem; background-color: white; color: #474e9c; padding-left: 0.5rem; padding-right: 0.5rem; border-radius: 0.25rem">2</p>
            <p style="color: white; font-weight: bold; margin-left: 0.5rem; margin-right: 0.5rem">&lt Previous</p>
        </div>
    </div>
    <footer style="height: 75px; display: flex; align-items:center; justify-content:flex-start;">
        <p style="margin-left: 50px; font-weight: bold;">&copy; 2023, Disney</p>
    </footer>

    <script>
        function searchMovies() {
            let input, filter, cards, title, i;
            input = document.getElementById('searchInput');
            filter = input.value.toUpperCase();
            cards = document.querySelectorAll('#movieList .movie');

            for (i = 0; i < cards.length; i++) {
                title = cards[i].querySelector('.movie-title');
                if (title.textContent.toUpperCase().indexOf(filter) > -1) {
                    cards[i].style.display = "";
                } else {
                    cards[i].style.display = "none";
                }
            }
        }

        function scrollToMovies() {
            const movieList = document.getElementById('movieList');
            movieList.scrollIntoView({
                behavior: 'smooth'
            });
        }
    </script>
</body>

</html>