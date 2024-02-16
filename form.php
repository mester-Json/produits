<?php

require_once "DAO/Insert.php";

if (isset($_POST['name']) && isset($_POST['price']) && isset($_POST['description']) && isset($_POST['product_number'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $product_number = $_POST['product_number'];

    Insert::Insert($name, $price, $product_number, $description);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Formulaire</title>
</head>

<body>
    <form action="form.php" method="post">
        <input type="text" name="name" placeholder="Nom">
        <input type="text" name="price" placeholder="Prix">
        <input type="text" name="description" placeholder="Description">
        <input type="text" name="product_number" placeholder="Numéro de produit">
        <input type="submit" value="Ajouter">
    </form>
</body>

</html>