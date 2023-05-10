<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['profileOperatorId'];

if(!isset($admin_id)){
   header('location:admin_login.php');
};

if(isset($_POST['update'])){

   $pid = $_POST['pid'];
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $price = $_POST['price'];
   $price = filter_var($price, FILTER_SANITIZE_STRING);
   $category = $_POST['category'];
   //$category = filter_var($category, FILTER_SANITIZE_STRING);
   $tva = $_POST['tva'];
   $details = $_POST['details'];
   $details = filter_var($details, FILTER_SANITIZE_STRING);

   $update_product = $conn->prepare("UPDATE produits SET nom = ?, catId = ?, prix = ?, descriptionCourte = ?, tva = ? WHERE proId = ?");
   $update_product->execute([$name, $category, $price, $details, $tva, $pid]);

   $message[] = 'product updated successfully!';
   
   $old_image_01 = $_POST['old_image_01'];
   $image_01 = $_FILES['image_01']['name'];
   $image_01 = filter_var($image_01, FILTER_SANITIZE_STRING);
   $image_size_01 = $_FILES['image_01']['size'];
   $image_tmp_name_01 = $_FILES['image_01']['tmp_name'];
   $image_folder_01 = '../uploaded_img/'.$image_01;

   if(!empty($image_01)){
      if($image_size_01 > 2000000){
         $message[] = "image size is too large!";
      }else{
         $update_image_01 = $conn->prepare("UPDATE produits SET urlImage1 = ? WHERE proId = ?");
         $update_image_01->execute([$image_01, $pid]);
         move_uploaded_file($image_tmp_name_01, $image_folder_01);
         unlink('../uploaded_img/'.$old_image_01);
         $message[] = 'Image 01 mise à jour réussie!';
      }
   }

   $old_image_02 = $_POST['old_image_02'];
   $image_02 = $_FILES['image_02']['name'];
   $image_02 = filter_var($image_02, FILTER_SANITIZE_STRING);
   $image_size_02 = $_FILES['image_02']['size'];
   $image_tmp_name_02 = $_FILES['image_02']['tmp_name'];
   $image_folder_02 = '../uploaded_img/'.$image_02;

   if(!empty($image_02)){
      if($image_size_02 > 2000000){
         $message[] = "La taille de l'image 02 est trop grande!";
      }else{
         $update_image_02 = $conn->prepare("UPDATE `produits` SET urlImage2 = ? WHERE proId = ?");
         $update_image_02->execute([$image_02, $pid]);
         move_uploaded_file($image_tmp_name_02, $image_folder_02);
         unlink('../uploaded_img/'.$old_image_02);
         $message[] = 'Image 02 mise à jour réussie!';
      }
   }

   $old_image_03 = $_POST['old_image_03'];
   $image_03 = $_FILES['image_03']['name'];
   $image_03 = filter_var($image_03, FILTER_SANITIZE_STRING);
   $image_size_03 = $_FILES['image_03']['size'];
   $image_tmp_name_03 = $_FILES['image_03']['tmp_name'];
   $image_folder_03 = '../uploaded_img/'.$image_03;

   if(!empty($image_03)){
      if($image_size_03 > 2000000){
         $message[] = "La taille de l'image 03 est trop grande!";
      }else{
         $update_image_03 = $conn->prepare("UPDATE `produits` SET urlImage3 = ? WHERE proId = ?");
         $update_image_03->execute([$image_03, $pid]);
         move_uploaded_file($image_tmp_name_03, $image_folder_03);
         unlink('../uploaded_img/'.$old_image_03);
         $message[] = 'Image 03 mise à jour réussie!';
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Mettre à jour le produit</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php' ?>

<!-- update product section starts  -->

<section class="update-product">

   <h1 class="heading">Mettre à jour le produit</h1>

   <?php
      $update_id = $_GET['update'];
      $show_products = $conn->prepare("SELECT p.proId, p.nom, p.catId AS cat, p.prix, p.descriptionCourte, p.urlImage1, p.urlImage2, p.urlImage3, p.tva AS tax, t.valeur, c.nom AS category  FROM catégories AS c, produits  AS p, tva AS t WHERE p.catId = c.catId AND p.tva = t.index AND proId = ?");
      $show_products->execute([$update_id]);
      if($show_products->rowCount() > 0){
         while($fetch_products = $show_products->fetch(PDO::FETCH_ASSOC)){  
   ?>
   <form action="" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="pid" value="<?= $fetch_products['proId']; ?>">
      <input type="hidden" name="old_image_01" value="<?= $fetch_products['urlImage1']; ?>">
      <input type="hidden" name="old_image_02" value="<?= $fetch_products['urlImage2']; ?>">
      <input type="hidden" name="old_image_03" value="<?= $fetch_products['urlImage3']; ?>">
      <div class="image-container">
         <div class="main-image">
            <img src="../uploaded_img/<?= $fetch_products['urlImage1']; ?>" alt="">
         </div>
         <div class="sub-image">
            <img src="../uploaded_img/<?= $fetch_products['urlImage1']; ?>" alt="">
            <img src="../uploaded_img/<?= $fetch_products['urlImage2']; ?>" alt="">
            <img src="../uploaded_img/<?= $fetch_products['urlImage3']; ?>" alt="">
         </div>
      </div>
      
      <input type="text" required placeholder="entrer le nom du produit" name="name" maxlength="100" class="box" value="<?= $fetch_products['nom']; ?>">
      
      <input type="number" min="0" max="9999999999" required placeholder="entrez le prix du produit" name="price" onkeypress="if(this.value.length == 10) return false;" class="box" value="<?= $fetch_products['prix']; ?>">
      
      <select name="category" class="box" required>
         <option selected value="<?= $fetch_products['cat']; ?>"><?= $fetch_products['category']; ?></option>
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
      <select name="tva" class="box" required>
         <option selected value="<?= $fetch_products['tax']; ?>"><?= $fetch_products['valeur']; ?></option>
         <option value="0">0</option>
         <option value="1">20</option>
         <option value="2">5</option>
      </select>
      
      <textarea name="details" class="box"  cols="30" rows="10"><?= $fetch_products['descriptionCourte']; ?></textarea>
      
      <input type="file" name="image_01" accept="image/jpg, image/jpeg, image/png, image/webp" class="box">
      
      <input type="file" name="image_02" accept="image/jpg, image/jpeg, image/png, image/webp" class="box">
      
      <input type="file" name="image_03" accept="image/jpg, image/jpeg, image/png, image/webp" class="box">
      <div class="flex-btn">
         <input type="submit" value="mettre à jour" class="btn" name="update">
         <a href="products.php" class="option-btn">Retour</a>
      </div>
   </form>
   <?php
         }
      }else{
         echo '<p class="empty">pas encore de produits ajoutés!</p>';
      }
   ?>

</section>

<!-- update product section ends -->


<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>