<?php
require_once '../models/Post.php';
require_once 'dbConnect.php';
date_default_timezone_set('Etc/GMT+6');
function isLogged() {
    if (! (isset($_SESSION['username']))) {
        header('Location: http://' . $_SERVER['HTTP_HOST'] . '/signin.php');
        exit();
    }
}

function addPost() {
    $Post = new Post($_POST['title'], $_POST['image_url'], $_POST['text'], $_POST['tags']);
    $Post->publish();
}

function giveAdmin() {
    global $db;
    $db->prepare("UPDATE users SET role = \"admin\" WHERE username LIKE ?")->execute([$_POST['newAdminsUsername']]);
}
?>