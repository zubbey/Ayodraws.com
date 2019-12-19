<?php
// AUTH CONTROLLER FOR BACKEND
require_once ('./config/db.php');
session_start();

if ($_GET['slider_image_link']) {
    $_SESSION['image'] = $_GET['slider_image_link'];
}
if (isset($_POST['complete'])){
    $image = $_SESSION['image'];
    $image_name = mysqli_real_escape_string($conn, $_POST['image-name']);
    $upload_table = $_POST['upload-option'];
    $date = date("Y-m-d");

    if ($upload_table === "painting"){
        $category = $_POST['category'];
        $query = "INSERT INTO $upload_table (image_link, image_name, category, date_uploaded) VALUES('$image', '$image_name', '$category', '$date')";
    } else{
        $query = "INSERT INTO $upload_table (image_link, image_name, date_uploaded) VALUES('$image', '$image_name', '$date')";
    }
    $result = mysqli_query($conn, $query);
    if($result){
        header("Location: ?success=true&update=image");
        unset($_SESSION['image']);
        exit();
    } else {
        header("Location: ?error=noDatabase&slide_image_link=".$image);
        exit();
    }
}

//EDIT UPLOADED IMAGES

if (isset($_GET['update_image_painting'])) {
    $id = $_GET['imageid'];
    $table = $_GET['table'];
    $image_name = $_GET['image_name'];
    $category = $_GET['category'];

    $updateQuery = mysqli_query($conn, "UPDATE $table SET image_name = '$image_name', category = '$category' WHERE id = '$id'");
    if ($updateQuery) {
        header('location: ?edit=true&table=painting&success=imageUpdated');
        exit();
    } else {
        header('location: ?edit=true&table=painting&error=notedited');
        exit();
    }
}

if (isset($_GET['update_image_others'])){
    $id = $_GET['imageid'];
    $table = $_GET['table'];
    $image_name = $_GET['image_name'];

    $updateQuery = mysqli_query($conn, "UPDATE $table SET image_name = '$image_name' WHERE id = '$id'");
    if ($updateQuery) {
        header('location: ?edit=true&table='. $table .'&success=imageUpdated');
        exit();
    } else {
        header('location: ?edit=true&table='. $table .'&error=notedited');
        exit();
    }
}

if ($_GET['deleteId']) {
    $id = $_GET['deleteId'];
    $table = $_GET['table'];

    $deleteQuery = "DELETE FROM $table WHERE id = '$id'";
    if (mysqli_query($conn, $deleteQuery)){
        mysqli_query($conn,"ALTER TABLE $table AUTO_INCREMENT = 0");
        header('location: ?success=imageDeleted');
        exit();
    } else {
        header('location: ?error=notdeleted');
        die($deleteQuery);
    }
}

if (isset($_POST['contact-btn'])){
    echo 'data received!';
}