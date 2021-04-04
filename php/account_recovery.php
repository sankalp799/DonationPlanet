<?php
/*
    require '../phpmailer/PHPMailerAutoload.php';
    require '../phpmailer/accountCredentials.php';

    // user email address
    $email = $_POST['forgotEmail'];

    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587; //587
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tsl';

    $mail->Username=ADMIN_EMAIL;
    $mail->Password = ADMIN_PASSWORD;
    
    $mail->setFrom(ADMIN_EMAIL, "Helping Hands");
    $mail->addAddress($email);
    $mail->addReplyTo(ADMIN_EMAIL);
    $mail->isHTML(true);
    $mail->Subject = "Recover Password";
    $mail->Body = '<h2>OTP: </h2>123456';

    if(isset($_POST['recoverAccountSubmit'])){
        if(!$mail->send()){
            echo "failed to send request\n";
            echo $mail->ErrorInfo;
        }else{
            echo "sent";
        }
    }
*/
/*
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require '../mailComposer/vendor/autoload.php';
    require '../phpmailer/accountCredentials.php';

    if(isset($_POST['recoverAccountSubmit'])){
        $email = $_POST['forgotEmail'];
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587; //587
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';

        $mail->Username=ADMIN_EMAIL;
        $mail->Password = ADMIN_PASSWORD;
        
        $mail->setFrom(ADMIN_EMAIL, "Helping Hands");
        $mail->addAddress($email);
        $mail->addReplyTo(ADMIN_EMAIL);
        $mail->isHTML(true);
        $mail->Subject = "Recover Password";
        $mail->Body = '<h2>OTP: </h2>123456';

        if(!$mail->send()){
            echo "failed to send request\n";
            echo $mail->ErrorInfo;
        }else{
            echo "sent";
        }
    }
  */  
?>

<?php
    $currentFileName = explode('/', $_SERVER['PHP_SELF']);
    $currentFileName = explode('.', end($currentFileName));
    $currentFileName = $currentFileName[0];
?>

<?php
include 'connection.php';
session_start();
$errorDisplay=false;
$error="";
$accountVerification = (int)($_SESSION['accountVerification']);
$userEmail = (string)$_SESSION['tempEmail'];

if(isset($_POST['submit'])){
    if((int)$_SESSION['tempOTP'] == (int)$_POST['one-time-password']){
        if($accountVerification){
            if($sqlConnection->query("UPDATE donatorcred SET emailVerified=1 WHERE email='$userEmail';")){
                $sqlConnection->query("UPDATE ngocred SET emailVerified=1 WHERE email='$userEmail';");
                header('location: ../pages/login.php');
            }
        }else{
            header('location: ../php/resetPasswordProcess.php');
        }
    }else{
        $errorDisplay=true;
        $error="Incorrect OTP Please Try Again";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" text="text/css" href="../css/normalize.css" />
    <link rel="stylesheet" text="text/css" href="../css/Grid.css" />
    <link rel="stylesheet" text="text/css" href="../css/rest.css" />
    <link rel="stylesheet" text="text/css" href="../css/autho.css" />
    <link rel="stylesheet" text="text/css" href="../css/ionicons.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;1,300&display=swap" rel="stylesheet" />
    <title>echo $currentFileName</title>
</head>

<body>
    <section class="row account-recovery-section">
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
        <form action="../php/account_recovery.php" method="POST" class="otp-form">
            <label class="otp-verify-account-label">Verify Account</label><br />
            <label class="otp-email-label"><?php
            echo "Please Verify OTP sent to ". $_SESSION['tempEmail'];
        ?></label>
            <input type="number" name="one-time-password" placeholder="OTP" class="otp-field"
                onfocus="this.placeholder=''" require><br />
            <input type="submit" name="submit" value="submit" class="otp-submit-btn">
        </form>
    </section>

    <script type="text/javascript">
    let toggleMessageBox = () => {
        console.log("closed");
        document.getElementById("messageBox").classList.remove("active");
    };
    </script>
</body>

</html>