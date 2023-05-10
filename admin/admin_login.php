<?php

include '../components/connect.php';
session_start();
if(isset($_SESSION['profileOperatorId'])){
   $user_id = $_SESSION['profileOperatorId'];
}else{
   $user_id = '';
};

if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);

   $select_admin = $conn->prepare("SELECT * FROM `opérateurprofils` WHERE name = ? ");
   $select_admin->execute([$name]);
   
   if($select_admin->rowCount() > 0){
      $user_id = $row['profileOperatorId'];

     // Mettre à jour le nouveau mot de passe dans la base de données
     $update_password = $conn->prepare("UPDATE opérateurprofils SET password = ? WHERE profileOperatorId = ?");
     $update_password->execute([$hashed_password, $user_id]);

      
      $fetch_admin_id = $select_admin->fetch(PDO::FETCH_ASSOC); 
      $_SESSION['profileOperatorId'] = $fetch_admin_id['profileOperatorId'];
      header('location:dashboard.php');
   }else{
      $message[] = 'identifiant ou mot de passe incorrect!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>connexion</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php
if(isset($message)){
   // The as keyword is used by the foreach loop to establish which variables 
   // contain the key and value of an element.
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<!-- admin login form section starts  -->

<section class="form-container">

   <form action="" method="POST">
      <h3>Connecte-toi maintenant</h3>
      <!-- <p>nom d'utilisateur par défaut = <span>admin</span> & password = <span>111</span></p> -->
      <input type="text" name="name" maxlength="20" required placeholder="Entrez votre nom d'utilisateur" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="pass" maxlength="20" required placeholder="tapez votre mot de passe" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="submit" value="connexion" name="submit" class="btn">
      <p><a href="admin_forget_password.php" class="swiper-slide slide">Mot de passe oublié</a></p>
   </form>

</section>

<!-- admin login form section ends -->


</body>
</html>