<?php
require_once 'dbConnect.php';

function getPosts($order, $limit) {
    global $db;
    return $db->query("SELECT * FROM posts ORDER BY $order DESC LIMIT $limit")->fetchAll();
}

function getAllPosts($order) {
    global $db;
    return $db->query("SELECT * FROM posts ORDER BY $order DESC")->fetchAll();
}

function getSpecificPost() {
    global $db;
    return $db->query("SELECT * FROM posts WHERE id = \"" . ($_GET['id'] ?? '') . "\"")->fetch();
}
?>