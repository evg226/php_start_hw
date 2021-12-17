<?php
session_start();
require "connect.php";

if($_POST['signout']){
    unset($_SESSION['userId']);
    session_destroy();
    header("location: ../signup.php");
};
$signUp= $_GET['signup'];
$firstName=(string)htmlspecialchars(strip_tags($_POST['firstName']));
$lastName =(string)htmlspecialchars(strip_tags($_POST['lastName']));
$email=(string)htmlspecialchars(strip_tags($_POST['email']));
$password=(string)htmlspecialchars(strip_tags($_POST['password']));

function setSession($id,$login,$name,$surname){
    $_SESSION['userId']=$id;
    $_SESSION['login']=$login;
    $_SESSION['name']=$name;
    $_SESSION['surname']=$surname;
}

if (!($email&&$password)) die("You don't type email or password");

if($signUp){
    $sql="SELECT * from users WHERE login='$email'";
    $res=mysqli_query($connection, $sql);
    if (mysqli_num_rows($res)!=0) {
        header("location: ../signup.php?signup=1");
        die ("Login $email already is used");
    }
    $sql="insert into users (login,name,surname,password) values ('$email','$firstName','$lastName','$password')";
    mysqli_query($connection, $sql);
    $userId=mysqli_insert_id($connection);
    if ($userId) setSession($userId,$email,$firstName,$lastName);
} else {
    $sql="SELECT * from users WHERE login='$email' and password='$password'";
    $res=mysqli_query($connection, $sql);
    $data=mysqli_fetch_assoc($res);
    if ($data) {
        setSession($data['id'],$data['login'],$data['name'],$data['surname']);
    } else {
        echo("Your email or password is incorrect");
    }
}
header("location: ../signup.php");
