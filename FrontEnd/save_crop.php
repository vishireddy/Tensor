<?php
session_start();
include "db.php";

/* CHECK LOGIN */
if (!isset($_SESSION['farmer_id'])) {
    echo "not_logged_in";
    exit;
}

/* GET FARMER ID FROM SESSION */
$farmer_id = $_SESSION['farmer_id'];

/* GET DATA FROM FORM */
$crop = $_POST['crop'] ?? '';
$price = $_POST['price'] ?? '';
$location = $_POST['location'] ?? '';

/* BASIC VALIDATION */
if ($crop == "" || $price == "" || $location == "") {
    echo "error";
    exit;
}

/* INSERT INTO DATABASE */
$sql = "INSERT INTO ondc_crops 
        (farmer_id, crop_name, price, location, status) 
        VALUES 
        ('$farmer_id', '$crop', '$price', '$location', 'Active')";

if (mysqli_query($conn, $sql)) {
    echo "success";
} else {
    echo "error";
}
?>
