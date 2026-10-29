<?php include('header.php'); ?>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ecom";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM articles"; 
    $result = $conn->query($sql);
?>
    <header class="entete-page bg-light p-5 text-center">
        <h1 class="titre-principal">Notre Catalogue</h1>
        <p class="sous-titre">Retrouvez tous nos équipements ainsi que des compléments pour votre progression.</p>
    </header>

    <main class="container contenu-page my-5">
        <div class="row liste-produits">
            <?php
            while($produit = $result->fetch_assoc()) {
            ?>
            <div class="col-md-4 mb-4">
                <div class="card carte-produit h-100 shadow-sm">
                    <img src="<?php echo $produit['article_img']; ?>" class="card-img-top image-produit" alt="<?php echo $produit['article_nom']; ?>">
                    
                    <div class="card-body corps-carte d-flex flex-column">
                        <h5 class="card-title nom-produit"><?php echo $produit['article_nom']; ?></h5>
                        
                        <p class="card-text description-produit flex-grow-1"><?php echo $produit['article_description']; ?></p>
                        
                        <p class="card-text text-primary fw-bold fs-5 mb-3">
                            <?php echo number_format($produit['article_prix_unitaire_HT'], 2, ',', ' '); ?> € HT
                        </p>
                        
                        <form action="panier_traitement.php" method="POST" class="mt-auto">
                            <input type="hidden" name="action" value="ajouter">
                            <input type="hidden" name="article_ref" value="<?php echo $produit['article_ref']; ?>">
                            
                            <div class="input-group">
                                <input type="number" name="quantite" class="form-control" value="1" min="1" required>
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </main>
<?php
    $conn->close();
?>  
<script>
document.querySelectorAll('form[action="panier_traitement.php"]').forEach(form => {
    form.addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);
        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerText;

        fetch('panier_traitement.php', {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {

            const panierLink = document.getElementById('lien-panier');
            if (panierLink) {
                panierLink.innerHTML = `Panier <span class="badge bg-danger">${data.total}</span>`;
            }

            submitBtn.innerText = 'Ajouté !';
            submitBtn.classList.replace('btn-primary', 'btn-success');
            setTimeout(() => {
                submitBtn.innerText = originalText;
                submitBtn.classList.replace('btn-success', 'btn-primary');
            }, 1000);
        })
        .catch(err => console.error("Erreur panier:", err));
    });
});
</script>
<?php include('footer.php'); ?>