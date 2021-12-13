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
        <form class="feedback__container" action="#" method="post">
            <h2 class="signup__desc signup__desc_header">You can send your feedback here</h2>
                <div class="signup__header">Your name</div>
                <input class="signup__input" type="text" name="userName"placeholder="Your Name">
                <div class="signup__header">Your email</div>
                <input class="signup__input" type="email" name="email" placeholder="E-mail">
                <div class="signup__text">Please type your email if you want</div>
            <div class="signup__header">Your message</div>
                <textarea class="signup__input" rows="10"  name="message" type="text" placeholder="Message"></textarea>
                <button class="signup__button">Join now</button>
            <?php
            require "connect.php";
            $userName = (string)htmlspecialchars(strip_tags($_POST['userName']));
            if(!$userName) $userName="noName";
            $email = (string)htmlspecialchars(strip_tags($_POST['email']));
            $message = (string)htmlspecialchars(strip_tags($_POST['message']));
            if ($message) {
                $query = "INSERT INTO feedbacks (name,email,feedtext,feeddate) VALUES ('$userName','$email','$message',NOW())";
                mysqli_query($connection, $query);
                $feedId = mysqli_insert_id($connection);
                $result = $feedId ? 'Данные отправлены' : 'Ошибка. Попробуйте заново';
                echo "<div class='signup__header'>$result</div>";
            }

            ?>

                </form>
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