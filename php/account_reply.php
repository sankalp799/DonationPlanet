<?php
    session_start();
    $_SESSION['tempEmail'] = (string)$_POST['email'];
    $_SESSION['tempOTP'] = (string)$_POST['OTP'];
?>