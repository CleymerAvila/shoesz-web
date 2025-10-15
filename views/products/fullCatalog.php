<?php 
session_start();
require_once __DIR__ . '/../../config/config.php';
$title = 'Full Catalog | Shoesz';
require_once __DIR__ . '/../layout/header.php';
?>
<?php
include '../../config/db.php';
include '../../middlewares/guest.php';
include '../../middlewares/role.php';
requireRole(['Cliente', 'Admin']);
$active = 'catalog';
require_once __DIR__ . '/../layout/navbar.php'; 
?>
<?php
// Obtener productos
$query = "SELECT * FROM products ORDER BY brand, name";
$stmt = $conn->prepare($query);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$products = [];
foreach ($rows as $row) {
    $products[$row['brand']][] = $row; // agrupamos por marca
}
?>

<main class="catalog-container">
    <?php if(isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'Admin'):?>        
        <a class="admin-dashboard-btn" href="<?= $BASE_URL ?>views/products/dashboard.php">
            <i class='bx bxs-grid-alt'></i>
            Dashboard
        </a>
    <?php endif;?>
    <h1 class="catalog-title">Our Shoes Full Catalog</h1>

    <?php if (empty($products)): ?>
        <p class="no-products">There are no products available.</p>
    <?php else: ?>
        <?php foreach ($products as $brand => $items): ?>
            <section class="brand-section">
                <h2 class="brand-title"><?= htmlspecialchars($brand) ?></h2>
                <div class="grid-catalog">
                    <?php foreach ($items as $product): ?>
                        <div class="product-card">
                            <img
                                src="<?= '../../' . ltrim($product['image'], '/') ?>"
                                alt="<?= htmlspecialchars($product['name']) ?>"
                                class="product-image"
                            />

                            <div class="product-info">
                                <h3><?= htmlspecialchars($product['name']) ?></h3>
                                <p class="description"><?= htmlspecialchars($product['description']) ?></p>
                                <p class="price">$<?= number_format($product['price'], 0, ',', '.') ?></p>
                                <p class="stock">Stock: <?= $product['stock'] ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endforeach; ?>
    <?php endif; ?>
</main>
<?php include '../layout/footer.php'; ?>