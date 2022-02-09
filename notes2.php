<?php

if ($_GET['sl']) {
    $db = mysqli_connect('localhost', 'root', '', 'notes') or die("Could not connect to Database");
    $querry = "DELETE FROM note_s WHERE sl_no = ".$_GET['sl'];
    $result = mysqli_query($db, $querry) or die("Could not execute querry");
    if ($result) {
        header('location:notes.php');
    }
}

?>