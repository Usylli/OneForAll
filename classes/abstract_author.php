<?php
require_once('interface_author.php');
abstract class AuthorAbstract implements AuthorInterface{
    protected $author_id;
    protected $author_name;
    protected $author_password;
    protected $db;
    protected $email;

    abstract public function createNew($username);
    abstract public function login($username, $password);
    abstract public function register($username, $email, $password, $password2);  

    public function getAuthorName(){
        return $this->author_name;
    }

    public function getEmail(){
        return $this->email;
    }
    public function getPassword(){
        return $this->author_password;
    }
}
?>