<?php

require "connect.php";
    $action=(string)htmlspecialchars(strip_tags($_GET['action']));
    $id=(int)htmlspecialchars(strip_tags($_GET['id']));
    $name=(string)htmlspecialchars(strip_tags($_POST['userName']));
    $email=(string)htmlspecialchars(strip_tags($_POST['email']));
    $message=(string)htmlspecialchars(strip_tags($_POST['message']));
    $idPost=(int)htmlspecialchars(strip_tags($_POST['id']));
    if($action=="delete"&&$id){
        $query="DELETE FROM feedbacks WHERE id=$id";
        mysqli_query($connection, $query);
    } else if ($name&&$email&&$message){
        if (isset($_POST['update'])&&$idPost){
            $query = "UPDATE feedbacks SET
                    name='$name',
                    email='$email',
                    feedtext='$message',
                    feeddate=NOW()
                    WHERE id=$idPost";

            mysqli_query($connection, $query);
        } else if (isset($_POST['create'])){
            $query = "INSERT INTO feedbacks (name,email,feedtext,feeddate) VALUES ('$name','$email','$message',NOW())";
            mysqli_query($connection, $query);
//            $feedId = mysqli_insert_id($connection);
        }
    }

    header("location: feedback.php");
?>
