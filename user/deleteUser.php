<?php
include "../inc/functions.php";

$id = $_GET['id'];

if(deleteUser($id) > 0) {
    echo "
        <script>
        alert('User has been successfully deleted!');
        document.location.href = '../admin.php';
        </script>
        ";
} else {
    echo "
        <script>
        alert('Failed to delete user.');
        </script>
        ";
}