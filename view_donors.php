<?php
// Show all errors (for debugging)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Connect to database
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Donors</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: #f8f9fa;
        }
        .container {
            margin-top: 60px;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }
        .table th {
            background-color: #dc3545;
            color: white;
            text-align: center;
        }
        .table td {
            text-align: center;
            vertical-align: middle;
        }
        h3 {
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <h3 class="text-center text-danger mb-4">Registered Donors</h3>

        <?php
        // Fetch donors
        $query = "SELECT * FROM Donor";
        $result = mysqli_query($conn, $query);

        if (!$result) {
            echo "<div class='alert alert-danger text-center'>❌ Query failed: " . mysqli_error($conn) . "</div>";
        } elseif (mysqli_num_rows($result) > 0) {
            echo "<table class='table table-bordered table-striped'>";
            echo "<thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Blood Group</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Last Donation</th>
                    </tr>
                  </thead><tbody>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['DonorID']}</td>
                        <td>{$row['Name']}</td>
                        <td>{$row['BloodGroup']}</td>
                        <td>{$row['Age']}</td>
                        <td>{$row['Gender']}</td>
                        <td>{$row['ContactNumber']}</td>
                        <td>{$row['Email']}</td>
                        <td>{$row['LastDonationDate']}</td>
                      </tr>";
            }

            echo "</tbody></table>";
        } else {
            echo "<p class='text-center text-muted'>⚠️ No donor records found.</p>";
        }
        ?>
    </div>
</div>

</body>
</html>
