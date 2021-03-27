<?php
session_start();
include '../php/connection.php';
include '../php/helpinghand.php';
$errorDisplay=false;
$error="";
$regexObj = new regex();
if(isset($_POST['submit'])){
    $email = (string)$_SESSION['tempEmail'];
    $password = (string)$_POST['password'];
    $confirmPassword = (string)$_POST['confirm-password'];
    if($regexObj->passwordValidation($password)){
        if($password == $confirmPassword){
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $passwordUpdateQuery = "UPDATE donatorcred SET pass = '$hash' WHERE email = '$email';";
            $passwordUpdateQueryNGO = "UPDATE ngocred SET pass = '$hash' WHERE email = '$email';";
            if($sqlConnection->query($passwordUpdateQuery)){
                if($sqlConnection->query($passwordUpdateQueryNGO)){
                    header('location: ../pages/login.php');
                }
                header('location: ../pages/login.php');
            }else{
                die($sqlConnection->error);
                $errorDisplay=true;
                $error="Could Not Change Password Please Try Later";
            }
        }else{
            $errorDisplay=true;
            $error="Password Do Not Match";
        }
    }else{
        $errorDisplay=true;
        $error="Invalid Input Please Try Again <br /> Watch Out Instructions";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" text="text/css" href="../css/normalize.css" />
        <link rel="stylesheet" text="text/css" href="../css/Grid.css" />
        <link rel="stylesheet" text="text/css" href="../css/rest.css" />
        <link rel="stylesheet" text="text/css" href="../css/autho.css" />
        <link rel="stylesheet" text="text/css" href="../css/ionicons.min.css" />
        <script src="https://smtpjs.com/v3/smtp.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;1,300&display=swap"
            rel="stylesheet" />
        <title>Document</title>
    </head>
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

        <form class="set-new-password-form" action="" method="POST" class="new-password-form">
            <label class="new-password-form-heading">Set Password</label>
            <div class="new-password-from-div">
                <label class="set-new-password-label">Enter New Password: </label>
                <input type="password" name="password" class="set-new-password-field" required />
            </div>
            <div class="new-password-from-div">
                <label class="set-new-password-label">Re-Enter Password: </label>&nbsp;&nbsp;&nbsp;
                <input type="password" name="confirm-password" class="set-new-password-field" required />
            </div><br />
            <div class="new-password-from-div">
                <input type="submit" name="submit" value="Save" class="new-password-btn" />
            </div>
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