<?php include('header.php'); ?>
    <main class="container contenu-page my-5">
        <h2 class="titre-section text-center mb-4">Se connecter</h2>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card carte-formulaire shadow-sm">
                    <div class="card-body corps-carte p-4">
                        <?php if(isset($_SESSION['erreur'])) { ?>
                            <div class="alert alert-danger text-center mb-3">
                                <?php 
                                echo $_SESSION['erreur']; 
                                unset($_SESSION['erreur']); 
                                ?>
                            </div>
                        <?php } ?>
                        <form action="connexion_traitement.php" method="post">
                            <div class="mb-3">
                                <label for="email" class="form-label etiquette-champ">Email :</label>
                                <input required type="email" class="form-control champ-saisie" name="email" id="email" placeholder="nom@exemple.com">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label etiquette-champ">Mot de Passe :</label>
                                <input required type="password" class="form-control champ-saisie" name="password" id="password" placeholder="Entrez votre mot de passe">
                            </div>
                            <button type="submit" class="btn btn-primary bouton-envoyer w-100">Se connecter</button>
                            <button type="button" class="btn btn-link bouton-lien">Mot de passe oublié</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php include('footer.php'); ?>