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

$sql = 'SELECT id, name, address, type, contents, created_at, updated_at FROM contacts';

$stmt = $dbh->prepare($sql);
$stmt->execute();
$customer_list = array();

while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $customer_list[] = array(
        'id' => $row['id'],
        'name' => $row['name'],
        'type' => $row['type'],
        'contents' => $row['contents'],
        'created_at' => $row['created_at'],
    );
}

header('Content-type: application/json');
echo json_encode($customer_list);
