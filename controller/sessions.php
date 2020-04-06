<?php



function removeSession()
{
    unset($_SESSION['pageContent']);
    unset($_SESSION['exhibition']);
//    echo 'session deleted!';
}

removeSession();