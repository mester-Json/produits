<?php

require_once "utils/Db.php";


class Update
{
    public static function Update($newName, $newPrice, $newDescription, $newProduct_number, $id)
    {
        try {
            $db = new Db(HOST, DB_Name, USER, PASS);
            $query = "UPDATE products SET name = :name, price = :price, description = :description, product_number = :product_number WHERE id = :id";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':name', $newName);
            $stmt->bindParam(':price', $newPrice);
            $stmt->bindParam(':description', $newDescription);
            $stmt->bindParam(':product_number', $newProduct_number);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}