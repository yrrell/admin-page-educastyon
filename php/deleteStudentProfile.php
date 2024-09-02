<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'];

    $deleteQuery = "DELETE FROM studentProfile WHERE id = ?";
    $deleteStmt = $pdo->prepare($deleteQuery);
    $deleteStmt->execute([$id]);

    echo "<script>alert('Profile deleted successfully!'); window.location.href='../templates/admin.html';</script>";
    exit();
}
?>
