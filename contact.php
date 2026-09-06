<?php include('header.php'); ?>

    <main class="container contenu-page my-5">
        <h2 class="titre-section text-center mb-4">Contactez-nous</h2>
        
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card carte-formulaire shadow-sm">
                    <div class="card-body corps-carte p-4">
                        <p class="texte-intro mb-4">Une question sur votre programme de musculation ou sur une commande ? Remplissez ce formulaire.</p>
                        
                        <form action="contact_traitement.php" method="post">
                            <div class="mb-3">
                                <label for="nom" class="form-label etiquette-champ">Votre Nom</label>
                                <input required type="text" class="form-control champ-saisie" name="nom" id="nom" placeholder="Ex: Jean Dupont">
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label etiquette-champ">Votre Email</label>
                                <input required type="email" class="form-control champ-saisie" name="email" id="email" placeholder="nom@exemple.com">
                            </div>

                            <div class="mb-3">
                                <label for="sujet" class="form-label etiquette-champ">Sujet</label>
                                <select required class="form-select champ-selection" name="sujet" id="sujet">
                                    <option selected value="">Choisir un sujet...</option>
                                    <option value="1">Service Client / Commande</option>
                                    <option value="2">Conseil Nutrition</option>
                                    <option value="3">Autre demande</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="message" class="form-label etiquette-champ">Votre Message</label>
                                <textarea required class="form-control champ-saisie" name="message" id="message" rows="5" placeholder="Écrivez votre message ici..."></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary bouton-envoyer w-100">Envoyer le message</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </main>

<?php include('footer.php'); ?>