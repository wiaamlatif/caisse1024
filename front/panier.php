<?php  $title ="Votre Panier";  ?>

<?php ob_start(); ?>
<!------------------------>

  <!---------Lines Cart-------------->
  <?php
  $idUser = $_SESSION['user']['id_user'];
  $panier =$_SESSION['cart'][$idUser]; 
  $contItem=count($panier);

  if(!empty($panier)){
      
    require_once '../include/database.php'; 

    //Find the lastNumTicket
    $sqlstm = $pdo -> prepare('SELECT * FROM tickets
                               ORDER BY id_ticket
                               DESC LIMIT 1;
                             ');
    $sqlstm -> execute();

    $lastTicket = $sqlstm -> fetch(PDO::FETCH_ASSOC);
    
    if(!$lastTicket){
      $lastTicket['nr_ticket']="0";
    } 

    $lastNumTicket = $lastTicket['nr_ticket'];

    $lastNumTicket = $lastNumTicket +1;
                                //"123456789"
    $lastNumTicket=substr_replace("000000000",$lastNumTicket,9-strlen($lastNumTicket));                    

    // Display cart's items
    $prd=array_keys($panier);
    $prdPanier=implode(",",$prd);
                    
    $sqlstm = $pdo -> prepare('SELECT * FROM products 
                               WHERE id_product IN (' . $prdPanier . ') ');
    $sqlstm -> execute();
    $prdPanier = $sqlstm -> fetchAll(PDO::FETCH_ASSOC);
  }

  ?>
  <!------End Lines Cart------------->
        
    <div class="container py-2">  
                
      <h4>Panier (<?=$contItem?>)</h4>  

      <?php if($contItem>0):  ?>
      <h5>Ticket NR:(<?=$lastNumTicket?>)</h5>      
      <?php  endif ?>

      <div class="container">
        <div class="row">
        <?php
        if(empty($panier)){
        ?>
           <div class='alert alert-warning' role='alert'>
            Votre panier est vide !
           </div>
        <?php       
        }else{
        ?>

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
          foreach ($prdPanier as $row){ 
            $idProduct=$row['id_product'];
            $totalItem=$row['price']*$panier[$row['id_product']];
            $totalTicket+=$totalItem;           
      ?>              
        <tr>
           <td><?=$idProduct?></td>

           <td>            
            <img class="img img-fluid" src="../uploads/products/<?=$row['imgSrc']?>" width="70px" alt="">
           </td>           

           <td><?=$row['name_product']?></td>
                     
           <td><?php include '../include/front/counter.php'; ?></td>             
           
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
          <th colspan="5" style="text-align:right;" >
            <form action="actionPanier.php" method="post">
              <input type="hidden" name="nr_ticket" value="<?=$lastNumTicket?>">
              <input type="hidden" name="total_ticket" value="<?=$totalTicket?>">
              <input type="submit" name="valider" class="btn btn-success" value="Valider">
              <input type="submit" name="vider"   class="btn btn-danger" value="Vider" onclick="return confirm('Confirmer vider panier?')">
            </form>            
          </th>          
        </tr>    
      </tfoot> 

    </table>        
                      
        <?php
             }
        ?>  
                                 
        </div><!---row--->
      </div><!-----container--->
    </div><!-----container py-2 --->

<!------------------------>
<?php $content = ob_get_clean(); ?>

<?php include '..\layout.php'?>