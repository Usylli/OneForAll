<?php
require_once('C:\xampp\htdocs\final_project\classes\author.php');
$author = new Author();
$db = mysqli_connect('localhost', 'root', '', 'blog');
if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $author->login($username, $password);
}
  
?>