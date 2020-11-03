<!DOCTYPE html>
<html class='contact'>
    <link rel="stylesheet" href="CSS/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
    <head>
        <div class='outernav'>
            <ul class="topnav">
                <a href="Home.php"><img src="CSS/Homey.png" alt="" class='topImg'></a>
                <li><a href="Home.php">Home</a></li>
                <li><a href="Product.php">Product</a></li>
                <li class='active'><a href="Contact.php">Contact</a></li>
                <li class='right'><a href="Cart.php">Cart</a></li>
                <li class='right'><a href="Account.php">Account</a></li>
            </ul>
        </div>
    </head>
    <body>
        <header>Contact Us</header>
        <p>Feel free to contact us at 9999-9999 or drop us your inquiries here, and we will reply you back at the soonest possible time.</p>
        <div class='containing'>
            <div class='details'>
                <label for="name">Name:</label>
                <input type="text" name="name" id="name">
            </div>
            <div class='details'>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email">
            </div>
            <div class='details'>
                <label for="subject">Subject:</label>
                <input type="text" name="subject" id="subject">
            </div>
            <div class='details'>
                <label for="message">Message:</label>
                <textarea name="message" id="message" cols="30" rows="10"></textarea>
            </div>
            <input type="submit" value="submit enquiries" class='submit'>
        </div>
    </body>
</html>