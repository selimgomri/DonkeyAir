<?php
  $bdd = new PDO('mysql:host=127.0.0.1:3306;dbname=donkeyAirDB','root',"");
  
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  if(isset($_POST['confirmer'])){
  
  }
 
  
  $titre = $_POST['title'];
  $prenom = $_POST['firstname'];
  $nom = $_POST['lastname'];
  $email = $_POST['email'];
  $dateDeNaissance = $_POST['birthDate'];
  
  if(!empty($titre) &&  !empty($prenom) && !empty($nom) && !empty($email) && !empty($dateDeNaissance))
  
         
          $requet = $bdd->prepare('INSERT INTO user(title,firstname,lastname,email,birthDate)VALUE(:title, :firstname, :lastname, :email, :birthDate)');
  
          $requet->bindvalue(':title',$titre);
          $requet->bindvalue(':firstname',$prenom);
          $requet->bindvalue(':lastname',$nom);
          $requet->bindvalue(':email',$email);
          $requet->bindvalue(':birthDate',$dateDeNaissance);
  
          $result=$requet->execute();
          var_dump($result);
          
          if (!$result) {
             
             echo " Un probleme ets survenu, L'enregistrement n'a pas été effectué! ";
             
            
          }
         
     
  
  ?>

