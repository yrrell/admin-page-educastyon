<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $studentNum = $_POST['studentNum'];
    $password = $_POST['password'];

    $query = "UPDATE studentUsers SET password = ? WHERE studentNum = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$password, $studentNum]);

    echo "<script>alert('Password updated successfully!');</script>";
    echo "<script>window.location.href = '../templates/studentUsers.html';</script>";
    exit();
} else {
    $studentNum = $_GET['studentNum'];
    $query = "SELECT * FROM studentUsers WHERE studentNum = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$studentNum]);
    $studentUser = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student User</title>
    <link rel="stylesheet" href="../static/css/styles.css">
</head>
<body>
<div class="sidebar">
        <div class="logo">
            <img src="../static/img/logo.png" alt="School Logo">
            <div class="logo-label">EDUCASTYON</div>
        </div>
        <button id="sidebarToggle">></button>
        <ul class="nav-links">
            <li><a href="../templates/index.html">Home</a></li>
            <li><a href="../templates/admin.html">Student Profiles</a></li>
            <li><a href="../templates/addStudentProfile.html">Add Student</a></li>
            <li><a href="../templates/studentUsers.html">Student Accounts</a></li>
            <li><a href="../php/logout.php">Logout</a></li>
        </ul>
    </div>

<div class="edit-form-container">
    <form method="POST" action="">
        <h2>Edit Student User</h2>
        <div class="form-info">
            <label>Student Number: 
                <a href="../templates/viewStudentProfile.html?studentNum=<?= htmlspecialchars($studentUser['studentNum']) ?>">
                    <?= htmlspecialchars($studentUser['studentNum']) ?>
                </a>
            </label>
        </div>
        <label>New Password: <input type="password" name="password" required></label>
        <label>Confirm New Password: <input type="password" name="confirm_password" required></label>
        <input type="hidden" name="studentNum" value="<?= htmlspecialchars($studentUser['studentNum']) ?>">
        <button type="submit">Update Password</button>
    </form>
</div>
    <script src="../javascript/sidebar.js"></script>
    <script src="../javascript/editStudentUser.js"></script>
</body>
</html>
