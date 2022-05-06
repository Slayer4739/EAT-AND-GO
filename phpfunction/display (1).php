<!DOCTYPE html>
<html>
    <head>
       
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
       
        
    </head>
    <body>
        <?php
       require_once 'config.php';
       $request=$bdd->prepare('SELECT * FROM Menu');
          $request->execute();
          $Menu=$request->fetchAll(); 
       
       $table = 'type';
        
        $result = $bdd->query("SELECT * FROM $table") or die($bdd->error);
        $data = $result->fetchAll() ;
    
        for($i=0;$i<count($Menu);$i++){
            echo'    
            <li class="Menu">
                 
            <div class="block">
                    <div class="info">
                     
                      <h3 class="title-Menu">'.$data[$i][4].'</h3>
                      <div class="platforme">
                      </div>
                     
                      </div>
                      <a href="type.php?type='.$data[$i]['type'].'"><img src="'.$data[$i]['img_dir'].'" width="100%" height="100%"></a>
                    </div>
                  
                  <h3 class="title-Menu">'.$data[$i][1].'</h3>
                </li>
              
             ';
            }
       
    
          
            
           
        
       
        ?>
    </body>
