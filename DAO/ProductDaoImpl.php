<?php

require_once 'ProductDAO.php';


class ProductDaoImpl implements ProductDAO
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllProducts(): array
    {
        $stmt = $this->pdo->query('SELECT * FROM products');
        $products = [];
        while ($row = $stmt->fetch()) {
            $product = new Product($row['id'], $row['name'], $row['product_number'], $row['price'], $row['description']);
            $products[] = $product;
        }
        return $products;
    }

    public function getProductById($id): Product
    {
        $stmt = $this->pdo->prepare('SELECT * FROM products WHERE id = :id');
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch();
        return new Product($row['id'], $row['name'], $row['product_number'], $row['price'], $row['description']);
    }

    public function createProduct(Product $product): bool
    {
        $stmt = $this->pdo->prepare('INSERT INTO products (name, product_number, price, description) VALUES (:name, :product_number, :price, :description)');
        return $stmt->execute([
            'name' => $product->getName(),
            'product_number' => $product->getProductNumber(),
            'price' => $product->getPrice(),
            'description' => $product->getDescription()
        ]);
    }

    public function updateProduct(Product $product): bool
    {
        $stmt = $this->pdo->prepare('UPDATE products SET name = :name, product_number = :product_number, price = :price, description = :description WHERE id = :id');
        return $stmt->execute([
            'id' => $product->getId(),
            'name' => $product->getName(),
            'product_number' => $product->getProductNumber(),
            'price' => $product->getPrice(),
            'description' => $product->getDescription()
        ]);
    }

    public function deleteProduct($id): bool
    {
        $stmt = $this->pdo->prepare('DELETE FROM products WHERE id = :id');
        return $stmt->execute(['id' => $id]);
    }

    public function searchProductByName($name): array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM products WHERE name LIKE :name');
        $stmt->execute(['name' => $name]);
        $result = $stmt->fetchAll();
        return $result;
    }

    public function searchProductByPriceRange($minPrice, $maxPrice): array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM products WHERE price BETWEEN :minPrice AND :maxPrice');
        $stmt->execute(['minPrice' => $minPrice, 'maxPrice' => $maxPrice]);
        $result = $stmt->fetchAll();
        return $result;

    }


}
