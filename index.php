<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="author" content="NoS1gnal"/>

            <title>Eat & go</title>
        <link rel="stylesheet" href="css/general.css">
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">    
        <title>Connexion</title>
        </head>
        
           
        <header>
        
        <div class="inner">
            <div class="logo">
                <div>
                   
                    <img width="160px" src="Images/Noir-Cercle-avec-Ustensiles-Re-unscreen (1).gif">
                   
                </div>
            </div>
            
      
   
       
     
    <nav>

    <li><span><a href="accueil.php"><img name="id" height="40px" width="40px" src="Images/logo-home.png"></a><span> </li>
    <li><span><a href="Menu.php"><img  name="id" height="40px" width="40px" src="Images/588a64e0d06f6719692a2d10.png"></a><span> </li>
    <li><span><a href="index.php"><img name="id" height="50px" width="50px" src="Images/kisspng-shopping-cart-computer-icons-white-cart-png-simple-5ab15d036a4b75.3538919915215731234354.png"></a><span> </li>            
    <li><span><a href="index.php"><img name="id" height="40px" width="50px" src="Images/transparent-delivery-icon-transport-icon-truck-icon-5dcb3f9dd6cfb6.9766564015736011818799.png"></a><span> </li>
                
                <li><span> <a href="Inscription.php" id="active2" name="inscription" href="Menu.php">INSCRIPTION</a></span></li>
                <li><span> <a  class="button" href="index.php" id="active" >CONNEXION</a></span></li>
                
                
               
            </nav>
        </div>
    </header>
    
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
                        
                        
                        case 'password':
                        ?>
                            <div class="alert-danger">
                                <strong>Erreur</strong> mot de passe incorrect
                            </div>
                        <?php
                        break;

                        case 'email':
                        ?>
                            <div class="alert-danger">
                                <strong>Erreur</strong> email incorrect
                            </div>
                        <?php
                        break;

                        case 'already':
                        ?>
                            <div class=" alert-danger">
                                <strong>Erreur</strong> compte non existant
                            </div>
                        <?php
                        break;
                    }
                }
                ?> 
            
            <form action="phpfunction/connexion.php" method="post">
                     
            <div class="supportbox">
            
            <div class="images">
                
                   
                    <img width="160px" src="Images/Noir-Cercle-avec-Ustensiles-Re-unscreen (1).gif">
                   
                </div>   
                <h2 class="text-center">Connexion</h2> 
            <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email" required="required" autocomplete="off">
                </div>
                
                
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
                
                
                </div>
               
            <h4><a  href="inscription.php">Si vous n'avez pas encore de compte. Cliquez ici</a></h4>
           
               
                
                <div class="form-group">
                    <button type="submit">Connexion</button>
                   
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