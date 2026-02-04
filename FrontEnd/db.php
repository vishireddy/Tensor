<?php
$conn = new mysqli("localhost", "root", "", "agriassist");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
