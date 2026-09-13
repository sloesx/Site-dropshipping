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
    
    $sql = "SELECT * FROM Articles LIMIT 3"; 
    $result = $conn->query($sql);
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
            while($produit = $result->fetch_assoc()) {
            ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="<?php echo $produit['article_img']; ?>" class="card-img-top" alt="<?php echo $produit['article_nom']; ?>">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?php echo $produit['article_nom']; ?></h5>
                        <p class="card-text flex-grow-1"><?php echo $produit['article_description']; ?></p>
                        <p class="card-text text-primary fw-bold fs-5 mb-3">
                            <?php echo number_format($produit['article_prix_unitaire_HT'], 2, ',', ' '); ?> € HT
                        </p>
                        <a href="#" class="btn btn-primary mt-auto">Ajouter au panier</a>
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
<?php include('footer.php'); ?>