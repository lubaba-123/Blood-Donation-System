<?php include 'db.php'; ?>
<?php echo "<!-- TEST: DASHBOARD VERSION -->"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blood Donation Management Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: #f0f2f5;
        }
        .header {
            background-color: #c0392b;
            color: white;
            padding: 40px 0;
            text-align: center;
            border-bottom: 5px solid #e74c3c;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card-icon {
            font-size: 2.5rem;
            margin-bottom: 10px;
            color: #dc3545;
        }
        .footer {
            text-align: center;
            padding: 20px 0;
            background-color: #f8f9fa;
            font-size: 0.9rem;
            color: #7f8c8d;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Blood Donation Management System</h1>
        <p class="lead">Saving lives one drop at a time</p>
    </div>

    <div class="container py-5">
        <div class="row g-4">
            <!-- Cards -->
            <?php
            $cards = [
                ["icon" => "bi-person-plus-fill", "title" => "Register Donor", "link" => "register_donor.php"],
                ["icon" => "bi-people-fill", "title" => "View Donors", "link" => "view_donors.php"],
                ["icon" => "bi-hospital", "title" => "Register Patient", "link" => "register_patient.php"],
                ["icon" => "bi-card-list", "title" => "View Patients", "link" => "view_patients.php"],
                ["icon" => "bi-building", "title" => "Register Hospital", "link" => "register_hospital.php"],
                ["icon" => "bi-bank2", "title" => "View Hospitals", "link" => "view_hospitals.php"],
                ["icon" => "bi-plus-square-fill", "title" => "Add Blood Donation", "link" => "add_blood.php"],
                ["icon" => "bi-droplet-half", "title" => "View Blood Donations", "link" => "view_donations.php"],
                ["icon" => "bi-bar-chart-fill", "title" => "View Blood Stock", "link" => "view_stock.php"],
                ["icon" => "bi-arrow-repeat", "title" => "Match Blood Requests", "link" => "match_requests.php"]
            ];

            foreach ($cards as $card) {
                echo "
                <div class='col-md-4'>
                    <div class='card text-center p-4'>
                        <div class='card-icon'><i class='bi {$card['icon']}'></i></div>
                        <h5 class='card-title'>{$card['title']}</h5>
                        <a href='{$card['link']}' class='btn btn-outline-danger'>Go</a>
                    </div>
                </div>
                ";
            }
            ?>
        </div>
    </div>

    <div class="footer">
        &copy; 2025 Blood Donation Management System. All rights reserved.
    </div>
</body>
</html>
