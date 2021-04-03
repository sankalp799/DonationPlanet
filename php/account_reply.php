<?php
    session_start();
    $_SESSION['tempEmail'] = (string)$_POST['email'];
    $_SESSION['tempOTP'] = (string)$_POST['OTP'];
    $_SESSION['accountVerification'] = 0;
    
    if(boolval($_POST['accountVerification'])){
        $_SESSION['accountVerification'] = 1;
    }
?>