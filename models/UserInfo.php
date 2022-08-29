<?php
require_once '../controllers/dbConnect.php';

class UserInfo {
    protected $username;

    public function __construct($username) {
        $this->username = $username;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getEmail() {
        $email = $GLOBALS['db']->query("SELECT email FROM users WHERE username LIKE \"" . $this->username . "\"")->fetch()['email'] ?? '';
        return $email;
    }
    
    public function getRole() {
        $role = $GLOBALS['db']->query("SELECT role FROM users WHERE username LIKE \"" . $this->username . "\"")->fetch()['role'] ?? '';
        return $role;
    }
    
    public function setEmail($email) {
        // Setting an user's email in database equal to given argument $email
        $GLOBALS['db']->prepare("UPDATE users SET email = ? WHERE username LIKE \"" . $this->username . "\"")->execute($email);
    }
    
    public function setRole($role) {
        // Setting an user's role in database equal to given argument $role
        $GLOBALS['db']->prepare("UPDATE users SET role = ? WHERE username LIKE \"" . $this->username . "\"")->execute($role);
    }
}

?>