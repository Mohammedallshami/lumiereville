<?php
// inclure le fichier de connexion à la base de données
include '../components/connect.php';

session_start();

// Vérification de l'envoi du formulaire
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $reset_code = $_POST['reset_code'];
    $new_password = $_POST['new_password'];

    // Vérification de l'existence de l'e-mail et du code de réinitialisation du mot de passe dans la base de données
    $select_user = $conn->prepare("SELECT * FROM opérateurprofils WHERE email = ? AND reset_code = ?");
    $select_user->execute([$email, $reset_code]);

    if ($select_user->rowCount() > 0) {
        // Vérification de la force du nouveau mot de passe
        $password_strength = isStrongPassword($new_password);
        if ($password_strength === true) {
            // Mise à jour du nouveau mot de passe dans la base de données
            $user = $select_user->fetch(PDO::FETCH_ASSOC);
            $user_id = $user['profileOperatorId'];
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

            $update_password = $conn->prepare("UPDATE opérateurprofils SET password = ?, reset_code = NULL WHERE profileOperatorId = ?");
            $update_password->execute([$hashed_password, $user_id]);

            // Redirection de l'utilisateur vers la page de connexion
            header("Location: admin_login.php");
            exit();
        } else {
            $error_message = $password_strength;
        }
    } else {
        // Si l'e-mail ou le code de réinitialisation du mot de passe est incorrect
        $error_message = "Adresse e-mail incorrecte ou code de réinitialisation du mot de passe incorrect!";
    }
}

// Fonction de vérification de la force du mot de passe
function isStrongPassword($password)
{
    $min_length = 8; // Longueur minimale du mot de passe
    $uppercase_required = true; // Doit contenir des lettres majuscules
    $lowercase_required = true; // Doit contenir des lettres minuscules
    $number_required = true; // Doit contenir des chiffres
    $symbol_required = true; // Doit contenir des symboles

    $error_message = '';

    if (strlen($password) < $min_length ||
        ($uppercase_required && !preg_match('/[A-Z]/', $password)) ||
        ($lowercase_required && !preg_match('/[a-z]/', $password)) ||
        ($number_required && !preg_match('/[0-9]/', $password)) ||
        ($symbol_required && !preg_match('/[!@#$%^&*()\-_=+<>?]/', $password))
    ) {
        $error_message = "Le mot de passe doit contenir au moins 8 caractères et inclure des lettres majuscules, des lettres minuscules, des chiffres et des symboles.";
    }

    return $error_message;
}
?>
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
         font-family: Arial, sans-serif
;
}
.container {
max-width: 500px;
margin: 0 auto;
padding: 20px;
border: 1px solid #ccc;
}
h1 {
text-align: center;
}
input[type="email"], input[type="password"], input[type="text"] {
display: block;
width: 100%;
padding: 10px;
margin-bottom: 10px;
border: 1px solid #ccc;
border-radius: 4px;
box-sizing: border-box;
}
input[type="submit"] {
background-color: #4CAF50;
color: white;
padding: 10px 20px;
border: none;
border-radius: 4px;
cursor: pointer;
}
input[type="submit"]:hover {
background-color: #45a049;
}
.error {
color: red;
margin-bottom: 10px;
}
</style>

</head>
<body>
   <div class="container">
      <h1>Réinitialisation du mot de passe</h1>
      <form method="POST">
         <label for="email">Adresse e-mail:</label>
         <input type="email" id="email" name="email" required>
         <label for="reset_code">Code de réinitialisation du mot de passe:</label>
         <input type="text" id="reset_code" name="reset_code" required>
         <label for="new_password">Nouveau mot de passe:</label>
         <input type="password" id="new_password" name="new_password" required>
         <?php if (isset($error_message)) { ?>
            <div class="error"><?php echo $error_message; ?></div>
         <?php } ?>
         <input type="submit" value="Réinitialiser le mot de passe">
      </form>
   </div>
</body>
</html>