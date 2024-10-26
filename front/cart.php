<?php

echo "<h1>OK STOP</h1>";die();

session_start();

//*___________(counter.php)_____________ */

/* echo "=======(page:cart.php)=======<br>";
echo "<pre>==(_SESSION)=======<br>";
var_dump($_SESSION);
echo "</pre>"; */

if(!isset($_SESSION['user'])){
  header("location:../include/connexion.php");
} else {
  //$idc=$_SESSION['category']['id_category'];
  $idUser = $_SESSION['user']['id_user'];

  if(!isset($_SESSION['cart'])){$_SESSION['cart'][$idUser]=[];}      

}

if(isset($_POST['ajouter'])){

  $idProduct = $_POST['idProduct']; 
  $qty = $_POST['qtyInput']; 
  
  $_SESSION['cart'][$idUser][$idProduct]=$qty;

  if($qty==0){      
    unset($_SESSION['cart'][$idUser][$idProduct]);
  }
  
}

header( "location:category.php?");
//header( "location:".$_SERVER['HTTP_REFERER']);


//echo "<pre>=====count===========<br>";
//var_dump($_SESSION['cart'][$idUser]);
//echo "</pre>";







