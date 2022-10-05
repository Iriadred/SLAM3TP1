<html>
    <head>
       <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="CSS/main.css" media="screen" type="text/css" />
    </head>
    <body>
        <?php session_start();?>
        <div id="container">
            <!-- zone de connexion -->  
            
            <h1>Yo mec <?=$_SESSION["nom"]?></h1>
            <a href="deconnection.php">Déconnexion</a>
        </div>
    </body>
</html>