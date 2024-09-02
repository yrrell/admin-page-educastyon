<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Insert new student profile logic here
    $studentNum = $_POST['studentNum'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $section = $_POST['section'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $contactNumber = $_POST['contactNumber'];
    $picture = $_FILES['picture']['name'];
    
    // Validate and sanitize contact number (must be 11 digits)
    if (!preg_match('/^\d{11}$/', $contactNumber)) {
        die('Invalid contact number format. It must be 11 digits.');
    }

    // Move uploaded file to the uploads directory
    move_uploaded_file($_FILES['picture']['tmp_name'], "../uploads/" . $picture);

    $insertQuery = "INSERT INTO studentProfile (studentNum, name, address, section, gender, email, contactNumber, picture) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $insertStmt = $pdo->prepare($insertQuery);
    $insertStmt->execute([$studentNum, $name, $address, $section, $gender, $email, $contactNumber, $picture]);

    header('Location: ../templates/admin.html');
    exit();
}