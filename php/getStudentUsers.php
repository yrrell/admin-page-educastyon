<?php
include 'db.php';

$query = "SELECT * FROM studentUsers";
$stmt = $pdo->query($query);
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($users);
?>
