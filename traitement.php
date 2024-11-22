<link rel="stylesheet "href="style.css">

<?php 
//commence la session pour sauvegarder les info envoyé par l'utilisateur et ces preference
session_start();


//verifie que le contenue du $_POST est au bon format et retourne vide si faux
if(isset($_POST['submit'])){
    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
    $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);

    //verifie que les variable soit remplie pour continuer
    if($name && $price && $qtt){
        //stock les valeur de l'utilisateur dans un tableau
        $product = [
        "name" => $name,
        "price" => $price,
        "qtt" => $qtt,
        "total" => $price * $qtt,
        ];
        //envoie notre tableau de produit a la session de l'utilisateur
        $_SESSION["product"][] = $product;
    }
}
//empeche l'utilisateur d'ouvrire la page "traitement.php"
header("location:index.php");
var_dump($_POST);
