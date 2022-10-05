<html>
    <head>
       <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="CSS/main.css" media="screen" type="text/css" />
    </head>
    <body>
        <div id="container">
            <!-- zone de connexion -->
        <?php session_start();

            if(!isset($_SESSION["nom"])){
                $_SESSION["nom"]="";
            }

            if($_SESSION["nom"]!=""){
                header('Location:connexion.php ');
            }

            if(!isset($_SESSION["verif"])){
                $_SESSION["verif"]=true;
            }

            if($_SESSION["verif"]==false){
                echo "<h2>mot de passe incorrect</h2>";}

            ?>
            <form action="verification.php" method="POST">
                <h1>Connexion</h1>
                
                <label><b>Nom d'utilisateur</b></label><br>
                <input type="text" placeholder="Entrer votre identifiant" name="nom"  required><br><br>

                <label><b>Mot de passe</b></label><br>
                <input type="password" placeholder="Entrer le mot de passe" name="mdp" required><br><br>

                <input type="submit" id='submit' href="verification.php"value='LOGIN' >
                <?php
                // Code de vérification 
                ?>
            </form>
            <a href="inscription.php">Pas inscrit ?</a>  
        </div>
    </body>
</html>
