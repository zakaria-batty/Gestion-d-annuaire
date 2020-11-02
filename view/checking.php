<?php
include('../database/db.php');
// delete
if (isset($_POST['delete'])) {
    $id = $_POST['delete'];
    $query = "DELETE FROM `informations` WHERE `id` = '$id'";
    $run = mysqli_query($db, $query);
    if ($run) {
        header('location:home.php?message=delete');
    }
}

// delete all
if (isset($_POST['deleteall'])) {
    // $id = $_POST['deleteall'];
    $query = "DELETE FROM `informations`";
    $run = mysqli_query($db, $query);
    if ($run) {
        header('location:home.php');
    }
}

//commentaire
if (isset($_POST['envoyer'])) {
    $id = $_POST['id'];
    $commentaire = $_POST['commentaire'];
    $query = "UPDATE `informations` SET `commentaire` = '$commentaire' WHERE `id` = $id";
    $run = mysqli_query($db, $query);
    if ($run) {
        header('location:home.php?message=commentaire');
    } else {
        header('location:home.php?message=err');
    }
}
