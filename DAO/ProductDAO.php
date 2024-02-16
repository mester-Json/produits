<?php


interface ProductDAO
{
    public function getAllProducts(): array;
    public function getProductById($id): Product;
    public function createProduct(Product $product): bool;
    public function updateProduct(Product $product): bool;
    public function deleteProduct($id): bool;
    public function searchProductByName($name): array;
    public function searchProductByPriceRange($minPrice, $maxPrice): array;
}