<?php include '../../config/db.php'; ?>
<?php
require_once '../../middlewares/role.php';
requireRole(['Admin']);
?>
<?php
$title =  'List Products | Shoesz';
include('../layout/header.php');
$showNavList = false; // Cambiamos la variable para controlar solo la lista
include '../layout/navbar.php';
?>
<!-- Aquí va el contenido de la lista de productos -->

<div class="container dashboard">
    <div class="greet">
        <h3>WELCOME BACK 
        <?php echo $_SESSION['user_name']; ?>
        <?php echo $_SESSION['user_role']; ?>
        , <br>How's it going here?</h3>

        <h5>Dashboard</h5>
    </div>
    <div class="dashboard-container">
        <div class="option-box" >
            <!--<div class="search-box" hidden>
                <p>Search</p>
                <input type="text" placeholder="by name and category">
                <button class="btn">Search</button>
            </div>
            -->
            <button class="btn add-product">Add Product</button>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Brand</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="productList">
                    <!-- Los productos se cargarán aquí dinámicamente -->
                </tbody>
            </table>


            <!-- 🔹 MODAL CREATE -->
            <div id="createModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <h2>New Shoe Product</h2>
                    <form id="formCreate" enctype="multipart/form-data">
                        <input type="text" name="name" placeholder="Name" required>
                        <input type="text" name="description" placeholder="Description" required>
                        <input type="text" name="brand" placeholder="Brand" required>
                        <input type="number" step="0.01" name="price" placeholder="Price" required>
                        <input type="number" name="stock" placeholder="Stock" required>
                        <input type="file" name="image" required>
                        <button type="submit">Save</button>
                    </form>
                </div>
            </div>

            <!-- 🔹 MODAL EDIT -->
            <div id="editModal"  class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <h2>Edit Shoe Product</h2>
                    <form id="editForm" enctype="multipart/form-data">
                        <input type="hidden" name="product_id">
                        <input type="text" name="name" placeholder="Name" required>
                        <input type="text" name="description" placeholder="Description" required>
                        <input type="number" step="0.01" name="price" required>
                        <input type="number" name="stock" required>
                        <input type="file" name="image">
                        <button type="submit">Save</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<?php include '../layout/footer.php'; ?>