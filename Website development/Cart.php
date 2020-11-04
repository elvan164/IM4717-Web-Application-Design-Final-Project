<?php
    session_start();
?>

<!DOCTYPE html>
<html class='cart'>
    <link rel="stylesheet" href="CSS/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&display=swap" rel="stylesheet">
    <script src='Javascript/Cart.js' async></script>
    <head>
        <div class='outernav'>
            <ul class="topnav">
                <a href="Home.php"><img src="CSS/Homey.png" alt="" class='topImg'></a>
                <li><a href="Home.php">Home</a></li>
                <li><a href="Product.php">Product</a></li>
                <li><a href="Contact.php">Contact</a></li>
                <li class='right active'><a href="Cart.php">Cart</a></li>
                <li class='right'><a href="Account.php">Account</a></li>
                <?php if ($_SESSION['is_valid'] == true){?>
                    <li class='right'><a href="Logout.php">Logout</a></li>
                    <?php
			    }?>
            </ul>
        </div>
    </head>
    <body>
        <header>Cart</header>
        <div class='centralize'>
            <label>Order No.</label>
            <label>Price</label>
            <label>Quantity</label>
        </div>
        <div class='cart-items'>
            <div class='flexible'>
                <div class='cart-img'>
                    <img src="CSS/Productpage/Headphone/BeatsPro.jpg" class='img'>
                    <div class='item-name'>BeatsPro</div>
                </div>
                <div class='price'>
                    $50.00
                </div>
                <div class='quantity'>
                    <input type="number" class='qtyInput' value='1'>
                    <button onclick='removeItem(event)' class=''>Remove</button>
                </div>
            </div>
        </div>
        <div class='totalPrice'>
            $ xxx.xxx
        </div>
    </body>
</html>