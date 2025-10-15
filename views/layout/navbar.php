<?php 
if (!isset($BASE_URL)) {
    include __DIR__ . '/../../config/config.php';
}
?>
<nav class="navbar">
    <picture id="logo">
        <a href="<?= $BASE_URL ?>">
            <img fill="#7494ec" src="<?= $BASE_URL ?>public/img/logo.svg" alt="Logo">
        </a>
    </picture>
    <ul id="nav-list" class="<?php echo $showNavList === false ? 'hidden' : ''; ?>">
        <li id="home-link" class="<?php echo $active === 'home' ? 'active' : ''; ?>">
            <a href="<?= $BASE_URL ?>">Home</a>
        </li>
        <li id="featured-link">
            <a href="<?= $BASE_URL ?>index.php#featured-products">Featured Products</a>
        </li>
        <li id="categories-link">
            <a href="<?= $BASE_URL ?>index.php#product-categories">Categories</a>
        </li>
        <li id="catalog-link" class="<?php echo $active === 'catalog' ? 'active' : ''; ?>">
            <a href="<?= $BASE_URL ?>views/products/fullCatalog.php">Full Catalog</a>
        </li>
    </ul>

    <?php if (isset($_SESSION['user_id'])): ?>
        <a class="button-login" href="<?= $BASE_URL ?>controllers/userController.php?action=logout">Logout</a>
    <?php else: ?>
        <a class="button-login" href="<?= $BASE_URL ?>views/users/loginRegister.php">Login</a>
    <?php endif; ?>
</nav>