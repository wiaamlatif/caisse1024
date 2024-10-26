<?php
     for ($i=0; $i < 4 ; $i++) { 
      $myLink[$i]="";
    }

   if(isset($_GET['id'])){
       $i=(int) $_GET['id'];
   } else {
       $i=0;
   }
   $myLink[$i]="bg-primary text-white  active";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

  <title>Document</title>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarNav">

      <ul class="navbar-nav">

        <li class="nav-item">          
          <a class="nav-link <?= $myLink[0];?>"  href="MyBar1.php?id=0">Link1</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $myLink[1];?>" href="MyBar1.php?id=1">Link2</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $myLink[2]; ?>" href="MyBar1.php?id=2">Link3</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $myLink[3]; ?>" href="MyBar1.php?id=3">Link4</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
  
</body>
</html>