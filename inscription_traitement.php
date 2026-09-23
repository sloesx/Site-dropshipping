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
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecom";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT client_email FROM Clients WHERE client_email = ?"; 
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $_SESSION['erreur'] = "Cette adresse email est déjà utilisée.";
    header('Location: inscription.php');
    exit;
}
$sql = "INSERT INTO Clients (client_nom, client_prenom, client_email, client_mot_de_passe, client_adresse_livraison, client_complement_adresse, client_code_postal, client_ville, client_pays, client_telephone) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"; 
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssssss", $nom, $prenom, $email, $mdp_chiffre, $adresse_postale, $complement_adresse, $code_postal, $ville, $pays, $telephone);
$stmt->execute();
$stmt->close();
$conn->close(); 
$_SESSION['client_email'] = $email;
$_SESSION['client_prenom'] = $prenom;
$_SESSION['succes'] = "Bienvenue " . htmlspecialchars($prenom) . ". Inscription confirmée !";
header('Location: index.php');
exit;
?>