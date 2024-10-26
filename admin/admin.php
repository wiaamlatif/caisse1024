<?php  
       session_start();

     //  echo "<pre>";
     //  var_dump($_SESSION['user']);
     //  echo "</pre>";

       if(!isset($_SESSION['user'])){
            header('location:../include/connexion');
       }
?>
<?php  $title ="Admin";  ?>

<?php ob_start(); ?>

     <h3>Bonjour <?= $_SESSION['user']['login'] ?></h3>

<?php $content = ob_get_clean(); ?>

<?php include '..\layout.php'?>