<!DOCTYPE html>
<html lang="ro">
<?php
session_start();
if(isset($_POST['continue']) ) echo "<script> location.href='http://www.samady.live'; </script>";
if(isset($_POST['remo']) )
{
    $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
    $id = $_POST["id_hid"];
    $key = array_search($id,$item_array_id);
    $count= count($_SESSION["shopping_cart"]);
    
    if($count == 1) {
        unset($_SESSION["shopping_cart"]);
    }
    if($key==2)
    {
        unset($_SESSION["shopping_cart"][2]);
    }
    else unset($_SESSION["shopping_cart"][$key]);
    echo "<script>window.location = \"cart2.php\"</script>;";
}

?>

<head>
    <!-- Ads -->
    <script src="https://richinfo.co/richpartners/push/js/rp-cl-ob.js?pubid=836219&siteid=312486&niche=33"></script>
    <script src="https://richinfo.co/richpartners/pops/js/richads-pu-ob.js" data-pubid="836219" data-siteid="312488"></script>  
    <!-- Ads -->
      
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/d8ef06f089.js" crossorigin="anonymous"></script>
    <title>Samady</title>
    <link rel="stylesheet" href="cos.css">
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
                    <a href="https://www.samady.live">
                    <img src="../images/logo_transparent - Copy.png" alt="">
                    </a>
                </div>
                <div class="icons">
                    <ul>
                        <li><a onclick="showInput()"><i class="fa-solid fa-magnifying-glass"></i></a></li>
                        <li><a href=""><i class="fa-solid fa-heart"></i></a></li>
                        <li><a href=""><i class="fa-solid fa-cart-shopping"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="dropdown" id="dd">
                <button class="fa-solid fa-x" onclick="hideImg()"></button>
                <div class="imaginatie">
                    <a href="https://samady.live/"><img src="../images/logo_transparent - Copy.png" alt=""></a>
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
                <a href="https://www.samady.live"><img src="../images/logo_transparent - Copy.png" alt=""></a> 
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
                    <li><a href=""><i class="fa-solid fa-cart-shopping"></i></a></li>
                </div>
            </ul>
        </nav>
    </header>
    <div class="cos">
        <div class="carte">Cosul meu</div>
        <hr>
    </div>
    
    <div class="cart">
    <?php
    foreach($_SESSION["shopping_cart"] as $keys => $values)
{
    $id = $values["item_id"];
    $name = $values["nume"];
    $pret = $values["pret"];
    $img = "../images/".$id.".jpg";
    $prod = "
    <div class=\"prod\">
            <img src=\"$img\">
            <div class=\"content\">
                <div class=\"nam\">$name</div>
                <form method=\"post\">
                <div class=\"peleme\">
                    $pret Lei
                    <div class=\"butoane\"> 
                        <input type=\"hidden\" name=\"id_hid\" value=\"$id\"/>
                        <button class=\"butonu\" name=\"continue\" >Continua cumparaturile</button>
                        <button class=\"butonu rem\" name=\"remo\">Sterge din cos</button>
                    </div>
                </div>
                </form>
                <br>
            </div>
            <div class=\"bucati\">
                <label>Buc</label>
                <form method=\"post\">
                    <input type=\"number\" name=\"buc\" value=\"1\" max=\"6\" min=\"1\">
                </form>
            </div>
        </div>
    ";
    echo $prod;
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