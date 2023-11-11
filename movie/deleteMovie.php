<?php
include "../inc/functions.php";

$id = $_GET['id'];

if(deleteMovie($id) > 0) {
    echo "
        <script>
        alert('The movie has been successfully deleted!');
        document.location.href = '../admin.php';
        </script>
        ";
} else {
    echo "
        <script>
        alert('Failed to delete the movie.');
        </script>
        ";
}