<!DOCTYPE html>
<html class='login'>
    <link rel="stylesheet" href="CSS/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
    <head>
        <div class='outernav'>
            <ul class="topnav">
                <a href="Home.php"><img src="CSS/Homey.png" alt="" class='topImg'></a>
                <li><a href="Home.php">Home</a></li>
                <li><a href="Product.php">Product</a></li>
                <li><a href="Contact.php">Contact</a></li>
                <li class='right'><a href="Cart.php">Cart</a></li>
                <li class='right active'><a href="Account.php">Account</a></li>
            </ul>
        </div>
    </head>
    <body>
        <header>Login</header>
        <form action="Orderhistory.php">
            <div class='loginField'>
                <div class='details'>
                    <label for="loginId">Username</label>
                    <input type="text" id='loginId' required>
                </div>
                <div class='details'>
                    <label for="loginPW">Password</label>
                    <input type="password" id='loginPW' required>
                </div>
                <button value='register' class='button'><a href="Register.php" style='text-decoration: none; color:white;'>Register</a></button>
                <button type="submit" class='button'>Submit</button>
            </div>
        </form>
    </body>
</html>