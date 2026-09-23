<?php
session_start();
$page_en_cours = basename($_SERVER['PHP_SELF']);
$total_articles_panier = 0;
if (isset($_SESSION['panier']) && is_array($_SESSION['panier'])) {
    $total_articles_panier = array_sum($_SESSION['panier']);
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Pump Room</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ma-navigation">
        <div class="container">
            <a class="navbar-brand logo-site" href="index.php">The Pump Room</a>
            <div class="navbar-nav liens-menu">
                <a class="nav-link <?php if($page_en_cours == 'index.php') { echo 'active'; } ?>" href="index.php">Accueil</a> 
                <a class="nav-link <?php if($page_en_cours == 'articles.php') { echo 'active'; } ?>" href="articles.php">Nos Produits</a> 
                <a class="nav-link <?php if($page_en_cours == 'equipe.php') { echo 'active'; } ?>" href="equipe.php">Qui sommes-nous ?</a> 
                <a class="nav-link <?php if($page_en_cours == 'contact.php') { echo 'active'; } ?>" href="contact.php">Contact</a>
                <a id="lien-panier" class="nav-link <?php if($page_en_cours == 'panier.php') { echo 'active'; } ?>" href="panier.php">
                    Panier <?php if ($total_articles_panier > 0) { ?>
                        <span class="badge bg-danger"><?php echo $total_articles_panier; ?></span>
                     <?php } ?>
                </a>
                <?php if (isset($_SESSION['client_email'])) { ?>
                    <a class="nav-link <?php if($page_en_cours == 'deconnexion.php') { echo 'active'; } ?>" href="deconnexion.php">Déconnexion</a>
                <?php } else { ?>
                    <a class="nav-link <?php if($page_en_cours == 'inscription.php') { echo 'active'; } ?>" href="inscription.php">Inscription</a>
                    <a class="nav-link <?php if($page_en_cours == 'connexion.php') { echo 'active'; } ?>" href="connexion.php">Connexion</a>
                <?php } ?>
            </div>
        </div>
    </nav>