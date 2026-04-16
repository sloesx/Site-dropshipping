<?php
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
    die("mot de passes non correspondants");
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

$sql = "INSERT INTO Clients (client_nom, client_prenom, client_email, client_mot_de_passe, client_adresse_livraison, client_complement_adresse, client_code_postal, client_ville,
 client_pays, client_telephone) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"; 
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssssss", $nom, $prenom, $email, $mdp_chiffre, $adresse_postale, $complement_adresse, $code_postal, $ville, $pays, $telephone);
$stmt->execute();
$stmt->close();
$conn->close(); 
?>
<p>Bienvenue, <?php echo $prenom; ?>. Inscription confirmée! </p>