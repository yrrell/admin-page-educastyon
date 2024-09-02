<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'];

    $deleteQuery = "DELETE FROM studentUsers WHERE studentNum = ?";
    $deleteStmt = $pdo->prepare($deleteQuery);
    $deleteStmt->execute([$id]);

    echo "<script>alert('Account deleted successfully!'); window.location.href='../templates/studentUsers.html';</script>";
    exit();
}
?>
