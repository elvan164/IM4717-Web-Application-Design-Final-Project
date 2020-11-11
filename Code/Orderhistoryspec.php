<?php

session_start();

@ $db = new mysqli('localhost', 'f36ee', 'f36ee', 'f36ee');

if (mysqli_connect_errno()) {
    echo "Error: Could not connect to database.  Please try again later.";
    exit;
}

        $user_id = $_SESSION['user_id'];
        $order_no = $_SESSION['order_no'];

        $order_array = array();
        $query = "SELECT * FROM Product_Orders WHERE order_id = '$order_no'";
        $result=$db->query($query);
        foreach($result as $key){
            $order_array[$key["product_id"]] = $key["quantity"];
            $order_price_array[$key["product_id"]] = $key["price"];
        }

        $order_name_array = array();
        $price_array = array();
        $query = "SELECT name,price, id FROM Product";
        $result  = $db->query($query);
        
        
        foreach ($result as $key) {
            $price_array[$key["name"]] = $key["price"];
            $order_name_array[$key["id"]] = $key["name"];
        }

        $total_price = 0.00;
    
        if (isset($_GET["update"])){
            $id = $_GET["update"];
            $amount =(int) $_GET["$id"];
            if(isset($_SESSION['cart'])){
            $_SESSION['cart'][$_GET["update"]] = $amount;
            }
            if ($_SESSION['cart'][$_GET["update"]] == 0){
                unset($_SESSION['cart'][$_GET["update"]]);
            }
        }
        $_SESSION['total_price'] = 0.00;
    
?> 

<!DOCTYPE html>
<html class='orderH'>
    <link rel="stylesheet" href="CSS/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&display=swap" rel="stylesheet">
    <head>
        <div class='outernav'>
            <ul class="topnav">
                <a href="Home.php"><img src="CSS/Homey.png" alt="" class='topImg'></a>
                <li><a href="Home.php">Home</a></li>
                <li><a href="Product.php">Product</a></li>
                <li><a href="Contact.php">Contact</a></li>
                <li class='right'><a href="Cart.php">Cart</a></li>
                <li class='right'><a href="Account.php">Account</a></li>
                <?php if ($_SESSION['is_valid'] == true){?>
                    <li class='right'><a href="Logout.php">Logout</a></li>
                    <?php
			    } ?> 
            </ul>
        </div>
    </head>
    <body>
        <header>Order #<?php echo $order_no?></header>
        
        <div class = "cart">
            <div class='centralize'>
                <label>Item</label>
                <label>Quantity</label>
                <label>Total Price</label>
            </div>
            <div class='cart-items'>
                    <?php
                        foreach($order_array as $product_id => $quantity){
                            $id = $order_name_array[$product_id];
                            $name = str_replace("_", " ", $id);
                            $qty = $order_array[$key];
                    ?>
                            <div class='flexible'>
                                <div class='cart-img'>
                                    <img src="images/<?php echo $name?>.jpg" class="img">
                                    <div class='item-name'><?php echo $name?></div>
                                </div>
                                <div class='quantity' style="font-family: 'Staatliches', cursive; font-size:30px;">      
                                    <?php echo $quantity?>
                                </div>
                                <div class='price'> 
                                    $<?php
                                    $total_item_price = $order_price_array[$product_id]* $quantity;
                                    $total_price += $total_item_price;
                                    echo number_format($total_item_price,2)?> 
                                </div>
                            </div>
                    <?php } ?>
            </div>
            <div style="font-family: 'Staatliches', cursive; 
            text-align: right; width: 84.7%;font-size: 2rem;">
                $<?php echo number_format($total_price,2) ?>
                <?php $_SESSION['total_price'] = number_format($total_price,2); ?>
            </div>
        </div>
    </body>
</html>