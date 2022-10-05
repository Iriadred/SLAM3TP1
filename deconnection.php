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

                session_destroy();
                header('Location:index.php');
                
                ?>
            </form>
        </div>
    </body>
</html>