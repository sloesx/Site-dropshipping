<?php
session_start();
$sujet = $_POST['sujet'];
if ($sujet == 1) {
    $sujet = "Service Client / Commande";
} else if ($sujet == 2) {
    $sujet = "Conseil Nutrition";
} else if ($sujet == 3) {
    $sujet = "Autre demande";
}
$nom = $_POST['nom'];
$_SESSION['succes'] = "Merci " . htmlspecialchars($nom) . " ! Votre message concernant le sujet « " . htmlspecialchars($sujet) . " » a bien été envoyé. Nous vous répondrons très vite.";
header('Location: index.php');
exit;
?>