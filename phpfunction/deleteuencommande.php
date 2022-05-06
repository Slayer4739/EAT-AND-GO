
<?php



session_start();
require_once 'config.php'; 

if(!isset($_SESSION['user'])){
    header('Location:index.php');
    die();
}

    

    
  if (isset($_POST['deletecommande']) && isset($_SESSION['user']) ){
    

      $sql =$bdd->prepare( "DELETE FROM commande WHERE idcommande=?"); 
    $sql->execute([$_POST['deletecommande']]);

  }

header('Location:../commandeconnexion.php')
  
 


  
  ?> 