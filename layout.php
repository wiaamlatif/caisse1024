<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  
  <title><?= $title ?></title>

</head>
<body>
<?php 
   //  session_start();
     if(isset($_SESSION['idNav'])){
       $idNav=$_SESSION['idNav'];   
     }     
 ?>
<?php  include 'include/nav.php' ; ?>

<div class="container mt-2 py-2 w-100">

  <h5><?= $title ?></h5>

  <?= $content; ?>

</div>


<script src="../script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>