<!DOCTYPE html>
<html class='product'>
    <link rel="stylesheet" href="CSS/style.css">
    <script src="Product.js" async></script>
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
    <head>
        <div class='outernav'>
            <ul class="topnav">
                <a href="Home.html"><img src="CSS/Homey.png" alt="" class='topImg'></a>
                <li><a href="Home.html">Home</a></li>
                <li class='active'><a href="Product.php">Product</a></li>
                <li><a href="Contact.html">Contact</a></li>
                <li class='right'><a href="Cart.html">Cart</a></li>
                <li class='right'><a href="Account.html">Account</a></li>
            </ul>
        </div>
    </head>
    <body>
        <header>Product</header>
        <ul class='selection'>
            <li  class='productType'>Product Type</li>
        <div class='dropDownMenu'>
            <label id='headphone'>Headphone</label><br>
            <label id='keyboard'>Keyboard</label><br>
            <label id='laptop'>Laptop</label><br>
            <label id='iphone'>Apple Products</label>
        </div>
        </ul>
        <ul class='selection2'>
            <li><a href="">Price</a></li>
            <li><a href="">Most Sold Item</a></li>
        </ul>

        <div class='headphone'>
            <?php
                    echo "<div class='serv' >";
                    $headphoneDir = 'CSS/Productpage/Headphone/';
                    $filesH = scandir($headphoneDir);
                    foreach($filesH as $file) {
                        if($file !== "." && $file !== "..") {
                            echo "<div class='onClickImgOverText'>";
                            echo "<img style='width: 10rem; height: 10rem; margin: 4rem 0 0 0;' src='$headphoneDir$file' />";
                            $name = strstr($file, '.', TRUE);
                            echo "<label class='nameOfProduct'>$name</label>";
                            echo "<div class='priceOfProduct'> 20cents </div>";
                            echo "<button class='selectionButton'>Select</button>";
                            echo "</div>";
                        }
                    }
                    echo "</div>";
            ?> 
        </div>
        <div class='keyboard'>
            <?php
                    echo "<div class='serv ' >";
                    $keyboardDir = 'CSS/Productpage/Keyboard/';
                    $filesK = scandir($keyboardDir);
                    foreach($filesK as $file) {
                        if($file !== "." && $file !== "..") {
                            echo "<div class='onClickImgOverText'>";
                            echo "<img style='width: 10rem; height: 10rem; margin: 4rem 0 0 0;' src='$keyboardDir$file' />";
                            $name = strstr($file, '.', TRUE);
                            echo "<label class='nameOfProduct'>$name</label>";
                            echo "<div class='priceOfProduct'> 20cents </div>";
                            echo "<button class='selectionButton'>Select</button>";
                            echo "</div>";
                        }
                    }
                    echo "</div>";
            ?> 
        </div>
        <div class='iphone'>
            <?php
                    echo "<div class='serv ' >";
                    $iphoneDir = 'CSS/Productpage/Iphone/';
                    $filesI = scandir($iphoneDir);
                    foreach($filesI as $file) {
                        if($file !== "." && $file !== "..") {
                            echo "<div class='onClickImgOverText'>";
                            echo "<img style='width: 10rem; height: 10rem; margin: 4rem 0 0 0;' src='$iphoneDir$file' />";
                            $name = strstr($file, '.', TRUE);
                            echo "<label class='nameOfProduct'>$name</label>";
                            echo "<div class='priceOfProduct'> 20cents </div>";
                            echo "<button class='selectionButton'>Select</button>";
                            echo "</div>";
                        }
                    }
                    echo "</div>";
            ?>
        </div>
        <div class='laptop'>
            <?php
                    echo "<div class='serv ' >";
                    $laptopDir = 'CSS/Productpage/Laptop/';
                    $filesL = scandir($laptopDir);
                    foreach($filesL as $file) {
                        if($file !== "." && $file !== "..") {
                            echo "<div class='onClickImgOverText'>";
                            echo "<img style='width: 10rem; height: 10rem; margin: 4rem 0 0 0;' src='$laptopDir$file' />";
                            $name = strstr($file, '.', TRUE);
                            echo "<label class='nameOfProduct'>$name</label>";
                            echo "<div class='priceOfProduct'> 20cents </div>";
                            echo "<button class='selectionButton'>Select</button>";
                            echo "</div>";
                        }
                    }
                    echo "</div>";
            ?>   
        </div>
        <!-- Pardon me for my inline script testing because browser block my script -->
        <script>
            var headphoneField = document.querySelector('.headphone');
            var keyboardField = document.querySelector('.keyboard');
            var laptopField = document.querySelector('.laptop');
            var iphoneField = document.querySelector('.iphone');
            var selections = document.querySelectorAll('.selectionButton');

            document.getElementById('headphone').addEventListener('click', headphone, false)
            document.getElementById('keyboard').addEventListener('click', keyboard, false)
            document.getElementById('laptop').addEventListener('click', laptop, false)
            document.getElementById('iphone').addEventListener('click', iphone, false)

            for(var i=0; i < selections.length; i++){
                selections[i].addEventListener('click', cart, false)
            }

            function headphone(){
                headphoneField.style.display = 'block';
                keyboardField.style.display = 'none';
                laptopField.style.display = 'none';
                iphoneField.style.display = 'none';
            }
            function keyboard(){
                headphoneField.style.display = 'none';
                keyboardField.style.display = 'block'
                laptopField.style.display = 'none';
                iphoneField.style.display = 'none';
            }
            function laptop(){
                headphoneField.style.display = 'none';
                keyboardField.style.display = 'none';
                laptopField.style.display = 'block';
                iphoneField.style.display = 'none';
            }
            function iphone(){
                headphoneField.style.display = 'none';
                keyboardField.style.display = 'none'
                laptopField.style.display = 'none';
                iphoneField.style.display = 'block';
            }
            function cart(event){
                console.log(event);
            }
        </script>    
    </body>
</html>