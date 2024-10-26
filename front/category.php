<?php   
   $id=$_GET['id'];

   require_once '../include/database.php';

    $sqlCategory = $pdo -> prepare('SELECT * FROM categories WHERE id_category=?');

    $sqlCategory-> execute([$id]);
    $category=$sqlCategory-> fetch(PDO::FETCH_ASSOC);
    
    //session_start();
    $_SESSION['category']=$category;
    
?>

<?php  $title =$category['name_category']; ?>

<?php ob_start(); ?>


<div class="container w-100">
    <div class="row">

    <?php 
            require_once '../include/database.php';      
            $sql_rows = $pdo -> prepare('SELECT * FROM products
                                         WHERE products.id_category = ?;') ;
            
            $sql_rows -> execute([$id]);
            $products= $sql_rows -> fetchAll(PDO::FETCH_ASSOC);  
                        
            foreach ($products as $row) {  
    ?>              
        <div class="card mb-3 col-md-3 m-1">
            <img src="../uploads/products/<?=$row['imgSrc']?>" class="card-img-top w-50 mx-auto" alt="...">
            <div class="card-body">
                <h6 class="card-title"><?= $row['name_product'] ?></h6>
                <p id="toto"></p>
                <p class="card-text"><small class="text-muted"> <?=$row['price']?> MAD</small></p>
                <p class="card-text"> <?= date_format(date_create($row['created_at']),format:'Y/m/d' )  ?></p>                
            </div>
            <div class="card-footer" style="z-index:10">
              <?php $idProduct=$row['id_product']; ?> 

              <?php include 'counter.php' ?>            

            </div>
        </div>
    <?php 
       } 
       if(empty($products)){
    ?>
          <div class="alert alert-info" role="alert">
           Pas de produits pour cette categorie pour l'instant
          </div>
    <?php
       }
    ?>

    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php include '..\layout.php'?>





   

  