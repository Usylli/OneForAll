<?php 
require_once('abstract_author.php');

class Author extends AuthorAbstract{
    public function __construct() {
        $this->db = mysqli_connect("localhost", 'root', '','blog');
    }

    public function createNew($username){
        $user_check_query = "SELECT * FROM authors WHERE author_name='$username'";
        $result = mysqli_query($this->db, $user_check_query);
        $row = mysqli_fetch_assoc($result);
        $this->author_name = $row['author_name'];
        $this->author_password = $row['password'];
        $this->email = $row['email'];
        $_SESSION['user_name'] = $this->author_name;
    }  

    public function login($username, $password){
        $errors = array(); 
  
        if (empty($username)) {
            array_push($errors, "Username is required");
        }
        if (empty($password)) {
            array_push($errors, "Password is required");
        }
    
        if (count($errors) == 0) {
            $query = "SELECT * FROM authors WHERE author_name='$username' AND password='$password'";
            $results = mysqli_query($this->db, $query);
            if (mysqli_num_rows($results) == 1) {
            session_start();
            $_SESSION['user_name'] = $username;
            $_SESSION['success'] = "You are now logged in";
            }else {
                array_push($errors, "Wrong username/password combination");
                if (count($errors) > 0) : 
                    foreach ($errors as $error) : 
                        echo "<script>";
                        echo "alert('$error');";
                        echo "</script>";
                    endforeach;
                endif;
            }
        } else{
            if (count($errors) > 0) : 
                foreach ($errors as $error) : 
                    echo "<script>";
                    echo "alert('$error');";
                    echo "</script>";
                endforeach;
            endif;
        }
        header('refresh:1;url=/final_project/index.php');
    }

    public function register($username, $email, $password, $password2){
        $errors = array(); 
        $this->author_name = $username;
        $this->email = $email;
        $this->author_password = $password;
        // form validation: ensure that the form is correctly filled ...
        // by adding (array_push()) corresponding error unto $errors array
        if (empty($this->author_name)) { array_push($errors, "Username is required"); }
        if (empty($this->email)) { array_push($errors, "Email is required"); }
        if (empty($this->author_password)) { array_push($errors, "Password is required"); }
        if ($password != $password2) {
            array_push($errors, "The two passwords do not match");
        }

        // first check the database to make sure 
        // a user does not already exist with the same username and/or email
        $user_check_query = "SELECT * FROM authors WHERE author_name='$this->author_name' OR email='$this->email' LIMIT 1";
        $result = mysqli_query($this->db, $user_check_query);
        $user = mysqli_fetch_assoc($result);
        
        if ($user) { // if user exists
            if ($user['author_name'] === $this->author_name) {
            array_push($errors, "Username already exists");
            }

            if ($user['email'] === $this->email) {
            array_push($errors, "email already exists");
            }
        }

        // Finally, register user if there are no errors in the form
        if (count($errors) == 0) {
            $query = "INSERT INTO authors (author_name, password, email) 
                    VALUES('$this->author_name', '$this->author_password', '$this->email')";
            mysqli_query($this->db, $query);
            session_start();
            $_SESSION['user_name'] = $this->author_name;
            $_SESSION['success'] = "You are now logged in";
        } else{
            if (count($errors) > 0) : 
                foreach ($errors as $error) : 
                    echo "<script>";
                    echo "alert('$error');";
                    echo "</script>";
                endforeach;
            endif;
        }
        header('refresh:1;url=\final_project\index.php');
    }

}
?>