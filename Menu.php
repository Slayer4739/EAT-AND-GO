<?php
 require_once 'phpfunction/config.php'; 
 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Eat & go</title>
        <link rel="stylesheet" href="css/general.css">
        <link rel="stylesheet" href="css/Menu.css">
    
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    </head>
    <body>
        <header>
        
        <div class="inner">
            <div class="logo">
                <div>
                    
                    <img width="160px" src="Images/Noir-Cercle-avec-Ustensiles-Re-unscreen (1).gif">
                   
                </div>
            </div>
            
      
   
       
     
    <nav>
    <li><span><a href="accueil.php"><img name="id" height="40px" width="40px" src="Images/logo-home.png"></a><span> </li>
    <li><span><a href="Menu.php"><img  class="button" name="id" height="40px" width="40px" src="Images/588a64e0d06f6719692a2d10.png"></a><span> </li>
    <li><span><a href="index.php"><img name="id" height="50px" width="50px" src="Images/kisspng-shopping-cart-computer-icons-white-cart-png-simple-5ab15d036a4b75.3538919915215731234354.png"></a><span> </li>            
    <li><span><a href="index.php"><img name="id" height="40px" width="50px" src="Images/transparent-delivery-icon-transport-icon-truck-icon-5dcb3f9dd6cfb6.9766564015736011818799.png"></a><span> </li>
                
                <li><span> <a href="Inscription.php" id="active2" name="inscription" href="Menu.php">INSCRIPTION</a></span></li>
                <li><span> <a href="index.php" id="active" >CONNEXION</a></span></li>
    </nav>
        </div>
    </header>
      <h2>Menu</h2>
      <main class="Menu-panel">
<ul>
    
    
    <?php
     
      
      
     $result = $bdd->prepare("SELECT * FROM type");
     $result->execute(); 
     $data = $result->fetchAll() ;
      
     
          
        
       
            for($i=0;$i<count($data);$i++){
                echo'    
                <li class="Menu">
                     
                <div class="block">
                        <div class="info">
                         
                          
                          <div class="platforme">
                          </div>
                         
                        </div>
                        <a href="type.php?type='.$data[$i]['type'].'"><img src="'.$data[$i]['img_dir'].'" width="100%" height="100%"></a>
                      </div>
                      
                      <h3 class="title-Menu">'.$data[$i]['name'].'</h3>
                    </li>
                  
                 ';
                }
      
    
    
     ?>


<?php
      
        
       
        ?>
</ul>
</main>
<div class="footer-dark">
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-4 item">
                        <h3>Services</h3>
                        <ul>
                            <li><a href="#">Web disgner</a></li>
                            <li><a href="#">Development</a></li>
                            <li><a href="#">partage</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-3 item">
                        <h3>A propos</h3>
                        <ul>
                            <li><a href="#">Entreprise</a></li>
                            <li><a href="#">Equipe</a></li>
                            <li><a href="#">Createurs</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 item text">
                        <h3><img width="30px" src="Images/Noir-Cercle-avec-Ustensiles-Re-unscreen (1).gif">EAT AND GO </h3>
                        <p>EAT AND GO est un services qui vous permet de commader a n'importe quelle heure vos repas et vos boisson preféré ou que vous soyer ne France. Cela vous gartantis un livraison rapide et sur de votre commande en mois de 10minutes.</p>
                    </div>
                    <div class="col item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a></div>
                </div>
                <p class="copyright">EAT AND GO 2022</p>
            </div>
        </footer>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>
