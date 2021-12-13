<?php
    require "connect.php";
    function doFeedBackAction($CRUD){
        $name=(string)htmlspecialchars(strip_tags($_POST['userName']));
        $email=(string)htmlspecialchars(strip_tags($_POST['email']));
        $message=(string)htmlspecialchars(strip_tags($_POST['message']));
        $id=(string)htmlspecialchars(strip_tags($_POST['id']));
        switch ($CRUD){
            case "create":
                $query = "INSERT INTO feedbacks (name,email,feedtext,feeddate) VALUES ('$name','$email','$message',NOW())";
                mysqli_query($connection, $query);
                $feedId = mysqli_insert_id($connection);
                return "Добавлена новая запись id=".$feedId;
            case "read":
                $query = "Select * FROM feedbacks";
                $feedbacks = mysqli_query($connection, $query);
                return $feedbacks;
            case "update":
                $query = "UPDATE feedback SET 
                    name='$name',
                    email=$email,
                    feedtext=$message,
                    feeddate=NOW())
                    WHERE id=$id";
                if (mysqli_query($connection, $query);)
            case "delete":
                $query="DELETE FROM feedback WHERE id=$id";
                break;
        }
    }
?>
