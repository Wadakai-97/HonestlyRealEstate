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

$sql = 'SELECT id, name, price, land_area, building_area, number_of_rooms, type_of_room, pref, municipalities, block FROM old_detached_houses';

$stmt = $dbh->prepare($sql);
$stmt->execute();
$old_detached_house_list = array();

while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $old_detached_house_list[] = array(
        'name' => $row['name'],
        'price' => number_format($row['price']),
        'land_area' => $row['land_area'],
        
        'number_of_rooms' => $row['number_of_rooms'],
        'type_of_room' => $row['type_of_room'],
        'pref' => $row['pref'],
        'municipalities' => $row['municipalities'],
        'block' => $row['block'],
        'id' => $row['id'],
    );
}

header('Content-type: application/json');
echo json_encode($old_detached_house_list);
