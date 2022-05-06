<?php
 require_once 'config.php'; 

try {

    

    
    $sql = "DELETE FROM commandefinal WHERE id=?"; 

    $bdd->exec($sql);
    
  echo "Record deleted successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}
   
$bdd = null;   

header("Location:../commandeconnexion.php");
  
  
 


  
  ?> 