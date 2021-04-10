<?php 
    include '../php/connection.php';
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
    <script src="../script/Chart.min.js"></script>
</head>

<body>
    <header>
        <?php include "php/header.php" ?>
    </header>
    <section class="row admin-panel-section">
        <div class="admin-navigation-section">
            <?php include "php/adminNavigator.php" ?>
        </div>

        <div class="admin-rest-section" id="adminDonationViewPanel">
            <div class="donator-container">
                <?php
                    if($donators = $sqlConnection->query("SELECT *FROM donatorcred;")){
                        while($arr = $donators->fetch_array()){
                            echo '<div class="donator">
                            <span class="donator-batch"><i class="fas fa-id-badge donator-batch-icon"></i></span>
                            <span class="donator-info">
                                <div>
                                    <span>ID: </span>
                                    <span>'.$arr[0].'</span>
                                </div>
                                <div>
                                    <span>Donations: </span>
                                    <span>'.$arr[11].'</span>
                                </div>
                                <div>
                                    <span>Name: </span>
                                    <span>'.$arr[1].'</span>
                                </div>
                                <div>
                                    <span>Email: </span>
                                    <span>'.$arr[4].'</span>
                                </div>
                                <div>
                                    <span>Contact: </span>
                                    <span>'.$arr[5].'</span>
                                </div>
                                <div>
                                    <span>Address: </span>
                                    <span>'.$arr[6].', '.$arr[7].', '.$arr[8].' - '.$arr[9].'</span>
                                </div>
                                <div>
                                    <span>Directory Path: </span>
                                    <span>'.$arr[10].'</span>
                                </div>
                            </span>
                        </div>';
                        }
                    }            
                ?>
            </div>
        </div>
    </section>

    <script src="https://kit.fontawesome.com/27878f914f.js" crossorigin="anonymous"></script>
    <script>
    let responsiveNavigator = () => {
        let Navigator = document.getElementById('adminNavigator');
        let links = document.querySelectorAll('#adminNavigator li a span');
        let adminRestSection = document.getElementById('adminDonationViewPanel');
        // let adminDashBoardSection = document.getElementById('adminMainSection');
        links.forEach(curr => {
            curr.classList.toggle('active');
        })
        Navigator.classList.toggle('active');
        adminRestSection.classList.toggle('active');
        // adminDashBoardSection.classList.toggle('active');
        console.log(true);
    }
    </script>
</body>

</html>