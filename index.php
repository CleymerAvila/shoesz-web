<?php include './middlewares/guest.php'; ?>
<?php include './config/db.php'; ?>
<?php
$title =  'Shoesz Landing Page';
$active = 'home';
include('./views/layout/header.php');
?>
<?php include './views/layout/navbar.php'; ?>

<div class="container">
    <section id="home">
        <div id="hero-content">
            <h1>WEEKEND SALES</h1>
            <h3>Select yours</h3>
            <p>with our shop you can buy shoes with a wide range of styles and colors. Quality and comfort are our main goals.</p>
            <a class="btn call-to-action" href="/shoesz-web/views/products/fullCatalog.php">See Full Catalog</a>
        </div>
        <picture id="hero-img">
            <div class="carousel">
                <div class="cards">
                    <img src="./public/img/image1.png" alt="Slide 1">
                    <img src="./public/img/image2.png" alt="Slide 2">
                    <img src="./public/img/image3.png" alt="Slide 3">
                    <img src="./public/img/image4.png" alt="Slide 4">
                    <!-- primera imagen clonada para bucle sin espacios en blanco -->
                    <img src="./public/img/image1.png" alt="Slide 1">  
                </div>
            </div>
        </picture>
    </section>

    <section id="feactured-products">
        <h4>Feactured Shoes</h4>
        <div class="grid-container">
            <div class="grid-item">
                <img style="height: 90%;" src="public/img/feactured-products/shoes-1.png" alt="Weekend Shoes">
                <p>Sneakers 12Z - Black <span>$100</span></p>
            </div>
            <div class="grid-item">
                <img style="height: 90%;" src="public/img/feactured-products/shoes-2.png" alt="Weekend Shoes">
                <p>Sneakers 12Z - Black <span>$100</span></p>
            </div>
            <div class="grid-item">
                <img style="height: 90%;" src="public/img/feactured-products/shoes-3.png" alt="Weekend Shoes">
                <p>Sneakers 12Z - Black <span>$100</span></p>
            </div>
            <div class="grid-item">
                <img style="height: 90%;" src="public/img/feactured-products/shoes-4.png" alt="Weekend Shoes">
                <p>Sneakers 12Z - Black <span>$100</span></p>
            </div>
            <div class="grid-item">
                <img style="height: 90%;" src="public/img/feactured-products/shoes-5.png" alt="Weekend Shoes">
                <p>Sneakers 12Z - Black <span>$100</span></p>
            </div>
            <div class="grid-item">
                <img style="height: 90%;" src="public/img/feactured-products/shoes-6.png" alt="Weekend Shoes">
                <p>Sneakers 12Z - Black <span>$100</span></p>
            </div>
    </section>

    <section id="product-categories">
        <h4>Shoes Categories</h4>
        <div class="grid-container">
            <div class="grid-item">
                <img style="height: 90%;" src="public/img/feactured-products/shoes-1.png" alt="Weekend Shoes">
                <p>Sneakers 12Z - Black <span>$100</span></p>
            </div>
            <div class="grid-item">
                <img style="height: 90%;" src="public/img/feactured-products/shoes-2.png" alt="Weekend Shoes">
                <p>Sneakers 12Z - Black <span>$100</span></p>
            </div>
            <div class="grid-item">
                <img style="height: 90%;" src="public/img/feactured-products/shoes-3.png" alt="Weekend Shoes">
                <p>Sneakers 12Z - Black <span>$100</span></p>
            </div>
            <div class="grid-item">
                <img style="height: 90%;" src="public/img/feactured-products/shoes-4.png" alt="Weekend Shoes">
                <p>Sneakers 12Z - Black <span>$100</span></p>
            </div>
            <div class="grid-item">
                <img style="height: 90%;" src="public/img/feactured-products/shoes-5.png" alt="Weekend Shoes">
                <p>Sneakers 12Z - Black <span>$100</span></p>
            </div>
            <div class="grid-item">
                <img style="height: 90%;" src="public/img/feactured-products/shoes-6.png" alt="Weekend Shoes">
                <p>Sneakers 12Z - Black <span>$100</span></p>
            </div>
    </section>
</div>
<?php include './views/layout/footer.php'; ?>