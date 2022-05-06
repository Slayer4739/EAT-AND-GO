
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

$image=$bdd->prepare("SELECT (prix * quantite) AS somme FROM commandefinal INNER JOIN menu ON commandefinal.idmenu=menu.id ");
$image->execute();
$data2 = $image->fetch();


  if (isset($_POST['deletecommande']) && isset($_SESSION['user']) ){
    
    $sommetotal=$data2['somme'];
    $id=$data['id'];
    
   
    $result = $bdd->query("UPDATE utilisateurs SET argent=argent+$sommetotal  WHERE id=$id") ;
      
    $sql =$bdd->prepare( "DELETE FROM commandefinal WHERE idcommande=?"); 
    $sql->execute([$_POST['deletecommande']]);

  }

header('Location:../chargementrem.html')
  
 


  
  ?> 