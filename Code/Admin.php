<?php

session_start();


@ $db = new mysqli('localhost', 'f36ee', 'f36ee', 'f36ee');

if (mysqli_connect_errno()) {
    echo "Error: Could not connect to database.  Please try again later.";
    exit;
 }

foreach ($_GET as $key => $val) {
    $update_array[$key] = $val;
}

foreach ($update_array as $key => $value) {
    if(isset($value)){
        $query = "UPDATE Product SET price=$value WHERE name=\"$key\"";
        $result = $db->query($query);
    }
}

    $price_array = array();
    $category_array = array();
    $query = "SELECT name,price,category FROM Product";
    $result  = $db->query($query);
    
    
    foreach ($result as $key) {
        $price_array[$key["name"]] = $key["price"];
        $category_array[$key["name"]] = $key["category"];
    }
    
    
    
    

    $db->close();

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
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
            <header>Change Price</header>
            <div class='centralize'>
                <label>Item</label>
                <label>Old Price</label>
                <label>New Price</label>
            </div>
            <div class='cart-items'>
                    <?php
                    
                        foreach($price_array as $key => $price) {
                        $name = str_replace("_", " ", $key);
                        ?>
                            <div class='flexible'>
                                <div class='cart-img'>
                                    <img src="images/<?php echo $name?>.jpg" class="img">
                                    <div class='item-name'><?php echo $name?></div>
                                </div>
                                <div class='price'> 
                                    $<?php 
                                    echo $price_array[$key]?>
                                </div>
                                <div class='quantity'>      
                                    <input type="number" class='qtyInput' min='0' max='<?php echo $qty?>'
                                    name="<?php echo $key?>" value="<?php echo $price_array[$key]?>"
                                    step="0.01" style="min-width: 5rem;">

                                    <button name='update' value ="<?php echo $id?>">
                                    Update</button>
                                </div>
                            </div>
                    <?php  
                         }
                    ?>
            </div>
        </form>
    </body>
</html>