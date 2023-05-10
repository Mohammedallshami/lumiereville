<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['profileOperatorId'];

if(!isset($admin_id)){
   header('location:admin_login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>tableau de bord</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php' ?>

<!-- admin dashboard section starts  -->

<section class="dashboard">

   <h1 class="heading">tableau de bord</h1>

   <div class="box-container">

   <div class="box">
      <h3>bienvenu</h3>
      <p><?= $fetch_profile['name']; ?></p>
      <a href="update_profile.php" class="btn">mettre à jour le profil</a>
   </div>

   <!-- start of total pending orders box -->
   <div class="box">
      <?php
         $total_pendings = 0;
         $select_pendings = $conn->prepare("SELECT * FROM `orders` WHERE statutDePaiement = ?");
         $select_pendings->execute(['pending']);
         while($fetch_pendings = $select_pendings->fetch(PDO::FETCH_ASSOC)){
            $total_pendings += $fetch_pendings['prixTotal'];
         }
      ?>
      <h3><span>$</span><?= $total_pendings; ?><span>/-</span></h3>
      <p>total des attente</p>
      <a href="placed_orders.php" class="btn">voir les commandes</a>
   </div>
   <!-- end of total pending orders box -->



   <!-- start of total completed orders box -->
   <div class="box">
      <?php
         $total_completes = 0;
         $select_completes = $conn->prepare("SELECT * FROM `orders` WHERE statutDePaiement = ?");
         $select_completes->execute(['completed']);
         while($fetch_completes = $select_completes->fetch(PDO::FETCH_ASSOC)){
            $total_completes += $fetch_completes['prixTotal'];
         }
      ?>
      <h3><span>$</span><?= $total_completes; ?><span>/-</span></h3>
      <p>total terminé</p>
      <a href="placed_orders.php" class="btn">voir les commandes</a>
   </div>
   <!-- start of total completed orders box -->


   <!-- start of whole orders box -->
   <div class="box">
      <?php
         $select_orders = $conn->prepare("SELECT * FROM `orders`");
         $select_orders->execute();
         $numbers_of_orders = $select_orders->rowCount();
      ?>
      <h3><?= $numbers_of_orders; ?></h3>
      <p>commandes totales</p>
      <a href="placed_orders.php" class="btn">voir les commandes</a>
   </div>
   <!-- end of whole orders box -->


   <!-- start of whole products box -->
   <div class="box">
      <?php
         $select_products = $conn->prepare("SELECT * FROM `produits`");
         $select_products->execute();
         $numbers_of_products = $select_products->rowCount();
      ?>
      <h3><?= $numbers_of_products; ?></h3>
      <p>produits ajoutés</p>
      <a href="products.php" class="btn">voir les produits</a>
   </div>   
   <!-- end of whole products box -->


   <!-- start of whole users accounts box -->
   <div class="box">
      <?php
         $select_users = $conn->prepare("SELECT * FROM `utilisateurs`");
         $select_users->execute();
         $numbers_of_users = $select_users->rowCount();
      ?>
      <h3><?= $numbers_of_users; ?></h3>
      <p>comptes utilisateurs</p>
      <a href="users_accounts.php" class="btn">voir les utilisateurs</a>
   </div>  
   <!-- end of whole users accounts box -->


   <!-- start of whole admins accounts box -->
   <div class="box">
      <?php
         $select_admins = $conn->prepare("SELECT * FROM `opérateurprofils`");
         $select_admins->execute();
         $numbers_of_admins = $select_admins->rowCount();
      ?>
      <h3><?= $numbers_of_admins; ?></h3>
      <p>les opérateurs</p>
      <a href="admin_accounts.php" class="btn">voir opérateurs</a>
   </div>   
   <!-- end of whole admins accounts box -->


   <!-- start of whole message box -->
   <div class="box">
      <?php
         $select_messages = $conn->prepare("SELECT * FROM `messages`");
         $select_messages->execute();
         $numbers_of_messages = $select_messages->rowCount();
      ?>
      <h3><?= $numbers_of_messages; ?></h3>
      <p>nouveaux messages</p>
      <a href="messages.php" class="btn">voir les messages</a>
   </div>   
   <!-- start of whole message box -->


   </div>

</section>

<!-- admin dashboard section ends -->









<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>