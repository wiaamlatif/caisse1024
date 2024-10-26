<?php
session_start();

if(isset($_POST['suprimer'])){

  $idProduct = $_POST['idProduct']; 

  unset($_SESSION['panier'][$idProduct]);
 
}

header( "location:".$_SERVER['HTTP_REFERER']);








