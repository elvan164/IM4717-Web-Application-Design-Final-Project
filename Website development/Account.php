<?php

    @ $db = new mysqli('localhost', 'f36ee', 'f36ee', 'f36ee');

    if (mysqli_connect_errno()) {
        echo "Error: Could not connect to database.  Please try again later.";
        exit;
    }

    if (isset($_POST['username'])){
        
        $login_error;
        $username = $_POST['username'];
        $password = md5($_POST['password']);
    
        $sql = "SELECT * from Users WHERE username='$username' and password='$password'";
    
        $result = $db -> query($sql);
        $row = $result -> fetch_assoc();
        
    
        //returns a query
        if ($result->num_rows>0){
            session_start();
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['valid_user'] = $username;
            $_SESSION['cart'] = array();
    
            echo $row["id"];
            echo $_SESSION["user_id"];
            echo "<script>window.location.href='Orderhistory.php'</script>";
            
        }
    
        else {
            echo "$result->error_log";
            $login_error = 'Login failed. Please try again';
            
            //redirect to member page
        }
    
        
    
    
    
    }
?>

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
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class='loginField'>
                <div class='details'>
                    <label for="loginId">Username</label>
                    <input type="text" name='username' required>
                </div>
                <div class='details'>
                    <label for="loginPW">Password</label>
                    <input type="password" name='password' id='loginPW' required>
                </div>
                <button value='register' class='button'><a href="Register.php" style='text-decoration: none; color:white;'>Register</a></button>
                <button type="submit" class='button'>Submit</button>
            </div>
        </form>
    </body>
</html>