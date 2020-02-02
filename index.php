<?php
// AUTH CONTROLLER FOR BACKEND
require_once ('./controller/authController.php');
//Count visitors
$page_id = 1;
$visitor_ip = $_SERVER['REMOTE_ADDR']; // stores IP address of visitor in variable
add_view($conn, $visitor_ip, $page_id);
//components
require ('./components/menu.php');
require ('./components/header.php');
require ('./components/main.php');
require ('./components/footer.php');