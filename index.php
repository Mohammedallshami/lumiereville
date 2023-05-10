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
   <title>Accueil</title>
   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   <!-- Lien CDN pour Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <!-- Lien vers le fichier CSS personnalisé -->
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include 'components/user_header.php'; ?>
<div class="home-bg">
<section class="home">
   <div class="swiper home-slider">
   <div class="swiper-wrapper">   <div class="swiper-slide slide">
     <div class="image">
        <img src="images/perfum.png" alt="">
     </div>
     <div class="content">
        <span>jusqu'à 50% de réduction</span>
        <h3>derniers smartphones</h3>
        <a href="shop.php" class="btn">Acheter maintenant</a>
     </div>
  </div>
  <div class="swiper-slide slide">
     <div class="image">
        <img src="images/pur.png" alt="">
     </div>
     <div class="content">
        <span>jusqu'à 50% de réduction</span>
        <h3>dernières montres</h3>
        <a href="shop.php" class="btn">Acheter maintenant</a>
     </div>
  </div>

  <div class="swiper-slide slide">
     <div class="image">
        <img src="images/Oud.png" alt="">
     </div>
     <div class="content">
        <span>jusqu'à 50% de réduction</span>
        <h3>dernières montres</h3>
        <a href="shop.php" class="btn">Acheter maintenant</a>
     </div>
  </div>

  <div class="swiper-slide slide">
     <div class="image">
        <img src="images/home-img-3.png" alt="">
     </div>
     <div class="content">
        <span>jusqu'à 50% de réduction</span>
        <h3>derniers casques</h3>
        <a href="shop.php" class="btn">Acheter maintenant</a>
     </div>
  </div>
</div>   <div class="swiper-pagination"></div>
  <div class="swiper-pagination"></div>
 </div>
</section>
</div>
<section class="category">
   <h1 class="heading">Acheter par catégorie
</h1>
   <div class="swiper category-slider">
   <div class="swiper-wrapper">
   <a href="category.php?category=parfums" class="swiper-slide slide">
      <img src="images/perfum.png" alt="">
      <h3>parfums</h3></a>
   <a href="category.php?category=Encens" class="swiper-slide slide">
   <img src="images/icon-2.png" alt="">
      <h3>Encens</h3>
   </a>
   <a href="category.php?category=Oud" class="swiper-slide slide">
      <img src="images/Oud.png" alt="">
      <h3>Oud</h3>
   </a>
   <a href="category.php?category=perfume for the air " class="swiper-slide slide">
      <img src="images/icon-4.png" alt="">
      <h3>parfum pour l'air</h3>
   </a>
   <a href="category.php?category=Brûleur Encens" class="swiper-slide slide">
      <img src="images/icon-5.png" alt="">
      <h3>Brûleur d'encens</h3>
   </a>
   <a href="category.php?category=Musk" class="swiper-slide slide">
      <img src="images/icon-6.png" alt="">
      <h3>Musc</h3>
   </a>
   <a href="category.php?category=Accessoires" class="swiper-slide slide">
      <img src="images/icon-7.png" alt="">
      <h3>Accessoires</h3>
   </a>
   <a href="category.php?category=Henna" class="swiper-slide slide">
      <img src="images/icon-8.png" alt="">
      <h3>Henné</h3>
   </a>
   <a href="category.php?category=Bukhoor Système" class="swiper-slide slide">
      <img src="images/icon-8.png" alt="">
      <h3>Bukhoor Système</h3>
   </a>
   <a href="category.php?category=Savon" class="swiper-slide slide">
      <img src="images/icon-8.png" alt="">
      <h3>Savon</h3>
   </a>
   <a href="category.php?category=Pure essential oil" class="swiper-slide slide">
      <img src="images/icon-8.png" alt="">
      <h3>Huile essentielle pure</h3>
   </a>

   </div>
   <div class="swiper-pagination"></div>
   </div>
</section>
<<section class="products">
   <h1 class="heading">derniers produits</h1>
   <div class="box-container">
      <?php
         $select_products = $conn->prepare("SELECT * FROM `produits`LIMIT 6"); 
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
   <div class="swiper-pagination"></div>
</section>
<?php include 'components/footer.php'; ?>
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
<script src="js/script.js"></script>
<script>
var swiper = new Swiper(".home-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
});

var swiper = new Swiper(".category-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      0: {
         slidesPerView: 2,
       },
      650: {
        slidesPerView: 3,
      },
      768: {
        slidesPerView: 4,
      },
      1024: {
        slidesPerView: 5,
      },
   },
});

var swiper = new Swiper(".products-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      550: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
      },
   },
});
var swiper = new Swiper(".home-slider", {
  centeredSlides: true,
  loop:true,
  autoplay: {
    delay: 9500,
    disableOnInteraction: false,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
</script>

</body>
</html>