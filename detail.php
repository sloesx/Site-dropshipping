<?php include('header.php'); ?>
<?php
    if (!isset($_GET['id']) || empty($_GET['id'])) {
        header('Location: articles.php');
        exit;
    }
    $id_article = intval($_GET['id']);
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ecom";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $conn->set_charset("utf8mb4");
    $sql = "SELECT * FROM articles WHERE article_ref = ?"; 
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_article);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows === 0) {
        echo "<main class='container my-5 text-center'>";
        echo "<h2>Article introuvable</h2>";
        echo "<a href='articles.php' class='btn btn-primary mt-3'>Retour au catalogue</a>";
        echo "</main>";
        include('footer.php');
        exit;
    }
    $produit = $result->fetch_assoc();
?>
<main class="container my-5">
    <div class="row">
        <div class="col-md-6 mb-4 text-center">
            <div class="card shadow-sm p-3">
                <img src="<?php echo $produit['article_img']; ?>" class="img-fluid" alt="<?php echo $produit['article_nom']; ?>" style="max-height: 400px; object-fit: contain;">
            </div>
        </div>
        <div class="col-md-6 d-flex flex-column justify-content-center">
            <h1 class="mb-3"><?php echo $produit['article_nom']; ?></h1>
            <p class="text-muted fs-5 mb-4"><?php echo $produit['article_description']; ?></p>
            <p class="text-primary fw-bold display-6 mb-4">
                <?php echo number_format($produit['article_prix_unitaire_HT'], 2, ',', ' '); ?> € HT
            </p>
            <form action="panier_traitement.php" method="POST" class="mb-4" style="max-width: 300px;">
                <input type="hidden" name="action" value="ajouter">
                <input type="hidden" name="article_ref" value="<?php echo $produit['article_ref']; ?>">
                <div class="input-group input-group-lg shadow-sm">
                    <input type="number" name="quantite" class="form-control text-center" value="1" min="1" required>
                    <button type="submit" class="btn btn-primary px-4">Ajouter</button>
                </div>
            </form>
            <div>
                <a href="articles.php" class="btn btn-outline-secondary">&larr; Retour au catalogue</a>
            </div>
        </div>
    </div>
</main>
<?php
    $stmt->close();
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