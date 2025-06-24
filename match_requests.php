<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Match Blood Requests</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap + Google Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f2f2f2;
        }
        .container {
            max-width: 600px;
            margin-top: 60px;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
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
        <h3 class="text-center text-danger mb-4">Match Blood Request</h3>

        <form action="process_match.php" method="post">
            <div class="mb-3">
                <label for="patient_id" class="form-label">Select Patient</label>
                <select name="patient_id" id="patient_id" class="form-select" required>
                    <option value="">-- Select Patient --</option>
                    <?php
                    include 'db.php';
                    $patients = mysqli_query($conn, "SELECT PatientID, Name FROM Patient");
                    while ($row = mysqli_fetch_assoc($patients)) {
                        echo "<option value='{$row['PatientID']}'>{$row['PatientID']} - {$row['Name']}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="blood_group" class="form-label">Required Blood Group</label>
                <input type="text" name="blood_group" id="blood_group" class="form-control" placeholder="e.g. O+, A-" required>
            </div>

            <button type="submit" class="btn btn-danger">Find Match</button>
        </form>
    </div>
</div>

</body>
</html>
