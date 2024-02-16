<?php
require_once "utils/Db.php";

class Produit
{
    public static function getAllProduct()
    {
        try {
            $db = new Db(HOST, DB_Name, USER, PASS);
            $query = "SELECT * FROM products";
            $stmt = $db->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

$results = Produit::getAllProduct();

foreach ($results as $result) {
    echo $result["name"] . "<br>";
    echo $result["price"] . "<br>";
    echo $result["product_number"] . "<br>";
    echo $result["description"] . "<br>";
    echo '<a href="index.php?delete=' . $result['id'] . '"><button> Supprimer </button></a>';
    echo '<a href="update.php?update=' . $result['id'] . '"><button> Modifier </button></a><br><br>';
    echo '<a href="form.php' . '"><button> Form </button></a><br><br>';
}
