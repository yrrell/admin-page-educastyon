<?php
include 'db.php';

$studentNum = $_GET['studentNum'];
$query = "SELECT * FROM studentProfile WHERE studentNum = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$studentNum]);
$profile = $stmt->fetch(PDO::FETCH_ASSOC);

if ($profile) {
    echo json_encode($profile);
} else {
    echo json_encode(['error' => 'Profile not found.']);
}
?>
