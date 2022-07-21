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

$sql = 'SELECT id, name, price, land_area, municipalities FROM lands';

$stmt = $dbh->prepare($sql);
$stmt->execute();
$land_list = array();

while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $land_list[] = array(
        'name' => $row['name'],
        'price' => number_format($row['price']),
        'land_area' => $row['land_area'],
        'pref' => $row['pref'],
        'municipalities' => $row['municipalities'],
        'id' => $row['id'],
    );
}

header('Content-type: application/json');
echo json_encode($land_list);
