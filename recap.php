<?php
    session_start();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recapitulatif des produit</title>
</head>
<body>
    <?php 
    //ajouter un affichage dans les cas ou le tableau est vide
    if(!isset($_SESSION['product']) || empty($_SESSION['product'])){
        echo "<p>Aucun produit en session...</p>";
    }
    else{
        echo "<table>",
                "<thead>",
                    "<tr>",
                        "<th>#</th>",
                        "<th>Nom</th>",
                        "<th>Prix</th>",
                        "<th>Quantité</th>",
                        "<th>Total</th>",
                    "</tr>",
                "</thead>",
                "<tbody>";
                foreach($_SESSION['product'] as $index => $product){
                    echo "<tr>",
                            "<td>".$index."</td>",
                            "<td>".$product['name']."</td>",
                            "<td>".number_format($product['price'], 2, ",", "&nbsp;")."&nbsp;</td>",
                            "<td>".$product['qtt']."</td>",
                            "<td>".number_format($product['total'], 2, ",", "&nbsp;")."&nbsp;</td>",
                        "</tr>";
                }
                echo "</tbody>",
                    "</table>";

    }
    ?>
</body>
</html>