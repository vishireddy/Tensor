<?php
session_start();
include "db.php";

/* CHECK LOGIN */
if (!isset($_SESSION['farmer_id'])) {
    echo json_encode([]);
    exit;
}

$farmer_id = $_SESSION['farmer_id'];

/* FETCH ONLY LOGGED-IN FARMER CROPS */
$sql = "SELECT crop_name, price, location, status 
        FROM ondc_crops 
        WHERE farmer_id = '$farmer_id'
        ORDER BY id DESC";

$result = mysqli_query($conn, $sql);

$data = [];

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

/* RETURN JSON */
echo json_encode($data);
?>
