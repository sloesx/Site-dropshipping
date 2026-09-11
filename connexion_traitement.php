<?php
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

$sql = "SELECT client_email FROM Clients WHERE client_email = ? AND client_mot_de_passe = ?"; 
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $mdp_chiffre);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows == 1) {
    // Connexion réussie
}
if ($result->num_rows == 0) {
    die("Adresse email non trouvée ou mot de passe incorrect.");
}
?>
<p>Bienvenue, <?php echo htmlspecialchars($email); ?>.</p>