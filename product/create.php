<?php  $title ="Add Product";  ?>

<?php ob_start(); ?>

<?php
                
         require_once '../include/database.php';      

         if(isset($_POST['Ajouter'])){
               
          $name = $_POST['name'];
          $price = $_POST['price'];
          $id_category = $_POST['id_category'] ;   
          
          var_dump($id_category);
                                        
          if(!empty($name) && !empty($price) && !empty($id_category)){
          
          //echo "<pre>";
          //var_dump($_FILES['imgSrc']);
          //echo "</pre>"; 

          if(empty($_FILES['imgSrc']['name'])){
           $myImage='default_images.png';
          } else {
            $myImage=uniqid().$_FILES['imgSrc']['name'];           
            move_uploaded_file($_FILES['imgSrc']['tmp_name'],'../uploads/products/'.$myImage);
          }
                                                
          $sqlstm = $pdo -> prepare('INSERT INTO products (name_product,price,id_category,imgSrc) 
                                     VALUES (?,?,?,?)');
             
          $sqlstm -> execute([$name,$price,$id_category,$myImage]);

          //Redirection
          header('location:index.php');
             
          } else {
             echo "
                    <div class='alert alert-danger' role='alert'>
                      Le nom du produit, la categorie sont obligatoires !
                    </div>
                  ";
          }          

         }
    ?>      

    <div class="container py-2 w-50">

    <h4>Products</h4>

      <form method="post" enctype="multipart/form-data">

        <label class="form-label">Name product</label>
        <input type="text" class="form-control" name="name">

        <label class="form-label" >Category:</label>
        <select class="form-control" name="id_category" id="id_category">
            <option value="">Choisir une Categorie ...</option>
          <?php 
              $sqlstm = $pdo -> query('SELECT * FROM categories')      
              -> fetchAll(PDO::FETCH_ASSOC);      
              foreach ($sqlstm as $row):   
          ?>              
            <option value='<?=$row['id_category']?>'><?=$row['name_category']?></option>;
          <?php     
              endforeach ;               
          ?>          
        </select>        

        <label class="form-label">Price</label>
        <input type="text" class="form-control" name="price">

        <label class="form-label">Image</label>
        <input type="file" class="form-control" name="imgSrc">
        
        <input type="submit" value="Ajouter" class="btn btn-primary my-2" name="Ajouter">

      </form>

    </div>
   

<?php $content = ob_get_clean(); ?>
<?php include '..\layout.php'?>