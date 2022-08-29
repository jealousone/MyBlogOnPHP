<?php
require_once 'dbConnect.php';
require_once '../models/User.php';
function validateForm($errors = []) {
    global $db;
    foreach ($_POST as $POSTKey => $POSTValue) {
        $_POST["$POSTKey"] = trim($POSTValue);
    }
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $isUsernameExists = $db->query("SELECT username FROM users WHERE username LIKE \"$username\" OR email = \"$email\"")->fetch();
    $isEmailExists = $db->query("SELECT username FROM users WHERE username LIKE \"$email\"")->fetch();
    if ($isUsernameExists) {
        $errors[] = 'Entered username has already been taken';
    }
    if ($isEmailExists) {
        $errors[] = 'Entered email has already been taken';
    }
    if (! (strlen($email) >= 5 && strpos($email, '@') !== false)) {
        $errors[] = 'Invalid email';
    }
    if (! (isset($username) && isset($password) && isset($_POST['repeat-password']))) {
        $errors[] = 'Fields cannot be empty';
    }
    if (! (strlen($username) >= 3 && strlen($username) <= 16)) {
        $errors[] = 'Username length must be between 3 and 16 characters';
    }
    if (! (strlen($password) >= 8 && (strlen($password) <= 16))) {
        $errors[] = 'Password length must be between 8 and 16 characters';
    }
    if (is_numeric($username)) {
        $errors[] = 'Username must include letters';
    }
    if ($password != $_POST['repeat-password']) {
        $errors[] = 'Passwords is do not match';
    }
    return $errors;
}

function showForm($defaults = [], $errors = []) {
    include '../Views/signup_html.php';
}

function processForm() {
    $user = new User($_POST['password'], $_POST['username'], $_POST['email']);
    $user->register();
}
?>