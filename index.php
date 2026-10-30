<?php include('config/header.php'); ?>
<?php
    require_once('config/db.php');
    $sql = "SELECT * FROM Articles LIMIT 3"; 
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
    <header class="bg-light p-5 text-center">
        <h1>Bienvenue sur The Pump Room<?php if(isset($_SESSION['client_prenom'])) { echo ", " . htmlspecialchars($_SESSION['client_prenom']); } ?></h1>
        <p>Le spécialiste de la musculation - Qualité et service garantis.</p>
    </header>
    <main class="container my-5">
        <?php if(isset($_SESSION['succes'])) { ?>
            <div class="alert alert-success text-center mb-4 shadow-sm">
                <?php 
                    echo $_SESSION['succes']; 
                    unset($_SESSION['succes']); 
                ?>
                </div>
        <?php } ?>
        <h2 class="text-center mb-4">Nos Produits Phares</h2>
        <div class="row">
            <?php
            foreach($result as $produit) {
            ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="<?php echo $produit['article_img']; ?>" class="card-img-top image-produit" alt="<?php echo $produit['article_nom']; ?>" class="card-img-top" alt="<?php echo $produit['article_nom']; ?>" style="height: 250px; object-fit: contain; padding: 10px;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?php echo $produit['article_nom']; ?></h5>
                        <p class="card-text flex-grow-1"><?php echo $produit['article_description']; ?></p>
                        <p class="card-text text-primary fw-bold fs-5 mb-3">
                            <?php echo number_format($produit['article_prix_unitaire_HT'], 2, ',', ' '); ?> € HT
                        </p>
                        <a href="article.php?id=<?php echo $produit['article_ref']; ?>" class="btn btn-primary mt-auto">Voir les détails</a>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </main>
<?php
    $pdo = null;     
?>
<?php include('config/footer.php'); ?>