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

$sql = 'SELECT id, staff_name, position FROM staffs';

$stmt = $dbh->prepare($sql);
$stmt->execute();
$staff_list = array();

while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $staff_list[] = array(
        'id' => $row['id'],
        'staff_name' => $row['staff_name'],
        'position' => $row['position'],
    );
}

header('Content-type: application/json');
echo json_encode($staff_list);
