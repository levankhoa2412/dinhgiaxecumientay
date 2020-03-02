<?php
session_start();
require_once('admin/controllers/dbConnect.php');
if (isset($_GET['controller'])) $controller = $_GET['controller'];
else $controller = 'home';
if (isset($_GET['action'])) $action = $_GET['action'];
else $action = 'index';
if (isset($_SESSION['user'])) {
    $file = 'admin/controllers/' . $controller . '/' . $action . '.php';
    if (file_exists($file)) {
        require($file);
    } else {
        show_404();
    }
}else{
    require('admin/controllers/home/login.php');
}




