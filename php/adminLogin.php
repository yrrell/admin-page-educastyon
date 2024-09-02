<?php
include 'db.php';

$adminUser = $_POST['adminUser'];
$password = $_POST['password'];

$query = "SELECT * FROM adminLogin WHERE username = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$adminUser]);
$admin = $stmt->fetch(PDO::FETCH_ASSOC);

if ($admin && password_verify($password, $admin['password'])) {
    session_start();
    $_SESSION['admin'] = $admin['username'];
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid username or password']);
}
?>
