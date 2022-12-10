<?php


$conn = new PDO('mysql:host=localhost;dbname=test', 'root','');
foreach($_POST['product_name'] as $key => $value){
    $sql = 'INSERT INTO item(name, price,quantity,make,model,platenum,encoder) VALUES (:name, :price, :qty ,:make,:model,:platenum,:encoder)';
    $stmt = $conn->prepare($sql);
    $stmt->execute([
    'name' => $_POST['product_name'][$key],
    'price' => $_POST['product_price'][$key],
    'qty' => $_POST['product_qty'][$key],
    'make' => $_POST['product_make'][$key],
    'model' => $_POST['product_model'][$key],
    'platenum' => $_POST['product_plate'][$key],
    'encoder' => $_POST['product_encoder'][$key]

    ]);
}
echo "item inserted sucessfully";
?>