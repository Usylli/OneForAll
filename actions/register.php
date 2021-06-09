<?php
require_once('C:\xampp\htdocs\final_project\classes\author.php');
$author = new Author();
// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'blog');

if (isset($_POST['signup'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $password2 = mysqli_real_escape_string($db, $_POST['password2']);
  
  $author->register($username, $email, $password, $password2);
}
?>