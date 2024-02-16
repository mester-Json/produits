<?php

require_once "utils/Db.php";

$db = new Db(HOST, DB_Name, USER, PASS);

class Search
{
    public static function search($name)
    {
        try {
            global $db;
            $query = "SELECT * FROM products WHERE name LIKE ?";
            $stmt = $db->prepare($query);
            $stmt->bindValue(1, '%' . str_replace(' ', '%', $name) . '%', PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public static function searchByPriceRange($minPrice, $maxPrice)
    {
        try {
            global $db;
            $query = "SELECT * FROM products WHERE price BETWEEN ? AND ?";
            $stmt = $db->prepare($query);
            $stmt->bindValue(1, $minPrice, PDO::PARAM_INT);
            $stmt->bindValue(2, $maxPrice, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

$name = "";
$resultsByName = Search::search($name);

$minPrice = 10;
$maxPrice = 100;
$resultsByPrice = Search::searchByPriceRange($minPrice, $maxPrice);


