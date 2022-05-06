<?php
 session_start();
   
 
 require_once 'phpfunction/config.php'; 
  
  
 $result = $bdd->prepare("SELECT * FROM menu WHERE id=?");
 $result->execute([$_GET['id']]);
 $data = $result->fetch() ;
$image=$data['img_dir'];

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
        <link rel="stylesheet" href="css/pageachat.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
       <style type="text/css">
           body
           {
           background-image : url('<?php echo $image; ?>');
           background-repeat: no-repeat;
           background-size: 150% 100%;
          }
       </style>
    
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
            
      
    
        </li>
        </ul>
        <div class="navigation">
        <label for="r1" class="bar"></label>
        <label for="r2" class="bar"></label>
        <label for="r3" class="bar"></label>
      
      </div>
      
    <nav>
    <li><span><a href="accueilconnexion.php"><img  name="id" height="40px" width="40px" src="Images/logo-home.png"></a><span> </li>
    <li><span><a href="pageMenu.php"><img name="id" height="40px" width="40px" src="Images/588a64e0d06f6719692a2d10.png"></a><span> </li>
    <li><span><a href="commandeconnexion.php"><img name="id" height="50px" width="50px" src="Images/kisspng-shopping-cart-computer-icons-white-cart-png-simple-5ab15d036a4b75.3538919915215731234354.png"></a><span> </li>            
    <li><span><a href="commandencours.php"><img name="id" height="40px" width="50px" src="Images/transparent-delivery-icon-transport-icon-truck-icon-5dcb3f9dd6cfb6.9766564015736011818799.png"></a><span> </li>
    <li><span><a href="deconnexion.php"><img name="id" height="50px" width="50px" src="Images/pngegg (1).png"></a><span> </li>
             
      
                
                <li><span><a href="profil.php"><img name="id" height="40px" width="40px" src="Images/1840612-image-profil-icon-male-icon-human-or-people-sign-and-symbol-vector-gratuit-vectoriel.jpg"></a><span> </li>
                <li><span><h1 class="p-5"><?php echo $data['pseudo']; ?></h1></span><li>
                
                <li><span><a href="addargent.php"><img name="id" height="50px" width="50px" src="Images/pngegg.png"></a><span> </li>
                
                <li><span><h1 class="p-5"><?php echo $data['argent']; ?>€</h1></span><li>
                
               
            </nav>
        </div>
    </header>  












      
   
    <body  >
        
     <?php
      $result = $bdd->prepare("SELECT * FROM menu WHERE id=?");
      $result->execute([$_GET['id']]);
      $data = $result->fetch() ;
      
      $q = $bdd->prepare( "SELECT * FROM type WHERE type=? ");
         $q->execute();
         $data2 =$q->fetch();
      ?>  
        <main class="Menu-panel">
        <?php
        echo' <a href="type.php?type='.$data['type'].'"><button>RETOUR</button></a>';
           
           ?>
           <div class="supportbox">           
<div class="box">
 
<?php    
        
       
        echo'<h2>'.$data['name'].'</h2>';
        ?>
<div class="prix">
              
  
          
          <?php    
        
       
        echo'<h4>Prix: '.$data['prix'].' €</h4>';
        ?>
        </div>

        <form action="phpfunction/addCommande.php" method="post">
  <div class="quantity">
  <label>Quantité :         
<input type="number" value="1" min="1" name="taille" />
</label>
</div>
</from>


        <?php



$req = $bdd->prepare('SELECT * FROM utilisateurs WHERE token = ?');
$req->execute(array($_SESSION['user']));
$data = $req->fetch();

if (isset ($_GET['id'])&& isset($_GET['stars']) && isset($_SESSION['user'])){
                $posteur = $_SESSION['user'];
                $id_actualite= $_GET['id'];
                $note = $_GET['stars'];
                $addnote = $bdd->prepare("INSERT INTO notation(note,idmenu,idutilisateurs) VALUES ($note, $id_actualite,  $posteur)");
                $addnote->execute($_GET['stars'],$_GET['id'], $_SESSION['user']);   
}
?>
   <div class="note">
  <div class="rating rating2"><!--
    --><a href="?mod=actualite&id=<?php echo $_GET['id'] ?>?stars=5" title="Give 5 stars">★</a><!--
    --><a href="?mod=actualite&id=<?php echo $_GET['id'] ?>?stars=4" title="Give 4 stars">★</a><!--
    --><a href="?mod=actualite&id=<?php echo $_GET['id'] ?>?stars=3" title="Give 3 stars">★</a><!--
    --><a href="?mod=actualite&id=<?php echo $_GET['id'] ?>?stars=2" title="Give 2 stars">★</a><!--
    --><a href="?mod=actualite&id=<?php echo $_GET['id'] ?>?stars=1" title="Give 1 star">★</a>
</div>
    </div>

<?php 
        $menu =$bdd->prepare('SELECT * FROM menu WHERE id=?');
        $menu->execute([$_GET['id']]);
        $data=$menu->fetch();?>

      
<form action="phpfunction/addCommande.php" method="post">

<input type="hidden" value="<?php echo $data['id']?>" name="menu" >       
<input type="submit"  value="Ajouter" >
  
</form>
</div>
           
          

           <div class="image">
  <?php
      echo'<img src="'.$data['img_dir'].'" width="50%" height="100%">';
  ?> 

  </div>
 

 
 <?php
   
      ?>
  
  


<div id="apprentissage">
   <h5>Description :</h5>
   <br>
   <?php
   echo'<p>'.$data['description'].'</p>';
    ?>

</div>
<div class="sli">

        <?php
      echo'<img src="'.$data['img2'].'" width="100%" height="100%">';
  ?> 
</div>
       

   
      
    



  

</div>   
</div>
</div>        

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