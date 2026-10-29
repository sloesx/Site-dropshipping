<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = [];
}

$action = $_POST['action'] ?? $_GET['action'] ?? null;
$ref = $_POST['article_ref'] ?? $_GET['article_ref'] ?? null;

if ($ref !== null) {
    $ref = (int)$ref;

    switch ($action) {
        case 'ajouter':
            $qte = isset($_POST['quantite']) ? (int)$_POST['quantite'] : 1;
            if ($qte < 1) {
                $qte = 1;
            }
            if (isset($_SESSION['panier'][$ref])) {
                $_SESSION['panier'][$ref] += $qte;
            } else {
                $_SESSION['panier'][$ref] = $qte;
            }

            
            if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
                header('Content-Type: application/json');
                echo json_encode(['total' => array_sum($_SESSION['panier'])]);
                exit();
            }

            $retour = $_SERVER['HTTP_REFERER'] ?? 'articles.php';
            header("Location: $retour");
            exit();

        case 'plus':
            if (isset($_SESSION['panier'][$ref])) {
                $_SESSION['panier'][$ref]++;
            }
            header('Location: panier.php');
            exit();

        case 'moins':
            if (isset($_SESSION['panier'][$ref])) {
                $_SESSION['panier'][$ref]--;
                if ($_SESSION['panier'][$ref] <= 0) {
                    unset($_SESSION['panier'][$ref]);
                }
            }
            header('Location: panier.php');
            exit();

        case 'supprimer':
            if (isset($_SESSION['panier'][$ref])) {
                unset($_SESSION['panier'][$ref]);
            }
            header('Location: panier.php');
            exit();
    }
}

header('Location: articles.php');
exit();