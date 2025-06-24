<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Blood Donation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 600px;
            margin-top: 70px;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            padding: 30px;
        }
        .btn-danger {
            width: 100%;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <h3 class="text-center text-danger mb-4">Record Blood Donation</h3>

        <form action="save_blood.php" method="post">

            <!-- Donor Dropdown -->
            <div class="mb-3">
                <label for="donor_id" class="form-label">Select Donor</label>
                <select name="donor_id" id="donor_id" class="form-select" required>
                    <option value="">-- Choose Donor --</option>
                    <?php
                    $result = mysqli_query($conn, "SELECT DonorID, Name FROM Donor");
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='".$row['DonorID']."'>".$row['Name']." (ID: ".$row['DonorID'].")</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- Blood Group -->
            <div class="mb-3">
                <label for="blood_group" class="form-label">Blood Group</label>
                <input type="text" name="blood_group" id="blood_group" class="form-control" placeholder="e.g. A+, B-, O+" required>
            </div>

            <!-- Donation Date -->
            <div class="mb-3">
                <label for="donation_date" class="form-label">Donation Date</label>
                <input type="date" name="donation_date" id="donation_date" class="form-control" required>
            </div>

            <!-- Expiry Date -->
            <div class="mb-3">
                <label for="expiry_date" class="form-label">Expiry Date</label>
                <input type="date" name="expiry_date" id="expiry_date" class="form-control" required>
            </div>

            <!-- Quantity -->
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity (ml)</label>
                <input type="number" name="quantity" id="quantity" class="form-control" required>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-danger">Save Donation</button>
        </form>
    </div>
</div>

</body>
</html>
