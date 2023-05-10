<?php
// Inclure le fichier de connexion à la base de données
include 'components/connect.php';

session_start();

// Vérifier l'envoi du formulaire
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $email = $_POST['email'];

   // Vérifier si l'e-mail existe dans la base de données
   $select_user = $conn->prepare("SELECT * FROM utilisateurs WHERE email = ?");
   $select_user->execute([$email]);

   if ($select_user->rowCount() > 0) {
       $user = $select_user->fetch(PDO::FETCH_ASSOC);
       $user_id = $user['userId'];
       $user_email = $user['email'];

       // Générer un code de réinitialisation aléatoire de 6 chiffres
       $reset_code = mt_rand(100000, 999999);

       // Mettre à jour la base de données avec le code de réinitialisation du mot de passe
       $update_code = $conn->prepare("UPDATE utilisateurs SET reset_code = ? WHERE userId = ?");
       $update_code->execute([$reset_code, $user_id]);

       // Importer la bibliothèque requise (exemple avec PHPMailer)
       require 'C:/xampp\htdocs\ecommerce website(lumiere)\PHPMailer-master/src/PHPMailer.php';
       require 'C:/xampp\htdocs\ecommerce website(lumiere)\PHPMailer-master/src/SMTP.php';

       // Définir les informations d'e-mail pour MailHog
       $smtpHost = 'localhost';
       $smtpPort = 1025;

       // Configuration de PHPMailer
       $mail = new PHPMailer\PHPMailer\PHPMailer();
       $mail->isSMTP();
       $mail->Host = $smtpHost;
       $mail->Port = $smtpPort;

       // Définir l'expéditeur, le destinataire et le contenu de l'e-mail
       $mail->setFrom('mohammeddalarwi@gmail.com', 'Mohammed');
       $mail->addAddress($user_email, 'Nom du destinataire');
       $mail->Subject = 'Code de vérification';
       $mail->Body = 'Votre code de vérification : ' . $reset_code;

       // Envoyer l'e-mail
       if (!$mail->send()) {
           echo 'Échec de l\'envoi de l\'e-mail : ' . $mail->ErrorInfo;
           exit;
       }

       // Rediriger l'utilisateur vers la page de réinitialisation du mot de passe
       header("Location: reset_password.php");
       exit();
   }
}

// ...

?>

<!DOCTYPE html>
<html lang="fr">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Réinitialisation du mot de passe</title>
   <style>
      body {
         font-family: Arial, sans-serif;
         background-color: #f2f2f2;
         margin: 0;
         padding: 0;
      }

      h1 {
         text-align: center;
         margin-top: 50px;
      }

      form {
         max-width: 400px;
         margin: 20px auto;
         background-color: #fff;
         padding: 20px;
         border-radius: 5px;
         box-shadow: 0 0 10px rgba(0, 0, 0, 0, 0.1);
}  input[type="email"] {
     width: 100%;
     padding: 10px;
     margin-bottom: 10px;
     border: 1px solid #ccc;
     border-radius: 4px;
     box-sizing: border-box;
  }

  button[type="submit"] {
     width: 100%;
     background-color: #4caf50;
     color: #fff;
     padding: 10px;
     border: none;
     border-radius: 4px;
     cursor: pointer;
  }

  button[type="submit"]:hover {
     background-color: #45a049;
  }
</style>
</head>
<body>
   <h1>Réinitialisation du mot de passe</h1>
   <form action="" method="POST">
      <input type="email" name="email" placeholder="Adresse e-mail" required>
      <button type="submit">Envoyer</button>
   </form>
</body>
</html>