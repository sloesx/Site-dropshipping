<?php
session_start();

$email = $_POST['email'];
$pw_saisi = $_POST['password'];
$mdp_chiffre = hash('sha256', $pw_saisi);

if (empty($email) || empty($pw_saisi)) {
    die("Veuillez remplir tous les champs.");
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecom";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM clients WHERE client_email = ? AND client_mot_de_passe = ?"; 
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $mdp_chiffre);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows == 0) {
    $_SESSION['erreur'] = "Adresse email ou mot de passe incorrect.";
    header('Location: connexion.php');
    exit; 
} else {
    $utilisateur = $result->fetch_assoc();
    $_SESSION['client_email'] = $utilisateur['client_email'];
    $_SESSION['client_prenom'] = $utilisateur['client_prenom']; 
    
    header('Location: index.php');
    exit;
}