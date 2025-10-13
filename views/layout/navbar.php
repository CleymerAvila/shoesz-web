<?php include __DIR__ . '/../../config/config.php'; ?>
<?php 
?>
<nav class="navbar">
    <picture id="logo">
        <a href="/shoesz-web/">
             <img fill="#7494ec" src="/shoesz-web/public/img/logo.svg" alt="Logo">
        </a>
    </picture>
    <ul id="nav-list" class="<?php echo $showNavList === false ? 'hidden' : ''; ?>">
        <li id="home-link" class="<?php echo $active === 'home' ? 'active' : ''; ?>">
            <a href="/shoesz-web/index.php">Home</a></li>
        <li id="featured-link"><a href="/shoesz-web/index.php#feactured-products">Feactured Products</a></li>
        <li id="categories-link"><a href="/shoesz-web/index.php#product-categories">Categories</a></li>
        <li id="catalog-link" class="<?php echo $active === 'catalog' ? 'active' : ''; ?>">
            <a href="/shoesz-web/views/products/fullCatalog.php">Full Catalog</a>
        </li>
    </ul>

    <?php if (isset($_SESSION['user_id'])): ?>
        <a class="button-login" href="/shoesz-web/controllers/userController.php?action=logout">Logout</a>
    <?php  else:  ?>
        <a class="button-login" href="/shoesz-web/views/users/loginRegister.php">login</a>
    <?php endif; ?>
</nav>