<?php
require "connect.php";
$query = "SELECT collections.id as collection_id, collections.name as collection_name,
    categories.id as category_id, categories.name as category_name
    FROM collections
    LEFT JOIN categories
    ON collections.id=categories.collection_id";
$res = mysqli_query($connection, $query);

$userId=1;
$queryCartCount="SELECT SUM(quantity) as sumCart FROM cart where userId=$userId";
$result = mysqli_query($connection, $queryCartCount);
$cart=mysqli_fetch_assoc($result);
$cartQuan=$cart['sumCart'];
echo $cartQuan;
?>

<nav class="navbar">
    <ul class="subnav" id='nav'>
        <li class="subnav__item">
            <a href="#" class="subnav__link subnav__link-close" id="close_menu">
                <img src="img/close.svg" alt="Close">
            </a>
        </li>
        <li class="subnav__item"><a href="/" class="subnav__link subnav__link-gr subnav__link-menu">menu</a></li>

        <?php
        $activeCollection="";
        while($data = mysqli_fetch_assoc($res)){
            $collectionId=$data['collection_id'];
            $collection=$data['collection_name'];
            $categoryId=$data['category_id'];
            $category=$data['category_name'];
            if ($activeCollection!=$collection){
                $activeCollection=$collection;
                echo "<li class='subnav__item'><a href='catalog.php?collection=$collectionId' class='subnav__link subnav__link-gr'>$collection</a></li>";
            }
            echo "<li class='subnav__item'><a href='catalog.php?category=$categoryId' class='subnav__link'>$category</a></li>";
        }
        echo "<li class='subnav__item'><a href='feedback.php' class='subnav__link subnav__link-gr'>Feedback Page</a></li>";
        ?>
    </ul>

    <div class="navbar__container container">
        <div class="navbar__side">
            <a href="/" class="navbar__item item_home ">
                <img src="img/menu1.svg" alt="Home icon">
            </a>
            <a href="#" class="navbar__item item_search">
                <img src="img/menu-search.svg" alt="Search icon">
            </a>
        </div>
        <div class="navbar__side navbar__side-right">
            <a href="#" class="navbar__item item-hamburger" id="item-hamburger">
                <img src="img/menu_hamb.svg" alt="Submenu icon">
            </a>
            <a href="/signup.php" class="navbar__item item_login">
                <img src="img/user.svg" alt="Login icon">
            </a>
            <a href="/cart.php" class="navbar__item item__cart">
                <img src="img/cart.svg" alt="Submenu icon">
                <div class="item__cart__count">
                    <?=$cartQuan?>
                </div>
            </a>
        </div>
    </div>
</nav>
