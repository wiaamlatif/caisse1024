<?php  $title ="Category";  ?>

<?php ob_start(); ?>

<div class="container py-2">

   <h4>Liste des categories</h4>

   <a href="create.php" class="btn btn-primary">Ajouter Categorie</a>

   <table class="table table-striped table-hover">
      <thead>
         <tr><!-- table row--->
            <th>Id</th><!-- table head--->         
            <th>Name</th>         
            <th>Date</th>
            <th>Action</th>
         </tr>
      </thead>

      <tbody>

         <?php 
            require_once '../include/database.php';      
            $sqlstm = $pdo -> query('SELECT * FROM categories')      
            -> fetchAll(PDO::FETCH_ASSOC);      
            foreach ($sqlstm as $row) {  
         ?>              
               <tr>
                  <td><?=$row['id_category']?></td>               
                  <td><?=$row['name_category']?></td>                                     
                  <td><?= date_format(date_create($row['created_at']),"d/m/Y H:i")?></td>
                  <td>
                     <a href="modif.php?id=<?=$row['id_category']?>" class="btn btn-primary btn-sm">Modifier</a>
                     <a href="suprim.php?id=<?=$row['id_category']?>" class="btn btn-danger btn-sm"
                        onclick="return confirm('Confirmez SVP la suppression de <?=$row['name_category']?>')"  >Suprimer</a> 
                  </td>
               </tr>  
         <?php     
            }                             
         ?>          

      </tbody> 

   </table>

</div>
  
<?php $content = ob_get_clean(); ?>

<?php include '..\layout.php'?>