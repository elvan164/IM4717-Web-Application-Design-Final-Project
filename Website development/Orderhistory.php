<?php

session_start();
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
			    }?>
                
                
            </ul>
        </div>
    </head>
    <body>
        <header>View Status of your order</header>
        <form action="">
            <h2>Order Number</h2>
            <input type="text"  name="" id="" style="width:750px">
            <h2 class='belowTxt'>You can find this in the order confirmation email we sent you when you placed the order.</h2>
            <button type="submit">View</button>
        </form>
    </body>
</html>