<?php
session_start();

if(isset($_SESSION["shopping_cart"]))
{
    $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
    $id = $_POST["cod_hidden"];
    if(!in_array($id,$item_array_id))
    {
        $count = count($_SESSION["shopping_cart"]);
        $item_array= array(
            'item_id' => $_GET["cod_hidden"],
            'nume' => $_GET["nume_hidden"],
            'pret' => $_GET["pret_hidden"],
        );
        $_SESSION["shopping_cart"][$count] = $item_array;
        echo "<script>window.location = \"cart2.php\"</script>";
    }
    else{
        echo '<script> alert("Produsul este deja in cos")</script>';
        echo "<script>window.location = \"../index.php\"</script>";
    }   

}else{
    $item_array= array(
        'item_id' => $_GET["cod_hidden"],
        'nume' => $_GET["nume_hidden"],
        'pret' => $_GET["pret_hidden"],
    );
    $_SESSION["shopping_cart"][0] = $item_array;
    echo "<script>window.location = \"cart2.php\"</script>";
}

?>