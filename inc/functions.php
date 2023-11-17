<?php
$host = 'localhost';
$username = 'root';
$password = '';
$db = 'db_disney';

$conn = mysqli_connect($host, $username, $password, $db) or die ("Not Connected Yet!");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function signUp($data) {
    global $conn;

    $firstName = ucfirst($data['firstName']);
    $lastName = ucfirst($data['lastName']);
    $email = $data['email'];
    $password = mysqli_real_escape_string($conn, $data['password']);
    $confPassword = mysqli_real_escape_string($conn, $data['confPassword']);
    $role = "User";

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");

    if(mysqli_fetch_assoc($result)) {
        echo "
            <script>
                alert('This email has already been used!');
            </script>
        ";
        return false;
    }

    if($password !== $confPassword) {
        echo "
            <script>
                alert('Password and Confirm Password Does Not Matched!');
             </script>
        ";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO users (firstName, lastName, email, password, role) VALUES ('$firstName', '$lastName', '$email', '$password', '$role')");
    
    return mysqli_affected_rows($conn);
}

function editUser($data) {
    global $conn;

    $id = $data['id'];
    $email = $data['email'];
    $firstName = $data['firstName'];
    $lastName = $data['lastName'];

    $query = "UPDATE users SET email = '$email', firstName = '$firstName', lastName = '$lastName' WHERE id = '$id'";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function deleteUser($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM users WHERE id = '$id'");

    return mysqli_affected_rows($conn);
}

function addMovie($data) {
    global $conn;

    $title = $data['title'];
    $synopsis = mysqli_real_escape_string($conn, $data['synopsis']);
    $year = $data['year'];
    $director = $data['director'];

    $thumbnail = uploadThumbnail();
    if(!$thumbnail) {
        return false;
    }

    $banner = uploadBanner();
    if(!$banner) {
        return false;
    }

    $query = "INSERT INTO movies (title, synopsis, year, director, thumbnail, banner) VALUES ('$title', '$synopsis', '$year', '$director', '$thumbnail', '$banner')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function uploadThumbnail() {
    $fileName = $_FILES['thumbnail']['name'];
    $fileSize = $_FILES['thumbnail']['size'];
    $error = $_FILES['thumbnail']['error'];
    $tmpName = $_FILES['thumbnail']['tmp_name'];

    if($error !== 0) {
        echo "
            <script>
                alert('Error uploading image');
            </script>
        ";
        return false;
    }

    $extensionValidPict = ['jpg', 'jpeg', 'png'];
    $extPict = pathinfo($fileName, PATHINFO_EXTENSION);
    $extPictFix = strtolower($extPict);

    if(!in_array($extPictFix, $extensionValidPict)) {
        echo "
            <script>
                alert('Invalid image format. Please upload a JPG, JPEG, or PNG file.');
            </script>
        ";
        return false;
    }

    if($fileSize > 10000000) {
        echo "
            <script>
                alert('The image its to large.');
            </script>
        ";
        return false;
    }

    $newFileName = uniqid();
    $newFileName .= '.';
    $newFileName .= $extPictFix;

    move_uploaded_file($tmpName, '../assets/upload/images/' . $newFileName);

    return $newFileName;
}

function uploadBanner() {
    $fileName = $_FILES['banner']['name'];
    $fileSize = $_FILES['banner']['size'];
    $error = $_FILES['banner']['error'];
    $tmpName = $_FILES['banner']['tmp_name'];

    if($error !== 0) {
        echo "
            <script>
                alert('Error uploading image');
            </script>
        ";
        return false;
    }

    $extensionValidPict = ['jpg', 'jpeg', 'png'];
    $extPict = pathinfo($fileName, PATHINFO_EXTENSION);
    $extPictFix = strtolower($extPict);

    if(!in_array($extPictFix, $extensionValidPict)) {
        echo "
            <script>
                alert('Invalid image format. Please upload a JPG, JPEG, or PNG file.');
            </script>
        ";
        return false;
    }

    if($fileSize > 10000000) {
        echo "
            <script>
                alert('The image its to large.');
            </script>
        ";
        return false;
    }

    $newFileName = uniqid();
    $newFileName .= '.';
    $newFileName .= $extPictFix;

    move_uploaded_file($tmpName, '../assets/upload/images/' . $newFileName);

    return $newFileName;
}

function editMovie($data) {
    global $conn;

    $id = $data['id'];
    $title = $data['title'];
    $synopsis = $data['synopsis'];
    $year = $data['year'];
    $director = $data['director'];

    if ($_FILES['thumbnail']['error'] === 0) {
        $thumbnail = uploadThumbnail();
        if (!$thumbnail) {
            return false;
        }
    } else {
        $result = query("SELECT thumbnail FROM movies WHERE id = '$id'");
        $thumbnail = $result[0]['thumbnail'];
    }

    if ($_FILES['banner']['error'] === 0) {
        $banner = uploadBanner();
        if (!$banner) {
            return false;
        }
    } else {
        $result = query("SELECT banner FROM movies WHERE id = '$id'");
        $banner = $result[0]['banner'];
    }

    $query = "UPDATE movies SET title = '$title', synopsis = '$synopsis', year = '$year', director = '$director', thumbnail = '$thumbnail', banner = '$banner' WHERE id = '$id'";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function deleteMovie($id) {
    global $conn;
    $id = mysqli_real_escape_string($conn, $id);

    $file = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM movies WHERE id='$id'"));

    unlink('../assets/upload/images/' . $file["thumbnail"]);
    unlink('../assets/upload/images/' . $file["banner"]);

    $delete = "DELETE FROM movies WHERE id = $id";
    mysqli_query($conn, $delete);

    return mysqli_affected_rows($conn);
}

function addCharacter($data) {
    global $conn;

    $name = $data['name'];
    $movie = $data['movie'];
    
    $picture = uploadPicture();
    if(!$picture) {
        return false;
    }

    $query = "INSERT INTO characters (name, picture, id_movies) VALUES  ('$name', '$picture' , '$movie')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function uploadPicture() {
    $fileName = $_FILES['picture']['name'];
    $fileSize = $_FILES['picture']['size'];
    $error = $_FILES['picture']['error'];
    $tmpName = $_FILES['picture']['tmp_name'];

    if($error !== 0) {
        echo "
            <script>
                alert('Error uploading image');
            </script>
        ";
        return false;
    }

    $extensionValidPict = ['jpg', 'jpeg', 'png'];
    $extPict = pathinfo($fileName, PATHINFO_EXTENSION);
    $extPictFix = strtolower($extPict);

    if(!in_array($extPictFix, $extensionValidPict)) {
        echo "
            <script>
                alert('Invalid image format. Please upload a JPG, JPEG, or PNG file.');
            </script>
        ";
        return false;
    }

    if($fileSize > 10000000) {
        echo "
            <script>
                alert('The image its to large.');
            </script>
        ";
        return false;
    }

    $newFileName = uniqid();
    $newFileName .= '.';
    $newFileName .= $extPictFix;

    move_uploaded_file($tmpName, '../assets/upload/images/' . $newFileName);

    return $newFileName;
}


function editCharacter($data) {
    global $conn;

    $id = $data['id'];
    $name = $data['name'];
    $movie = $data['movie'];

    if ($_FILES['picture']['error'] === 0) {
        $picture = uploadPicture();
        if (!$picture) {
            return false;
        }
    } else {
        $result = query("SELECT picture FROM characters WHERE id = '$id'");
        $picture = $result[0]['picture'];
    }

    $query = "UPDATE characters SET name = '$name', id_movies = $movie, picture = '$picture' WHERE id = '$id'";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function deleteCharacter($id) {
    global $conn;

    $id = mysqli_real_escape_string($conn, $id);

    $file = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM characters WHERE id='$id'"));

    unlink('../assets/upload/images/' . $file["picture"]);

    $delete = "DELETE FROM characters WHERE id = $id";
    mysqli_query($conn, $delete);

    return mysqli_affected_rows($conn);
}
?>