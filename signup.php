<?php
session_start();
$signUp=$_GET['signup'];
$userId=$_SESSION['userId'];
$login=$_SESSION['login'];
$name=$_SESSION['name'];
$surname=$_SESSION['surname'];
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

        <section class="signup">
        <form action='engine/auth.php?signup=<?=$signUp?>' method="post">
            <div class="signup__container container">
                <div class="signup__left">
                    <?php if ($signUp)  echo
                    "<div class='signup__header'>Your name</div>
                    <input class='signup__input' type='text' name='firstName' placeholder='First Name'>
                    <input class='signup__input' type='text' name='lastName' placeholder='Last Name'>
                    <div>
                        <div class='signup__radio-gr'>
                            <label class='signup__label' for='male'>
                                <input class='signup__input signup__input_radio' type='radio' name='gender' id='male'>
                                Male
                            </label>
                            <label class='signup__label' for='female'>
                                <input class='signup__input signup__input_radio' type='radio' name='gender' id='female'>
                                Female
                            </label>
                        </div>
                     </div>"
                     ?>

                    <?php if(!$userId||$signUp) {echo
                    "<h2 class='signup__header signup__desc'>Login details</h2>
                    <input class='signup__input' type='email' name='email' placeholder='E-mail'>
                    <input class='signup__input'' type='password' name='password' placeholder='Password'>
                    <div class='signup__text'>
                        Please use 8 or more characters, with at least 1 number and a mixture of uppercase and lowercase letters
                    </div>
                    <button class='signup__button'>Join now</button>
                    ";
                    } elseif ($userId) {
                        echo "
                            <h2 class='signup__header signup__desc'>Welcome</h2>
                            <div class='signup__desc'>Login: $login</div>
                            <div class='signup__desc'>User name: $name</div>
                            <div class='signup__desc'>User surname: $surname</div>
                            <span>
                            <a href='catalog.php' class='signup__button signup__button-out '>Start shopping</a>
                            <button name='signout' value='doSignOut' class='signup__button signup__button-out '>Sign out</button>
                            </span>
                            ";
                    }
                    if ($signUp) {
                        echo "<a href='signup.php'>Signin now &gt;&gt;</a>";
                    } else {
                        echo "<a href='signup.php?signup=1'>Signup now &gt;&gt;</a>";
                    }?>

                </div>
                <div class="signup__right">
                    <h2 class="signup__desc signup__desc_header">LOYALTY HAS ITS PERKS</h2>
                    <div class="signup__desc">Get in on the loyalty program where you can earn points and unlock serious perks. Starting with these as soon as you join:</div>
                    <ul class="signup__desc"> 
                        <li class="signup__desc">15% off welcome offer
                        </li>
                        <li class="signup__desc">Free shipping, returns and exchanges on all orders

                        </li>
                        <li class="signup__desc">$10 off a purchase on your birthday

                        </li>
                        <li class="signup__desc">Early access to products</li>
                        <li class="signup__desc">Exclusive offers & rewards</li>
                    </ul>
                    
                </div>
            </div>
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