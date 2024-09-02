<?php
include 'db.php';

$id = $_GET['id'];
$query = "SELECT * FROM studentProfile WHERE id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$id]);
$profile = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $section = $_POST['section'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $contactNumber = $_POST['contactNumber'];

    $updateQuery = "UPDATE studentProfile SET name = ?, address = ?, section = ?, gender = ?, email = ?, contactNumber = ? WHERE id = ?";
    $updateStmt = $pdo->prepare($updateQuery);
    $updateStmt->execute([$name, $address, $section, $gender, $email, $contactNumber, $id]);

    echo "<script>alert('Student Information Updated Successfully!'); window.location.href='../templates/admin.html';</script>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student Profile</title>
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
            <h2>Edit Student Profile</h2>
            <label>Name: <input type="text" name="name" value="<?= htmlspecialchars($profile['name']) ?>"></label>
            <label>Address: <input type="text" name="address" value="<?= htmlspecialchars($profile['address']) ?>"></label>
            <label>Section: <input type="text" name="section" value="<?= htmlspecialchars($profile['section']) ?>"></label>
            <label>Gender: <input type="text" name="gender" value="<?= htmlspecialchars($profile['gender']) ?>"></label>
            <label>Email: <input type="email" name="email" value="<?= htmlspecialchars($profile['email']) ?>"></label>
            <label>Contact Number: <input type="text" name="contactNumber" value="<?= htmlspecialchars($profile['contactNumber']) ?>"></label>
            <button type="submit">Update Profile</button>
        </form>
    </div>
    <script src="../javascript/sidebar.js"></script>
</body>
</html>
