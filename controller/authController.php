<?php
// AUTH CONTROLLER FOR BACKEND
require_once ('./config/db.php');
session_start();
// last request was more than 30 minutes ago
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    $id = $_SESSION['id'];
    $time = time();
    $updateQuery = mysqli_query($conn,"UPDATE `admin` SET `lastAction` = '$time' WHERE `lastAction` = NOW() - 1800");
    session_unset();     // unset $_SESSION variable for the run-time
    session_destroy();   // destroy session data in storage
    header("Location: ?login=0&time=inactive");
    exit();
}$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp

//admin login
// initializing variables
$errors =  array();
$username= "";

// CODE IF CLICKED ON LOGIN
if (isset($_POST['login-btn'])) {
    $username = $_POST['username'];
    $password = sha1($_POST['password']);
    if (empty($username)) {
        $errors['empty_username'] = "Enter your admin username";
        header("Location: ?login=0&username_error=".$errors['empty_username']."&username=".$username);
    }else if (empty($password)) {
        $errors['empty_password'] = "Enter the correct admin password";
        header("Location: ?login=0&password_error=".$errors['empty_password']."&username=".$username);
    }
    if (count($errors) == 0) {
        $sql = "SELECT * FROM admin WHERE username = ? ";
        if($query = $conn->prepare($sql)) { // assuming $mysqli is the connection
            $query->bind_param('s', $username);
            $query->execute();
            // any additional code you need would go here.
            $result = $query->get_result();
            $user = $result->fetch_assoc();
            $query->close();
            if ($password === $user['password'] || password_verify($_POST['password'], $user['password'])) {
                $id = $user['id'];
                if ($user[`lastAction`] == 0) {
                    $updateQuery = mysqli_query($conn, "UPDATE `admin` SET lastAction = NOW() WHERE `id` = '$id'");
                } else {
                    $updateQuery = mysqli_query($conn, "UPDATE `admin` SET lastAction = NOW() WHERE `id` = '$id'");
                }
                $_SESSION['admin_session'] = TRUE;
                $_SESSION['id'] = $user['id'];
                $_SESSION['username'] = $username;
                //SESSION VARIABLE WITH NULL VALUE
                // flash messages
                $_SESSION['successlogin'] = "you're logged in.";
                $_SESSION['loginlog'] = "you logged in at " . date("h:i a");
                header('location: ?login=true');
            } else {
                $errors['no_account'] = "You do not have access to this portal!";
                header("Location: ?login=0&no_account=" . $errors['no_account'] . "&username=" . $username);
            }
        } else {
            $error = $conn->errno . ' ' . $conn->error;
            echo $error; // 1054 Unknown column 'username' in 'field list'
        }
    }
}

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

if (isset($_GET['logout'])) {
    $id = $_SESSION['id'];
    $time = time();
    $updateQuery = mysqli_query($conn,"UPDATE `admin` SET lastAction = '$time' WHERE `id` = '$id'");
    session_destroy();
    $_SESSION['admin_session'] = FALSE;
    unset($_SESSION['id']);
    unset($_SESSION['username']);
    // UNSET SESSION VAIRABLE WITH NULL
    header('location: admin?signout=0');
    exit();
}