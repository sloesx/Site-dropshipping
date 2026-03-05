<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Pump Room - Inscription</title>
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
                <a class="nav-link" href="equipe.php">Qui sommes-nous ?</a> 
                <a class="nav-link" href="contact.php">Contact</a>
                <a class="nav-link active" href="inscription.php">Inscription</a>
            </div>
        </div>
    </nav>

    <main class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h2 class="h4 mb-0 text-center">Créer un compte</h2>
                    </div>
                    <div class="card-body p-4">
                        
                        <form>
                            <div class="mb-3">
                                <label for="inputEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="inputEmail" placeholder="votre@email.com">
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="mdp" class="form-label">Mot de passe</label>
                                    <input type="password" class="form-control" id="mdp">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="verif_mdp" class="form-label">Confirmation</label>
                                    <input type="password" class="form-control" id="verif_mdp">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="adresse_postale" class="form-label">Adresse complète</label>
                                <input type="text" class="form-control" id="adresse_postale" placeholder="Rue, code postal...">
                            </div>

                            <div class="mb-3">
                                <label for="ville" class="form-label">Ville</label>
                                <input type="text" class="form-control" id="ville">
                            </div>

                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="cgu_check">
                                <label class="form-check-label" for="cgu_check">J'accepte les conditions générales</label>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Valider l'inscription</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include('footer.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>