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
            <a class="btn call-to-action" href="<?= $BASE_URL ?>views/products/fullCatalog.php">See Full Catalog</a>
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

    <section id="featured-products">
        <h4>Featured Shoes</h4>
        <div class="grid-container">
            <div class="grid-item">
                <img src="public/img/featured-products/shoes-1.jpg" alt="Weekend Shoes">
                <div class="product-info">
                    <p>Asics Novablast 4</p>
                    <p>Rebote y comidad para corredores avanzados</p>
                    <p>$100</p>
                    <p>Stock: 11</p>
                </div>
            </div>
            <div class="grid-item">
                <img src="public/img/featured-products/shoes-2.jpg" alt="Weekend Shoes">
                <div class="product-info">
                    <p>New Balance 574</p>
                    <p>Running shoes con amortiguación Fresh Foam X para largas distancias.</p>
                    <p>$600.000</p>
                    <p>Stock: 22</p>
                </div>
            </div>
            <div class="grid-item">
                <img src="public/img/featured-products/shoes-3.jpg" alt="Weekend Shoes">
                <div class="product-info">
                    <p>New Balance FuelCell Rebel v4</p>
                    <p>Ligera y responsiva para entrenamientos de velocidad</p>
                    <p>$610.000</p>
                    <p>Stock: 12</p>
                </div>
            </div>
            <div class="grid-item">
                <img src="public/img/featured-products/shoes-4.jpg" alt="Weekend Shoes">
                <div class="product-info">
                    <p>Nike Zoom Fly 5</p>
                    <p>Zapatilla rápida con espuma ZoomX y placa de carbono.</p>
                    <p>$820.000</p>
                    <p>Stock: 9</p>
                </div>
            </div>
            <div class="grid-item">
                <img src="public/img/featured-products/shoes-5.jpg" alt="Weekend Shoes">
                <div class="product-info">
                    <p>Puma Deviate Nitro 2</p>
                    <p>Running shoes con espuma Nitro para entrenamientos largos.</p>
                    <p>$520.000</p>
                    <p>Stock: 18</p>
                </div>
            </div>
            <div class="grid-item">
                <img src="public/img/featured-products/shoes-6.jpg" alt="Weekend Shoes">
                <div class="product-info">
                    <p>Saucony Endorphin Speed 3</p>
                    <p>Entrenamientos de velocidad y maratones con placa de nylon.</p>
                    <p>$620.000</p>
                    <p>Stock: 10</p>
                </div>
            </div>
    </section>

    <section id="product-categories">
        <h4>Shoes Categories</h4>
        <div class="grid-container">
            <div class="grid-item">
                <img src="public/img/shoes/adidas_adizero_pro3.jpg" alt="Weekend Shoes">
                <p><span>ADIDAS</span></p>
            </div>
            <div class="grid-item">
                <img src="public/img/shoes/asics_gel_cumulus_26.jpg" alt="Weekend Shoes">
                <p><span>ASSICS</span></p>
            </div>
            <div class="grid-item">
                <img src="public/img/shoes/hoka_clifton9.jpg" alt="Weekend Shoes">
                <p><span>HOKA</span></p>
            </div>
            <div class="grid-item">
                <img src="public/img/shoes/newbalance_1080v13.jpg" alt="Weekend Shoes">
                <p><span>NEW BALANCE</span></p>
            </div>
            <div class="grid-item">
                <img src="public/img/shoes/nike_airmax270.jpg" alt="Weekend Shoes">
                <p><span>NIKE</span></p>
            </div>
            <div class="grid-item">
                <img src="public/img/shoes/puma_rsx.jpg" alt="Weekend Shoes">
                <p><span>PUMA</span></p>
            </div>
    </section>
</div>
<?php include './views/layout/footer.php'; ?>