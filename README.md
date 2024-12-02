# **README First APP**

## **First APP**

## **Introduction**

This exercise is made to teach the use of `$_SESSION` in PHP.

## **Main function of the project**

This function is a made to filter what the user inputs to make sure it's **safe** and **usable** in our PHP, after making sure the input is up to norm.
The function pushes the user's input in the array `('product')` saved in `$_SESSION["products"]` if the push is succesful, it will return the `alert alert-success`
```php
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

                        $_SESSION["alert"] = "<div class='divAlert'><p class='alert alert-success'>Produit ajouté au recape.</p></div>";

                    } 
                    else {
                        $_SESSION["alert"] = "<div class='divAlert'><p class='alert alert-danger'>Une erreur est survenue.</p></div>";
                        header("Location:index.php");
                    }
                }
        }
    }   
```
Otherwise, if the user's input is wrong, it will ignore everything and return `'alert alert-danger'` to inform the user of what happened.

## **if you have question about the project you can contact me on my [linkedIn](https://www.linkedin.com/in/nassim-hammoudi-8a5235334/)**
