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

            if(!isset($_SESSION["verif2"])){
                $_SESSION["verif2"]=true;
            }

            if($_SESSION["verif2"]==false){
                echo "<h2>mot de passe incorrect</h2>";}?>

            
            <form action="php.php" method="POST">
                <h1>Inscription</h1>
                
                    <div class="form-example">
                    <label><b>Pseudo</b></label><br>
                        <input type="text" name="nom" placeholder="Votre Nom" id="nom" required>
                    </div>
                    <br>
                    <div class="form-example">
                    <label><b>Email</b></label><br>
                        <input type="email" name="email" placeholder="Votre email" id="email" required>
                    </div>
                    <br>
                       <div class="form-example">
                       <label><b>Mot de passe</b></label><br>
                        <input type="password" name="mdp" placeholder="Votre mot de passe" id="mdp" required>
                    </div>
                    <br>
                    <div class="form-example">
                       <label><b>Retaper votre mot de passe</b></label><br>
                        <input type="password" name="remdp" placeholder="Retaper votre mot de passe" id="remdp" required>
                    </div>
                    <br>
                    <div class="form-example">
                        <input type="submit" value="inscription" >
                    </div>

                    
                <?php
                
                ?>
            </form>
        </div>
    </body>
</html>