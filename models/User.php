<?php
require_once '../controllers/dbConnect.php';

class User {
    protected $username;
    protected $password;
    protected $email;

    public function __construct($password, $username=null, $email=null) {
        if ($username && (! $email)) {
            $email = $GLOBALS['db']->query("SELECT email FROM users WHERE username LIKE \"$username\"")->fetch()['email'];
        }
        elseif ($email && (! $username)) {
            $username = $GLOBALS['db']->query("SELECT username FROM users WHERE email = \"$email\"")->fetch()['username'];
        }
        $correctCaseUsername = $GLOBALS['db']->query("SELECT username FROM users WHERE username LIKE \"$username\"")->fetch();
        if ($correctCaseUsername) {
            $this->username = $correctCaseUsername['username'];
        }
        else {
            $this->username = $username;
        }
        $this->password = $password;
        $this->email = $email;
    }

    public function login() {
        $_SESSION['username'] = $this->username;
        header('Location: http://' . $_SERVER['HTTP_HOST']);
        exit();
    }

    public function register() {
        $userAdder = $GLOBALS['db']->prepare("INSERT INTO users (username, password, email, role) VALUES (?, ?, ?, ?)");
        $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);
        $userAdder->execute([$this->username, $hashedPassword, $this->email, 'user']);
        $this->login();
    }
}
?>