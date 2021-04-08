<?php

    include "php/connection.php";
    include "php/helpinghand.php";
    
    $currentFileName = explode('/', $_SERVER['PHP_SELF']);
    $currentFileName = explode('.', end($currentFileName));
    $currentFileName = $currentFileName[0];

    //fetch stats
    $totalNGOs = (int)($sqlConnection->query("SELECT COUNT(id) AS id FROM ngocred WHERE verify=1;")->fetch_object()->id);
    $totalDonators = (int)($sqlConnection->query("SELECT COUNT(id) AS id FROM donatorcred WHERE emailVerified=1;")->fetch_object()->id);
    $totalDonations = 0;
    $donationCategoryWise = $sqlConnection->query("SELECT *FROM categories WHERE total > 0;");
    while($donation = $donationCategoryWise->fetch_array()){
        $totalDonations = $totalDonations + (int)(end($donation));
    }
?>
<?php

use PHPMailer\PHPMailer\Exception;


if (isset($_POST['getInTouchSubmission'])) {
    $email = $_POST['emailAddress'];
    $subject = $_POST['subject'];
    $body = $_POST['message'];
    $getInTouchQuery = "INSERT INTO mail VALUES('$email', '$subject', '$body');";
    $regexObj = new regex();
    if ($regexObj->emailValidation($email)) {
        if ($sqlConnection->query($getInTouchQuery)) {
            echo 'true';
            // query successfully submitted
        } else {
            die($sqlConnection->error);
        }
    } else {
        // invalid email address
        echo "invalid mail address";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" text="text/css" href="css/normalize.css" />
    <link rel="stylesheet" text="text/css" href="css/Grid.css" />
    <link rel="stylesheet" text="text/css" href="css/style.css" />
    <link rel="stylesheet" text="text/css" href="css/ionicons.min.css" />
    <script src="https://kit.fontawesome.com/27878f914f.js" crossorigin="anonymous"></script>
    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;1,300&display=swap" rel="stylesheet" />
    <title><?php echo $currentFileName ?></title>
</head>

<body>
    <header>
        <?php require 'pages/homeNavbar.php'?>
    </header>

    <section class="section-container">
        <div class="row about-us">
            <h2 class="about-us-heading">About Us</h2>
            <p class="about-us-para">
                The idea of Helping Hand was born very simple to bridge the gap between donators and NGO/Social Working
                Groups. Helping Hands is online platform that connects donators and NGOs/Social Working Group together
                to ease donations. Through Helping Hand we aim
                to make the stuff reuse to the needy and give them the pleasure of life.
            </p>
        </div>

        <!--    slider with quotes-->
        <div class="row slider-content-sec">
            <div class="photo-slider" id="first-slider"></div>
            <div class="quote-slider">
                <p class="fir-slider-para" id="quoteSlider" align="justify">
                    We Make A Living By What <br /> We Get. We Make A Life By What <br /> We Donate.<br />
                    <br /> Those Who are Happiest are Those <br />Who do Most for Other. <br />
                    <br />No One Has Ever<br />Become a Poor By Donating.
                </p>
            </div>
        </div>

        <div class='row stat-view'>
            <div class='stat-view-div'>
                <i class="fas fa-sitemap"></i>
                <div class="text-container"><?php echo $totalNGOs?> NGOs</div>
            </div>
            <div class='stat-view-div'>
                <i class="fas fa-users"></i>
                <div class="text-container"><?php echo $totalDonators ?> Donators</div>
            </div>
            <div class='stat-view-div'>
                <i class="fas fa-hands"></i>
                <div class="text-container"><?php echo $totalDonations ?> Donations</div>
            </div>
            <div class='stat-view-div'>
                <i class="fas fa-users-cog"></i>
                <div class="text-container">3 Team Members</div>
            </div>
        </div>

        <!-- ABOUT-PROPRIETORS -->
        <div class="row proprietor-content">
            <h2 class="developer-heading">Team</h2>
            <div class="row">
                <div class="col span-1-of-3">
                    <img src="../css/img/partners/yash.jpeg" class="proprietor-image" /><br />
                    <h4>Yashasavi Mishra</h4>
                    <br />
                    <p class="col span-1-of-3 developer-para" align="center" style="width: 330px">
                        Co-Founder and Chief Technology Officer(CTO)<br>
                        designer and front-end developer
                        people person, career oriented and highly organized
                    </p>
                </div>

                <div class="col span-1-of-3">
                    <img src="../css/img/partners/saurabh.jpg" class="proprietor-image" /><br />
                    <h4>Saurabh Mishra</h4>
                    <br />
                    <p class="col span-1-of-3 developer-para" align="center" style="width: 330px">
                        Founder and Chief Executive Officer(CEO)<br>
                        editor and back-end developer
                        results oriented, ambitious and driven
                    </p>
                </div>

                <div class="col span-1-of-3">
                    <img src="../css/img/partners/sankalp.jpg" class="proprietor-image" /><br />
                    <h4>Sankalp Prithyani</h4>
                    <br />
                    <p class="col span-1-of-3 developer-para" align="center" style="width: 330px">
                        Chief Information Security Officer (CISO)<br>
                        Manager and WebMaster<br>
                        natural leader and reticent
                    </p>
                </div>
            </div>
        </div>

        <div class="row get-in-touch">
            <h2 class="get-in-touch-heading">Get In touch</h2>
            <br />
            <div class="query-form">
                <!--
                <div id="loader"></div>
                <div id="done"></div>
            -->
                <!--
                    <div class="lds-dual-ring"></div>
                -->
                <input type="email" name="emailAddress" placeholder="Email Address" class="query-text"
                    id="receiverEmailAddress" />
                <br />
                <input type="text" name="subject" placeholder="Subject" class="query-text" id="emailSubject"
                    required /><br />
                <textarea name="message" placeholder="Enter Your Message" class="query-text query-text-area" align="top"
                    id="emailBody"></textarea><br />
                <input type="submit" name="getInTouchSubmission" value="SEND" class="btn submit-query-btn"
                    id="getInTouchBtn" />
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
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <script src="/script/app.js" text="text/javascript"></script>
    <script type="text/javascript">
    document.getElementById('getInTouchBtn').addEventListener('click', () => {

        let email = document.getElementById('receiverEmailAddress').value;
        let subject = document.getElementById('emailSubject').value;
        let body = document.getElementById('emailBody').value;

        if (email.trim() != "" && subject.trim() != "" && body.trim() != "") {
            Email.send({
                Host: "smtp.gmail.com",
                Username: "helpinghands032021@gmail.com",
                Password: "mcflonomcfloonyloo",
                To: "helpinghands032021@gmail.com",
                From: email,
                Subject: subject,
                Body: body
            }).then(
                message => {
                    console.log(message);
                    window.confirm("Message Delivered Successfully We Will get in touch soon.");
                }
            );
        } else {
            alert('fill up the fields of email');
        }
    });
    </script>
</body>

</html>