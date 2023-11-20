<?php
include "../inc/functions.php";

$id = $_GET['id'];

if(deleteCharacter($id) > 0) {
    echo "
        <script>
        alert('The caster has been successfully deleted!');
        document.location.href = '../adminCharacter.php';
        </script>
        ";
} else {
    echo "
        <script>
        alert('Failed to delete the caster.');
        </script>
        ";
}