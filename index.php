<?php
session_start();
require('includes/config.php');
require('includes/utils.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 

$direction_object = getRedirection(dbConnect(), substr($_SERVER['REQUEST_URI'], 1))[0];

if($direction_object['waiter'] == 1) {
    echo buildWaiter();
    echo ('<script>setTimeout(function(){window.location.href = "' . urldecode($direction_object['redirect_to']) . '";}, 5000);</script>');
}else{
    header('Location: ' . urldecode($direction_object['redirect_to']));
}
