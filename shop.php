<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['userId'])){
   $user_id = $_SESSION['userId'];
}else{
   $user_id = '';
};

include 'components/wishlist_cart.php';

?>
<!DOCTYPE html>
<html lang="fr">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Boutique</title>
   <!-- Lien CDN de Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <!-- Lien vers le fichier CSS personnalisé -->
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include 'components/user_header.php'; ?>
<<section class="products">
   <h1 class="heading">Les derniers produits</h1>
   <div class="box-container">
      <?php
         $select_products = $conn->prepare("SELECT * FROM `produits`"); 
         $select_products->execute();
         if($select_products->rowCount() > 0){
            while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
               $product_images = array($fetch_product['urlImage1'], $fetch_product['urlImage2'], $fetch_product['urlImage3']);
               $has_images = false;

               foreach ($product_images as $image) {
                  if (!empty($image)) {
                     $has_images = true;
                     break;
                  }
               }

               if (!$has_images) { continue; // إذا لم يكن لديه صورة، قم بتخطي المنتج ولا تعرضه
               }
      ?>
               <form action="" method="post" class="box">
                  <input type="hidden" name="pid" value="<?= $fetch_product['proId']; ?>">
                  <input type="hidden" name="name" value="<?= $fetch_product['nom']; ?>">
                  <input type="hidden" name="price" value="<?= $fetch_product['prix']; ?>">
                  <input type="hidden" name="image" value="<?= $fetch_product['urlImage1']; ?>">
                  <button class="fas fa-heart" type="submit" name="add_to_wishlist"></button>
                  <a href="quick_view.php?pid=<?= $fetch_product['proId']; ?>" class="fas fa-eye"></a>
                  <img src="uploaded_img/<?= $fetch_product['urlImage1']; ?>" alt="">
                  <div class="name"><?= $fetch_product['nom']; ?></div>
                  <div class="flex">
                     <div class="price"><span>€</span><?= $fetch_product['prix']; ?><span></span></div>
                     <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
                  </div>
                  <input type="submit" value="Ajouter au panier" class="btn" name="add_to_cart">
               </form>
      <?php
            }
         } else {
            echo '<p class="empty">Aucun produit trouvé !</p>';
         }
      ?>
   </div>
</section>
<?php include 'components/footer.php'; ?>
<script src="js/script.js"></script>
</body>
</html>