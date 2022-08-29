<?php
session_start();
require_once '../controllers/adminController.php';
require_once '../models/UserInfo.php';

isLogged();
$userInfo = new UserInfo($_SESSION['username']);
if ($userInfo->getRole() == 'admin') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (($_POST['action'] ?? '') == 'giveAdmin') {
            giveAdmin();
        }
        elseif (($_POST['action'] ?? '') == 'addPost') {
            addPost();
        }
    }
    else {
        require_once '../views/admin_html.php';
    }
}
else {
    exit('Access denied: not enough permissions');
}
?>