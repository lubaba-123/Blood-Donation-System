<?php
include 'db.php';

$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$blood = $_POST['blood_group'];
$disease = $_POST['disease'];
$required = $_POST['required_date'];
$hospital_id = $_POST['hospital_id'];
$status = $_POST['status'];

$sql = "INSERT INTO Patient (Name, Age, Gender, BloodGroup, Disease, RequiredDate, HospitalID, Status)
VALUES ('$name', '$age', '$gender', '$blood', '$disease', '$required', '$hospital_id', '$status')";

if (mysqli_query($conn, $sql)) {
    echo "Patient registered successfully.";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
