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
            </ul>
        </div>
    </head>
    <body>
        <body>
            <header>Submit Order</header>
            <form action="">
                <div class='submitOrderField'>
                    <div class='containing'>
                        <div class='seperation'>
                            <tr>
                                <td><label for="ccname" class='extraPad1'>Name:</label></td>
                                <td><input type="text" id='ccname' required></td>
                            </tr>
                        </div>
                        <div class='seperation'>
                            <tr>
                                <td><label for="ccnum">CreditCard No.:</label></td>
                                <td><input type="number" id='ccnum' required></td>
                            </tr>
                        </div>
                        <div class='seperation'>
                            <tr>
                                <td><label for="ccadd" class='extraPad2'>Address:</label></td>
                                <td><input type="text" id="ccadd" required></td>
                            </tr>
                        </div>
                        <div class='seperation'>
                            <tr>
                                <td><label for="cctel" class='extraPad3'>Number:</label></td>
                                <td><input type="number" id="cctel" required></td>
                            </tr>
                        </div>
                    </div>
                    <div class='button'>
                        <button type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </body>
    </body>
</html>