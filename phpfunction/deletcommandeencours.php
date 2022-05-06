<?php

session_start();
require_once 'config.php'; 

if(!isset($_SESSION['user'])){
    header('Location:index.php');
    die();
}

$req = $bdd->prepare('SELECT * FROM utilisateurs WHERE token = ?');
$req->execute(array($_SESSION['user']));
$data = $req->fetch();

$image=$bdd->prepare("SELECT (prix * SUM(quantite)) AS somme FROM commandefinal INNER JOIN menu ON commandefinal.idmenu=menu.id ");
$image->execute();
$data2 = $image->fetch();

if (isset($_POST['deleteItem']) && isset($_SESSION['user']) ){
    

      

  $sommetotal=$data2['somme'];
  $id=$data['id'];
  
 
  $result = $bdd->query("UPDATE utilisateurs SET argent=argent+$sommetotal  WHERE id=$id") ;
  

  $req = $bdd->prepare('SELECT id FROM utilisateurs WHERE token = ?');
  $req->execute(array($_SESSION['user']));
  $USER = $req->fetch();
 
  $id=$USER['id'];
  
 

  
  


  
  $sql =$bdd->prepare( "DELETE FROM commandefinal WHERE commandefinal.idutilisateurs=$id"); 
  $sql->execute([$_POST['deleteItem']]);

}


header("Location:../chargementrem.html"); 
 
echo' </div> ';


?>
  
 