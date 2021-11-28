<?php
session_start();
@require_once "connectDB.php";

if (''==($_POST['email'])) {
    header("Location: ../loginpage.php");
} else {
    $email=$_POST['email'];
    $password=$_POST['password'];
    $_SESSION['user']=$_POST;

    $query="SELECT email, password, firstname, lastname, birthdate, phone FROM user WHERE 
    email = :email AND password = :password";
    //preparation PDO
    $statement = $pdo->prepare($query);
    $statement->bindValue(':email', $email, \PDO::PARAM_STR);
    $statement->bindValue(':password', $password, \PDO::PARAM_STR);
    $statement->execute();
    //end of preparation
    $user = $statement->fetchAll();
    if (!empty($user)) {
        $_SESSION['user']=$user[0];
        header("Location: ../index.php");
    } else {
        header("Location: ../loginpage.php");
    }
}
