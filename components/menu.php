<?php
//Store subscribers Email
if (isset($_GET['emailAddress'])){
    $email = mysqli_real_escape_string($conn, $_GET['emailAddress']);
    $subscriber_ip = $_SERVER['REMOTE_ADDR']; // stores IP address of visitor in variable
    subcribe_email($conn, $email, $subscriber_ip);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <!-- Metadata -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="assets/images/ico/favicon.png" />
    <!-- CSS Plugins -->
    <link rel="stylesheet" href="assets/css/plugins.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/brands.css">
    <link rel="stylesheet" href="assets/css/solid.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" integrity="sha384-KA6wR/X5RY4zFAHpv/CnoG2UW1uogYfdnP67Uv7eULvTveboZJg0qUpmJZb5VqzN" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/css/sweetalert.css">
    <!-- Custom CSS File -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/share.css" />

    <!--for custom and Imgur-->
    <link href="./css/style.css" rel="stylesheet" media="screen">
    <link href="./css/mobile-style.css" rel="stylesheet" media="screen">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="css/custom.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.min.css">
</head>
<body>
<div class="ms-main-container">
    <div class="container-xl">
        <nav class="navbar navbar-expand-md navbar-light bg-transparent main-nav mx-0 px-0 mb-5">
            <div class="container-xl p-0">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse w-100">
                    <ul class="nav navbar-nav w-100">
                        <li class="nav-item home">
                            <a class="nav-link" href="/">HOME</a>
                        </li>
                        <li class="nav-item paintings" id="paintingNav">
                            <a class="nav-link" href="paintings">PAINTINGS</a>
                        </li>
                        <li class="nav-item shows">
                            <a class="nav-link" href="shows">EXHIBITIONS</a>
                        </li>
                    </ul>
                </div>
                <a class="navbar-brand order-first order-md-0 mx-0" href="/"><img src="logo-dark.png" alt="logo" height="20"></a>
                <div class="collapse navbar-collapse w-100">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="?subscribeEmail=true">SUBSCRIBE</a>
                        </li>
                        <li class="nav-item about">
                            <a class="nav-link " href="about">ABOUT</a>
                        </li>
                        <li class="nav-item contact">
                            <a class="nav-link" href="contact">CONTACT</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
