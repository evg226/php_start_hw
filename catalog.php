<?php
require "connect.php";
$queryProducts = "SELECT * from products";
$products = mysqli_query($connection, $queryProducts);
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
        <nav class="filter">
            <ul class="container filter__container">
                <li class="filter__item filter__item_1">
                    <div class="filter__item-caption filter__item-caption-close">
                        <span>Filter</span><img src="img/filter.svg" alt="">
                    </div>
                    <div class="filter__item-drop filter__item-drop-1">
                        <details open class="filter__subitem">
                            <summary class="summary_1">Category</summary>
                            <div class="filter__subitem-drop">
                                <div class="filter__subitem-drop-link filter__subitem-drop-link-1">Accesories</div>
                                <div class="filter__subitem-drop-link filter__subitem-drop-link-1">Bags</div>
                                <div class="filter__subitem-drop-link filter__subitem-drop-link-1">Accesories</div>
                                <div class="filter__subitem-drop-link filter__subitem-drop-link-1">Accesories</div>
                            </div>
                        </details>
                        <details class="filter__subitem">
                            <summary>Designer</summary>
                            <div class="filter__subitem-drop">
                                <div class="filter__subitem-drop-link filter__subitem-drop-link-1">Accesories</div>
                                <div class="filter__subitem-drop-link filter__subitem-drop-link-1">Bags</div>
                                <div class="filter__subitem-drop-link filter__subitem-drop-link-1">Accesories</div>
                                <div class="filter__subitem-drop-link filter__subitem-drop-link-1">Accesories</div>
                            </div>
                        </details>
                        <details class=" filter__subitem">
                            <summary>Price</summary>
                            <div class="filter__subitem-drop">
                                <div class="filter__subitem-drop-link filter__subitem-drop-link-1">Accesories
                                </div>
                                <div class="filter__subitem-drop-link filter__subitem-drop-link-1">Bags</div>
                                <div class="filter__subitem-drop-link filter__subitem-drop-link-1">Accesories
                                </div>
                                <div
                                    class="filter__subitem-drop-link filter__subitem-drop-link-1 filter__subitem-drop-link-last">
                                    Accesories</div>
                            </div>
                        </details>
                    </div>
                </li>

                <li class="filter__item">

                    <div class="filter__item-caption">
                        <span>Trending&nbsp;now</span><img src="img/Filter2.svg" alt="">
                    </div>
                    <div class="filter__item-drop">

                        <div class="filter__subitem-drop-link">Accesories</div>
                        <div class="filter__subitem-drop-link">Bags</div>
                        <div class="filter__subitem-drop-link">Accesories</div>
                        <div class="filter__subitem-drop-link">Accesories</div>
                    </div>
                </li>

                <li class="filter__item">

                    <div class="filter__item-caption">
                        <span>Size</span><img src="img/Filter2.svg" alt="">
                    </div>
                    <div class="filter__item-drop">
                        <form action="#">
                            <div class="filter__subitem-drop-link">
                                <input type="checkbox" name="xs"> XS
                            </div>
                            <div class="filter__subitem-drop-link">
                                <input type="checkbox" name="s"> S
                            </div>
                            <div class="filter__subitem-drop-link">
                                <input type="checkbox" name="m"> M
                            </div>
                            <div class="filter__subitem-drop-link">
                                <input type="checkbox" name="l"> L
                            </div>
                        </form>
                    </div>
                </li>

                <li class="filter__item">

                    <div class="filter__item-caption">
                        <span>Price</span><img src="img/Filter2.svg" alt="">
                    </div>
                    <div class="filter__item-drop filter__item-drop-4">

                        <div class="filter__subitem-drop-link">100$</div>
                        <div class="filter__subitem-drop-link">500$</div>
                        <div class="filter__subitem-drop-link">1000$</div>
                        <div class="filter__subitem-drop-link">More</div>
                    </div>
                </li>
            </ul>
        </nav>

        <div class="featured">
            <div class="featured__container container">
                <article class="featured__box">
                        <?php
                            while($data = mysqli_fetch_assoc($products)):
                        ?>
                    <div class="featured__item">
                        <a href="product.php?productId=<?=$data['id'] ?>" class="featured__item-link">
                            <div class="featured__item-img">
                                <img src="img/<?=$data['image'] ?>" alt="">
                            </div>
                            <div class="featured__item-header">
                                <h3 class="featured__item-heading">
                                    <?=$data['name'] ?>
                                </h3>
                                <div class="featured__item-desc">
                                    <?=$data['description'] ?>
                                </div>
                                <div class="featured__item-price">
                                    $<?=$data['price'] ?>
                                </div>
                            </div>
                        </a>
                        <div class="featured__item_add">
                            <a href="cart.html" class="featured__item_add-link">
                                Add to Cart
                            </a>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </article>

                <div class="pages">
                    <div class="pages__content">
                        <a href="#" class="pages__link pages__link_browse">&lt;</a>
                        <a href="#" class="pages__link pages__link_active">1</a>
                        <a href="#" class="pages__link">2</a>
                        <a href="#" class="pages__link">3</a>
                        <a href="#" class="pages__link">4</a>
                        <a href="#" class="pages__link">5</a>
                        <a href="#" class="pages__link">6</a>
                        <a href="#" class="pages__link pages__link_last">20</a>
                        <a href="#" class="pages__link pages__link_browse">&gt;</a>
                    </div>
                </div>

            </div>

        </div>


        <section class="delivery">
            <div class="delivery__box container">

                <a href="#" class="delivery__card">
                    <div class="delivery__img">
                        <img src="img/delivery.svg" alt="">
                    </div>
                    <h2 class="delivery__cap">
                        Free Delivery
                    </h2>
                    <div class="delivery__text">
                        Worldwide delivery on all. Authorit tively morph next-generation innov tion with extensive
                        models.
                    </div>
                </a>

                <a href="#" class="delivery__card">
                    <div class="delivery__img">
                        <img src="img/persent.svg" alt="">
                    </div>
                    <div class="delivery__cap">
                        Sales & discounts
                    </div>
                    <div class="delivery__text">
                        Worldwide delivery on all. Authorit tively morph next-generation innov tion with extensive
                        models.
                    </div>
                </a>

                <a href="#" class="delivery__card">
                    <div class="delivery__img">
                        <img src="img/crown.svg" alt="">
                    </div>
                    <div class="delivery__cap">
                        Quality assurance
                    </div>
                    <div class="delivery__text">
                        Worldwide delivery on all. Authorit tively morph next-generation innov tion with extensive
                        models.
                    </div>
                </a>
            </div>
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