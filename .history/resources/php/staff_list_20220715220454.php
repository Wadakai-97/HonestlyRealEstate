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

$sql = 'SELECT id, staff_name, head_shot, position, number_of_contracts, birthplace, hobby, comment FROM staffs';

$stmt = $dbh->prepare($sql);
$stmt->execute();
$staff_list = array();

while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $staff_list[] = array(
        'id' => $row['id'],
        'staff_name' => $row['staff_name'],
        'position' => $row['position'],
        'number_of_contracts' => number_format($row['number_of_contracts']),
        'birthplace' => $row['birthplace'],
        'hobby' => $row['hobby'],
        'comment' => $row['comment'],
    );
}

header('Content-type: application/json');
echo json_encode($staff_list);
