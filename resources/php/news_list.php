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

$sql = 'SELECT id, title, body, created_at  FROM informations';

$stmt = $dbh->prepare($sql);
$stmt->execute();
$news_list = array();

while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $news_list[] = array(
        'id' => $row['id'],
        'title' => $row['title'],
        'body' => $row['body'],
        'created_at' => $row['created_at'],
    );
}

header('Content-type: application/json');
echo json_encode($news_list);
