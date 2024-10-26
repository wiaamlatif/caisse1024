<?php
//http://localHost:8000/front/index.php
//http://localHost:8000/category/index.php
//http://localHost:8000/product/index.php
//http://localHost:8000/user/index.php
//http://localHost:8000/include/connexion.php
//http://localHost:8000/include/deconnexion.php

/*
  switch ($i) {
    case 0:
         header('location:../front/index.php');
      break;
    case 1:
         header('location:category/index.php');
      break;
    case 2:
         header('location:product/index.php');
      break;
    case 3:
         include 'layout.php';
         header('location:user/index.php');
     break;
    case 4:           
         header('location:include/connexion.php');
     break;
    case 5:           
         header('location:include/deconnexion.php');
     break;
    default:
      //code block
  }
  */

//header( "location:category.php?");
//header( "location:".$_SERVER['HTTP_REFERER']);


//echo "<pre>=====count===========<br>";
//var_dump($_SESSION['cart'][$idUser]);
//echo "</pre>";

/*
echo "<pre>==(_SESSION)=======<br>";
var_dump($_SESSION);
echo "</pre>"; 

if(!isset($_SESSION['user'])){
  header("location:../include/connexion.php");
} else {
  //$idc=$_SESSION['category']['id_category'];
  $idUser = $_SESSION['user']['id_user'];

  if(!isset($_SESSION['cart'])){$_SESSION['cart'][$idUser]=[];}      

}

*/
//$countItems=count($panier);

    //var_dump(empty($panier));
    //var_dump(count($panier));
    //var_dump($panier);

   // echo "<br>";
   
    /*
    var_dump(count($panier));
    echo "<br>";

    echo "_SESSION :";
    var_dump($_SESSION);
    echo "<br>";

    echo "_SESSION['panier'] :";
    var_dump($_SESSION['panier']);
    echo "<br>";

    echo "empty(_SESSION['panier']) :";
    var_dump(empty($_SESSION['panier']));
    echo "<br>";

    echo "isset(_SESSION['panier']) :";
    var_dump(isset($_SESSION['panier']));

    */  
    
    /*
  echo "<pre>";
  echo $idProduct;
  echo "</pre>";

  echo "<pre>";
  echo $qty;
  echo "</pre>";

  if(!isset($_SESSION[$panier][$idProduct])){
    $_SESSION[$panier][$idProduct][]=$idProduct;  
    $_SESSION[$panier][$idProduct]=$qty;
  }

    echo '>>>>>>>>>>>>>>>$_SESSION["$panier"]';
  echo "<pre>";
  var_dump($_SESSION['panier']);
  echo "</pre>";

  echo '...................$countItems:';
  echo "<pre>";
  var_dump($countItems);
  echo "</pre>";

  echo '==================$idCategory:';
  echo "<pre>";
  var_dump($idCategory);
  echo "</pre>";

*/


?>