<?php
require "connect.php";
$id=(int)htmlspecialchars(strip_tags($_GET['productId']));
$queryProduct = "SELECT * from products WHERE id=$id";
$resultProduct = mysqli_query($connection, $queryProduct);
$product = mysqli_fetch_assoc($resultProduct);
$categoryId= $product["category_id"];
$queryCollection = "SELECT collections.name as collection_name,categories.name as category_name  from collections
    INNER JOIN categories ON collections.id=categories.collection_id
        WHERE categories.id=$categoryId";
$resultCollection = mysqli_query($connection, $queryCollection);
$collect = mysqli_fetch_assoc($resultCollection);

$queryImages = "SELECT * from images WHERE product_id=$id";
$resultImages = mysqli_query($connection, $queryProduct);

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

        <section class="product">
            <!-- Большая картинка и их смена пока не сделана - не подготовлены картинки-->
            <div class="product__picture">
                <div class="product__page">&lt;</div>
                <div class="product__image">
                    <img src="img/single.jpg" alt="">
                </div>
                <div class="product__page">&gt;</div>
            </div>
            <div class="product__white-box">
                <div class="container"></div>
            </div>

            <div class="container">

                <form action="#">
                    <div class="product__description">
                        <div class="product__collection"><?=$collect['collection_name']?> collection <?=$collect['category_name']?></div>
                        <div class="product__3line">
                            <div class="product__3line-part"></div>
                            <div class="product__3line-part product__3line-part_active"></div>
                            <div class="product__3line-part"></div>
                        </div>
                        <h2 class="product__caption"><?=$product["name"] ?></h2>
                        <p class="product__text"><?=$product["description"]?></p>
                        <div class="product__price"><?=$product["price"]?>$</div>
                        <div class="product__line"></div>
                        <div class="product__choose">
                            <select name="color" id="color">
                                <option value="">Choose color</option>
                                <option value="red">red</option>
                                <option value="blue">blue</option>
                                <option value="grey">grey</option>
                            </select>
                            <select name="size" id="size">
                                <option value="">Choose size</option>
                                <option value="xs">XS</option>
                                <option value="s">S</option>
                                <option value="m">M</option>
                                <option value="l">L</option>
                                <option value="xl">xl</option>
                            </select>
                            <select name="quantity" id="quantity">
                                <option value="">quantity</option>
                                <option value="good">Good</option>
                                <option value="Excelent">Excelent</option>
                            </select>
                        </div>
                        <button type="submit" class="product__button">
                            <img src="img/cart-red.svg" alt="">
                            Add to Cart</button>
                    </div>
                </form>
            </div>


        </section>


        <div class="featured">
            <div class="featured__container container featured__container_product">

                <article class="featured__box">

                    <div class="featured__item">
                        <a href="product.php?productId=7" class="featured__item-link">
                            <div class="featured__item-img">
                                <img src="img/feature1.png" alt="">
                            </div>
                            <div class="featured__item-header">
                                <h3 class="featured__item-heading">
                                    ELLERY X M'O CAPSULE
                                </h3>
                                <div class="featured__item-desc">
                                    Known for her sculptural takes on traditional tailoring, Australian arbiter of cool
                                    Kym Ellery
                                    teams up with Moda Operandi.
                                </div>
                                <div class="featured__item-price">
                                    $52.00
                                </div>
                            </div>
                        </a>
                        <div class="featured__item_add">
                            <a href="cart.html" class="featured__item_add-link">
                                Add to Cart
                            </a>
                        </div>
                    </div>

                    <div class="featured__item">
                        <a href="product.php?productId=4" class="featured__item-link">
                            <div class="featured__item-img">
                                <img src="img/feature7.png" alt="">
                            </div>
                            <div class="featured__item-header">
                                <h3 class="featured__item-heading">
                                    ELLERY X M'O CAPSULE
                                </h3>
                                <div class="featured__item-desc">
                                    Known for her sculptural takes on traditional tailoring, Australian arbiter of cool
                                    Kym Ellery
                                    teams up with Moda Operandi.
                                </div>
                                <div class="featured__item-price">
                                    $52.00
                                </div>
                            </div>
                        </a>
                        <div class="featured__item_add">
                            <a href="cart.html" class="featured__item_add-link">
                                Add to Cart
                            </a>
                        </div>
                    </div>

                    <div class="featured__item featured__item_product-disappear">
                        <a href="product.php?productId=6" class="featured__item-link">
                            <div class="featured__item-img">
                                <img src="img/feature3.png" alt="">
                            </div>
                            <div class="featured__item-header">
                                <div class="featured__item-heading">
                                    ELLERY X M'O CAPSULE
                                </div>
                                <div class="featured__item-desc">
                                    Known for her sculptural takes on traditional tailoring, Australian arbiter of cool
                                    Kym Ellery
                                    teams up with Moda Operandi.
                                </div>
                                <div class="featured__item-price">
                                    $52.00
                                </div>
                            </div>
                        </a>
                        <div class="featured__item_add">
                            <a href="cart.html" class="featured__item_add-link">
                                Add to Cart
                            </a>
                        </div>
                    </div>
              </article>

            </div>

        </div>

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