<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Première appli</title>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <link rel="shortcut icon" href="content/logo.png">
    </head>
    <body>
    
    <?php include_once 'fonctions.php'?>
        <nav class="nav">
            <div class="recap"><a href="recap.php">Recap&nbsp;<?=countQtt()?></div></a>
            <div class="divLogo" ><a href="https://www.artstation.com/artwork/V1LLb" target="_blank"><img class="logo" src="content/logo.png" alt="pokeball logo by By Honokawa"></a></div>
            <div class="index"><a href="index.php">Index</a></div>
        </nav>
        <?=$content?>   

</tr>
    </body>