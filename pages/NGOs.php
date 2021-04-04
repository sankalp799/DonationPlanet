<?php
    $currentFileName = explode('/', $_SERVER['PHP_SELF']);
    $currentFileName = explode('.', end($currentFileName));
    $currentFileName = $currentFileName[0];
?>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;1,300&display=swap" rel="stylesheet" />
    <title><?php echo $currentFileName ?></title>
</head>

<body>
    <header>
        <?php require 'navbar.php'?>
    </header>

    <section class="row NGO-section">
        <form class="row donation-navigator-form">
            <input type="text" name="search-bar" class="col span-1-of-2 Search-Bar" placeholder="Search"
                id="searchNgoBar" />
            <button class="search-bar-icon">
                <i class="fas fa-search"></i>
            </button>
        </form>
        <div class="row donation-section">
            <div class="col span-1-of-2 donation-filter"></div>

            <div class="col span-1-of-2 donations" id="ngoDataSection">

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
    <script>
    // function to return map url
    let urlPlaceholder = (arr) => {
        let addressURL =
            "https://www.google.com/maps/search/";
        let address = "";
        for (let element = 0; element < arr.length; element++) {
            if (element == arr.length - 3) {
                arr[element] = arr[element].replace(',', '');
                address = address + arr[element] + "/";
                break;
            }
            address = address + arr[element] + "+";
        }
        return addressURL.toString() + address.toString();
    }

    //ngo geolocation 
    let ngoGeoLocation = (element) => {
        // let NGOs = document.querySelectorAll('#getLocation');
        // NGOs.forEach((current) => {
        // current.addEventListener('click', () => {
        console.log(true);
        let address = element.parentElement;
        address = address.getElementsByTagName('span')[9]
            .innerText; // get ngo addresss from DOM
        let addressElements = address.split(" "); // array of ngo/swg address
        let addressURL = urlPlaceholder(addressElements); // fetch url for google maps
        window.open(addressURL); // redirect user to google map - ngo location
        // });
        // });
    }

    function fetchNgoData(searchText = "") {
        $.ajax({
            url: '../php/fetchNGO.php',
            method: "POST",
            data: {
                search: searchText
            },
            success: function(data) {
                $('#ngoDataSection').html(data);
            }
        });
    }

    fetchNgoData();

    // search ngo by name
    document.getElementById('searchNgoBar').addEventListener('keyup', () => {
        let text = document.getElementById('searchNgoBar').value;
        fetchNgoData(text);
    });
    </script>
</body>

</html>