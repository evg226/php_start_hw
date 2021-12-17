<?php
session_start();
require "engine/connect.php";
if (!$_SESSION['userId']) {
    header("location: signup.php");
}
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

        <section class="cartbox">
<!--        <form>-->
            <div class="container cartbox__container">
                <div class="cartbox__left">
                    <?php
                    $userId=$_SESSION['userId'];
                    $query="SELECT *,cart.id as cartId from cart
                                INNER JOIN products
                                ON products.id=cart.productId
                            WHERE cart.userId=$userId";

                    $cartResult=mysqli_query($connection, $query);

                    if (mysqli_num_rows($cartResult)==0) echo "<div class='cartbox__item'>Cart is empty</div>";
                    while($data=mysqli_fetch_assoc($cartResult)):?>
                        <div class="cartbox__item">
                        <div  class="cartbox__item-picture">
                            <img height="260px" src="img/<?=$data['image']?>" alt="">
                        </div>
                        <form class="cartbox__item-desc" action="engine/cartactions.php" method="get">
<!--                            <input hidden type="text" name="action" value="update">-->
                            <input hidden type="text" name="id" value="<?=$data['cartId']?>">
                            <div class="cartbox__item-header">
                                <?=$data['name']?>
                            </div>
                            <div class="cartbox__item-text">
                                Price:&nbsp;&nbsp;<span class="cartbox__item-text_price">$<?=$data['price']?></span>
                            </div>
                            <div class="cartbox__item-text">Color:
<!--                                &nbsp;&nbsp;<span>--><?//=$data['color']?><!--</span>-->
                                <input class="cartbox__item-text_input" type="text" name="color" value="<?=$data['color']?>">
                            </div>
                            <div class="cartbox__item-text">Size:&nbsp;&nbsp;
<!--                                <span>--><?//=$data['size']?><!--</span>-->
                                <input class="cartbox__item-text_input" type="text" name="size" value="<?=$data['size']?>">
                            </div>
                            <div class="cartbox__item-text">Quantity:&nbsp;&nbsp;
                                <input class="cartbox__item-text_input" type="number" name="quantity" value="<?=$data['quantity']?>">
                            </div>
                            <div class="cartbox__item-buttons">
                            <button type="submit" name="action" value="update">Change</button>
                            <button type="submit" name="action" value="delete">Delete</button>
                            </div>

                        </form>
                    </div>
                    <?php endwhile; ?>
                    <div class="cartbox__action">
                        <a href="#" class="cartbox__button">Clear Shopping Cart</a>
                        <a href="catalog.php" class="cartbox__button">Continue Shopping</a>
                    </div>
                </div>
                <div class="cartbox__right">
                    <div class="cartbox__shipping">
                    <h2 class="cartbox__header">
                        Shipping Address
                    </h2>
                    <input class="cartbox__input" type="text" placeholder="Country">
                    <input class="cartbox__input" type="text" placeholder="State">
                    <input class="cartbox__input" type="tel" placeholder="postcode">
                    <a href="#" class="cartbox__button cartbox__button_shipping">get a quote</a>
                    </div>
                    <div class="cartbox__proseed">
                        <p class="cartbox__proseed-text-sub">Sub total <span>900$</span> </p>
                        <p class="cartbox__proseed-text-grand">Grand total <span>900$</span> </p>
                        <div class="cartbox__proseed-line"></div>
                        <button class="cartbox__proseed-button">Proseed</button>
                    </div>

                </div>
            </div>

<!--        </form>-->
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

