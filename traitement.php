<link rel="stylesheet "href="style.css">

<?php 
//commence la session pour sauvegarder les info envoyé par l'utilisateur et ces preference
session_start();

if(isset($_GET['action'])){
    switch($_GET['action']){
        case "add":
                //verifie que le contenue du $_POST est au bon format et retourne vide si faux
                if(isset($_POST['submit'])){
                    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                    $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);

                    //verifie que les variable soit remplie pour continuer
                    if($name && $price && $qtt){
                        //stock les valeur d'un produit dans un tableau
                        $product = [
                        "name" => $name,
                        "price" => $price,
                        "qtt" => $qtt,
                        "total" => $price * $qtt,
                        ];
                        //envoie notre tableau de produit a la session de l'utilisateur
                        $_SESSION["products"][] = $product;

                        $_SESSION["alert"] = "<p class='alert alert-success'>Produit ajouté au recape.</p>";

                    } 
                    else {
                        $_SESSION["alert"] = "<p class='alert alert-danger'>Une erreur est survenue.</p>";
                        header("Location:index.php");
                    }
                }
            header("Location:index.php");
            break;
        case "delete":
            if (isset($_GET["id"])) {

                    $index = $_GET["id"];
                                       
                    unset($_SESSION['products'][$index]);
                    
                    header("Location:recap.php");

                    $_SESSION["alert"] = "<p class='alert-success text-center'>Produit supprimé</p>";
                    die;
            }
            break;
        case "clear":
            unset($_SESSION['products']);

            header("Location:index.php");

            $_SESSION["alert"] = "<p class='alert-success text-center'>Recap Vidé.</p>";
            die;
            break;

        case "up-qtt":
            if (isset($_GET["id"])) {

                $index = $_GET["id"];
        
                
            $_SESSION['products'][$index]['qtt']++;

                header("Location:recap.php");
            break;
            die;
         
        } 
            case "down-qtt":
                if (isset($_GET["id"])) {

                    $index = $_GET["id"];

                    if($_SESSION['products'][$index]['qtt'] > 0){
                        
                        $_SESSION['products'][$index]['qtt']--;

                        header("Location:recap.php");
                        
                        if($_SESSION['products'][$index]['qtt'] <= 0 && isset($_GET["id"])){
                                $index = $_GET["id"];
                                                
                                unset($_SESSION['products'][$index]);
                                
                                header("Location:recap.php");

                                $_SESSION["alert"] = "<p class='alert-success text-center'>Produit supprimé</p>";
                                die;
                }
                else{
                    echo "Vous n'avez aucun items a supprimer";
                }
                break; 
        
            }
        }
    }
}

// header("Location:index.php");