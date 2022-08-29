<?php
session_start();
require_once '../controllers/postController.php';
$postValues = getSpecificPost();
$randomPosts = getPosts('RANDOM()', 3);
require_once '../views/post_html.php';
?>