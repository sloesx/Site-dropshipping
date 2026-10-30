<?php
include('config/header.php');

$panier = $_SESSION['panier'] ?? [];
$total_ht = 0;
?>

<div class="container my-5">
    <h2 class="mb-4">Votre Panier</h2>

    <?php if (empty($panier)): ?>
        <div class="alert alert-info">
            Votre panier est vide. <a href="articles.php">Retourner au catalogue</a>.
        </div>
    <?php else: ?>
        <?php
        require_once('config/db.php');

        $refs = implode(',', array_map('intval', array_keys($panier)));
        $sql = "SELECT * FROM articles WHERE article_ref IN ($refs)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <table class="table align-middle">
            <thead class="table-light">
                <tr>
                    <th>Article</th>
                    <th>Nom</th>
                    <th>Prix unitaire</th>
                    <th>Quantité</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $article): 
                    $ref = $article['article_ref'];
                    $qte = $panier[$ref];
                    $sous_total = $article['article_prix_unitaire_HT'] * $qte;
                    $total_ht += $sous_total;
                ?>
                <tr>
                    <td>
                        <img src="<?php echo $article['article_img']; ?>" class="card-img-top image-produit" alt="<?php echo $article['article_nom']; ?>" alt="" style="width: 50px; height: 50px; object-fit: cover;">
                    </td>
                    <td><?php echo $article['article_nom']; ?></td>
                    <td><?php echo number_format($article['article_prix_unitaire_HT'], 2, ',', ' '); ?> € HT</td>
                    <td>
                        <a href="panier_traitement.php?action=moins&article_ref=<?php echo $ref; ?>" class="btn btn-sm btn-outline-secondary">-</a>
                        <span class="mx-2 fw-bold"><?php echo $qte; ?></span>
                        <a href="panier_traitement.php?action=plus&article_ref=<?php echo $ref; ?>" class="btn btn-sm btn-outline-secondary">+</a>
                    </td>
                    <td><?php echo number_format($sous_total, 2, ',', ' '); ?> € HT</td>
                    <td>
                        <a href="panier_traitement.php?action=supprimer&article_ref=<?php echo $ref; ?>" class="btn btn-sm btn-danger">Supprimer</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4" class="text-end">Total HT :</th>
                    <th colspan="2" class="fw-bold fs-5 text-primary"><?php echo number_format($total_ht, 2, ',', ' '); ?> € HT</th>
                </tr>
            </tfoot>
        </table>

        <div class="d-flex justify-content-between mt-4">
            <a href="articles.php" class="btn btn-secondary">Continuer les achats</a>
        </div>
        <?php $pdo = null; ?>
    <?php endif; ?>
</div>

<?php include('config/footer.php'); ?>