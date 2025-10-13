<?php
class Product
{
    private $conn;
    private $table = 'products';

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getProducts()
    {
        $sql = "SELECT * FROM $this->table";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }

    public function getProduct($productId)
    {
        $sql = "SELECT * FROM $this->table WHERE product_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$productId]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        return $product;
    }

    public function register($name, $description, $price, $stock, $brand, $image)
    {
        $this->conn->beginTransaction();

        $stmt = $this->conn->prepare(
            "INSERT INTO products (name, description, price, stock, brand, image) VALUES (?, ?, ?, ?, ?, ?)"
        );
        $stmt->execute([$name, $description, $price, $stock, $brand, $image]);

        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->conn->commit();
        return $product;
    }

    public function edit($product_id, $description, $price, $stock, $image = null)
    {
        try {
            $this->conn->beginTransaction();

            if ($image) {
                $sql = "UPDATE products SET description = ?, price = ?, stock = ?, image = ? WHERE product_id = ?";
                $stmt = $this->conn->prepare($sql);
                $ok = $stmt->execute([$description, $price, $stock, $image, $product_id]);
            } else {
                $sql = "UPDATE products SET description = ?, price = ?, stock = ? WHERE product_id = ?";
                $stmt = $this->conn->prepare($sql);
                $ok = $stmt->execute([$description, $price, $stock, $product_id]);
            }

            if ($ok) {
                $this->conn->commit();
                return true;
            } else {
                $this->conn->rollBack();
                return false;
            }
        } catch (PDOException $e) {
            if ($this->conn->inTransaction()) $this->conn->rollBack();
            // opcionalmente loguear $e->getMessage() en un archivo para debug
            return false;
        }
    }

    public function deleteProduct($product_id)
    {
        try {
            $stmt = $this->conn->prepare("DELETE FROM products WHERE product_id = ?");
            return $stmt->execute([$product_id]);
        } catch (Exception $e) {
            throw $e;
        }
    }
}
