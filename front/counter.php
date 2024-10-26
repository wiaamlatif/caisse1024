<?php   
//$idUser = $_SESSION['user']['id_user'];
//  $idCategory = $_SESSION['category']['id_category'];

  //echo "=====idProduct===========";
  //echo $idProduct;

//  if(!isset($_SESSION['cart'][$idUser][$idProduct]))
//  {
//    $qtity=0;
//  } else {
//    $qtity=$_SESSION['cart'][$idUser][$idProduct];
//  }

//  $valueBtn = $qtity==0 ? 'Ajouter' : 'Modifier';

$qtity=5;
?>

<form action="cart.php" method="post" class="counter d-flex justify-content-center" id="myForm">

<div class="d-flex justify-content-center">

  <?php if($qtity>0) { ?>  
  <button formaction="supItemCart.php" type="submit" name="suprimer" class="btn btn-danger btn-sm">
    <i class="fa-solid fa-trash-can"></i>
  </button>
  <?php } ?>
  
  <button class="btnMinus btn btn-primary btn-sm mx-2" id="btnMinus<?=$idProduct?>" onclick="return false"><strong>-</strong></button>  
  <input  class="idProduct" type="hidden" name="idProduct" value="<?=$idProduct?>">
  <input  class="qtyInput form-control" type="text" name="qtyInput" id="qtyInput<?=$idProduct?>" min="0" max="10" value="<?= $qtity ?>" readonly>    
  <button class="btnPlus btn btn-primary btn-sm mx-2" id="btnPlus<?=$idProduct?>" onclick="return false"><strong>+</strong></button>  

  <button type="submit" name="ajouter" class="btn btn-success ajouter">
    <i class="fa fa-shopping-cart"></i>
  </button>

</div>

</form> 

<script>
  //btnPlus
const btnPlusEl = document.querySelectorAll(".btnPlus");

for (let i = 0; i < btnPlusEl.length; i++) {

  btnPlusEl[i].addEventListener('click',()=>{
 
    qtyInputEl[i].value= parseInt(qtyInputEl[i].value)+1;
    tdtotalItemEl[i].innerText =qtyInputEl[i].value*parseInt(tdPriceEl[i].innerText);
  
    thtotalTicketEl.innerText=totalTicket();
  })
  
}
  
</script>




