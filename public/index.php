<?php
session_start();
require_once '../controllers/postController.php';
$posts = getPosts('id', 6);
require_once '../views/index_html.php';
?>