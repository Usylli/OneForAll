<?php
interface AuthorInterface {
    public function createNew($username);
    public function getAuthorName();
    public function getEmail();
    public function getPassword();
    public function login($username, $password);
    public function register($username, $email, $password, $password2);  
}
?>