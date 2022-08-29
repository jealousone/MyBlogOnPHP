<?php
session_start();
unset($_SESSION['username']);
header('Location: http://' . $_SERVER['HTTP_HOST']);
?>