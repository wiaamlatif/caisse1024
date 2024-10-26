<?php  $title ="Deconnexion";  ?>

<?php ob_start(); ?>

<?php
session_start();

// remove all session variables
session_unset();

// destroy the session
session_destroy();
?>

<?php $content = ob_get_clean(); ?>

<?php include '..\layout.php'?>



