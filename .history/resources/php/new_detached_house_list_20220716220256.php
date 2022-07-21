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

$sql = 'SELECT id, name, price, number_of_rooms, type_of_room, land_area, building_area, pref, municipalities FROM new_detached_houses';

$stmt = $dbh->prepare($sql);
$stmt->execute();
$new_detached_house_list = array();

while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $new_detached_house_list[] = array(
        'name' => $row['name'],
        'price' => number_format($row['price']),
        'number_of_rooms' => $row['number_of_rooms'],
        'type_of_room' => $row['type_of_room'],
        'pref' => $row['pref'],
        'municipalities' => $row['municipalities'],
        'id' => $row['id'],
    );
}

header('Content-type: application/json');
echo json_encode($new_detached_house_list);
