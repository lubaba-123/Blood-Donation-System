<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Donations</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS & Google Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 800px;
            margin-top: 50px;
        }
        .card {
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        .btn-danger {
            width: 100%;
        }
        h3 {
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <h3 class="text-center text-danger mb-4">View Donor's Blood Donation History</h3>

        <!-- Donor Selection Form -->
        <form method="POST" class="mb-4">
            <div class="mb-3">
                <label for="donor_id" class="form-label">Select Donor</label>
                <select name="donor_id" id="donor_id" class="form-select" required>
                    <option value="">-- Select Donor --</option>
                    <?php
                    $donors = mysqli_query($conn, "SELECT DonorID, Name FROM Donor");
                    while ($row = mysqli_fetch_assoc($donors)) {
                        $selected = (isset($_POST['donor_id']) && $_POST['donor_id'] == $row['DonorID']) ? 'selected' : '';
                        echo "<option value='{$row['DonorID']}' $selected>{$row['DonorID']} - {$row['Name']}</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-danger">View History</button>
        </form>

        <?php
        if (isset($_POST['donor_id'])) {
            $donor_id = $_POST['donor_id'];
            $query = "SELECT BloodGroup, DonationDate, Quantity FROM Blood WHERE DonorID = '$donor_id' ORDER BY DonationDate DESC";
            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                echo "<h5 class='text-success'>Donation History:</h5>";
                echo "<table class='table table-bordered table-striped'>";
                echo "<thead><tr><th>Donation Date</th><th>Blood Group</th><th>Quantity (ml)</th></tr></thead><tbody>";

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>{$row['DonationDate']}</td>
                            <td>{$row['BloodGroup']}</td>
                            <td>{$row['Quantity']}</td>
                          </tr>";
                }

                echo "</tbody></table>";
            } else {
                echo "<p class='text-muted text-center'>No donation records found for the selected donor.</p>";
            }
        }
        ?>
    </div>
</div>

</body>
</html>
