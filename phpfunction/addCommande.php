<?php

session_start();
require_once 'config.php'; 
if(!isset($_SESSION['user'])){
    header('Location:../index.php');
    die();
}




$req = $bdd->prepare('SELECT * FROM utilisateurs WHERE token = ?');
$req->execute(array($_SESSION['user']));
$data = $req->fetch();









if (isset( $_POST['taille']) && isset($_POST['menu']) && isset($_SESSION['user']) ){
    
   
      
$stmt=$bdd->prepare('INSERT INTO commande(idmenu,idutilisateurs,quantite) VALUES (?,?,?)');
    $stmt->execute([$_POST['menu'],$data['id'],$_POST['taille']]);

    
   
   
  
    echo' <div class="alert-success"> ';
        echo''.$_SESSION['statu']="Ajouter au panier".''; 
        header("Location:../commandeconnexion.php");   
        echo' </div> ';


}

    
  
      




   
    ?>