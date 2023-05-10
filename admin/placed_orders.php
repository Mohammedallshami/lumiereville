<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['profileOperatorId'];

if(!isset($admin_id)){
   header('location:admin_login.php');
};

if(isset($_POST['update_payment'])){

   $order_id = $_POST['orderId'];
   $payment_status = $_POST['statutDePaiement'];
   $payment_status = filter_var($payment_status, FILTER_SANITIZE_STRING);
   $update_status = $conn->prepare("UPDATE `orders` SET statutDePaiement = ? WHERE orderId = ?");
   $update_status->execute([$payment_status, $order_id]);
   $message[] = 'statut de paiement mis à jour !';

}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_order = $conn->prepare("DELETE FROM `orders` WHERE orderId = ?");
   $delete_order->execute([$delete_id]);
   header('location:placed_orders.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>commandes passées</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php' ?>

<!-- placed orders section starts  -->

<section class="orders">

   <h1 class="heading">commandes passées</h1>

   <div class="box-container">

   <?php
      $select_orders = $conn->prepare("SELECT * FROM `orders`");
      $select_orders->execute();
      if($select_orders->rowCount() > 0){
         while($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)){
   ?>
   <div class="box">
      <p> identifiant de l'opérateur : <span><?= $fetch_orders['userId']; ?></span> </p>
      <p> placé sur : <span><?= $fetch_orders['placéSur']; ?></span> </p>
      <p> nom : <span><?= $fetch_orders['nom']; ?></span> </p>
      <p> email : <span><?= $fetch_orders['email']; ?></span> </p>
      <p> number : <span><?= $fetch_orders['numéroDeTéléphone']; ?></span> </p>
      <p> adresse : <span><?= $fetch_orders['adresse']; ?></span> </p>
      <p> produits totaux : <span><?= $fetch_orders['produitTotal']; ?></span> </p>
      <p> prix total : <span>$<?= $fetch_orders['prixTotal']; ?>/-</span> </p>
      <p> mode de paiement : <span><?= $fetch_orders['méthode']; ?></span> </p>
      <form action="" method="POST">
         <input type="hidden" name="orderId" value="<?= $fetch_orders['orderId']; ?>">
         <select name="statutDePaiement" class="drop-down">
            <option value="" selected disabled><?= $fetch_orders['statutDePaiement']; ?></option>
            <option value="en attente">en attente</option>
            <option value="complété">complété</option>
         </select>
         <div class="flex-btn">
            <input type="submit" value="mise à jour" class="option-btn" name="update_payment">
            <a href="placed_orders.php?delete=<?= $fetch_orders['orderId']; ?>" class="delete-btn" onclick="return confirm('supprimer cette commande ?');">supprimer</a>
         </div>
      </form>
   </div>
   <?php
      }
   }else{
      echo '<p class="empty">pas encore de commandes passées</p>';
   }
   ?>

   </div>

</section>

<!-- placed orders section ends -->


<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>