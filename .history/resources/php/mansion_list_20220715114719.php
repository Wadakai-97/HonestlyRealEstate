<?php
try {
    $host = 'localhost';
    $db_name = 'HRE';
    $db_user = 'root';
    $db_pass = 'root';

    $dbh = new PDO("mysql:host={$host};dbname={$db_name};charset=utf8mb4", $db_user, $db_pass);
} catch(PDOException $e) {
    var_dump($e->getMessage());
    exit;
}

$sql = 'SELECT id, apartment_name, price, number_of_rooms, type_of_room, pref, municipalities FROM mansions';

$stmt = $dbh->prepare($sql);
$stmt->execute();
$mansion_list = array();

while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $mansion_list[] = array(
        'apartment_name' => $row['apartment_name'],
        'price' => $row['price'],
        'number_of_rooms' => $row['number_of_rooms'],
        'type_of_room' => $row['type_of_room'],
        'municipalities' => $row['municipalities'],
        'id' => $row['id'],
    );
}

header('Content-type: application/json');
echo json_encode($mansion_list);
