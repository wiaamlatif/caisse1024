<?php

  //if(isset($_SESSION['panier'])){
    //   $quantity['category']['product']=0;
 // }
  

?>

<?php  $title ="Bienvenue et merci de vous intéresser à nos produits ";  ?>

<?php ob_start(); ?>

   <h4>Liste des categories</h4>

   <ul class="list-group list-group-flush w-75">
   <?php
     require_once 'include/database.php';

     $categories = $pdo -> query('SELECT * FROM categories')
                        -> fetchAll(PDO::FETCH_ASSOC); 
     
     foreach($categories as $category){    
   ?>
    <li class="list-group-item">
         <a class="btn btn-primary" href="categoryFront.php?id=<?=$category['id_category']?>"><?= $category['name_category']?></a>           
    </li>
   <?php }?>   
   </ul>

   
   <script>
   
   </script>
<?php $content = ob_get_clean(); ?>

<?php include 'layout.php'?>