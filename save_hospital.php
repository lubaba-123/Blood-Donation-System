<?php
include 'db.php';

$name = $_POST['name'];
$address = $_POST['address'];
$contact = $_POST['contact'];
$email = $_POST['email'];

$sql = "INSERT INTO Hospital (Name, Address, ContactNumber, Email)
VALUES ('$name', '$address', '$contact', '$email')";

if (mysqli_query($conn, $sql)) {
    echo "Hospital registered successfully.";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
