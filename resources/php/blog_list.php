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

$sql = 'SELECT blogs.id, title, content, blogs.created_at, staff_name FROM blogs INNER JOIN staffs ON blogs.staff_id = staffs.id';

$stmt = $dbh->prepare($sql);
$stmt->execute();
$blog_list = array();

while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $blog_list[] = array(
        'id' => $row['id'],
        'title' => $row['title'],
        'staff_name' => $row['staff_name'],
        'content' => $row['content'],
    );
}

header('Content-type: application/json');
echo json_encode($blog_list);
