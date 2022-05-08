<!DOCTYPE html>
<html lang="ro">
<?php
session_start();
$sters = 0;
if(isset($_POST['remo']))
    {
    $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
    $id = $_POST["id_hid"];
    if(in_array($id,$item_array_id))
    {
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
        $key = array_search($id,$item_array_id);
        unset($_SESSION["shopping_cart"][$key]);
        $mes = "<script> alert(\"$key Produsul a fost sters din cos $id \")</script>";
        echo $mes;
        $sters = 1;
    }
    }
if(isset($_SESSION["shopping_cart"]) && $sters==0)
{
    
    $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
    $id = $_POST["cod_hidden"];
    if(!in_array($id,$item_array_id) && $sters==0)
    {
        $count = count($_SESSION["shopping_cart"]);
        if($count < 6)
        {
        $item_array= array(
            'item_id' => $_POST["cod_hidden"],
            'nume' => $_POST["nume_hidden"],
            'pret' => $_POST["pret_hidden"],
        );
        $_SESSION["shopping_cart"][$count] = $item_array;
        echo '<script> alert("Produsul a fost adaugat in cos")</script>';
        }
        else{
        echo '<script> alert("Limita este de 5 produse")</script>';
        }
    }
    else if($sters==0) {
        echo '<script> alert("Produsul este deja in cos")</script>';
        echo "<script>window.location = \"../index.php\"</script>";
    }   

}else{
    if($sters==0)
    {
    $item_array= array(
        'item_id' => $_POST["cod_hidden"],
        'nume' => $_POST["nume_hidden"],
        'pret' => $_POST["pret_hidden"],
    );
    $_SESSION["shopping_cart"][0] = $item_array;
    echo '<script> alert("Produsul a fost adaugat in cos")</script>';
}
}

?>

<head>
    <!-- Ads -->
    <script src="https://richinfo.co/richpartners/push/js/rp-cl-ob.js?pubid=836219&siteid=312486&niche=33"></script>
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
                    <img src="images/logo_transparent - Copy.png" alt="">
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
                <img src="images/logo_transparent - Copy.png" alt="">
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
                <div class=\"nam\">$name</div> <br>
                <form method=\"post\">
                <div class=\"peleme\">
                    $pret Lei
                    <div class=\"butoane\"> 
                        <input type=\"hidden\" name=\"id_hid\" value=\"$id\"/>
                        <button class=\"butonu\">Continua cumparaturile</button>
                        <button class=\"butonu rem\" name=\"remo\">Sterge din cos</button>
                    </div>
                </div>
                </form>
                <br>
            </div>
            <div class=\"bucati\">
                <label>Buc</label>
                <form method=\"post\">
                    <input type=\"number\" name=\"buc\" max=\"6\">
                </form>
            </div>
        </div>
    ";
    echo $prod;
    /*
    $id = $values["item_id"];
        <div class=\"prod\">
            <img src=\"images/H3183.jpg\" alt="">
            <div class="content">
                <div class="nam"> Apple macbool pl plm</div> <br>
                <div class="peleme">
                    89 Lei
                    <div class="butoane">
                        <button class="butonu">Continua cumparaturile</button>
                        <button class="butonu rem">Sterge din cos</button>
                    </div>
                </div>
                <br>
            </div>
            <div class="bucati">
                <label>Buc</label>
                <form method="post">
                    <input type="number" name="buc" max="6">
                </form>
            </div>
        </div>
   
   */
} 
?>
</div>
     
</body>

</html>