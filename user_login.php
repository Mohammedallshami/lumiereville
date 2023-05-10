<?php
include 'components/connect.php';

session_start();

if(isset($_SESSION['userId'])){
   $user_id = $_SESSION['userId'];
}else{
   $user_id = '';
};

if(isset($_POST['submit'])){

   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $new_password = $_POST['pass'];
   $new_password = filter_var($new_password, FILTER_SANITIZE_STRING);
   $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

   $select_user = $conn->prepare("SELECT * FROM `utilisateurs` WHERE email = ?");
   $select_user->execute([$email]);
   $row = $select_user->fetch(PDO::FETCH_ASSOC);

   if($select_user->rowCount() > 0){
      $user_id = $row['userId'];

      // Mettre à jour le nouveau mot de passe dans la base de données
      $update_password = $conn->prepare("UPDATE utilisateurs SET password = ? WHERE userId = ?");
      $update_password->execute([$hashed_password, $user_id]);

      $_SESSION['userId'] = $user_id;
      header('location: home.php');
   }else{
      $message[] = 'Nom d\'utilisateur ou mot de passe incorrect !';
   }

}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Connexion</title>
   <!-- Lien CDN de Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <!-- Lien vers le fichier CSS personnalisé -->
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include 'components/user_header.php'; ?>
<section class="form-container">
   <form action="" method="post">
      <h3>Connectez-vous maintenant</h3>
      <input type="email" name="email" required placeholder="Entrez votre adresse e-mail" maxlength="50"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="pass" required placeholder="Entrez votre mot de passe" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="submit" value="Se connecter maintenant" class="btn" name="submit">
      <p><a href="forget_password.php" class="swiper-slide slide">Mot de passe oublié</a></p>
      <p>Vous n'avez pas de compte ?</p>
      <a href="user_register.php" class="option-btn">S'inscrire maintenant</a>
   </form>
</section>
<?php include 'components/footer.php'; ?>
<script src="js/script.js"></script>
</body>
</html>