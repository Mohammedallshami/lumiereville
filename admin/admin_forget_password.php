<?php
include '../components/connect.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    $select_user = $conn->prepare("SELECT * FROM opérateurprofils WHERE email = ?");
    $select_user->execute([$email]);
    
    if ($select_user->rowCount() > 0) {
        $user = $select_user->fetch(PDO::FETCH_ASSOC);
        $user_id = $user['profileOperatorId'];
        $user_email = $user['email'];
    
        $reset_code = bin2hex(random_bytes(4));

        $update_code = $conn->prepare("UPDATE opérateurprofils SET reset_code = ? WHERE profileOperatorId = ?");
        $update_code->execute([$reset_code, $user_id]);    

        require '../PHPMailer-master/src/PHPMailer.php';
        require '../PHPMailer-master/src/SMTP.php';
    
        $smtpHost = 'localhost';
        $smtpPort = 1025;
    
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->isSMTP();
        $mail->Host = $smtpHost;
        $mail->Port = $smtpPort;
    
        $mail->setFrom('mohammeddalarwi@gmail.com', 'Mohammed');
        $mail->addAddress($user_email, 'Nom du destinataire');
        $mail->Subject = 'Code de vérification';
        $mail->Body = 'Votre code de vérification : ' . $reset_code;
    
        if (!$mail->send()) {
            $message[] = 'Échec de l\'envoi de l\'e-mail : ' . $mail->ErrorInfo;
        } else {
            header("Location: admin_reset_password.php");
            exit();
        }
    } else {
        $message[] = 'Adresse e-mail incorrecte';
    }
}
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
}

      input[type="email"] {
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
   <section class="form-container">
      <form action="" method="POST">
         <h3>نسيت كلمة المرور</h3>
         <?php
         if (isset($message)) {
            foreach ($message as $msg) {
               echo '<p>' . $msg . '</p>';
            }
         }
         ?>
         <input type="email" name="email" required placeholder="أدخل عنوان البريد الإلكتروني" maxlength="50" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
         <button type="submit" name="submit">إرسال رمز التحقق</button>
      </form>
   </section>
</body>
</html>