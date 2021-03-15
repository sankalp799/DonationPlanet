<?php
    include '../php/connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" text="text/css" href="../css/normalize.css" />
    <link rel="stylesheet" text="text/css" href="../css/Grid.css" />
    <link rel="stylesheet" text="text/css" href="../css/rest.css" />
    <link rel="stylesheet" text="text/css" href="../css/ionicons.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;1,300&display=swap" rel="stylesheet" />
    <title>Document</title>
</head>

<body>
    <header>
        <?php require 'navbar.php'?>
    </header>

    <section class="row NGO-section">
        <form class="row donation-navigator-form">
            <input type="text" name="search-bar" class="col span-1-of-2 Search-Bar" placeholder="Search" />
            <button class="search-bar-icon">
                <i class="fas fa-search"></i>
            </button>
        </form>
        <div class="row donation-section">
            <div class="col span-1-of-2 donation-filter"></div>

            <div class="col span-1-of-2 donations">

                <?php
                    $fetchQuery = 'SELECT *FROM ngocred where verify = 1';
                    if($result = $sqlConnection->query($fetchQuery)){
                        while($row = $result->fetch_array()){
                            $filePath = end($row);
                            echo '<div class="row donation-bar">
                            <div class="col span-1-of-2 donation-data">
                                <span class="donation-bar-title">Organization: </span><span
                                    class="donation-bar-details">'.$row[1].'</span><br />
                                <span class="donation-bar-title">Startup Data: </span><span
                                    class="donation-bar-details">'.$row[2].'</span><br />
                                <span class="donation-bar-title">E-mail address: </span><span
                                    class="donation-bar-details">'.$row[3].'</span><br />
                                <span class="donation-bar-title">contact: </span><span
                                    class="donation-bar-details">'.$row[5].'</span><br />
                                <span class="donation-bar-title">Location: </span><span class="donation-bar-details">'.$row[6].", ".$row[7].", ".$row[8].", - ".$row[9].'</span>
                                <i class="fas fa-map-marked-alt donation-address-icon"></i>
                            </div>
                            <img src="'.$filePath.'" class="span-1-of-2 donation-images"/>
                        </div>';
                        }
                    }else{
                        // connection error;
                    }
                ?>
                <!--
                <div class="row donation-bar">
                    <div class="col span-1-of-2 donation-data">
                        <span class="donation-bar-title">Organization: </span><span
                            class="donation-bar-details">%organizationName%</span><br />
                        <span class="donation-bar-title">Startup Data: </span><span
                            class="donation-bar-details">%date%</span><br />
                        <span class="donation-bar-title">E-mail address: </span><span
                            class="donation-bar-details">%Sankalpprithyani@gmail.com%</span><br />
                        <span class="donation-bar-title">contact: </span><span
                            class="donation-bar-details">%ContactInfo%</span><br />
                        <span class="donation-bar-title">Location: </span><span class="donation-bar-details">%785, Hari
                            Om Vihar, Dr.Ravi Agrawal Hospital, Napier Town,
                            Jabalpur, (M.P.)%</span>
                        <ion-icon name="map" class="donation-address-icon"></ion-icon><br />
                    </div>
                    <img src="" class="span-1-of-2 donation-images" />
                </div>
            </div>
            -->
            </div>
    </section>
    <footer>
        <div class="row footer-section">
            <div class="col span-1-of-4 footer-section-heading">
                <h3 class="footer-title">the helping hand</h3>
                <p class="footer-section-heading-para">
                    &copy; 2021. all rights reserved
                </p>
            </div>
            <div class="col span-1-of-4 footer-section-follow">
                <p class="footer-section-subheading">Follow</p>
                <ul class="footer-section-links">
                    <li><a>Twitter</a></li>
                    <li><a>Facebook</a></li>
                    <li><a>Instagram</a></li>
                </ul>
            </div>
            <div class="col span-1-of-4 footer-section-legals">
                <p class="footer-section-subheading">Legal</p>
                <ul class="footer-section-links">
                    <li><a>terms</a></li>
                    <li><a>policy</a></li>
                </ul>
            </div>
            <div class="col span-1-of-4 footer-section-contact">
                <p class="footer-section-subheading">Contact</p>
                <ul class="footer-section-contact-links">
                    <li><a>helpinghand@gmail.com </a></li>
                    <li><a>0761-4079191</a></li>
                </ul>
            </div>
        </div>
    </footer>
    <script src="https://kit.fontawesome.com/27878f914f.js" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
</body>

</html>