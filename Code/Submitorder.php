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
                <?php}?>
            </ul>
        </div>
    </head>
    <body>
        <header>Submit Order</header>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class='submitOrderField'>
                    <div class='containing'>
                        <div class='seperation'>
                            <tr>
                                <td><label for="ccname" style="padding-right:143px;">Name:</label></td>
                                <td><input type="text" id='ccname' value="<?php echo $name?>" required onChange="nameCheck()"> 
                                </td>
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
                                <td><label for="ccpostal" style="padding-right:80px;">
                                Postal Code:</label></td>
                                <td><input type="text" id="ccadd" value="<?php echo $postal_code?>"required onChange="postalCheck()"></td>
                            </tr>
                        </div>
                    </div>
                    <div class='button'>
                        <button type="order" name ="order" value="order">Submit</button>
                    </div>
                </div>
            </form>
            
            <script type="text/javascript">
            function nameCheck(){
                var name = document.getElementById("name").value;
                var check = name.search(/^[a-zA-Z\s]+$/);
                if (check!=0){
                alert("Please enter a valid name! (no special characters or numbers)");
                }
            }
            
            function postalCheck(){
                var postal = document.getElementById("postal").value;
                var check = postal.search(/^[0-9]{1,6}$/);
                if (check!=0){
                alert("Please enter a valid postal code!");
                }
            }
            
        </script>
    </body>
</html>