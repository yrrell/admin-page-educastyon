<?php
session_start();
if (!isset($_SESSION['admin_user'])) {
    header('Location: ../templates/adminLogin.html');
    exit();
}
?>
