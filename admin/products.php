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

   $image_01 = $_FILES['image_01']['name'];
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
         if($insert_product){
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
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>produits</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php' ?>

<!-- add products section starts  -->

<section class="add-products">
<h1 class="heading">ajouter des produits</h1>
<!-- multipart/form-data: This value is necessary if the user will upload a file through the form -->
   <form action="" method="POST" enctype="multipart/form-data">
      <div class="flex">
         <div class="inputBox">
            <input type="text" required placeholder="entrer le nom du produit" name="name" maxlength="100" class="box" required>
         </div>
         <div class="inputBox">
            <input type="number" min="0" max="9999999999" required placeholder="entrez le prix du produit" name="price" onkeypress="if(this.value.length == 10) return false;" class="box" required>
         </div>
         <div class="inputBox">
            <select name="category" class="box" required>
            <option disabled selected>Choisir une catégorie</option>
            <option value="1">Gamis</option>
            <option value="2">parfums</option>
            <option value="3">Encens</option>
            <option value="4">Oud</option>
            <option value="5">Abaya</option>
            <option value="6">Hijab</option>
            <option value="7">parfum pour l'air</option>
            <option value="8">Tapis de priere</option>
            <option value="9">Echarpe</option>
            <option value="10">Incense Burner</option>
            <option value="11">Musk</option>
            <option value="12">mshlh</option>
            <option value="13">briquet</option>
            <option value="14">Porte monnaie</option>
            <option value="15">livre</option>
            <option value="16">Accessoires</option>
            <option value="18">Henna</option>
            <option value="19">bonnet pour homme</option>
            <option value="20">Autres</option>
            <option value="21">veilleuse</option>
            <option value="22">Chapelet</option>
            <option value="23">Qur'an</option>
            <option value="24">Bukhoor Système</option>
            <option value="25">Savon</option>
            </select>
         </div>
         <div class="inputBox">
            <select name="tva" class="box" required>
            <option disabled selected>choisir tva</option>
            <option value="0">0</option>
            <option value="1">20</option>
            <option value="2">5</option>
            </select>
         </div>
         <div class="inputBox">
            <input type="file" name="image_01" class="box" accept="image/jpg, image/jpeg, image/png, image/webp">
            
         </div>
         <div class="inputBox">
            <input type="file" name="image_02" class="box" accept="image/jpg, image/jpeg, image/png, image/webp">
         </div>
         <div class="inputBox">
            <input type="file" name="image_03" class="box" accept="image/jpg, image/jpeg, image/png, image/webp">
         </div>
         <div class="inputBox">
            <textarea name="details" placeholder="entrez la description du produit" class="box" required maxlength="500" cols="30" rows="10"></textarea>
         </div>
      </div>
      <input type="submit" value="ajouter un produit" name="add_product" class="btn">
   </form>

</section>

<!-- add products section ends -->

<!-- show products section starts  -->

<section class="show-products" >

   <div class="box-container">

   <?php
      $show_products = $conn->prepare("SELECT p.proId, p.nom, p.prix, p.descriptionCourte, p.urlImage1, p.urlImage2, p.urlImage3, t.valeur, c.nom AS category  FROM catégories AS c, produits  AS p, tva AS t WHERE p.catId = c.catId AND p.tva = t.index ORDER BY p.proId ASC");
      $show_products->execute();
      if($show_products->rowCount() > 0){
         while($fetch_products = $show_products->fetch(PDO::FETCH_ASSOC)){  
   ?>

   <div class="box">
      <img src="../uploaded_img/<?= $fetch_products['urlImage1']; ?>" alt="">
      
      <div class="flex">
         <div class="price"><span>$</span><?= $fetch_products['prix']; ?></div>
         <div class="category"><?= $fetch_products['category']; ?></div>
      </div>
      
      <div class="tax"><?= $fetch_products['valeur']; ?><span>%</span></div>
      <div class="name"><?= $fetch_products['nom']; ?></div>
      <div class="details"><span><?= $fetch_products['descriptionCourte']; ?></span></div>
      <div class="flex-btn">
         <a href="update_product.php?update=<?= $fetch_products['proId']; ?>" class="option-btn">mise à jour</a>
         <a href="products.php?delete=<?= $fetch_products['proId']; ?>" class="delete-btn" onclick="return confirm('supprimer ce produit?');">supprimer</a>
      </div>
   </div>
   <?php
         }
      }
      else{
         echo '<p class="empty">pas encore de produits ajoutés!</p>';
      }
   ?>

   </div>

</section>

<!-- show products section ends -->


<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>