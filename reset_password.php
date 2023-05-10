<?php
// inclure le fichier de connexion à la base de données
include 'components/connect.php';

session_start();

// Vérification de l'envoi du formulaire
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $reset_code = $_POST['reset_code'];
    $new_password = $_POST['new_password'];

    // Vérification de l'existence de l'e-mail et du code de réinitialisation du mot de passe dans la base de données
    $select_user = $conn->prepare("SELECT * FROM utilisateurs WHERE email = ? AND reset_code = ?");
    $select_user->execute([$email, $reset_code]);

    if ($select_user->rowCount() > 0) {
        // Mise à jour du nouveau mot de passe dans la base de données
        $user = $select_user->fetch(PDO::FETCH_ASSOC);
        $user_id = $user['userId'];
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        $update_password = $conn->prepare("UPDATE utilisateurs SET password = ?, reset_code = NULL WHERE userId = ?");
        $update_password->execute([$hashed_password, $user_id]);

        // Redirection de l'utilisateur vers la page de connexion
        header("Location: user_login.php");
        exit();
    } else {
        // Si l'e-mail ou le code de réinitialisation du mot de passe est incorrect
        echo "Adresse e-mail incorrecte ou code de réinitialisation du mot de passe incorrect!";
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
      }  h1 {
     text-align: center;
     margin-top: 50px;
  }

  form {
     max-width: 400px;
     margin: 20px auto;
     background-color: #fff;
     padding: 20px;
     border-radius: 5px;
     box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  input[type="email"],
  input[type="text"],
  input[type="password"] {
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
      <input type="text" name="reset_code" placeholder="Code de réinitialisation du mot de passe" required>
      <input type="password" name="new_password" placeholder="Nouveau mot de passeNouveau mot de passe" required>
<button type="submit">Mettre à jour le mot de passe</button>

   </form>
</body>
</html>