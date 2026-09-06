<?php
    $sujet = $_POST['sujet'];
    if ($sujet == 1) {
        $sujet = "Service Client / Commande";
    } else if ($sujet == 2) {
        $sujet = "Conseil Nutrition";
    } else if ($sujet == 3) {
        $sujet = "Autre demande";
    }
?>

    <p>nom: <?php echo htmlspecialchars($_POST['nom']); ?></p>
    <p>email: <?php echo htmlspecialchars($_POST['email']); ?></p>
    <p>sujet: <?php echo htmlspecialchars($sujet); ?></p>
    <p>message: <?php echo htmlspecialchars($_POST['message']); ?></p>
