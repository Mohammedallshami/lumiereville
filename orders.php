<?php
include 'components/connect.php';

session_start();

if(isset($_SESSION['userId'])){
   $user_id = $_SESSION['userId'];
}else{
   $user_id = '';
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Commandes</title>
   
   <!-- Lien du CDN de Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- Lien vers le fichier CSS personnalisé -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="orders">

   <h1 class="heading">Commandes passées</h1>

   <div class="box-container">

   <?php
      if($user_id == ''){
         echo '<p class="empty">Veuillez vous connecter pour voir vos commandes</p>';
      }else{
         $select_orders = $conn->prepare("SELECT * FROM `orders` WHERE userId = ?");
         $select_orders->execute([$user_id]);
         if($select_orders->rowCount() > 0){
            while($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)){
   ?>
   <div class="box">
      <p>Passé le : <span><?= $fetch_orders['placéSur']; ?></span></p>
      <p>Nom : <span><?= $fetch_orders['nom']; ?></span></p>
      <p>Email : <span><?= $fetch_orders['email']; ?></span></p>
      <p>Numéro : <span><?= $fetch_orders['numéroDeTéléphone']; ?></span></p>
      <p>Adresse : <span><?= $fetch_orders['adresse']; ?></span></p>
      <p>Méthode de paiement : <span><?= $fetch_orders['méthode']; ?></span></p>
      <p>Vos commandes : <span><?= $fetch_orders['produitTotal']; ?></span></p>
      <p>Prix total : <span>$<?= $fetch_orders['prixTotal']; ?>/-</span></p>
      <p>État du paiement : <span style="color:<?php if($fetch_orders['statutDePaiement'] == 'pending'){ echo 'red'; }else{ echo 'green'; }; ?>"><?= $fetch_orders['statutDePaiement']; ?></span> </p>
   </div>
   <?php
      }
      }else{
         echo '<p class="empty">Aucune commande passée pour le moment !</p>';
      }
      }
   ?>

   </div>

</section>

<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>