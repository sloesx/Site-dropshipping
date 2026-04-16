<?php
    $sujet = $_POST['sujet'];
    if ($sujet == 1) {
        $sujet = "Service Client / Commande";
    } else if ($sujet == 2) {
        $sujet = "Conseil Nutrition";
    } else if ($sujet == 3) {
        $sujet = "Autre demande";
    }

echo hash('sha256', 'The quick brown fox jumped over the lazy dog.');

?>

    <p>nom: <?php echo $_POST['nom']; ?></p>
    <p>email: <?php echo $_POST['email']; ?></p>
    <p>sujet: <?php echo $sujet; ?></p>
    <p>message: <?php echo $_POST['message']; ?></p>
