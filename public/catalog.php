<?php
require_once '../controllers/catalogController.php';
require_once '../controllers/postController.php';

$allPosts = getAllPosts('id', 'COUNT(*)');

require_once '../views/catalog_html.php';
?>