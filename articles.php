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
    $sql = "SELECT * FROM Articles"; 
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
                        
                        <a href="#" class="btn btn-primary bouton-detail mt-auto">Ajouter au panier</a>
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
