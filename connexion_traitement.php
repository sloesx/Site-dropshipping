<?php
session_start();
$email = $_POST['email'];
$pw_saisi = $_POST['password'];
$mdp_chiffre = hash('sha256', $pw_saisi);
if (empty($email) || empty($pw_saisi)) {
    die("Veuillez remplir tous les champs.");
}
require_once('config/db.php');
$sql = "SELECT * FROM clients WHERE client_email = ? AND client_mot_de_passe = ?"; 
$stmt = $pdo->prepare($sql);
$stmt->execute([$email, $mdp_chiffre]);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
if (count($result) == 0) {
    $_SESSION['erreur'] = "Adresse email ou mot de passe incorrect.";
    header('Location: connexion.php');
    exit; 
} else {
    $utilisateur = $result[0];
    $_SESSION['client_email'] = $utilisateur['client_email'];
    $_SESSION['client_prenom'] = $utilisateur['client_prenom']; 
    header('Location: index.php');
    exit;
}