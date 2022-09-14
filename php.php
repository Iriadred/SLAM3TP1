

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UFT-8" />
    <title>PortFolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"/>
    <link href="css/main.css" type="text/css" rel="stylesheet" />
</head>
<body>
<?php 
      	$servername='localhost';
          $dbname='SLAM3TP1';
          $username='root';
          $password='';
          
        $email= strip_tags($_POST["email"]);
        $nom= strip_tags($_POST["nom"]);
        $mdp= strip_tags($_POST["mdp"]);
      
          try{
              $conn= new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);

              $requete = $conn->prepare("INSERT INTO `utilisateur`( `Login`, `mdp`, `date_creation`, `email`) VALUES (:nom,PASSWORD(:mdp),CURRENT_DATE,:email);");
        
		    $requete->bindValue(':email',$email , PDO::PARAM_STR);
		    $requete->bindValue(':nom',$nom , PDO::PARAM_STR);
        $requete->bindValue(':mdp',$mdp , PDO::PARAM_STR);

		    $requete->execute();
          }
        catch(PDOException $e){
            echo "erreur :".$e->getMessage();
            echo " Le numéro de l'erreur est : ".$e->getCode();
            die;
        }
        header('Location:index.php ');
      ?>


</body>
</html>  