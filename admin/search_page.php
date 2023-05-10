<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['profileOperatorId'];

if(!isset($admin_id)){
   header('location:admin_login.php');
};

if(isset($_POST['add_product'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $price = $_POST['price'];
   $price = filter_var($price, FILTER_SANITIZE_STRING);
   $category = $_POST['category'];
   //$category = filter_var($category, FILTER_SANITIZE_STRING);
   $tva = $_POST['tva'];
   $details = $_POST['details'];
   $details = filter_var($details, FILTER_SANITIZE_STRING);

   $$image_01 = $_FILES['image_01']['name'];
   $image_01 = filter_var($image_01, FILTER_SANITIZE_STRING);
   $image_size_01 = $_FILES['image_01']['size'];
   $image_tmp_name_01 = $_FILES['image_01']['tmp_name'];
   $image_folder_01 = '../uploaded_img/'.$image_01;

   $image_02 = $_FILES['image_02']['name'];
   $image_02 = filter_var($image_02, FILTER_SANITIZE_STRING);
   $image_size_02 = $_FILES['image_02']['size'];
   $image_tmp_name_02 = $_FILES['image_02']['tmp_name'];
   $image_folder_02 = '../uploaded_img/'.$image_02;

   $image_03 = $_FILES['image_03']['name'];
   $image_03 = filter_var($image_03, FILTER_SANITIZE_STRING);
   $image_size_03 = $_FILES['image_03']['size'];
   $image_tmp_name_03 = $_FILES['image_03']['tmp_name'];
   $image_folder_03 = '../uploaded_img/'.$image_03;

   $select_products = $conn->prepare("SELECT * FROM produits WHERE nom = ?");
   $select_products->execute([$name]);

   if($select_products->rowCount() > 0){
      $message[] = 'le nom du produit existe déjà!';
   }
   else{
      
         $insert_product = $conn->prepare("INSERT INTO produits(nom, catId, prix, descriptionCourte, urlImage1, urlImage2, urlImage3, tva) VALUES(?,?,?,?,?,?,?,?)");
         $insert_product->execute([$name, $category, $price, $details, $image_01, $image_02, $image_03, $tva]);
         if($insert_products){
            if($image_size_01 > 2000000 OR $image_size_02 > 2000000 OR $image_size_03 > 2000000){
               $message[] = "la taille de l'image est trop grande!";
            }else{
               move_uploaded_file($image_tmp_name_01, $image_folder_01);
               move_uploaded_file($image_tmp_name_02, $image_folder_02);
               move_uploaded_file($image_tmp_name_03, $image_folder_03);
               $message[] = 'nouveau produit ajouté!';
            }
   
         }

   }

};

if(isset($_GET['delete'])){

   $delete_id = $_GET['delete'];
   $delete_product_image = $conn->prepare("SELECT * FROM produits WHERE proId = ?");
   $delete_product_image->execute([$delete_id]);
   $fetch_delete_image = $delete_product_image->fetch(PDO::FETCH_ASSOC);
   unlink('../uploaded_img/'.$fetch_delete_image['urlImage1']);
   unlink('../uploaded_img/'.$fetch_delete_image['urlImage2']);
   unlink('../uploaded_img/'.$fetch_delete_image['urlImage3']);
   $delete_product = $conn->prepare("DELETE FROM produits WHERE proId = ?");
   $delete_product->execute([$delete_id]);
   $delete_cart = $conn->prepare("DELETE FROM cart WHERE proId = ?");
   $delete_cart->execute([$delete_id]);
   header('location:products.php');

}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Page de recherche</title>
   <!-- Lien CDN de Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <!-- Lien vers le fichier CSS personnalisé -->
   <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<?php include '../components/admin_header.php'; ?>
<section class="search-form">
   <form action="" method="post">
      <input type="text" name="search_box" placeholder="Rechercher ici..." maxlength="100" class="box" required>
      <button type="submit" class="fas fa-search" name="search_btn"></button>
   </form>
</section>
<section class="products" style="padding-top: 0; min-height:100vh;">
   <div class="box-container">
   <?php
     if(isset($_POST['search_box']) OR isset($_POST['search_btn'])){
     $search_box = $_POST['search_box'];
     $select_products = $conn->prepare("SELECT * FROM `produits` WHERE nom LIKE '%{$search_box}%'"); 
     $select_products->execute();
     if($select_products->rowCount() > 0){
      while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
  <div class="box">
      <img src="../uploaded_img/<?= $fetch_products['urlImage1']; ?>" alt="">
      
      <div class="flex">
         <div class="price"><span>$</span><?= $fetch_products['prix']; ?></div>
      </div>
      
      <div class="name"><?= $fetch_products['nom']; ?></div>
      <div class="details"><span><?= $fetch_products['descriptionCourte']; ?></span></div>
      <div class="flex-btn">
         <a href="update_product.php?update=<?= $fetch_products['proId']; ?>" class="option-btn">mise à jour</a>
         <a href="products.php?delete=<?= $fetch_products['proId']; ?>" class="delete-btn" onclick="return confirm('supprimer ce produit?');">supprimer</a>
      </div>
   </div>
   <?php
         }
      }else{
         echo '<p class="empty">Aucun produit trouvé !</p>';
      }
   }
   ?>
   </div>
</section>
<?php include '../components/footer.php'; ?>
<script src="js/script.js"></script>
</body>
</html>