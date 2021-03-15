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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Document</title>
</head>

<script>
</script>

<body>
    <header>
        <?php require 'navbar.php'?>
    </header>

    <section class="row donation-section">
        <span class="view-donation-type">
            <h4>View: </h4>
            <p id="category">All</p>
        </span>
        <div class="row donation-navigator-form">
            <input type="search" name="search-bar" class="col span-1-of-2 Search-Bar" id="donationSearchBar"
                placeholder="Search" />
            <button class="search-bar-icon" id="donationSearchBtn">
                <i class="fas fa-search"></i>
            </button>
        </div>
        <div class="row donation-section">
            <div class="col span-1-of-2 donation-filter">
                <h3>Categories</h3>
                <br />
                <!--
                <button class="category-btn"><i class="fas fa-house-damage category-icon"></i>Books</button><br />
                <button class="category-btn cloth-category-btn">Clothes</button>
                -->
                <?php
            
                    include "../php/connection.php";
                    $result = $sqlConnection->query("SELECT categoryName AS cat FROM categories;");
                    while($categories = $result->fetch_array()){
                        echo '<button class="category-btn" id="donationFilterBtn">'.$categories[0].'</button><br />';
                    }
                    
                ?>
            </div>

            <div class="col span-1-of-2 donations" id="donationViewSection">
                <?php
                /*
                if($result = $sqlConnection->query('SELECT *FROM donation;')){
                    while($row = $result->fetch_array()){
                        $donator = $sqlConnection->query("SELECT *FROM donatorcred WHERE id = '$row[1]';");
                        $donator = $donator->fetch_array();
                        
                        if($donationImageDataArray = $sqlConnection->query("SELECT *FROM donationimg WHERE id = '$row[0]';")){
                            $donationImageData = $donationImageDataArray->fetch_array();
                        echo '<div class="row donation-bar">
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
                                    class="donation-bar-details">%uploadedOn%</span><br />
                                <span class="donation-bar-title">contact: </span><span
                                    class="donation-bar-details">'.$donator[5].'</span><br />
                                <span class="donation-bar-title">Location: </span><span class="donation-bar-details">'.$donator[6].','.$donator[7].','.$donator[8].' - '.$donator[9].'</span>
                                <ion-icon name="map" class="donation-address-icon"></ion-icon><br />
                            </div>
                            <img src="'.$donationImageData[2].'" class="span-1-of-2 donation-images" />
                        </div>';
                        }else{
                            die($sqlConnection->error);
                        }
                    }
                }else{
                    die($sqlConnection->error);
                }
                */
                ?>
                <!--
                <div class="row donation-bar">
                <div class="col span-1-of-2 donation-data">
                    <span class="donation-bar-title">Name: </span><span
                        class="donation-bar-details">%donationName%</span><br />
                    <span class="donation-bar-title">Category: </span><span
                        class="donation-bar-details">%type%</span><br />
                    <span class="donation-bar-title">Quantity: </span><span
                        class="donation-bar-details">%qty%</span><br />
                    <span class="donation-bar-title">Donator: </span><span
                        class="donation-bar-details">%donatorName%</span><br />
                    <span class="donation-bar-title">Date: </span><span
                        class="donation-bar-details">%uploadedOn%</span><br />
                    <span class="donation-bar-title">contact: </span><span
                        class="donation-bar-details">%ContactInfo%</span><br />
                    <span class="donation-bar-title">Location: </span><span class="donation-bar-details">%785, Hari
                        Om Vihar, Dr.Ravi Agrawal Hospital, Napier Town,
                        Jabalpur, (M.P.)%</span>
                    <ion-icon name="map" class="donation-address-icon"></ion-icon><br />
                </div>
                <img src="" class="span-1-of-2 donation-images" />
            </div>
            -->
            </div>
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

    <script src="../script/donationApp.js"></script>
</body>

</html>