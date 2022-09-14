<html>
    <head>
       <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    </head>
    <body>
        <div id="container">
            <!-- zone de connexion -->
            
            <form action="verification.php" method="POST">
                <h1>Inscription</h1>
                
                    <div class="form-example">
                        <input type="text" name="nom" placeholder="Votre nom" id="nom" required>
                    </div>
                    <br>
                    <div class="form-example">
                        <input type="email" name="email" placeholder="Votre email" id="email" required>
                    </div>
                    <br>
                       <div class="form-example">
                        <input type="password" name="mdp" placeholder="Votre mot de passe" id="mdp" required>
                    </div>
                    <br>
                    <div class="form-example">
                        <input type="submit" value="inscription" >
                    </div>
                <?php
                $servername='localhost';
                $dbname='SLAM3TP1';
                $username='root';
                $password='';

                $email= strip_tags($_POST["email"]);
                $nom= strip_tags($_POST["Nom"]);
                $mdp= strip_tags($_POST["mdp"]);
           
                try{
                    $conn= new PDO("mysql:host=$servername;dbname=$dbname",$username,$password); 
                    $requete = $conn->prepare("INSERT INTO `contact`(`email`, `Nom`, `description`) VALUES (:email,:nom,:mdp);");
        
                    $requete->bindValue(':email',$email , PDO::PARAM_STR);
                    $requete->bindValue(':nom',$nom , PDO::PARAM_STR);
                     $requete->bindValue(':mdp',$mdp , PDO::PARAM_STR);
        
                    $requete->execute();
                }
                catch(Exception $e)
                {
                    // En cas d'erreur, on affiche un message et on arrête tout
                        die('Erreur : '.$e->getMessage());
                }
                
                // Si tout va bien, on peut continuer
                
                /* On récupère tout le contenu de la table recipes
                $sqlQuery = 'SELECT * FROM recipes';
                $recipesStatement = $mysqlClient->prepare($sqlQuery);
                $recipesStatement->execute();
                $recipes = $recipesStatement->fetchAll();
                
                // On affiche chaque recette une à une
                foreach ($recipes as $recipe) {
                ?>
                    <p><?php echo $recipe['author']; ?></p>
                <?php*/
                //} 
                ?>
            </form>
        </div>
    </body>
</html>