<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/acceuil.css">
 
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
            
      
   
        <div class="navigation">
        <label for="r1" class="bar"></label>
        <label for="r2" class="bar"></label>
        <label for="r3" class="bar"></label>
      
      </div>
     
    <nav>
   
    <li><span><a href="accueil.php"><img  class="button"name="id" height="40px" width="40px" src="Images/logo-home.png"></a><span> </li>
    <li><span><a href="Menu.php"><img name="id" height="40px" width="40px" src="Images/588a64e0d06f6719692a2d10.png"></a><span> </li>
    <li><span><a href="index.php"><img name="id" height="50px" width="50px" src="Images/kisspng-shopping-cart-computer-icons-white-cart-png-simple-5ab15d036a4b75.3538919915215731234354.png"></a><span> </li>            
    <li><span><a href="index.php"><img name="id" height="40px" width="50px" src="Images/transparent-delivery-icon-transport-icon-truck-icon-5dcb3f9dd6cfb6.9766564015736011818799.png"></a><span> </li>
               
                <li><span> <a href="Inscription.php" id="active2" name="inscription" href="Menu.php">INSCRIPTION</a></span></li>
                <li><span> <a href="index.php" id="active" >CONNEXION</a></span></li>
                
                
                
               
            </nav>
        </div>
 

    </header>  
  
  <div class="slidershow middle">

      <div class="slides">
        <input type="radio" name="r" id="r1" checked>
        <input type="radio" name="r" id="r2">
        <input type="radio" name="r" id="r3">
      
        <div class="slide s1">
        <img src="Images/328117_keatz-veut-revolutionner-la-livraison-de-repas-avec-ses-restaurants-virtuels-web-tete-060970991238.JPG" alt="">
        </div>
        <div class="slide">
          <img src="Images/flatten.jpg" alt="">
        </div>
        <div class="slide">
          
          <img src="Images/roubaix-livraison-repas-confinement-23h.jpeg" alt="">
        </div>
     
      </div>

   
      
    </div>
    
  
 
</section>
<section class="scroll-container">
  <div class="scroll-element js-scroll slide-left">
  <div class="grid-item"><img src="Images/service-de-livraison-restaurant-scaled.jpg"  alt="" width="30%" height="30%"></div>
  <div class="grid-item"><p>Un large choix dans notre catalogue avec des specialit??s du monde enti??. pr??par?? sur place avec des cusiner experiment?? et avec des produit frais pour une meilleur qualit?? possible</p></div> 
</div>
<br>
<div class="scroll-element js-scroll slide-right">
  <img src="Images/f6.jpg"  alt="" width="30%" height="40%">
  <div class="grid-item2"><p>livraison rapie de efficae avec un suivie de commande qui se met a jours automatiquement se qui vous permt de savoir ou et quand votre commande sera livr?? et surtout en combien de temps</p></div> 
</div>
  
</section>

<script>const scrollElements = document.querySelectorAll(".js-scroll");

const elementInView = (el, dividend = 1) => {
  const elementTop = el.getBoundingClientRect().top;

  return (
    elementTop <=
    (window.innerHeight || document.documentElement.clientHeight) / dividend
  );
};

const elementOutofView = (el) => {
  const elementTop = el.getBoundingClientRect().top;

  return (
    elementTop > (window.innerHeight || document.documentElement.clientHeight)
  );
};

const displayScrollElement = (element) => {
  element.classList.add("scrolled");
};

const hideScrollElement = (element) => {
  element.classList.remove("scrolled");
};

const handleScrollAnimation = () => {
  scrollElements.forEach((el) => {
    if (elementInView(el, 1.25)) {
      displayScrollElement(el);
    } else if (elementOutofView(el)) {
      hideScrollElement(el)
    }
  })
}

window.addEventListener("scroll", () => { 
  handleScrollAnimation();
});
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
                        <p>EAT AND GO est un services qui vous permet de commader a n'importe quelle heure vos repas et vos boisson pref??r?? ou que vous soyer ne France. Cela vous gartantis un livraison rapide et sur de votre commande en mois de 10minutes.</p>
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