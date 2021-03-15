<?php include "../php/connection.php"?>
<?php
session_start();
?>
<?php
    $error = "";
    $errorDisplay = false;
    
    if(isset($_POST['loginCred'])){
        $username = (string)strtolower($_POST['email']);
        $password = (string)strtolower($_POST['password']);
        $donatorLoginQuery = "SELECT id AS id, username AS username, email AS email, pass AS pass, contact AS contact, directory as dir,donations AS donations FROM donatorCred WHERE email = '$username';";
        $ngoLoginQuery = "SELECT id AS id, orgName AS username, email AS email, pass AS pass, contact AS contact, verify AS verify FROM ngoCred WHERE email = '$username';";
        
        $donatorResult = $sqlConnection->query($donatorLoginQuery);
        $ngoResult = $sqlConnection->query($ngoLoginQuery);
        $donatorObj = $donatorResult->fetch_object();
        $ngoObj = $ngoResult->fetch_object();
        
        if(!empty($donatorObj)){
            if(password_verify($password, $donatorObj->pass)){
                header('Location: ../index.php');
                    $_SESSION['id'] = (string)$donatorObj->id;
                    $_SESSION['username'] = (string)$donatorObj->username;
                    $_SESSION['type'] = 'donator';
                    $_SESSION['email'] = (string)$donatorObj->email;
                    $_SESSION['contact'] = (int)$donatorObj->contact;
                    $_SESSION['donations'] = (int)$donatorObj->donations;
                    $_SESSION['dir'] = (string)$donatorObj->dir;
            }else{
                // incorrect password
                $errorDisplay = true;
                $error = "Sorry, Incorrect Email or Password";
            }
        }else if(!empty($ngoObj)){
            if(password_verify($password, $ngoObj->pass)){
                if($ngoObj->verify){
                    header('Location: ../index.php');
                    $_SESSION['id'] = (string)$ngoObj->id;
                    $_SESSION['username'] = (string)$ngoObj->username;
                    $_SESSION['type'] = 'ngo';
                    $_SESSION['email'] = (string)$ngoObj->email;
                    $_SESSION['contact'] = (int)$ngoObj->contact;
                }else{
                    // account under verification process
                    $errorDisplay = true;
                    $error = "Your Account is Under Verification. <br/> Will Be Verified Soon.";
                }
            }else{
                // incorrect password
                $errorDisplay = true;
                $error = "Sorry, Incorrect Email or Password";
            }
        }else{
            // user do not exist
            $errorDisplay = true;
            $error = "Sorry, Incorrect Email Address";
        }
    }
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" text="text/css" href="../css/normalize.css" />
    <link rel="stylesheet" text="text/css" href="../css/Grid.css" />
    <link rel="stylesheet" text="text/css" href="../css/rest.css" />
    <link rel="stylesheet" text="text/css" href="../css/autho.css" />
    <link rel="stylesheet" text="text/css" href="../css/ionicons.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;1,300&display=swap" rel="stylesheet" />
    <title>Document</title>
</head>

<body>
    <!--    forgot-pop-up-box       -->
    <div class="forgot-pop-up" id="forgotPopUpBox">
        <div class="overlay"></div>
        <div class="forgot-pop-container">
            <div class="forgot-header">
                <h2 class="forgot-pop-heading">Find Your Account</h2>
                <div class="forgot-pop-close-btn" onclick="togglePopUp()" id="pop-up-close">
                    &times;
                </div>
            </div>
            <div class="forgot-pop-form">
                <h4 class="forgot-form-heading">Enter Your Email Below:</h4>
                <br />
                <form class="forgot-form" action="../php/account_recovery.php" method="post">
                    <input type="text" name="forgotEmail" placeholder="Email Address" class="forgot-text-field"
                        required />
                    <input type="submit" name="recoverAccountSubmit" value="FIND" class="forgot-btn" />
                </form>
            </div>
        </div>
    </div>

    <!---   message-pop-up-box      -->
    <?php
        if(strlen($error) > 1){
            if($errorDisplay){
                $errorDisplay = false;

                echo '<div class="row message-container active" id="messageBox">
        <h5 class="message-error">' . $error . '</h5>
        <i class="far fa-times-circle message-close-btn" id="messageCloseBtn"  onclick="toggleMessageBox();"></i>
    </div>';
            }
        }
    ?>



    <section class="row login-section" id="loginSection">
        <div class="col span-1-of-2 login-heading-section">
            <h1 class="login-heading">The helping hands</h1>
            <h6 class="login-subheading">
                Helps Donator and Organization <br /> To Connect For Donation.
            </h6>
        </div>
        <form class="col span-1-of-2 login-form" action="login.php" method="POST">
            <input type="email" name="email" placeholder="E-MAIL ADDRESS" class="login-form-field" />

            <input type="password" name="password" placeholder="PASSWORD" class="login-form-field" />

            <a class="login-form-recover-link" class="forgot-popUp-link" onclick="togglePopUp();">Forgot
                Password?</a><br />

            <a href="../pages/registration.php" class="login-form-btn login-form-signup-btn">sign-up</a>

            <input type="submit" name="loginCred" value="Login" class="login-form-btn login-form-login-btn" />
        </form>
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
    <script>
    let toggleMessageBox = () => {
        console.log("closed");
        document.getElementById("messageBox").classList.remove("active");
    };


    let togglePopUp = () => {
        document.getElementById("forgotPopUpBox").classList.toggle("active");
    };
    </script>
</body>

</html>