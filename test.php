<?php
    include "php/connection.php";
    $DonationCount = $sqlConnection->query("SELECT categoryName AS name, total FROM categories;");
    $TotalDonators = $sqlConnection->query("SELECT COUNT(id) AS total FROM donatorcred;")->fetch_object()->total;
    $TotalNGOs = $sqlConnection->query("SELECT COUNT(id) AS total FROM ngocred;")->fetch_object()->total;
    $TotalDonations = $sqlConnection->query("SELECT COUNT(id) AS total FROM donation;")->fetch_object()->total;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" text="text/css" href="../css/normalize.css" />
    <link rel="stylesheet" text="text/css" href="../css/Grid.css" />
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;1,300&display=swap" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="script/Chart.min.js"></script>
    <title>Document</title>
</head>

<body>
    <div id="categories" style="display: none;">
        <?php
             while($row = $DonationCount->fetch_array()){
                echo "<div>".$row[0]."-".(int)$row[1]."</div>";
            }
    ?>
    </div>

    <div class="dashboard-totals">
        <div class="total-bar">
            <span class="total-bar-left">
                <div class="total-bar-label">TOTAL</div>
                <div class="total-bar-name">Donations</div>
            </span>
            <span class="total-bar-right"><?php echo $TotalDonations ?></span>
        </div>
        <div class="total-bar">
            <span class="total-bar-left">
                <div class="total-bar-label">TOTAL</div>
                <div class="total-bar-name">Donators</div>
            </span>
            <span class="total-bar-right"><?php echo $TotalDonators ?></span>
        </div>
        <div class="total-bar">
            <span class="total-bar-left">
                <div class="total-bar-label">TOTAL</div>
                <div class="total-bar-name">NGOs</div>
            </span>
            <span class="total-bar-right"><?php echo $TotalNGOs ?></span>
        </div>
    </div>

    <div style="width: 90%; border: 1px solid black;">
        <canvas id="categoryChart"></canvas>
    </div>
    <script src="script/adminDashboardApp.js"></script>
</body>

</html>