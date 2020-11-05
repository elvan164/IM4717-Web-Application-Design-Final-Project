<?php

    session_start();

    @ $db = new mysqli('localhost', 'f36ee', 'f36ee', 'f36ee');

    if (mysqli_connect_errno()) {
        echo "Error: Could not connect to database.  Please try again later.";
        exit;
    }
        $username = $_SESSION['valid_user'];
        $sql = "SELECT * from Users WHERE username='$username'";
    
        $result = $db -> query($sql);

        foreach ($result as $key) {
            $name = $key['name'];
            $email = $key['email'];
            $address = $key['address'];
            $unit_no = $key['unit_no'];
            $postal_code = $key['postal_code'];
        }

        if (isset($_POST['order'])){
            echo "<script>window.location.href='Email.php'</script>";
        }
        $db->close();
?>

<!DOCTYPE html>
<html class='submitO'>
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
        <body>
            <header>Submit Order</header>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class='submitOrderField'>
                    <div class='containing'>
                        <div class='seperation'>
                            <tr>
                                <td><label for="ccname" style="padding-right:143px;">Name:</label></td>
                                <td><input type="text" id='ccname' value="<?php echo $name?>" required> 
                                </td>
                            </tr>
                        </div>
                        <div class='seperation'>
                            <tr>
                                <td><label for="ccnum" style="padding-right:53px;" >Credit Card No.:</label></td>
                                <td><input type="text" id='ccnum' placeholder="1111-2222-3333-4444" required></td>
                            </tr>
                        </div>
                        <div class='seperation'>
                            <tr>
                                <td><label for="ccnum">Credit Card CVV:</label></td>
                                <td><input type="text" id='ccnum' placeholder="111" required></td>
                            </tr>
                        </div>
                        <div class='seperation'>
                            <tr>
                                <td><label for="ccadd" style="padding-right:112px;">Address:</label></td>
                                <td><input type="text" id="ccadd" value="<?php echo $address?>"required></td>
                            </tr>
                        </div>
                        <div class='seperation'>
                            <tr>
                                <td><label for="ccunit_no" style="padding-right:120px;">
                                Unit. No:</label></td>
                                <td><input type="text" id="ccadd" value="<?php echo $unit_no?>"required></td>
                            </tr>
                        </div>
                        <div class='seperation'>
                            <tr>
                                <td><label for="ccpostal" style="padding-right:80px;">
                                Postal Code:</label></td>
                                <td><input type="text" id="ccadd" value="<?php echo $postal_code?>"required></td>
                            </tr>
                        </div>
                        <div class='seperation'>
                            <tr>
                                <td><label for="cctel" style="padding-right:122px;">
                                Number:</label></td>
                                <td><input type="number" id="cctel" required></td>
                            </tr>
                        </div>
                    </div>
                    <div class='button'>
                        <button type="order" name ="order" value="order">Submit</button>
                    </div>
                </div>
            </form>
        </body>
    </body>
</html>