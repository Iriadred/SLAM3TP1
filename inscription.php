<html>
    <head>
       <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    </head>
    <body>
        <div id="container">
            <!-- zone de connexion -->
            
            <form action="php.php" method="POST">
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
                ?>
            </form>
        </div>
    </body>
</html>