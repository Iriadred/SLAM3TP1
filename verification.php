

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
        session_start();  
        $nom= strip_tags($_POST["nom"]);
        $mdp= strip_tags($_POST["mdp"]);?>
        $

        <?php
      
          try{
              $conn= new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);

              $requete = $conn->prepare("SELECT `mdp`, `date_activation` FROM `utilisateur` WHERE `Login`=? LIMIT 1 ;");
              $requete->execute([$nom]);
              $reult = $requete ->fetchAll();

              /*$requete2 = $conn->prepare("SELECT `Login` FROM `utilisateur` WHERE `mdp`=PASSWORD(?);");
              $requete2->execute([$mdp]);
              $reult2 = $requete ->fetchAll();*/

              $pass = $reult[0]["mdp"];
              $date = $reult[0]["date_activation"];
             
              
              
              /*if(password_verify($mdp, $pass)){
                header('Location:inscription.php ');
              }

              else{
                header('Location:index.php ');  
              }*/

             

              
              if(!password_verify($mdp, $pass)){
                $_SESSION["verif"]=false;
                header('Location:index.php ');                
              }

              if($reult == null){
                header('Location:inscription.php ');
              }


              else{
              $_SESSION["verif"]=true; 
              $_SESSION["nom"]=$nom;
              $_SESSION["mdp"]=$mdp;
              if($date == "")
              {
                $requete = $conn->prepare("UPDATE `utilisateur` SET `date_activation`=CURRENT_DATE WHERE `Login`=?;");
                $requete->execute([$nom]);
              }
              header('Location:connexion.php ');}
          }
        catch(PDOException $e){
            echo "erreur :".$e->getMessage();
            echo " Le numéro de l'erreur est : ".$e->getCode();
            die;
            header('Location:index.php ');
        }

      ?>


</body>
</html>  