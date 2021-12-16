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
        <form action="#">
            <div class="signup__container container">
                <div class="signup__left">
                <div class="signup__header">Your name</div>
                <input class="signup__input" type="text" placeholder="First Name">
                <input class="signup__input" type="text" placeholder="Last Name">
                
                <div>
                <div class="signup__radio-gr">
                <label class="signup__label" for="male">
                    <input class="signup__input signup__input_radio" type="radio" name="gender" id="male">
                    Male
                </label>
                <label class="signup__label" for="female">
                    <input class="signup__input signup__input_radio" type="radio" name="gender" id="female">
                    Female
                </label>
                </div>

            </div>
                <h2 class="signup__header">Login details</h2>
                <input class="signup__input" type="email" placeholder="E-mail">
                <input class="signup__input" type="password" placeholder="Password">
                <div class="signup__text">
                    Please use 8 or more characters, with at least 1 number and a mixture of uppercase and lowercase letters
                </div>
                <button class="signup__button">Join now</button>
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