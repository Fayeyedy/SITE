<!DOCTYPE html>
<html lang="ro">
    <?php
    session_start();
        require_once('php/createDb.php');
        function component($productname, $productprice,$codprodus){
            $cod = "images/".$codprodus.".jpg";
            $element = "
            <ul>
            <li>
                <img src=\"$cod\" class=\"prodim\">
                <h3>Product Name</h3>
                <p>
                    $productprice <sup>00</sup> Lei
                </p>
                <p>
                <form action=\"php/cart.php\" method=\"get\">
                    <input type=\"hidden\" name=\"cod_hidden\" value=\"$codprodus\" />
                    <input type=\"hidden\" name=\"pret_hidden\" value=\"$productprice\" />
                    <input type=\"hidden\" name=\"nume_hidden\" value=\"$productname\" />
                    <button type=\"submit\" name=\"cart_button\" onclick=\"addToCart()\" class=\"addtocart\">ADAUGA IN COS
                    </button>
                </form>
                </p>
            </li>
            </ul>
            ";
            echo $element;
        }
        $database = new createDb("samady","produse");
    ?>

<head>
    
    <!-- Ads -->
    <script src="https://richinfo.co/richpartners/push/js/rp-cl-ob.js?pubid=836219&siteid=312486&niche=33"></script>
      <!-- Ads -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <META NAME="DESCRIPTION" CONTENT="Luna Samady este locul unde gasesti o variatie de lenjerii confortabile si de modele prestigioase.">
    <META NAME="KEYWORDS" CONTENT="Luna Samady, luna samady, lenjerii, samady live, samady, Samady">
    <META NAME="AUTHOR" CONTENT="Fady">
    <script src="https://kit.fontawesome.com/d8ef06f089.js" crossorigin="anonymous"></script>
    <title>Samady</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <div class="mobile">
            <div id="ion">
                <form action="index.php" method="post">
                    <button type="button" onclick="showInput()"><i class="fa-solid fa-arrow-left-long"></i></button>
                    <input type="search" name="search" id="srch">
                </form>
            </div>
            <div class="mob" id="mob">

                <button class="fa-solid fa-bars" onclick="hideImg()"></button>
                <div class="image_mob">
                    <img src="images/logo_transparent - Copy.png" alt="">
                </div>
                <div class="icons">
                    <ul>
                        <li><a onclick="showInput()"><i class="fa-solid fa-magnifying-glass"></i></a></li>
                        <li><a href=""><i class="fa-solid fa-heart"></i></a></li>
                        <li><a href="php/cart2.php"><i class="fa-solid fa-cart-shopping"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="dropdown" id="dd">
                <button class="fa-solid fa-x" onclick="hideImg()"></button>
                <div class="imaginatie">
                    <a href="https://samady.live/"><img src="./images/logo_transparent - Copy.png" alt=""></a>
                </div>
                <ul>
                    <li class="und"><a href="">Perne</a></li>
                    <li class="und"><a href="">Huse de pat</a></li>
                    <li class="und"><a href="">Protectii saltea</a></li>
                    <li class="und"><a href="">Halate</a></li>
                    <li class="und"><a href="">Prosoape</a></li>
                    <li class="und"><a href="">Mai multe</a></li>
                </ul>
            </div>
            <div class="exit" onclick="exit()">
            </div>
        </div>
        <nav>
            <div class="image">
            <a href="https://www.samady.live"><img src="images/logo_transparent - Copy.png" alt=""></a>
            </div>
            <ul>
                <li><a href="">Perne</a></li>
                <li><a href="">Huse de pat</a></li>
                <li><a href="">Protectii saltea</a></li>
                <li><a href="">Halate</a></li>
                <li><a href="">Prosoape</a></li>
                <li><a href="">Mai multe</a></li>
                <div class="icons">
                    <li><a href=""><i class="fa-solid fa-heart"></i></a></li>
                    <li><a href="#src"><i class="fa-solid fa-magnifying-glass"></i></a></li>
                    <li><a href="php/cart2.php"><i class="fa-solid fa-cart-shopping"></i></a></li>
                </div>
            </ul>
        </nav>
    </header>
    <div class="img">
        <img src="images/images.jpg" alt="">
    </div>
    <div class="butns">
        <div class="main">
            <div class="but">
                <i class="fa-solid fa-truck"></i>
            </div>
        </div>
        <div class="main">
            <div class="but">
                <i class="fa-solid fa-bed"></i>
            </div>
        </div>
        <div class="main">
            <div class="but">
                <i class="fa-solid fa-wallet"></i>
            </div>
        </div>
        <div class="main">
            <div class="but">
                <i class="fa-solid fa-money-bill"></i>
            </div>
        </div>
    </div>
    <div class="src">
        <form action="index.php" method="get">
            <input type="search" name="search" id="src" placeholder="Cauta pe site...">
            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
    </div>
    <div class="produse">
<?php
    $name = $_GET['search'];
    $result = $database->search($name);
    while($row = mysqli_fetch_assoc($result)){
        component($row['product_name'], $row['product_price'], $row['id']);
    }
        ?>
    </div>

    <script>
        function showInput() {
            if (document.getElementById("mob").style.display != "none") {
                document.getElementById("mob").style.display = "none";
                document.getElementById("ion").style.display = "block";
            }
            else {
                document.getElementById("mob").style.display = "flex";
                document.getElementById("ion").style.display = "none";
            }

        }
        function hideImg() {
            if (document.getElementById("dd").style.display == "block") {
                document.getElementById("dd").style.display = "none";
            } else {
                document.getElementById("dd").style.display = "block";
            }
        }
        function exit() {
            if (document.getElementById("dd").style.display == "block") {
                document.getElementById("dd").style.display = "none";
            }
        }
    </script>
</body>

</html>