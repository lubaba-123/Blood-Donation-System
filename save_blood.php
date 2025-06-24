<?php
include 'db.php';

$donor_id = $_POST['donor_id'];
$blood_group = $_POST['blood_group'];
$donation_date = $_POST['donation_date'];
$expiry_date = $_POST['expiry_date'];
$quantity = $_POST['quantity'];

$sql = "INSERT INTO Blood (DonorID, BloodGroup, DonationDate, ExpiryDate, Quantity)
VALUES ('$donor_id', '$blood_group', '$donation_date', '$expiry_date', '$quantity')";

if (mysqli_query($conn, $sql)) {
    echo "Blood donation recorded successfully.";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
