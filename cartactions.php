<?php
require ("connect.php");
$action=(string)htmlspecialchars(strip_tags($_GET["action"]));
$productId=(int)htmlspecialchars(strip_tags($_GET["productId"]));
$id=(int)htmlspecialchars(strip_tags($_GET["id"]));
$quantity=(int)htmlspecialchars(strip_tags($_GET["quantity"]));
$color=(string)htmlspecialchars(strip_tags($_GET["color"]));
$size=(string)htmlspecialchars(strip_tags($_GET["size"]));
$userId=1;
$message="";
$cart=[];


if (($action=="add")&&$productId){
    if (!$quantity) $quantity=1;
    $queryFind="SELECT id,quantity from cart WHERE productId=$productId";
    $cartResult=mysqli_query($connection, $queryFind);
    $data=mysqli_fetch_assoc($cartResult);
    if($data['id']) {
        $cartId=$data['id'];
        $cartQuantity=$data['quantity']+1;
        header("location: cartactions.php?action=update&id=$cartId&quantity=$cartQuantity");
    } else {
        $query = "INSERT INTO cart (quantity,color,size,productId,userId) VALUES ($quantity,'$color','$size',$productId,$userId)";
        if(mysqli_query($connection, $query)) {
            $message ="Product has added to cart: id=". mysqli_insert_id($connection);
        }else {
            $message=mysqli_error($query);
        }
    }
}
if (($action=="update")&&($id>0)){

    if ($quantity<=0) {
        header("location: cartactions.php?action=delete&id=$id");
    } else {
        $query = "UPDATE cart SET
                quantity=$quantity";
        if ($color) $query .= ", color='$color'";
        if ($size) $query .= ", size='$size'";
        $query .= " WHERE id=$id";
        if (mysqli_query($connection, $query)) {
            $message = "Product has updated in cart: id=$id";
        } else {
            $message = mysqli_error($query);
        }
    }
}

if (($action=="delete")&&($id>0)){
    $query = "DELETE FROM cart WHERE id=$id";
    if(mysqli_query($connection, $query)) {
        $message ="Product has deleted from cart: id=$id";
    }else {
        $message=mysqli_error($query);
    }
}

echo $message;
header("Location: ".$_SERVER['HTTP_REFERER']);

?>