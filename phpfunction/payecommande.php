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

$image=$bdd->prepare("SELECT (prix * SUM(quantite)) AS somme FROM commande INNER JOIN menu ON commande.idmenu=menu.id ");
$image->execute();
$data2 = $image->fetch();







if (isset($_POST['add']) && isset($_SESSION['user']) ){
    

      

    $sommetotal=$data2['somme'];
    $id=$data['id'];
    $somme = htmlspecialchars($_POST['somme']);
   if ($sommetotal>$data['argent'] ){
    
    echo' <div class="alert-eche"> ';
    echo''.$_SESSION['statu']="Vous n'avez pas les fonds nécessaires".''; 
    header("Location:../payement.php");   
    echo' </div> ';
    
   
    header("Location:../payement.php");   
}else{
        echo' <div class="alert-success"> ';
        echo''.$_SESSION['statu']="Ajouter a vos commandes".''; 
        header("Location:../chargement.html");   
        echo' </div> ';
    
        $result = $bdd->query("UPDATE utilisateurs SET argent=argent-$sommetotal  WHERE id=$id") ;
    
    $stmt=$bdd->prepare('INSERT INTO commandefinal (idcommande,idmenu,idutilisateurs,quantite) SELECT idcommande, idmenu, idutilisateurs, quantite FROM commande ');
    $stmt->execute([$_POST['add']]);

    
    $sql =$bdd->prepare( "DELETE FROM commande"); 
    $sql->execute([$_POST['add']]);
header("Location:../chargement.html"); 
}
}






?>