<?php
include 'db.php';

$adminUser = $_POST['adminUser'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

$query = "INSERT INTO studentUsers(studentNum, password) VALUES (?, ?)";
$stmt = $pdo->prepare($query);

if ($stmt->execute([$adminUser, $password])) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Registration failed']);
}
?>
