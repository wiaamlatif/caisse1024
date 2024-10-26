<form action="cartFront.php" method="post" class="counter d-flex justify-content-center" id="myForm">             
             <button class="btnMinus btn btn-primary btn-sm mx-2" id="btnMinus<?=$idProduct?>" onclick="return false"><strong>-</strong></button>  
             <input  class="idCategory" type="hidden" name="idCategory" value="<?=$id?>">
             <input  class="idProduct" type="hidden" name="idProduct" value="<?=$idProduct?>">
             <input  class="qtyInput form-control" type="text" name="qtyInput" id="qtyInput<?=$idProduct?>" min="0" max="10" value="<?= $qtity ?>" readonly>    
             <button class="btnPlus btn btn-primary btn-sm mx-2" id="btnPlus<?=$idProduct?>" onclick="return false"><strong>+</strong></button>  
             
             <button type="submit" name="ajouter" class="btn btn-success ajouter">
             <i class="fa fa-shopping-cart"></i>
             </button> 
</form>