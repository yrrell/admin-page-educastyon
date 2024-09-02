<?php
include 'db.php';

$query = "SELECT * FROM studentProfile";
$stmt = $pdo->query($query);
$profiles = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($profiles);
?>
