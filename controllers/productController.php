<?php
include_once '../config/db.php';
include_once '../models/Product.php';  // Corregir la ruta

$product = new Product($conn);

$action = $_GET['action'] ?? '';

switch ($action) {
    case 'register':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $uploadDir = '../public/img/shoes/';

            // Crear el directorio si no existe
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $image = $_FILES['image']['name'];
            $tmp = $_FILES['image']['tmp_name'];

            // validar que haya imagen
            if (!$image || !$tmp) {
                echo json_encode(['ok' => false, 'message' => 'No se ha subido una imagen']);
                exit();
            }

            // validar extension permitida
            $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
            $allowedExt = ['jpg', 'jpeg', 'png', 'gif'];
            if (!in_array($ext, $allowedExt)) {
                echo json_encode(['ok' => false, 'message' => 'La extensión de la imagen no es permitida']);
                exit();
            }

            $newImageName = time() . '_' . preg_replace('/[^a-zA-Z0-9_\.-]/', '_', $image);
            // $uploadDir = '/public/img/shoes/';
            $path = $uploadDir . $newImageName;

            // mover el archivo al destino 
            if (move_uploaded_file($tmp, $path)) {
                $imagePath = '/public/img/shoes/' . $newImageName;
                try {
                    $result = $product->register(
                        $_POST['name'],
                        $_POST['description'],
                        $_POST['price'],
                        $_POST['stock'],
                        $_POST['brand'],
                        $imagePath
                    );

                    echo json_encode(['ok' => true, 'message' => 'Producto registrado correctamente']);
                } catch (Exception $e) {
                    echo json_encode(['ok' => false, 'message' => $e->getMessage()]);
                }
            } else {
                echo json_encode(['ok' => false, 'message' => 'Error al subir la imagen']);
            }
        }
        break;
    case 'getProducts':
        $products = $product->getProducts();
        echo json_encode(['ok' => true, 'products' => $products]);
        break;
    case 'getProduct':
        $productId = $_GET['product_id'];
        $product = $product->getProduct($productId);
        echo json_encode(['ok' => true, 'product' => $product]);
        break;
    case 'edit':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productId = $_POST['product_id'] ?? null;
            $description = $_POST['description'] ?? '';
            $price = $_POST['price'] ?? '';
            $stock = $_POST['stock'] ?? '';

            $image = null;
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = '../public/img/shoes/';
                if (!file_exists($uploadDir)) mkdir($uploadDir, 0777, true);

                $imgName = $_FILES['image']['name'];
                $tmp = $_FILES['image']['tmp_name'];

                $ext = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
                $allowed = ['jpg', 'jpeg', 'png', 'gif'];
                if (!in_array($ext, $allowed)) {
                    echo json_encode(['ok' => false, 'message' => 'La extensión de la imagen no es permitida']);
                    exit;
                }

                $newImageName = time() . '_' . preg_replace('/[^a-zA-Z0-9_\.-]/', '_', $imgName);
                $path = $uploadDir . $newImageName;
                if (move_uploaded_file($tmp, $path)) {
                    $image = $newImageName;
                } else {
                    echo json_encode(['ok' => false, 'message' => 'Error al subir la imagen']);
                    exit;
                }
            }

            $ok = $product->edit($productId, $description, $price, $stock, $image);
            if ($ok) {
                echo json_encode(['ok' => true, 'message' => 'Producto actualizado correctamente']);
            } else {
                echo json_encode(['ok' => false, 'message' => 'No se pudo actualizar el producto']);
            }
        }
        break;

        break;
    case 'deleteProduct':
        try {
            $product_id = $_POST['product_id'];

            // Primero obtener la información de la imagen
            $stmt = $conn->prepare("SELECT image FROM products WHERE product_id = ?");
            $stmt->execute([$product_id]);
            $productImage = $stmt->fetchColumn();

            // Eliminar el producto
            if ($product->deleteProduct($product_id)) {
                // Si existe una imagen, eliminarla del servidor
                if ($productImage) {
                    $imagePath = '../public/img/shoes/' . $productImage;
                    if (file_exists($imagePath)) {
                        unlink($imagePath);
                    }
                }

                echo json_encode([
                    'ok' => true,
                    'message' => 'Producto eliminado correctamente'
                ]);
            }
        } catch (Exception $e) {
            echo json_encode([
                'ok' => false,
                'message' => 'Error al eliminar el producto: ' . $e->getMessage()
            ]);
        }
        break;
}
