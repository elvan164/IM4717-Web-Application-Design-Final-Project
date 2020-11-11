<?php
    session_start();
?>
<!DOCTYPE html>
<html class='contact'>
<meta charset='utf-8'>
<script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-core.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-service.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-ui.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-mapevents.js"></script>
    <script type="text/javascript" >window.ENV_VARIABLE = 'http://192.168.56.2'</script><script src='https://developer.here.com/javascript/src/iframeheight.js'></script>
    <link rel="stylesheet" href="CSS/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
    <style>
        #map{
            width:70em;
            height:35em;
            margin-left:auto;
            margin-right:auto;
        }
    </style>
    <head>
        <div class='outernav'>
            <ul class="topnav">
                <a href="Home.php"><img src="CSS/Homey.png" alt="" class='topImg'></a>
                <li><a href="Home.php">Home</a></li>
                <li><a href="Product.php">Product</a></li>
                <li class='active'><a href="Contact.php">Contact</a></li>
                <li class='right'><a href="Cart.php">Cart</a></li>
                <li class='right'><a href="Account.php">Account</a></li>
                <?php if ($_SESSION['is_valid'] == true){?>
                    <li class='right'><a href="Logout.php">Logout</a></li>
                <?php } ?>
            </ul>
        </div>
    </head>
    <body>
        <header>Contact Us</header>
        <p>Feel free to contact us at 9999-9999 with all your enquiries.</p>
        <p>Or else, do feel free to drop us a visit </p>
        <div id='map'></div>
    </body>
    <script src='Contact.js'></script>
</html>