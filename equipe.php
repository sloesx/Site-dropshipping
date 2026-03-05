<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Pump Room - L'équipe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">The Pump Room</a>
            <div class="navbar-nav">
                <a class="nav-link" href="index.php">Accueil</a> 
                <a class="nav-link" href="articles.php">Nos Produits</a> 
                <a class="nav-link active" href="equipe.php">Qui sommes-nous ?</a> 
                <a class="nav-link" href="contact.php">Contact</a>
                <a class="nav-link" href="inscription.php">Inscription</a>
            </div>
        </div>
    </nav>

    <main class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h1 class="text-center mb-4">L'équipe The Pump Room</h1>
                        
                        <p class="lead text-center">
                            Des passionnés de musculation au service de votre progression.
                        </p>
                        <hr>

                        <h3>Notre histoire</h3>
                        <p>
                            Bienvenue sur notre site. Nous avons créé <strong>The Pump Room</strong> parce qu'on trouvait qu'il manquait un site simple et clair pour acheter du bon matériel.
                            On est une petite équipe qui pratique la musculation depuis plusieurs années.
                        </p>

                        <h3>Pourquoi nous choisir ?</h3>
                        <p>Notre but n'est pas juste de vendre, mais de proposer ce qu'on utilise nous-mêmes :</p>
                        <ul>
                            <li>Des produits solides (haltères, ceintures).</li>
                            <li>Des compléments utiles (pas de produits miracles qui ne marchent pas).</li>
                            <li>Des conseils pour les débutants comme les confirmés.</li>
                        </ul>

                        <div class="alert alert-info mt-4" role="alert">
                            <strong>Note :</strong> Nous sommes basés en France et nous testons tous les produits avant de les mettre sur le site.
                        </div>

                        <div class="text-center mt-4">
                            <a href="contact.html" class="btn btn-outline-dark">Nous poser une question</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include('footer.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>