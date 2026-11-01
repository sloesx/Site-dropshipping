<?php
session_start();
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$mdp = $_POST['mdp'];
$mdp2 = $_POST['verif_mdp'];
$email = $_POST['inputEmail'];
$adresse_postale = $_POST['adresse_postale'];
$complement_adresse = $_POST['complement_adresse'];
$code_postal = $_POST['code_postal'];
$ville = $_POST['ville'];
$pays = $_POST['pays'];
$telephone = $_POST['telephone'];

if ($mdp != $mdp2) {
    $_SESSION['erreur'] = "Les mots de passe ne correspondent pas.";
    header('Location: inscription.php');
    exit;
}  

$mdp_chiffre = hash('sha256', $mdp);

require_once('config/db.php');

$sql = "SELECT client_email FROM Clients WHERE client_email = ?"; 
$stmt = $pdo->prepare($sql);
$stmt->execute([$email]);
$result = $stmt->fetch();

if ($result) {
    $_SESSION['erreur'] = "Cette adresse email est déjà utilisée.";
    header('Location: inscription.php');
    exit;
}

$sql = "INSERT INTO Clients (client_nom, client_prenom, client_email, client_mot_de_passe, client_adresse_livraison, client_complement_adresse, client_code_postal, client_ville, client_pays, client_telephone) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"; 
$stmt = $pdo->prepare($sql);
$stmt->execute([$nom, $prenom, $email, $mdp_chiffre, $adresse_postale, $complement_adresse, $code_postal, $ville, $pays, $telephone]);

$pdo = null; 

$to = $email;
$subject = "Bienvenue sur The Pump Room - Inscription confirmée";
$message = "Bonjour " . $prenom . ",\n\n"
         . "Nous vous remercions pour votre inscription sur notre site de e-commerce de musculation (The Pump Room).\n"
         . "Votre compte a bien été créé avec succès.\n\n"
         . "Pour rappel, votre identifiant de connexion est votre adresse e-mail : " . $email . "\n"
         . "(Pour des raisons de sécurité, votre mot de passe est le même que celui saisi lors de l'inscription).\n\n"
         . "À très bientôt sur notre site !\n"
         . "L'équipe The Pump Room";

$headers = "From: no-reply@thepumproom.fr\r\n" .
           "Reply-To: support@thepumproom.fr\r\n" .
           "MIME-Version: 1.0\r\n" .
           "Content-Type: text/plain; charset=utf-8\r\n" .
           "X-Mailer: PHP/" . phpversion();

mail($to, $subject, $message, $headers);

$_SESSION['client_email'] = $email;
$_SESSION['client_prenom'] = $prenom;
$_SESSION['succes'] = "Bienvenue " . htmlspecialchars($prenom) . ". Inscription confirmée !";

header('Location: index.php');
exit;
?>