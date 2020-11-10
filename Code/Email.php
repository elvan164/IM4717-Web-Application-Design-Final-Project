<?php 

session_start();

@ $db = new mysqli('localhost', 'f36ee', 'f36ee', 'f36ee');

if (mysqli_connect_errno()) {
    echo "Error: Could not connect to database.  Please try again later.";
    exit;
 }

 $user_id = $_SESSION['user_id'];
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


    $total_price = $_SESSION['total_price']; 
    
    
    $date = date("Y-m-d H:i:s");// current date

    $insert_order = "INSERT INTO Customer_Orders VALUES (NULL,'$user_id','$date','$total_price')";
    
    $db->query($insert_order);
    //returns id of recently inserted row
    $order_id = $db->insert_id;

    $message = "Greetings from Home Electronics ".$name.".\n";
    $message .= "We have received your order.\n";
    $message .= "Below are your order details:\n";
    $message .= "Your order reference no. is: ".$order_id.".\n";
    
    foreach ($_SESSION['cart'] as $id => $qty) {
        $name = str_replace("_", " ", $id);

        $sql = "SELECT * from Product WHERE name='$id'";
        $result = $db->query($sql);
        foreach ($result as $key){
        $product_id = $key["id"];
        $product_price = $key["price"];
        }
        

        $message .= "\nProduct Name: ".$name."\nQuantity: ".$qty."\n";
        
        $insert_product_order = "INSERT INTO Product_Orders VALUES (NULL,$order_id,$product_id,$qty,$product_price)";
        
        $db->query($insert_product_order);
    }
    $message .= "\nTotal Price: $".$total_price."\n\n";

    //unset cart session
    unset($_SESSION['cart']);
    $_SESSION['cart'] = array();

    //send mail 

    $message .= "Items will be sent to: ".$address.", Singapore ".$postal_code;
    $message .= "\nThanks for shopping with us!";
    
    $to = 'f36ee';
    $subject = 'Your order from Home Electronics has been confirmed!';
    $headers = 'From: f36ee@localhost'."\r\n".'Reply-To: f36ee@localhost'."\r\n".'X-Mailer: PHP/'.phpversion();

    mail($to,$subject,$message,$headers);

    echo "<script>alert('Your order is successful, a confirmation email will be sent to you shortly.')</script>";
    echo "<script>location.href='Orderhistory.php'</script>";


?>