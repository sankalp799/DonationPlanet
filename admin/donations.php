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
        <?php include "header.php" ?>
    </header>
    <section class="row admin-panel-section">
        <div class="admin-navigation-section">
            <?php include "adminNavigator.php" ?>
        </div>

        <div class="admin-rest-section">
            <?php
        include "../php/connection.php";

        $donationFetchQuery = "SELECT *FROM donation";
        if($result = $sqlConnection->query($donationFetchQuery)){
            if(empty($result)){
                echo "<div class='empty-donation'><img src='../css/img/404.gif'></div>";
            }else{
                while($row = $result->fetch_array()){
                    $donator = $sqlConnection->query("SELECT *FROM donatorcred WHERE id = '$row[1]';");
                    $donator = $donator->fetch_array();
                    
                    if($donationImageDataArray = $sqlConnection->query("SELECT *FROM donationimg WHERE id = '$row[0]';")){
                        $donationImageData = $donationImageDataArray->fetch_array();
                     echo  '<div class="row donation-bar">
                        <div class="col span-1-of-2 donation-data">
                            <span class="donation-bar-title">Name: </span><span
                                class="donation-bar-details">'.$row[2].'</span><br />
                            <span class="donation-bar-title">Category: </span><span
                                class="donation-bar-details">'.$row[3].'</span><br />
                            <span class="donation-bar-title">Quantity: </span><span
                                class="donation-bar-details">'.$row[4].'</span><br />
                                <span class="donation-bar-title">Description: </span><span
                                class="donation-bar-details">'.$row[5].'</span><br />
                            <span class="donation-bar-title">Donator: </span><span
                                class="donation-bar-details">'.$donator[1].'</span><br />
                            <span class="donation-bar-title">Date: </span><span
                                class="donation-bar-details">'.$row[6].'</span><br />
                            <span class="donation-bar-title">contact: </span><span
                                class="donation-bar-details">'.$donator[5].'</span><br />
                            <span class="donation-bar-title">Location: </span><span class="donation-bar-details">'.$donator[6].','.$donator[7].','.$donator[8].' - '.$donator[9].'</span>
                            <ion-icon name="map" class="donation-address-icon"></ion-icon><br />
                        </div>
                        <div class="donation-bar-img">
                        <img src="'.$donationImageData[2].'" class="span-1-of-2 donation-images" />
                        </div>
                        <div class="donation-bar-btn-section">
                        <button class="donation-bar-btn"><i class="fas fa-check"></i></button>
                        <button class="donation-bar-btn"><i class="fas fa-times"></i></button>
                        </div>
                    </div>';
                    }else{
                        echo "Donation Not Found";
                    }
                }
            }
        }else{
            echo "Connection Error Couldn't Fetch Donation Data Please Check Connection Status";
        }
    
?>
        </div>
    </section>

    <script src="https://kit.fontawesome.com/27878f914f.js" crossorigin="anonymous"></script>
</body>

</html>