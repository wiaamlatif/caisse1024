<?php  $title ="Suprimer Category";  ?>

<?php ob_start(); ?>

<?php

$id = $_GET['id'];
require_once '../include/database.php';  
$sqlstm = $pdo -> prepare('DELETE FROM categories
                            WHERE id_category=?;');
$sqlstm -> execute([$id]);

//Redirection
header('location:index.php');

?>


<?php $content = ob_get_clean(); ?>

<?php include '..\layout.php'?>