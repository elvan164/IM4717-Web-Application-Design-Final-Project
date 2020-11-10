<?php

    session_start();

    @ $db = new mysqli('localhost', 'f36ee', 'f36ee', 'f36ee');

    if (mysqli_connect_errno()) {
        echo "Error: Could not connect to database.  Please try again later.";
        exit;
    }
    if (isset($_POST['submit'])){

        if ($_POST['password'] != $_POST['password2']){
            echo "<script>alert('passwords do not match');</script>";
            header("Refresh:0");
        }

        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $name = $_POST['name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $postal_code = $_POST['postal_code'];
    

        $checkExistingUsername = "SELECT * FROM Users WHERE username = '$username'";
        $db -> query($checkExistingUsername);
        if(($db->affected_rows) > 0){
            echo "<script>alert('This username has already been taken!')</script>";
        } 
        
        else {
            $sql = "INSERT INTO Users(username, password, name, email, address, unit_no, postal_code) VALUES ('$username', '$password', '$name', '$email', '$address', '$unit_no', '$postal_code')";
            $result = $db -> query($sql);
        
            $sql = "SELECT * from Users WHERE username='$username' and password='$password'";

            $result = $db -> query($sql);
            $row = $result -> fetch_assoc();

            session_start();
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['valid_user'] = $username;
            $_SESSION['cart'] = array();
            echo "<script>alert('Successfully registered ".$username."')</script>";
            echo "<script>location.href='Home.php'</script>";
        }
    }
?>

<!DOCTYPE html>
<html class='register'>
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
                <li class='right'><a href="Account.php">Account</a></li>
                <?php if ($_SESSION['is_valid'] == true){?>
                    <li class='right'><a href="Logout.php">Logout</a></li>
                    <?php
			    }?>
            </ul>
        </div>
    </head>
    <body>
        <header>Register</header>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class='registerField'>
                <div class='containing'>
                    <div class='seperation'>
                        <tr>
                            <td><label for="registerId" style="width:200px; padding:1rem 0px 1rem 0px; display:inline-block; text-align:center;">
                            Username</label></td>
                            <td><input type="text" name='username' required></td>
                        </tr>
                    </div>
                    <div class='seperation'>
                        <tr>
                            <td><label for="registerPW" style="width:200px; padding:1rem 0px 1rem 0px; display:inline-block; text-align:center;">
                            Password</label></td>
                            <td><input type="password" name='password' required></td>
                        </tr>
                    </div>
                    <div class='seperation'>
                        <tr>
                            <td><label for="registerPW" style="width:200px; padding:1rem 0px 1rem 0px; display:inline-block; text-align:center;">
                            Confirm Password</label></td>
                            <td><input type="password" name='password2' required></td>
                        </tr>
                    </div>
                    <div class='seperation'>
                        <tr>
                            <td><label for="name" style="width:200px; padding:1rem 0px 1rem 0px; display:inline-block; text-align:center;">
                            Name</label></td>
                            <td><input type="text" id="name" name="name" required onChange="nameCheck()"></td>
                        </tr>
                    </div>
                    <div class='seperation'>
                        <tr>
                            <td><label for="email" style="width:200px; padding:1rem 0px 1rem 0px; display:inline-block; text-align:center;">
                            Email</label></td>
                            <td><input type="email" id="email" name="email" required></td>
                        </tr>
                    </div>
                    <div class='seperation'>
                        <tr>
                            <td><label for="address" style="width:200px; padding:1rem 0px 1rem 0px; display:inline-block; text-align:center;">
                            Address</label></td>
                            <td><input type="text" name="address" required></td>
                        </tr>
                    </div>
                    <div class='seperation'>
                        <tr>
                            <td><label for="postal_code" style="width:200px; padding:1rem 0px 1rem 0px; display:inline-block; text-align:center;">
                            Postal Code</label></td>
                            <td><input type="text" id="postal" name="postal_code" required onChange="postalCheck()"></td>
                        </tr>
                    </div>
                </div>
                <div class='button'>
                    <button type="submit" value="submit" name="submit" style="width:200px; margin: 5rem 1rem;padding:1rem 0px 1rem 0px; display:inline-block; text-align:center;">Register</button>
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