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
        $_SESSION["alert"] = "<div class='divAlert'><p class='alert alert-danger'>Aucun produit en session.</p></div>";
    }
    else{
        echo 
        "<div class=divTable>",
            "<div class=divForm>", 
                    "<table class='table caption-top'>",
                    "<caption>Recap de votre panier</caption>",
                        "<thead>",
                            "<tr>",
                                "<th scope='col'>#</th>",
                                "<th scope='col'>Nom</th>",
                                "<th scope='col'>Prix</th>",
                                "<th scope='col'>Quantité</th>",
                                "<th scope='col'>Total</th>",
                            "</tr>",
                        "</thead>",
                        "<tbody>";
                        $totalGeneral = 0;
                        foreach($_SESSION['products'] as $index => $product){
                            echo "<tr>",
                                    "<th scope='row'>".$index."</th>",
                                    "<td>".$product['name']."</td>",
                                    "<td>".number_format($product['price'], 2, ",", "&nbsp;")."&nbsp;</td>",
                                    "<td>".$product['qtt'].' ',
                                    "<a class=plus href=traitement.php?action=up-qtt&id=$index> + </a><a class=minus href=traitement.php?action=down-qtt&id=$index name=minus> - </a></td>",
                                    "<td>".number_format($product['total'], 2, ",", "&nbsp;")."&nbsp; <a class=recape href=traitement.php?action=delete&id=$index>D</a></td>",
                                "</tr>";
                                $totalGeneral += $product['total'];
                        }
                        echo 
                            "<tr>",
                                "<td colspan=4>Total général: </td>",
                                "<td><strong>".number_format($totalGeneral, 2, ",", "&nbsp;")."&nbsp;</td>", 
                            "</tr>",
                            "</tbody>",
                            "</table>",
                            "<a class='cancel' href='traitement.php?action=clear'>Annulation</a>",
                        "</div>",
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