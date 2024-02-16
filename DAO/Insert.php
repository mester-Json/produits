<?php


require_once "utils/Db.php";


class Insert
{


    public static function Insert($name, $price, $product_number, $description)
    {
        try {
            $db = new Db(HOST, DB_Name, USER, PASS);
            $query = "INSERT INTO products (
                name ,	
                price ,	
                product_number,	
                description) VALUES (?, ?, ? , ?)";



            if (is_numeric($price)) {
                $stmt = $db->prepare($query);
                $stmt->bindParam(1, $name);
                $stmt->bindParam(2, $price);
                $stmt->bindParam(3, $product_number);
                $stmt->bindParam(4, $description);
                $stmt->execute();

                echo "New record created successfully";
            } else {
                echo "Error: Invalid price value";
            }



        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
