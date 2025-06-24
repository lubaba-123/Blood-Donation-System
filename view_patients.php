<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Patients</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Roboto', sans-serif; background: #f2f2f2; }
        .container { margin-top: 60px; }
        .card { border-radius: 15px; box-shadow: 0 0 15px rgba(0, 0, 0, 0.1); padding: 30px; }
        .table th { background-color: #dc3545; color: white; }
    </style>
</head>
<body>
<div class="container">
    <div class="card">
        <h3 class="text-center text-danger mb-4">Registered Patients</h3>
        <?php
        include 'db.php';
        $result = mysqli_query($conn, "SELECT * FROM Patient");
        if (mysqli_num_rows($result) > 0) {
            echo "<table class='table table-bordered table-striped'>";
            echo "<thead><tr><th>ID</th><th>Name</th><th>Age</th><th>Gender</th><th>Blood Group</th><th>Hospital ID</th><th>Status</th></tr></thead><tbody>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                    <td>{$row['PatientID']}</td>
                    <td>{$row['Name']}</td>
                    <td>{$row['Age']}</td>
                    <td>{$row['Gender']}</td>
                    <td>{$row['BloodGroup']}</td>
                    <td>{$row['HospitalID']}</td>
                    <td>{$row['Status']}</td>
                </tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "<p class='text-center text-muted'>No patient records found.</p>";
        }
        ?>
    </div>
</div>
</body>
</html>
