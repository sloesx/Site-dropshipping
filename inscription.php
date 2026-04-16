<?php include('header.php'); ?>

    <main class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8"> <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h2 class="h4 mb-0 text-center">Créer un compte</h2>
                    </div>
                    <div class="card-body p-4">
                        
                        <form action="inscription_traitement.php" method="post">
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="nom" class="form-label">Nom</label>
                                    <input required type="text" class="form-control" name="nom" id="nom" placeholder="Votre nom">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="prenom" class="form-label">Prénom</label>
                                    <input required type="text" class="form-control" name="prenom" id="prenom" placeholder="Votre prénom">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="inputEmail" class="form-label">Email</label>
                                    <input required type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="votre@email.com">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="telephone" class="form-label">Téléphone</label>
                                    <input required type="tel" class="form-control" name="telephone" id="telephone" placeholder="06 XX XX XX XX">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="mdp" class="form-label">Mot de passe</label>
                                    <input required type="password" class="form-control" name="mdp" id="mdp"> </div>
                                <div class="col-md-6 mb-3">
                                    <label for="verif_mdp" class="form-label">Confirmation</label>
                                    <input required type="password" class="form-control" name="verif_mdp" id="verif_mdp">
                                </div>
                            </div>

                            <hr class="my-4"> <h5 class="mb-3">Adresse de livraison</h5>

                            <div class="mb-3">
                                <label for="adresse_postale" class="form-label">Adresse complète</label>
                                <input required type="text" class="form-control" id="adresse_postale" name="adresse_postale" placeholder="N° et nom de rue...">
                            </div>
                            <div class="mb-3">
                                <label for="complement_adresse" class="form-label">Complément d'adresse (Facultatif)</label>
                                <input type="text" class="form-control" id="complement_adresse" name="complement_adresse" placeholder="Bâtiment, étage, lieu-dit...">
                            </div>

                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="code_postal" class="form-label">Code Postal</label>
                                    <input required type="text" class="form-control" id="code_postal" name="code_postal" placeholder="Ex: 75000">
                                </div>
                                <div class="col-md-5 mb-3">
                                    <label for="ville" class="form-label">Ville</label>
                                    <input required type="text" class="form-control" id="ville" name="ville" placeholder="Ex: Paris">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="pays" class="form-label">Pays</label>
                                    <select required class="form-select" id="pays" name="pays">
                                        <option value="France" selected>France</option>
                                        <option value="Belgique">Belgique</option>
                                        <option value="Suisse">Suisse</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3 form-check mt-3">
                                <input required type="checkbox" class="form-check-input" id="cgu_check">
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