<?php

session_start();

@ $db = new mysqli('localhost', 'f36ee', 'f36ee', 'f36ee');

if (mysqli_connect_errno()) {
    echo "Error: Could not connect to database.  Please try again later.";
    exit;
}
    if (isset($_GET['submit'])){
        $user_id = $_SESSION['user_id'];
        $order_no = $_GET['order_no'];

        $_SESSION['order_no'] = $order_no;

        $query = "SELECT * FROM Customer_Orders WHERE user_id = '$user_id' and id = '$order_no'";
        $result  = $db->query($query);

        if ($result->num_rows>0){
            echo "<script>window.location.href='Orderhistoryspec.php'</script>";
        }

        else {
            echo '<script> alert("Please check your order no.")</script>';
        }
    }   
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
                <?php } ?>
            </ul>
        </div>
    </head>
    <body>
        <header>View Status of your order</header>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" style="text-align:center;">
            <h2>Order Number</h2>
            <input type="text"  name="order_no" id="" style="width:750px">
            <h2 class='belowTxt'>You can find this in the order confirmation email we sent you when you placed the order.</h2>
            <button type="submit" name="submit">View</button>
        </form>
    </body>
</html>