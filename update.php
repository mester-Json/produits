<?php



require_once "DAO/Update.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $newName = $_POST["name"];
    $newPrice = $_POST["price"];
    $newDescription = $_POST["description"];
    $newProduct_number = $_POST["product_number"];
    $id = $_POST["id"];

    Update::Update($newName, $newPrice, $newDescription, $newProduct_number, $id);

    header("Location:  index.php");

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Modifier</title>
</head>

<body>
    <form action="update.php" method="post">
        <input type="text" name="name" placeholder="Nom">
        <input type="text" name="price" placeholder="Prix">
        <input type="text" name="description" placeholder="Description">
        <input type="text" name="product_number" placeholder="Numéro de produit">
        <input type="hidden" name="id" value="<?php echo $_GET['update'] ?>">
        <input type="submit" value="Modifier">
    </form>
</body>

</html>