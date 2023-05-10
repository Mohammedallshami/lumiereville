<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['userId'])){
   $user_id = $_SESSION['userId'];
}else{
   $user_id = '';
};

if(isset($_POST['submit'])){
   header('location:user_login.php');
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);
   $cpass = sha1($_POST['cpass']);
   $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

   $select_user = $conn->prepare("SELECT * FROM `utilisateurs` WHERE email = ?");
   $select_user->execute([$email,]);
   $row = $select_user->fetch(PDO::FETCH_ASSOC);

   if($select_user->rowCount() > 0){
      $message[] = 'L\'adresse e-mail existe déjà !';
   }else{
      if($pass != $cpass){
         $message[] = 'Le mot de passe de confirmation ne correspond pas !';
      }else{
         $insert_user = $conn->prepare("INSERT INTO `utilisateurs`(name, email, password) VALUES(?,?,?)");
         $insert_user->execute([$name, $email, $cpass]);
         $message[] = 'Inscription réussie, veuillez vous connecter maintenant !';
      }
   }

}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>S'inscrire</title>
   <!-- Lien CDN de Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <!-- Lien vers le fichier CSS personnalisé -->
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include 'components/user_header.php'; ?>
<section class="form-container">
   <form action="" method="post">
      <h3>Inscrivez-vous maintenant</h3>
      <input type="text" name="name" required placeholder="Entrez votre nom d'utilisateur" maxlength="20"  class="box">
      <input type="email" name="email" required placeholder="Entrez votre adresse e-mail" maxlength="50"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="pass" required placeholder="Entrez votre mot de passe" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="cpass" required placeholder="Confirmez votre mot de passe" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="submit" value="S'inscrire maintenant" class="btn" name="submit">
      <p>Vous avez déjà un compte ?</p>
      <a href="user_login.php" class="option-btn">Se connecter maintenant</a>
   </form>
</section>
<?php include 'components/footer.php'; ?>
<script src="js/script.js"></script>
</body>
</html>