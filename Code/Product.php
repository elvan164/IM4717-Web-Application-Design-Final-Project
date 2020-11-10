<?php

session_start();

@ $db = new mysqli('localhost', 'f36ee', 'f36ee', 'f36ee');

if (mysqli_connect_errno()) {
    echo "Error: Could not connect to database.  Please try again later.";
    exit;
 }

    $price_array = array();
    $category_array = array();
    $query = "SELECT name,price,category FROM Product";
    $result  = $db->query($query);
    
    foreach ($result as $key) {
        $price_array[$key["name"]] = $key["price"];
        $category_array[$key["name"]] = $key["category"];
    }
    
    if (isset($_GET["Ascending"])){
        asort($price_array);
    }

    if (isset($_GET["Descending"])){
        arsort($price_array);
    }

    if (isset($_GET["select"])){
        if ($_SESSION['is_valid'] == false)
        {
            echo "<script>window.location.href='Account.php'</script>";
        }
        else
        {
            $id = $_GET["select"];
            $amount =(int) $_GET["$id"];
            if(isset($_SESSION['cart']))
            {
            $_SESSION['cart'][$_GET["select"]] += $amount;
            }
        }
    }

    $db->close();

?>

<html lang = "en" class='product'>
    <link rel="stylesheet" href="CSS/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
    <head>
        <div class='outernav'>
            <ul class="topnav">
                <a href="Home.php"><img src="CSS/Homey.png" alt="" class='topImg'></a>
                <li><a href="Home.php">Home</a></li>
                <li class='active'><a href="Product.php">Product</a></li>
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
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
        <header>Product</header>
        <ul class='selection'>
            <li  class='productType'>Product Type</li>
        <div class='dropDownMenu'>
            <label id='headphone'>Headphone</label><br>
            <label id='keyboard'>Keyboard</label><br>
            <label id='laptop'>Laptop</label><br>
            <label id='apple'>Apple Products</label>
        </div>
        </ul>
        
        <ul class='selection2'>
            <li><input value="Lowest to Highest" name="Ascending" type="submit"
            style= "background: none; color: inherit; border: none; padding: 0; font: inherit;
            cursor: pointer; outline: inherit;"/></li>
            <li><input value="Highest to Lowest" name="Descending" type="submit"
            style= "background: none; color: inherit; border: none; padding: 0; font: inherit;
            cursor: pointer; outline: inherit;"/></li>
        </ul>
        
        <div class="serv">
            <?php
                foreach($price_array as $key => $price) {
                    $name = str_replace("_", " ", $key);
                    ?>

                    <div class="onClickImgOverText">
                        <a class="<?php echo $category_array[$key]?>">
                            <img style="width: 10rem; height: 10rem; margin: 4rem 0 0 0;" src="images/<?php echo $name?>.jpg"/>
                            <label class='nameOfProduct'><?php echo $name?></label>
                            <div class='priceOfProduct'> $<?php echo $price_array[$key]?> </div>
                            <input type="number" name="<?php echo $key?>" 
						    min="0" value='1'>         
                            <button class='selectionButton' name='select' value = "<?php echo $key?>">Add</button>
                        </a>
                    </div>
            <?php
                }
            ?>
        </div>
        </form>

        <script>

            var selections = document.querySelectorAll('.selectionButton');

            document.getElementById('headphone').addEventListener('click', headphone, false);
            document.getElementById('keyboard').addEventListener('click', keyboard, false);
            document.getElementById('laptop').addEventListener('click', laptop, false);
            document.getElementById('apple').addEventListener('click', apple, false);

            for(var i=0; i < selections.length; i++){
                selections[i].addEventListener('click', cart, false);
            }

            function headphone(){
                var divs = document.getElementsByTagName("a");
                for (var i = 0; i<divs.length; i++){
                    if(divs[i].className == "Headphone"){
                        divs[i].setAttribute("style", "display: inline;");
                    }
                    if(divs[i].className == "Keyboard"){
                        divs[i].setAttribute("style", "display: none;");
                    }
                    if(divs[i].className == "Laptop"){
                        divs[i].setAttribute("style", "display: none;");
                    }
                    if(divs[i].className == "Apple"){
                        divs[i].setAttribute("style", "display: none;");
                    }
                }
            }

            function keyboard(){
                var divs = document.getElementsByTagName("a");
                for (var i = 0; i<divs.length; i++){
                    if(divs[i].className == "Headphone"){
                        divs[i].setAttribute("style", "display: none;");
                    }
                    if(divs[i].className == "Keyboard"){
                        divs[i].setAttribute("style", "display: inline;");
                    }
                    if(divs[i].className == "Laptop"){
                        divs[i].setAttribute("style", "display: none;");
                    }
                    if(divs[i].className == "Apple"){
                        divs[i].setAttribute("style", "display: none;");
                    }
                }
            }

            function laptop(){
                var divs = document.getElementsByTagName("a");
                for (var i = 0; i<divs.length; i++){
                    if(divs[i].className == "Headphone"){
                        divs[i].setAttribute("style", "display: none;");
                    }
                    if(divs[i].className == "Keyboard"){
                        divs[i].setAttribute("style", "display: none;");
                    }
                    if(divs[i].className == "Laptop"){
                        divs[i].setAttribute("style", "display: inline;");
                    }
                    if(divs[i].className == "Apple"){
                        divs[i].setAttribute("style", "display: none;");
                    }
                }
            }

            function apple(){
                var divs = document.getElementsByTagName("a");
                for (var i = 0; i<divs.length; i++){
                    if(divs[i].className == "Headphone"){
                        divs[i].setAttribute("style", "display: none;");
                    }
                    if(divs[i].className == "Keyboard"){
                        divs[i].setAttribute("style", "display: none;");
                    }
                    if(divs[i].className == "Laptop"){
                        divs[i].setAttribute("style", "display: none;");
                    }
                    if(divs[i].className == "Apple"){
                        divs[i].setAttribute("style", "display: inline;");
                    }
                }
            }

            function cart(event){
                console.log(event);
            }

            document.getElementById('price').addEventListener('click', price, false);
            var L2H = true;
            function price(){
                var hi = '<?php asort($price_array);?>';
                location.reload();
                
            }

        </script>    
    </body>
</html>