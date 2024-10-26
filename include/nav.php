<?php
  $navTab = array( 
              0 => "Home",
              1 => "Categories",
              2 => "Products",
              3 => "Users",
              4 => "Connexion",
              5 => "Deconnexion"
              );

  for ($i=0; $i < count($navTab) ; $i++) { 
      $myLink[$i]="";
      }
    
if(isset($idNav)){
  $myLink[$idNav]="bg-primary text-white  active";  
}

?>
  
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarNav">
        <!----myDIV--->
        <ul class="navbar-nav">
          <?php 
            for ($i=0; $i < count($navTab) ; $i++) {  ?>
              <li class="nav-item">
              <a class="nav-link <?= $myLink[$i];?>" href="../index.php?idNav=<?= $i ?>"><?=$navTab[$i]?></a>
              </li>
          <?php                   
           } 
          ?>
          
        </ul>
        <!----myDIV--->
    </div>

      <?php
        $connected=true;
        if($connected){
      ?>
        <div class="d-flex justify-content-center">
          <a class="btn"  href="panierFront.php"><i class="fa-solid fa-cart-shopping"></i>Panier(
          <?php 
                  if(isset($panier)){
                   echo count($panier);
                  } else {
                    echo "0";
                  }
            ?>)</a>
        </div> 
      <?php
        }
      ?>   

</div>
</nav>

