<?php
session_start();
require_once 'config.php'; 

if(!isset($_SESSION['user'])){
    header('Location:index.php');
    die();
}

    

    
  if (isset($_POST['deleteItem']) && isset($_SESSION['user']) ){
    

      

    $id=$data['id'];
    
   

    
  
    $req = $bdd->prepare('SELECT id FROM utilisateurs WHERE token = ?');
    $req->execute(array($_SESSION['user']));
    $USER = $req->fetch();
   
    $id=$USER['id'];
    
   
  
    
    
  
  
    
    $sql =$bdd->prepare( "DELETE FROM commande WHERE commande.idutilisateurs=$id"); 
    $sql->execute([$_POST['deleteItem']]);
  
  }

header("Location:../commandeconnexion.php");
  
  
 


  
  ?> 