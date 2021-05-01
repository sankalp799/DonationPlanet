<?php
    session_start();
    $_SESSION['tempEmail'] = (string)$_POST['email'];
    $_SESSION['tempOTP'] = (string)$_POST['OTP'];
    $_SESSION['accountVerification'] = 0;
    
    if(($_POST['accountVerificationCode']) == 1){
        $_SESSION['accountVerification'] = 1;
    }
?>