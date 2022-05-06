<?php
session_start();
require_once 'phpfunction/config.php';  
    if(!isset($_SESSION['user'])){
        header('Location:index.php');
        die();
    }

    $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE token = ?');
    $req->execute(array($_SESSION['user']));
    $data = $req->fetch();
   







?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Eat & go</title>
        <link rel="stylesheet" href="css/general.css">
        <link rel="stylesheet" href="css/Livraison.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    </head>
    <body>
        
    <div class="login-form">
             <?php 
                if(isset($_GET['login_err']))
                {
                    $err = htmlspecialchars($_GET['login_err']);

                    switch($err)
                    {
                        case 'success':
                            ?>
                                <div class="alert-success">
                                    <strong>Succès</strong> connexion réussie 
                                </div>
                            <?php
                            break;
                        }
           
                    }
                    
                    ?> 
                    </div>
    
                    <header>
        
        <div class="inner">
            <div class="logo">
                <div>
                   
                    <img width="160px" src="Images/Noir-Cercle-avec-Ustensiles-Re-unscreen (1).gif">
                  
                </div>
            </div>
            
      
   
       
     
    <nav>
    <li><span><a href="accueil.php"><img  name="id" height="40px" width="40px" src="Images/logo-home.png"></a><span> </li>
    <li><span><a href="pageMenu.php"><img name="id" height="40px" width="40px" src="Images/588a64e0d06f6719692a2d10.png"></a><span> </li>
    <li><span><a href="commandeconnexion.php"><img name="id" height="50px" width="50px" src="Images/kisspng-shopping-cart-computer-icons-white-cart-png-simple-5ab15d036a4b75.3538919915215731234354.png"></a><span> </li>            
    <li><span><a href="commandencours.php"><img class="button" name="id" height="40px" width="50px" src="Images/transparent-delivery-icon-transport-icon-truck-icon-5dcb3f9dd6cfb6.9766564015736011818799.png"></a><span> </li>
    <li><span><a href="deconnexion.php"><img name="id" height="50px" width="50px" src="Images/pngegg (1).png"></a><span> </li>
             
      
                
                <li><span><a href="profil.php"><img name="id" height="40px" width="40px" src="Images/1840612-image-profil-icon-male-icon-human-or-people-sign-and-symbol-vector-gratuit-vectoriel.jpg"></a><span> </li>
                <li><span><h1 class="p-5"><?php echo $data['pseudo']; ?></h1></span><li>
                
                <li><span><a href="addargent.php"><img name="id" height="50px" width="50px" src="Images/pngegg.png"></a><span> </li>
                
                <li><span><h1 class="p-5"><?php echo $data['argent']; ?>€</h1></span><li>
               
               </nav>
        </div>
    </header>

   

<main class="Menu-panel">
  

        
              
  
 
<div class="livraison">
<p>Detaille de vote commande :</p>
<div class=route><img src="Images/giphy.gif"></div>
  <div class=velo><img src="Images/hp_cycliste_coursier.gif"></div>
     
                       
</div>  
        <h13>Livraison en cours :</h13>
                </div>
                <?php
      
      
      $req = $bdd->prepare('SELECT id FROM utilisateurs WHERE token = ?');
      $req->execute(array($_SESSION['user']));
      $USER = $req->fetch();
     
      $id=$USER['id'];
      
     
   
      
      

     $result = $bdd->prepare("SELECT * FROM ((commandefinal INNER JOIN menu ON commandefinal.idmenu = menu.id)INNER JOIN utilisateurs ON commandefinal.idutilisateurs = utilisateurs.id )WHERE utilisateurs.id=commandefinal.idutilisateurs AND commandefinal.idutilisateurs=$id") ;
     $result->execute(); 
     $data = $result->fetchAll() ;
   
    
      
    
      
      
        
        ?>

           

<div class="supportbox">
          
       
       
          <?php    
          
        for($i=0;$i<count($data);$i++){
       
            echo' 
            <div class="Images">
            <div class="box">';
        echo'
        <img src="'.$data[$i]['img_dir'].'"
        <div class="PRIX">
       
        <h2>Plat : '.$data[$i]['name'].'</h2>
      
        
        <h5>Prix: '.$data[$i]['prix'].' €</h5>
       
        
        <h7> Quantité: '.$data[$i]['quantite'].'</h7>
        
        </div>  ';
        
    
        
    }
     ?>


        </div>
        <div class="date">
          <?php    
         
         $req = $bdd->prepare('SELECT id FROM utilisateurs WHERE token = ?');
         $req->execute(array($_SESSION['user']));
         $USER = $req->fetch();
        
         $id=$USER['id'];
         
         $image=$bdd->prepare("SELECT (prix * SUM(quantite)) AS somme FROM ((commandefinal INNER JOIN menu ON commandefinal.idmenu = menu.id)INNER JOIN utilisateurs ON commandefinal.idutilisateurs = utilisateurs.id ) WHERE utilisateurs.id=commandefinal.idutilisateurs AND commandefinal.idutilisateurs=$id");
          $image->execute();
          $data3 = $image->fetch();

         $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE token = ?');
          $req->execute(array($_SESSION['user']));
          $data2 = $req->fetch();
       
          
          echo' <div class="box">';
          if (!count($data)){
            echo'<h15>AUCUNE COMMANDE</h15>';
            }else{
       echo' <h12>information de la commande:</h12>
        ';
       
        echo'
        <div class="time">
        <h6>date de la comande: '.$data[0]['date'].'</h6>
        
        <h9>Livré dans environ: </h9><h8 id="timer"></h8> 
        </div> 
        
        <h10>a l adresse : '.$data2['adresse'].' </h10>
       <br>';
      
       ?>
       <h11>total a payer= <?php if ($data3['somme']!=0){
        echo''.$data3['somme'].' €</h11>';
     }else{
         echo'0 € </h11>';
     }
    }?>
</div>
    </div>

    <a href="commandencours.php"><input type="submit" value="RETOUR"/></a>

  </div>

    
     
                </div>

              
</main>
<script>
       const departMinutes = 10
let temps = departMinutes * 60

const timerElement = document.getElementById("timer")

setInterval(() => {
  let minutes = parseInt(temps / 60, 10)
  let secondes = parseInt(temps % 60, 10)

  minutes = minutes < 10 ? "0" + minutes : minutes
  secondes = secondes < 10 ? "0" + secondes : secondes

  timerElement.innerText = `${minutes}:${secondes}`
  temps.innerHTML = 'Compte à rebours terminé.'
  temps = temps <= 0 ? 0 : temps - 1
}, 1000,)
   
        
        </script>  

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






