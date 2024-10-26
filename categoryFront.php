<?php   
   $id=$_GET['id'];

   require_once 'include/database.php';

    $sqlCategory = $pdo -> prepare('SELECT * FROM categories WHERE id_category=?');

    $sqlCategory-> execute([$id]);
    $category=$sqlCategory-> fetch(PDO::FETCH_ASSOC);
    
    session_start();

    $_SESSION['category']=$category;
    
    if(empty($_SESSION['panier'])){
     $_SESSION['panier']=[];
     $panier=[];
    } else {
     $panier=$_SESSION['panier'];   
    }

    
?>

<?php  $title =$category['name_category']; ?>

<?php ob_start(); ?>


<div class="container w-100">
    <div class="row">

    <?php 

            require_once 'include/database.php';      
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
              
              <?php                                       
                    if(!isset($panier[$idProduct])){
                        $qtyInput=0;                        
                    } else {
                        $qtyInput=$panier[$idProduct];
                    }
              ?>              
<!----------->
        
    <div class="d-flex justify-content-center">
        <form action="cartFront.php" method="post" class="counter d-flex justify-content-center" id="myForm">             
                <?php
                   if($qtyInput>0){
                ?>    
                <button formaction="supItemCartFront.php" type="submit" name="suprimer" class="btn btn-danger btn-sm">
                    <i class="fa-solid fa-trash-can"></i>
                </button> 
                <?php
                   }
                ?>
                <button class="btnMinus btn btn-primary btn-sm mx-2" id="btnMinus<?=$idProduct?>" onclick="return false"><strong>-</strong></button>  
                <input  class="idCategory" type="hidden" name="idCategory" value="<?=$id?>">
                <input  class="idProduct" type="hidden" name="idProduct" value="<?=$idProduct?>">
                <input  class="qtyInput form-control" type="text" name="qtyInput" id="qtyInput<?= $qtyInput ?>" min="0" max="10" value="<?= $qtyInput ?>" readonly>    
                <button class="btnPlus btn btn-primary btn-sm mx-2" id="btnPlus<?=$idProduct?>" onclick="return false"><strong>+</strong></button>  
                
                <button type="submit" name="ajouter" class="btn btn-success ajouter">
                <i class="fa fa-shopping-cart"></i>
                </button> 

        </form>
    </div> 

<!----------->

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

<?php include 'layout.php'?>





   

  