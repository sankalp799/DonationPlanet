<?php
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
?>