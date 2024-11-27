<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ajout produit</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    
    <?php include_once 'fonctions.php'?>
        <nav class="nav">
            <div class="recap"><a href="recap.php">Recap </a><?=countQtt()?></div>
            <div class="index"><a href="index.php">Index</a></div>
        </nav>
        <?=$content?>
       
    </body>