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

$sql = 'SELECT id, apartment_name, number_of_rooms, type_of_room, price, municipalities FROM mansinons';

$apartment_name_keyword = $_POST['apartment_name_keyword'];
$number_of_rooms = $_POST['number_of_rooms'];
$type_of_room = $_POST['type_of_room'];
$lowest_price = $_POST['lowest_price'];
$highest_price = $_POST['highest_price'];
$municipalities = $_POST['municipalities'];

if (!empty($_POST['apartment_keyword'])) {
    $sql .= ' AND apartment_name LIKE :apartment_name ';
}
if (!empty($_POST['number_of_rooms'])) {
    $sql .= ' AND number_of_rooms == :number_of_rooms ';
}
if (!empty($_POST['type_of_room'])) {
    $sql .= ' AND type_of_room LIKE :type_of_room ';
}
if (!empty($_POST['lowest_price'])) {
    $sql .= ' AND price >= :lowest_price ';
}
if (!empty($_POST['highest_price'])) {
    $sql .= ' AND price <= :highest_price ';
}
if (!empty($_POST['municipalities'])) {
    $sql .= ' AND apartment_name LIKE :apartment_name ';
}

$stmt = $dbh->prepare($sql);

if (!empty($apartmentt_keyword)) {
    $stmt->bindValue(':apartmentt_name', "%".$apartmentt_keyword."%", PDO::PARAM_STR);
}
if (!empty($lowest_price)) {
    $stmt->bindValue(':lowest_price', $lowest_price, PDO::PARAM_INT);
}
if (!empty($highest_price)) {
    $stmt->bindValue(':highest_price', $highest_price, PDO::PARAM_INT);
}

$stmt->execute();

$mansionList = array();
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $mansionList[] = array(
        'id' => $row['id'],
        'apartment_name' => $row['apartment_name'],
        'number_of_rooms' => $row['number_of_rooms'],
        'type_of_room' => $row['type_of_room'],
        'price' => $row['price'],
        'municnipalities' => $row['municipalities'],
    );
}

header('Content-type: application/json');
echo json_encode($mansionList);
