<?php  $title ="Ajouter Category";  ?>

<?php ob_start(); ?>

<?php
   
    if(isset($_POST['ajouter'])){
       $name=$_POST['name'];
       if(!empty($name)){

         require_once 'C:\caisse1024\include\database.php';

         $sql_row = $pdo -> prepare('INSERT INTO categories (name_category)
                                     VALUES (?)
                                    ');

         $sql_row -> execute([$name]);
         
?>

<div class="alert alert-success" role="alert">
  <strong>La Categorie est <?= $name ?> est joutée !</strong>
</div>


<?php         
       }
       else {
?>

<div class="alert alert-danger" role="alert">
  <strong>La Categorie est obligatoire !</strong>
</div>

<?php
        
       }
    }

?>

<div class="container py-2">

    <form  method="post">

        <label for="name" class="form-label">Name category</label>
        <input type="text" id="name" name="name" class="form-control w-50">

        <input type="submit" name="ajouter" class="btn btn-primary my-2 w-50" value="Ajouter">


    </form>

</div>
   

<?php $content = ob_get_clean(); ?>
<?php include '..\layout.php'?>