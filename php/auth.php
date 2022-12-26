<?php 
session_start();
 if (isset($_POST['username']) && isset($_POST['password'])) {
    include "../assets/db/config.php";
    include "func-validation.php";

     $username =$_POST['username'];
     $password =$_POST['password'];

     $text= "Username";
     $location= "../login.php";
     $ms= "error";
     is_empty($username,$text,$location, $ms, "");
     
     $text= "Password";
     $location= "../login.php";
     $ms= "error";
     is_empty($password,$text,$location, $ms, "");

     $sql = "SELECT * FROM admin WHERE username=?";
     $stmt =$conn->prepare($sql);
     $stmt->execute([$username]);
     if ($stmt->rowCount() === 1) {
        $user = $stmt->fetch();

        $user_id = $user['id'];
        $user_username = $user['username'];
        $user_password = $user['password'];
        if ($username === $user_username && $password === $user_password) {
           
            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_username'] = $user_username;
            header("Location: ../?page=admin");
           
        }else {
            $em = "Incorrect User name or Password2";
            header("Location: ../login.php?error=$em");
        }
     }   else {
        $em = "Incorrect User name or Password1";
        header("Location: ../login.php?error=$em");
     }

 }else {
    header("Location: ../login.php");
 }


?>