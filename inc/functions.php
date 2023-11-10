<?php
$host = 'localhost';
$username = 'root';
$password = '';
$db = 'db_disney';

$conn = mysqli_connect($host, $username, $password, $db) or die ("Not Connected Yet!");

function signUp($data) {
    global $conn;

    $firstName = $data['firstName'];
    $lastName = $data['lastName'];
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

?>