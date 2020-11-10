<?php

session_start();

@ $db = new mysqli('localhost', 'f36ee', 'f36ee', 'f36ee');

if (mysqli_connect_errno()) {
    echo "Error: Could not connect to database.  Please try again later.";
    exit;
 }
    $price_array = array();
    $query = "SELECT name,price FROM Product";
    $result  = $db->query($query);
    
    foreach ($result as $key) {
        $price_array[$key["name"]] = $key["price"];
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
    if (isset($_GET["order"])){
        if ($_SESSION['is_valid'] == false)
        {
            echo "<script>window.location.href='Account.php'</script>";
        }
        if ($_SESSION['cart'] == NULL)
        {
            echo "<script>window.location.href='Product.php'</script>";
        }
        else
        {
        echo "<script>window.location.href='Submitorder.php'</script>";
        }
    }

    $db->close();

?>

<!DOCTYPE html>
<html class='cart'>
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
            <header>Cart</header>
            <div class='centralize'>
                <label>Item</label>
                <label>Total Price</label>
                <label>Quantity</label>
            </div>
            <div class='cart-items'>
                    <?php
                    
                        foreach($_SESSION['cart'] as $id => $qty){
                            $name = str_replace("_", " ", $id);
                    ?>
                            <div class='flexible'>
                                <div class='cart-img'>
                                    <img src="images/<?php echo $name?>.jpg" class="img">
                                    <div class='item-name'><?php echo $name?></div>
                                </div>
                                <div class='price'> 
                                    $<?php 
                                    $total_item_price = $price_array[$id] * $qty;
                                    $total_price += $total_item_price;
                                    echo number_format($total_item_price,2)?> 
                                </div>
                                <div class='quantity'>      
                                    <input type="number" class='qtyInput' min='0' max='<?php echo $qty?>'
                                    name="<?php echo $id?>" value="<?php echo $qty?>">

                                    <button name='update' value ="<?php echo $id?>">
                                    Update</button>
                                </div>
                            </div>
                    <?php  
                        }
                    ?>
            </div>
            <div class='totalPrice'>
                $<?php echo number_format($total_price,2) ?>
                <?php $_SESSION['total_price'] = number_format($total_price,2); ?>
            </div>

            <div style="text-align: right;padding-bottom: 5rem; width:88%;"> 
                <button name='order' value ="order" 
                style= "font-family: 'Staatliches', cursive;
                text-align: right;
                margin: 10px 10px 0 0;
                font-size: 2rem;" >
                Place Order
                </button>
            </div>
        </form>
    </body>
</html>