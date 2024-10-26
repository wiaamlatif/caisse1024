<?php
//start a session
session_start();

if(isset($_POST['ajouter'])){

  $idCategory= $_POST['idCategory']; 
  $idProduct = $_POST['idProduct']; 
  $qty = $_POST['qtyInput'];
  
  $_SESSION['panier'][$idProduct]=$qty;

  if($qty==0){      
    unset($_SESSION['panier'][$idProduct]); 
  }

  header('location:categoryFront.php?id='.$idCategory);

}








