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
        
       
        <link rel="stylesheet" href="css/addplat.css" >
        <link rel="stylesheet" href="css/general.css" >
       
    </head>
    <header>
        <div class="inner">
            <div class="logo">
                <div>
                    
                    <img width="160px" src="Images/Noir-Cercle-avec-Ustensiles-Re-unscreen (1).gif">
                   
                </div>
            </div>
            
      
    
       
     
    <nav>
                <li><span><a id="active"  href="accueilconnexion.php">ACCUEIL</a></span></li>
                <li><span><a id="active"  href="pageMenu.php">MENU</a></span></li>
                <li><span><a href="commandeconnexion.php"  class="desktop-link">PANIER</a></span></li>
                <li><span><a href="commandencours.php" class="desktop-link">COMMANDE</a></span></li>
                <li><span><a href="addplat.php" class="button" class="desktop-link">AJOUTER UN PLAT</a></span></li>
               
                <li><span><a href="deconnexion.php" id="active" name="deconnexion" href="Menu.php">DECONNEXION</a></span></li>
                <li><span><a href="profil.php"><img name="id" height="40px" width="40px" src="Images/1840612-image-profil-icon-male-icon-human-or-people-sign-and-symbol-vector-gratuit-vectoriel.jpg"></a><span> </li>
                <li><span><h1 class="p-5"><?php echo $data['pseudo']; ?></h1></span><li>
                <li><span><img name="id" height="50px" width="50px" src="Images/pngegg.png"><span> </li>
                
                <li><span><h1 class="p-5"><?php echo $data['argent']; ?>€</h1></span><li>
               
    </nav>
        </div>
</header>
<body>

<h2>AJOUT PLAT</h2>

<div class="supportbox">
<p>inseré l'image du plat de votre choix et entré son le nom de plat partie faites pour.</p>
<p> Puis cliquer sur ajouter:</p>

<form action="" method="POST" enctype="multipart/form-data">
<div class="form-group">    
<input type="text" name="name" class="form-control" placeholder="Nom du Plat" required="required" autocomplete="off">           
</div>   
<div class="form-group">
<input type="text" name="type" class="form-control" placeholder="type" required="required" autocomplete="off">      
</div> 
<div class="form-group">    
<input type="file" name="userfile[]" value="" multiple="">
</div>    
<div class="form-group2">

<TEXTAREA name="description" rows=4 cols=40>Valeur par défaut</TEXTAREA>

</div>    
<div class="form-group">
<input type="text" name="prix" class="form-control" placeholder="prix" required="required" autocomplete="off">      
</div>    
<div class="form-group">
<input type="file" name="userfile2[]" value="" multiple="">
</div>    
<div class="form-group">    
<input type="submit" name="submit" value="AJOUTER">
</div>
</form>

<?php

require_once 'config.php';

$phpFileUploadErrors = array(
    0 => 'ajout reussi',
    1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
    2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
    3 => 'The uploaded file was only partially uploaded',
    4 => 'No file was uploaded',
    6 => 'Missing a temporary folder',
    7 => 'Failed to write file to disk.',
    8 => 'A PHP extension stopped the file upload.',
);


if(isset($_FILES['userfile'])&& isset($_FILES['userfile2']) && isset($_POST['description']) && isset($_POST['prix'])&& isset($_POST['type'])){
    
    $file_array2 = reArrayFiles($_FILES['userfile2'] );
    $file_array = reArrayFiles($_FILES['userfile'] );
   
    for ($i=0;$i<count($file_array);$i++){
        if ($file_array[$i]['error']) 
        {
            ?> <div class="alert alert-danger"> 
            <?php echo $file_array[$i]['name'].' - '.$phpFileUploadErrors[$file_array[$i]['error']]; 
            ?> </div> <?php
        }
        else {
            
            $extensions = array('jpg','png','gif','jpeg');
            
            $file_ext = explode('.',$file_array[$i]['name']);
            
            
            $name = $file_ext[0];
            $name = preg_replace("!-!"," ",$name);
            $name = ucwords($name);
            
            $file_ext = end($file_ext);
            
            if (!in_array($file_ext, $extensions)) 
            {
                ?> <div class="alert alert-danger"> 
                <?php echo "$name - Invalid file extension!"; 
                ?> </div> <?php
            }
            else {
                $type=$_POST['type'];
                $prix1=$_POST['prix'];
                $description=$_POST['description'];
               
                $img2='Images/Menu'.$file_array2[$i]['name'];
                $img_dir = 'Images/Menu'.$file_array[$i]['name'];
                
                move_uploaded_file($file_array[$i]['tmp_name'], $img_dir);
                
                $sql = "INSERT IGNORE INTO menu (name,img_dir,img2,prix, description,type) VALUES('$name','$img_dir', '$img2','$prix1','$description','$type')";
                $bdd->query($sql) or die($bdd->error);
                
                ?> <div class="alert-success"> 
                <?php echo $phpFileUploadErrors[$file_array[$i]['error']]; 
                ?> </div> <?php
            }
        }
    }
}

function reArrayFiles(&$file_post) {

    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for ($i=0; $i<$file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }

    return $file_ary;
}

function pre_r($array){
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

?>
</div>
</body>

</html>




