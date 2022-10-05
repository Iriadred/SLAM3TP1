

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
      session_start();
      	$servername='localhost';
          $dbname='SLAM3TP1';
          $username='root';
          $password='';
          
        $email= strip_tags($_POST["email"]);
        $nom= strip_tags($_POST["nom"]);
        $mdp= strip_tags($_POST["mdp"]);
        $remdp= strip_tags($_POST["remdp"]);
      
        if($mdp==$remdp){
          $Newmdp=password_hash($mdp, PASSWORD_DEFAULT);
            try{
              $conn= new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);

              $requete0 = $conn->prepare("SELECT `Login` FROM `utilisateur` WHERE `mdp`=PASSWORD(?);");
              $requete0->execute([$Newmdp]);
              $reult = $requete0 ->fetchAll();
            }
            catch(PDOException $e){
              echo "erreur :".$e->getMessage();
              echo " Le numéro de l'erreur est : ".$e->getCode();
              die;
              $_SESSION["verif2"]=false;
              header('Location:inscription.php ');
            }
            if($reult==null)
            {
              try{
                    $conn= new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);

                    $requete = $conn->prepare("INSERT INTO `utilisateur`( `Login`, `mdp`, `date_creation`, `email`) VALUES (:nom,:mdp,CURRENT_DATE,:email);");
              
                    $requete->bindValue(':email',$email , PDO::PARAM_STR);
                    $requete->bindValue(':nom',$nom , PDO::PARAM_STR);
                    $requete->bindValue(':mdp',$Newmdp , PDO::PARAM_STR);

                    $requete->execute();
                    $_SESSION["verif2"]=true;
                    header('Location:index.php');
                  }
                  catch(PDOException $e){
                      echo "erreur :".$e->getMessage();
                      echo " Le numéro de l'erreur est : ".$e->getCode();
                      die;
                      $_SESSION["verif2"]=false;
                      header('Location:inscription.php ');
                  }
             }
             else{
              $_SESSION["verif2"]=false;
              header('Location:inscription.php ');
             }
          }
          else{
            $_SESSION["verif2"]=false;
            header('Location:inscription.php ');
          }

      
      ?>


</body>
</html>  