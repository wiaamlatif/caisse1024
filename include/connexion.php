<?php  $title ="Connexion";  ?>

<?php
   if(isset($_POST['connexion'])){
     $login=$_POST['login'];
     $pwd=$_POST['password'];
     if(!empty($login) && !empty($pwd)){

       require_once 'database.php';

       $sqlUsers = $pdo -> prepare("SELECT * FROM users
                                    WHERE login = ?
                                    and password = ? ");

        $sqlUsers -> execute([$login,$pwd]);

        $find=$sqlUsers->rowCount()>0;      
       
       if($find){
         //ouvrir une cession
         session_start();

         $_SESSION['user']= $sqlUsers->fetch(PDO::FETCH_ASSOC);

      //   header('location:front/index.php');
         
         //echo "<pre>";         
         //var_dump($_SESSION['user']);
         //echo "</pre>";

    //     header('location:../admin/admin.php');
         
       } else {
         header('location:../include/deconnexion.php');
       ?>
         <div class="alert alert-danger" role="alert">
         <strong>Login ou mot de passe incorrect !</strong>
         </div>       
       <?php
       }

     } else {
?>
      <div class="alert alert-danger" role="alert">
      <strong>Login et mot de passe sont obligatoires !</strong>
      </div>
<?php
     } //empty
   } //isset
?>

<?php ob_start(); ?>
   
<form action="connexion.php" method="post">

   <label class="form-label">Login</label>
   <input type="text" class="form-control" name="login">

   <label class="form-label">Password</label>
   <input type="password" class="form-control" name="password">

   <input type="submit" value="Connexion" class="btn btn-primary my-2" name="connexion">

</form>

<?php $content = ob_get_clean(); ?>

<?php include '..\layout.php'?>