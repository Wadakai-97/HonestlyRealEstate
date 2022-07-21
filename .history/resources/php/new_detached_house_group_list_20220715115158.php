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

$sql = 'SELECT id, name, lowest_price, highest_price, lowest_number_of_rooms, highest_number_of_rooms, lowest_type_of_room, highest_type_of_room, municipalities FROM new_detached_house_groups';

$stmt = $dbh->prepare($sql);
$stmt->execute();
$new_detached_house_group_list = array();

while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $new_detached_house_group_list[] = array(
        'name' => $row['name'],
        'lowest_price' => number_format($row['lowest_price']),
        'highest_price' => number_format($row['highest_price']),
        'lowest_number_of_rooms' => $row['lowest_number_of_rooms'],
        'highest_number_of_rooms' => $row['highest_number_of_rooms'],
        'lowest_type_of_room' => $row['lowest_type_of_room'],
        'highest_type_of_room' => $row['highest_type_of_room'],
        'municipalities' => $row['municipalities'],
        'id' => $row['id'],
    );
}

header('Content-type: application/json');
echo json_encode($new_detached_house_group_list);
