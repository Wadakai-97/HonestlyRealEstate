<?php
$request = isset($_SERVER['HTTP_X_REQUESTED_WITH']) ? strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) : '';
if($request !== 'xmlhttprequest') exit;

try {
    $host = 'localhost';
    $dbname = 'HRE';
    $dbuser = 'root';
    $dbpass = 'root';
    $dbh = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8mb4", $dbuser, $dbpass);
} catch(PDOException $e) {
    var_dump($e->getMessage());
    exit;
}

$sql = 'SELECT id, img_path, product_name, stock, price, company_id, company_name FROM products WHERE 1 ';

$apartment_name_keyword = $_POST['apartment_name_keyword'];
$lowest_price = $_POST['lowest_price'];
$highest_price = $_POST['highest_price'];

if (!empty($_POST['product_keyword'])) {
    $sql .= ' AND product_name LIKE :product_name ';
}
if (!empty($_POST['company_keyword'])) {
    $sql .= ' AND company_name LIKE :company_name ';
}
if (!empty($_POST['lowest_price'])) {
    $sql .= ' AND price >= :lowest_price ';
}
if (!empty($_POST['highest_price'])) {
    $sql .= ' AND price <= :highest_price ';
}
if (!empty($_POST['lowest_stock'])) {
    $sql .= ' AND stock >= :lowest_stock ';
}
if (!empty($_POST['highest_stock'])) {
    $sql .= ' AND stock <= :highest_stock ';
}

$stmt = $dbh->prepare($sql);

if (!empty($product_keyword)) {
    $stmt->bindValue(':product_name', "%".$product_keyword."%", PDO::PARAM_STR);
}
if (!empty($company_keyword)) {
    $stmt->bindValue(':company_name', "%".$company_keyword."%", PDO::PARAM_STR);
}
if (!empty($lowest_price)) {
    $stmt->bindValue(':lowest_price', $lowest_price, PDO::PARAM_INT);
}
if (!empty($highest_price)) {
    $stmt->bindValue(':highest_price', $highest_price, PDO::PARAM_INT);
}
if (!empty($lowest_stock)) {
    $stmt->bindValue(':lowest_stock', $lowest_stock, PDO::PARAM_INT);
}
if (!empty($highest_stock)) {
    $stmt->bindValue(':highest_stock', $highest_stock, PDO::PARAM_INT);
}

$stmt->execute();

$productList = array();
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $productList[] = array(
        'id' => $row['id'],
        'img_path' => $row['img_path'],
        'product_name' => $row['product_name'],
        'stock' => $row['stock'],
        'price' => $row['price'],
        'company_name' => $row['company_name']
    );
}

header('Content-type: application/json');
echo json_encode($productList);
