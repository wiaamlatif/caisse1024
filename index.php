<?php

    $headerTab = array( 
      0 => "../front/index.php",
      1 => "category/index.php",
      2 => "product/index.php",
      3 => "user/index.php",
      4 => "include/connexion.php",
      5 => "include/deconnexion.php"
    );

    session_start();

    if(!isset($_GET['idNav'])){

      $_SESSION['idNav']=0;      
      $_SESSION['user']=0;      
      $_SESSION['panier']=0;      
    
    } else {
      
      $_SESSION['idNav']= (int) $_GET['idNav'];

    }

    $i= $_SESSION['idNav'];

    header('location:'.$headerTab[$i]);

    include 'layout.php';

?>





