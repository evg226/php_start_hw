<?php
$name=$_GET['name'];
$email=$_GET['email'];
$id=$_GET['id'];
$feedtext=$_GET['feedtext'];
?>
<!DOCTYPE html>
<html lang="en">
<?php require_once "Components/head.php" ?>
</html>
<body>
<header>
    <?php  require "Components/navbar.php"?>
</header>

<main>
    <section class="feedback container">
        <div class="feedback__container">
            <h2 class="signup__desc signup__desc_header">Feedback list</h2>
            <?php
            require "engine/connect.php";
            $query = "Select * FROM feedbacks";
            $feedbacks = mysqli_query($connection, $query);
            while ($data=mysqli_fetch_assoc($feedbacks)):?>
                <div class='feedback__message'>
                    <div class='feedback__user'>User: <?=$data['name']?></div>
                    <div class='feedback__text'><?=$data['feedtext']?></div>
                    <div class="feedback__buttons">   
                        <a class="feedback_button" href="?action=update&id=<?=$data['id']?>&name=<?=$data['name']?>&email=<?=$data['email']?>&feedtext=<?=$data['feedtext']?>#updform" class='feedback__delete'>update</a>
                        <a class="feedback_button" href="engine/dofeedbackaction.php?action=delete&id=<?=$data['id']?>" class='feedback__delete'>delete</a>
                        <div class='feedback__date'><?=$data['feeddate']?></div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <form id="updform" class="feedback__container" action="engine/dofeedbackaction.php" method="post">
            <h2 class="signup__desc signup__desc_header">You can send your feedback here</h2>
                <input hidden type="text" name="id" placeholder="Your Name" value="<?=$_GET['id']?>">
                <div class="signup__header">Your name</div>
                <input class="signup__input" type="text" name="userName"placeholder="Your Name" value="<?=$name?>">
                <div class="signup__header">Your email</div>
                <input class="signup__input" type="email" name="email" placeholder="E-mail" value="<?=$email?>">
                <div class="signup__text">Please type your email if you want</div>
            <div class="signup__header">Your message</div>
                <textarea class="signup__input" rows="10"  name="message" type="text" placeholder="Message"><?=$feedtext?></textarea>
                <?php
                    if($_GET['action']=="update") {
                      echo "<div class='feedback__form_buttons'><button type='submit' name='update' class='signup__button'>update</button>";
                      echo "<a class='feedback__clearform' href='?action=' >Clear form</a></div>";
                    }else {
                        echo "<button type='submit' name='create' class='signup__button'>CREATE</button>";
                    }
                ?>
`       </form>


    </section>
</main>

<?php require_once "Components/footer.php" ?>

</body>
<script>
    var x = document.getElementById("item-hamburger");
    var y = document.getElementById("close_menu");

    x.addEventListener("click", myFunction);
    y.addEventListener("click", myFunction);

    function myFunction() {
        var element = document.getElementById("nav");
        element.classList.toggle("open");

        x.classList.toggle("change");
    }
</script>
</html>