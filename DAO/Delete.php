<?php

require_once "utils/Db.php";

class Delete
{
    public static function Delete($id)
    {
        try {
            $db = new Db(HOST, DB_Name, USER, PASS);
            $query = "DELETE FROM products WHERE id = :id";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }
}