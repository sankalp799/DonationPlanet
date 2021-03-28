<?php
    include "../php/connection.php";
    $DonationCount = $sqlConnection->query("SELECT categoryName AS name, total FROM categories;");
    $TotalDonators = $sqlConnection->query("SELECT COUNT(id) AS total FROM donatorcred;")->fetch_object()->total;
    $TotalNGOs = $sqlConnection->query("SELECT COUNT(id) AS total FROM ngocred;")->fetch_object()->total;
    $TotalDonations = $sqlConnection->query("SELECT COUNT(id) AS total FROM donation;")->fetch_object()->total;
?>

<!doctype html>
<html class="no-js" lang="">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/Grid.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/adminPanel.css">
    <link rel="stylesheet" href="../css/adminDashboard.css">
    <script src="../script/Chart.min.js"></script>
</head>

<body>
    <div id="categories" style="display: none;">
        <?php
             while($row = $DonationCount->fetch_array()){
                echo "<div>".$row[0]."-".(int)$row[1]."</div>";
            }
    ?>
    </div>

    <header>
        <?php include "header.php" ?>
    </header>
    <section class="row admin-panel-section">
        <div class="admin-navigation-section">
            <?php include "adminNavigator.php" ?>
        </div>

        <div class="admin-dashboard-section" id="adminMainSection">

            <div class="row dashboard-totals">
                <div class="total-bar">
                    <span class="total-bar-left">
                        <div class="total-bar-name">Donations</div>
                    </span>
                    <span class="total-bar-right"><?php echo $TotalDonations ?></span>
                </div>
                <div class="total-bar">
                    <span class="total-bar-left">
                        <div class="total-bar-name">Donators</div>
                    </span>
                    <span class="total-bar-right"><?php echo $TotalDonators ?></span>
                </div>
                <div class="total-bar">
                    <span class="total-bar-left">
                        <div class="total-bar-name">NGOs</div>
                    </span>
                    <span class="total-bar-right"><?php echo $TotalNGOs ?></span>
                </div>
            </div>

            <div class="chart-container">
                <canvas id="categoryChart"></canvas>
            </div>

        </div>
    </section>

    <script src="https://kit.fontawesome.com/27878f914f.js" crossorigin="anonymous"></script>
    <script src="../script/adminDashboardApp.js"></script>
</body>

</html>