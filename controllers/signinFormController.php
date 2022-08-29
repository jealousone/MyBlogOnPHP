<?php
require_once 'dbConnect.php';
require_once '../models/User.php';

function validateForm($errors = []) {
    global $db;
    foreach ($_POST as $POSTKey => $POSTValue) {
        $_POST["$POSTKey"] = trim($POSTValue);
    }
    $login = $_POST['login'];
    $password = $_POST['password'];
    $isUserExists = $db->query("SELECT username FROM users WHERE username LIKE \"$login\" OR email = \"$login\"")->fetch();
    $realPassword = $db->query("SELECT password FROM users WHERE username LIKE \"$login\" OR email = \"$login\"")->fetch()['password'] ?? '';
    if (! ($isUserExists && password_verify($password, $realPassword))) {
        $errors[] = 'Entered login or password is invalid';
    }
    if (! ($login && $password)) {
        $errors[] = 'Fields cannot be empty';
    }
    return $errors;
}

function showForm($defaults = [], $errors = []) {
    include '../views/signin_html.php';
}

function processForm() {
    if (strpos($_POST['login'], '@') !== false) {
        $user = new User($_POST['password'], null, $_POST['login']);
    }
    else {
        $user = new User($_POST['password'], $_POST['login']);
    }
    $user->login();
}
?>