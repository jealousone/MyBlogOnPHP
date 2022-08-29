<?php
session_start();
require_once '../controllers/signupFormController.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = validateForm();
    if ($errors) {
        showForm($_POST, $errors);
    }
    else {
        processform();
    }
}
else {
    showForm();
}
?>