<?php
$page_en_cours = basename($_SERVER['PHP_SELF']);
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
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ma-navigation">
        <div class="container">
            <a class="navbar-brand logo-site" href="index.php">The Pump Room</a>
            <div class="navbar-nav liens-menu">
                <a class="nav-link <?php if($page_en_cours == 'index.php') { echo 'active'; } ?>" href="index.php">Accueil</a> 
                <a class="nav-link <?php if($page_en_cours == 'articles.php') { echo 'active'; } ?>" href="articles.php">Nos Produits</a> 
                <a class="nav-link <?php if($page_en_cours == 'equipe.php') { echo 'active'; } ?>" href="equipe.php">Qui sommes-nous ?</a> 
                <a class="nav-link <?php if($page_en_cours == 'contact.php') { echo 'active'; } ?>" href="contact.php">Contact</a>
                <a class="nav-link <?php if($page_en_cours == 'inscription.php') { echo 'active'; } ?>" href="inscription.php">Inscription</a>
                <a class="nav-link <?php if($page_en_cours == 'connexion.php') { echo 'active'; } ?>" href="connexion.php">Connexion</a>
                <a class="nav-link <?php if($page_en_cours == 'deconnexion.php') { echo 'active'; } ?>" href="deconnexion.php">Déconnexion</a>
            </div>
        </div>
    </nav>