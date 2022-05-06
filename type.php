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
        <link rel="stylesheet" href="css/Menupage.css">
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
                <div class="recherche">
            <form method="POST" > 
     <input type="text" name="recherche">
     <input type="SUBMIT" value="CHERCHER"> 
     </form>
                </div>
            </div>
            <ul class="menu">
            <li>
          CATEGORIE
          <ul class="sub-menu">
          </li><form method="POST" action="categorie.php"> 
          <input type="SUBMIT" name="entre" value="Entré"> 
             
            
          <input type="SUBMIT" name="plats" value="Plats"> 
               
           
          <input type="SUBMIT" name="dessert" value="Dessert"> 
                </from></li>
         
          </ul>
        </li>
        </ul>
        </li>
        </ul>
     
    <nav>
    <li><span><a href="accueilconnexion.php"><img  name="id" height="40px" width="40px" src="Images/logo-home.png"></a><span> </li>
    <li><span><a href="pageMenu.php"><img class="button"name="id" height="40px" width="40px" src="Images/588a64e0d06f6719692a2d10.png"></a><span> </li>
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
<?php
$menu =$bdd->prepare('SELECT * FROM menu WHERE type=?');
$menu->execute([$_GET['type']]);
$data2=$menu->fetchAll();
?>
<h2><?php echo''.$_GET['type'].''?></h2>

<main class="Menu-panel">
<ul>
    
    
    <?php
     $menu =$bdd->prepare('SELECT * FROM menu WHERE type=?');
     $menu->execute([$_GET['type']]);
     $data2=$menu->fetchAll();

     
     $allusers=$bdd->query('SELECT * FROM menu ORDER BY id DESC');
     if(isset($_POST['recherche']) AND !empty($_POST['recherche'])){
     
         $recherce=htmlspecialchars($_POST['recherche']);
         $q = $bdd->query( 'SELECT * FROM menu WHERE name LIKE "%'.$recherce.'%"');
         $data2 = $q->fetchAll();
       }
       if (!count($data2)){
           echo'<h9>aucun resultat</h9>';
       }else{
        for($i=0;$i<count($data2);$i++){
            echo'    
            <li class="Menu">
                 
            <div class="block">
                    <div class="info">
                     
                     
                      <div class="platforme">
                      </div>
                     
                    </div>
                    <a href="pageachat.php?id='.$data2[$i]['id'].'"><img src="'.$data2[$i][2].'" width="100%" height="100%"></a>
                  </div>
                  
                  <h3 class="title-Menu">'.$data2[$i][1].'</h3>
                </li>
              
             ';
            
        

    }   
           
}
       ?>
    
    
</ul>
</main>
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
