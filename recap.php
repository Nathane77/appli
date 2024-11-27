<?php
    session_start();
    ob_start();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Recapitulatif des produit</title>
</head>
<body>
    <?php 
    //ajouter un affichage dans les cas ou le tableau est vide
    if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
        echo "<p>Aucun produit en session...</p>";
    }
    else{
        echo
        "<div class=divTable>", 
            "<table>",
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
                $totalGeneral = 0;
                foreach($_SESSION['products'] as $index => $product){
                    echo "<tr>",
                            "<td>".$index."</td>",
                            "<td>".$product['name']."</td>",
                            "<td>".number_format($product['price'], 2, ",", "&nbsp;")."&nbsp;</td>",
                            "<td>".$product['qtt'].' ',
                            "<a class=plus href=traitement.php?action=up-qtt&id=$index> + </a><a class=recape href=traitement.php?action=down-qtt&id=$index name=minus> - </a></td>",
                            "<td>".number_format($product['total'], 2, ",", "&nbsp;")."&nbsp; <a class=recape href=traitement.php?action=delete&id=$index>D</a></td>",
                        "</tr>";
                        $totalGeneral += $product['total'];
                }
                echo 
                    "<tr>",
                        "<td colspan=4>Total général: </td>",
                        "<td><strong>".number_format($totalGeneral, 2, ",", "&nbsp;")."&nbsp;</td>", 
                    "</tr>",
                    "<tr class='cancel'>",
                        "<td><a href='traitement.php?action=clear'>Annulation</td>",
                    "</tr>",
                    "</tbody>",
                    "</table>",
                "</div>";

    }

    if (isset($_SESSION["alert"])) {
        echo $_SESSION["alert"];
        unset($_SESSION["alert"]);
    }

    $content = ob_get_clean();
    require_once "template.php";
    ?>
</body>
</html>