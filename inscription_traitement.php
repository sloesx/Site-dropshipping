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
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
if (count($result) > 0) {
    $_SESSION['erreur'] = "Cette adresse email est déjà utilisée.";
    header('Location: inscription.php');
    exit;
}
$sql = "INSERT INTO Clients (client_nom, client_prenom, client_email, client_mot_de_passe, client_adresse_livraison, client_complement_adresse, client_code_postal, client_ville, client_pays, client_telephone) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"; 
$stmt = $pdo->prepare($sql);
$stmt->execute([$nom, $prenom, $email, $mdp_chiffre, $adresse_postale, $complement_adresse, $code_postal, $ville, $pays, $telephone]);
$_SESSION['client_email'] = $email;
$_SESSION['client_prenom'] = $prenom;
$_SESSION['succes'] = "Bienvenue " . htmlspecialchars($prenom) . ". Inscription confirmée !";
header('Location: index.php');
exit;
?>