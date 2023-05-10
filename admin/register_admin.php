<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['profileOperatorId'];

if(!isset($admin_id)){
   header('location:admin_login.php');
};

if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = $_POST['pass'];
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);
   $cpass = $_POST['cpass'];
   $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

   $select_admin = $conn->prepare("SELECT * FROM `opérateurprofils` WHERE email = ?");
   $select_admin->execute([$email]);

   if($select_admin->rowCount() > 0){
      $message[] = "Ce nom d'utilisateur existe déjà!";
   }

   else{
      if (!isStrongPassword($pass)) {
         $message[] = 'كلمة المرور يجب أن تحتوي على الأحرف الكبيرة والصغيرة والأرقام والرموز وتكون طولها لا يقل عن 8 أحرف.';
     } else {
         $hashed_password = password_hash($pass, PASSWORD_DEFAULT);
         $insert_admin = $conn->prepare("INSERT INTO `opérateurprofils`(name, password, email) VALUES(?,?,?)");
         $insert_admin->execute([$name, $hashed_password, $email]);
         $message[] = 'nouvel administrateur enregistré!';
     
         // عرض رسالة تسجيل الدخول بنجاح
         echo "<p class='success-message'>تم تسجيل الدخول بنجاح!</p>";
         header('Location: admin_login.php');
exit;
     }
      }
   }



// تحقق من قوة كلمة المرور
function isStrongPassword($password){
   // تنفيذ قواعد قوة كلمة المرور هنا
   $min_length = 8; // الحد الأدنى لطول كلمة المرور
   $uppercase_required = true; // مطلوب وجود حروف كبيرة
   $lowercase_required = true; // مطلوب وجود حروف صغيرة
   $number_required = true; // مطلوب وجود أرقام
   $symbol_required = true; // مطلوب وجود رموز

   if(strlen($password) < $min_length){
      return false;
   }

   if($uppercase_required && !preg_match('/[A-Z]/', $password)){
      return false;
   }

   if($lowercase_required && !preg_match('/[a-z]/', $password)){
      return false;
   }

   if($number_required && !preg_match('/[0-9]/', $password)){
      return false;
   }

   if($symbol_required && !preg_match('/[!@#$%^&*()\-_=+{};:,<.>]/', $password)){
      return false;
   }

   return true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>enregistrer</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php' ?>

<!-- register admin section starts  -->

<section class="form-container">

   <form action="" method="POST">
      <h3>enregistrer nouveau</h3>
      <?php
         if(isset($message) && is_array($message)){
            foreach($message as $msg){
               echo "<p class='error-message'>$msg</p>";
            }
         }
      ?>
      <input type="text" name="name" maxlength="20" required placeholder="Entrez votre nom d'utilisateur" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="email" name="email" required placeholder="Entrez votre adresse e-mail" maxlength="50"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="pass" maxlength="20" required placeholder="tapez votre mot de passe" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="cpass" maxlength="20" required placeholder="confirmer votre mot de passe" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="submit" value="S'inscrire maintenant" name="submit" class="btn">
   </form>

</section>

<!-- register admin section ends -->
















<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>