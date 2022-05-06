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
        <link rel="stylesheet" href="css/profil.css">
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
    <li><span><a href="accueilconnexion.php"><img  name="id" height="40px" width="40px" src="Images/logo-home.png"></a><span> </li>
    <li><span><a href="pageMenu.php"><img name="id" height="40px" width="40px" src="Images/588a64e0d06f6719692a2d10.png"></a><span> </li>
    <li><span><a href="commandeconnexion.php"><img name="id" height="50px" width="50px" src="Images/kisspng-shopping-cart-computer-icons-white-cart-png-simple-5ab15d036a4b75.3538919915215731234354.png"></a><span> </li>            
    <li><span><a href="commandencours.php"><img name="id" height="40px" width="50px" src="Images/transparent-delivery-icon-transport-icon-truck-icon-5dcb3f9dd6cfb6.9766564015736011818799.png"></a><span> </li>
    <li><span><a href="deconnexion.php"><img name="id" height="50px" width="50px" src="Images/pngegg (1).png"></a><span> </li>
                <li><span><a href="profil.php"><img class="button"name="id" height="40px" width="40px" src="Images/1840612-image-profil-icon-male-icon-human-or-people-sign-and-symbol-vector-gratuit-vectoriel.jpg"></a><span> </li>
                <li><span><h1 class="p-5"><?php echo $data['pseudo']; ?></h1></span><li>
                <li><span><a href="addargent.php"><img name="id" height="50px" width="50px" src="Images/pngegg.png"></a><span> </li>
                <li><span><h1 class="p-5"><?php echo $data['argent']; ?>€</h1></span><li>
            
    </nav>
</div>
    </header>
              
        <div class="login-form">
            
            <form action="inscription_traitement.php" method="post">
                <h2 class="text-center">Profil</h2>       
                <div class="supportbox">
                <div class="form-group">
                <div class="box">   
                <img name="id" height="60px" width="60px" src="Images/1840612-image-profil-icon-male-icon-human-or-people-sign-and-symbol-vector-gratuit-vectoriel.jpg">
        </div>   
        <div class="info">
                   <div class="nom" style=""> <h1 class="p-5">pseudo : <?php echo $data['pseudo']; ?></h1></div>
                   <div class="nom" style=""> <h1 class="p-5">Email : <?php echo $data['email']; ?></h1></div>
                   <div class="nom" style=""> <h1 class="p-5">adresse : <?php echo $data['adresse']; ?></h1></div>
        </div>
            </form>
            </div>
        </div>
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
