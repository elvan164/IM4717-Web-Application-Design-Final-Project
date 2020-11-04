<?php

    session_start();

?>

<!DOCTYPE html>
<html class='home'>
    <link rel="stylesheet" href="CSS/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&display=swap" rel="stylesheet">
    <head>
        <div class='outernav'>
            <ul class="topnav">
                <a href="Home.php"><img src="CSS/Homey.png" alt="" class='topImg'></a>
                <li class='active'><a href="Home.php">Home</a></li>
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
        <div>
            <div class='container'>
                <img src='CSS/Homepage/creative sxfi.jpg' style='width: 100%;' alt="Headphone"/>
                <div class="centered">All the needs</div>
            </div>
            <div class='container'>
                <img  src='CSS/Homepage/Keyboard.jpg' style='width: 100%;' alt="Keyboard"/>
                <div class="centered">In</div>    
            </div>
            <div class='container'>
                <img  src='CSS/Homepage/Laptop.jpeg' style='width: 100%;' alt="Laptop"/>
                <div class="centered">Just</div>
            </div>
            <div class='container last-container'>
                <img  src='CSS/Homepage/Gadgets.jpg' style='width: 100%;' alt="Gadgets"/>
                <div class="centered">One place</div>
            </div>
        <br/>
    </body>
</html>