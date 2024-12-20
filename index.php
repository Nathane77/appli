<?php
session_start();
ob_start();
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
        <title>Ajout produit</title>
    </head>
    <body>
    
        <div class=divTable>
            <div class=divForm>
                <h1>Ajouter un produit</h1>
                <form action="traitement.php?action=add" method="post">
                    <p>
                        <label>
                            Nom du produit :
                            <input type="text" name="name">
                        </label>
                    </p>
                    <p>
                        <label>
                        Prix du produit:
                        <input type="number" step="any" min="1" name="price">
                        </label>
                    </p>
                    <p>
                
                <label>
                    Quantité désirée :
                    <input type="number" name="qtt" min="1" value="1">
                </label>
                </p>
                <p>
                    <input type="submit" name="submit" value="Ajouter le produit">
                </p>
                </form>
            </div>
        </div>
    <?php
      
      if (isset($_SESSION["alert"])) {
        echo $_SESSION["alert"];
        unset($_SESSION["alert"]);
    }
    
    $content = ob_get_clean();

    require_once "template.php";
    ?>

    
    </body>

    </html>

    
    