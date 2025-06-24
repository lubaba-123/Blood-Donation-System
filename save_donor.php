<?php
include 'db.php';

$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$blood = $_POST['blood_group'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$last_date = $_POST['last_donation'];

$sql = "INSERT INTO Donor (Name, Age, Gender, BloodGroup, ContactNumber, Email, LastDonationDate)
VALUES ('$name', '$age', '$gender', '$blood', '$contact', '$email', '$last_date')";

if (mysqli_query($conn, $sql)) {
    echo "Donor registered successfully.";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>

