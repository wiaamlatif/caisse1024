<?php  $title ="PanierFront";  ?>

<?php ob_start(); ?>

  <!---------Remplir le Panier-------------->
  <?php
       session_start();

      // Display cart's items
      if(!empty($_SESSION['panier'])){
       $panier=$_SESSION['panier'];
      } else {
       $panier=[];  
      }

    if(!empty($panier)){

      $prd=array_keys($panier);
      $prdPanier=implode(",",$prd);
                      
      require_once 'include/database.php'; 

      $sqlstm = $pdo -> prepare('SELECT * FROM products 
                                WHERE id_product IN ('. $prdPanier.') ');
      $sqlstm -> execute();
      $productsCart = $sqlstm -> fetchAll(PDO::FETCH_ASSOC);

    } else {
      $productsCart=[];
  ?>
    <div class="alert alert-success" role="alert">
      <strong>Votre panier est vide !</strong>
    </div>
  <?php
    }

  ?>
  <!------End Remplir le Panier------------->

<table class="table table-striped table-hover">
      <thead>
        <tr><!-- table row--->
          <th width="10%">Id</th><!-- table head--->       
          <th width="20%">imgSrc</th>          
          <th width="20%">Product</th>          
          <th width="10%" style="text-align:center;">Quantite</th> 
          <th width="10%">Prix</th> 
          <th width="30%">Total</th>          
        </tr>
      </thead>
      <tbody>
          <?php   
              $totalTicket=0;        
              foreach ($productsCart as $row){ 
                $idProduct=$row['id_product'];
                $idCategory=$row['id_category'];
                $totalItem=$row['price']*$panier[$row['id_product']];

                $totalTicket+=$totalItem;           
          ?>              
        <tr>
           <td><?=$idProduct?></td>

           <td>            
            <img class="img img-fluid" src="uploads/products/<?=$row['imgSrc']?>" width="70px" alt="">
           </td>           

           <td><?=$row['name_product']?></td>
                     
           <td>
              <form action="cartFront.php" method="post" class="counter d-flex justify-content-center" id="myForm">            
                <input  class="idCategory" type="hidden" name="idCategory" value="<?=$idCategory?>">
                <input  class="idProduct"  type="hidden" name="idProduct" value="<?=$idProduct?>">
                <div class="d-flex justify-content-center">
                  <div>
                    <button class="btnMinus btn btn-primary btn-sm mx-2" id="btnMinus<?=$idProduct?>" onclick="return false"><strong>-</strong></button>                
                  </div>
                  <div>
                    <input  class="qtyInput" type="text" name="qtyInput" id="qtyInput<?=$idProduct?>" min="0" max="10" value="<?=$panier[$row['id_product']]?>" readonly>                    
                  </div>
                  <div>
                    <button class="btnPlus btn btn-primary btn-sm mx-2" id="btnPlus<?=$idProduct?>" onclick="return false"><strong>+</strong></button>                  
                  </div> 
                  <div>
                    <button type="submit" name="ajouter" class="btn btn-success ajouter">
                      <i class="fa fa-shopping-cart"></i>
                    </button>
                  </div>
                </div>                            
              </form>
           </td>             
           
           <td class="tdPrice"><?=$row['price']?></td>

           <td class="tdtotalItem"><?= $totalItem ?></td>

        </tr>  
        <?php     
            }                             
        ?>          
      </tbody> 
      <tfoot>
        <tr>
          <th colspan="5" style="text-align:right;" ><strong>Total</strong></th>
          <th id="thtotalTicket"><strong><?=$totalTicket?></strong></th>
        </tr>    
        <tr>
          <td colspan="5" style="text-align:right;" >
            <form action="viderValiderFront.php" method="post">
              <input type="hidden" name="nr_ticket" value="<?=$lastNumTicket?>">
              <input type="hidden" name="total_ticket" value="<?=$totalTicket?>">
              <input type="submit" name="valider" class="btn btn-success" value="Valider">
              <input type="submit" name="vider"   class="btn btn-danger" value="Vider" onclick="return confirm('Confirmer vider panier?')">
            </form>            
          </td>          
        </tr>    
      </tfoot> 
</table>        

<?php $content = ob_get_clean(); ?>

<?php include 'layout.php'?>

<?php

/*
      echo "................panier:";
      echo "<pre>";
      var_dump($panier);
      echo "</pre>";

      echo '...............$prdPanier:';
      echo "<pre>";
      var_dump($prdPanier);
      echo "</pre>";

      echo '$productsCart:';
      echo "<pre>";
      var_dump($productsCart);
      echo "</pre>";

*/
?>