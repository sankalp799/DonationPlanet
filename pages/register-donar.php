<?php
include "../php/connection.php" ;
include "../php/helpinghand.php";
?>

<?php
    $error = "";
    $errorDisplay = false;

   if(isset($_POST['donatorSubmit'])){
      $newDonator = new donator($_POST['username'], $_POST['DOB'], $_POST['gender'], $_POST['password'], $_POST['email'], $_POST['contact'], $_POST['address'], $_POST['city'], $_POST['state'], $_POST['pincode']);
      $password = $newDonator->getPassword();
      $id = $newDonator->getID();
      $donatorRegistrationQuery = "INSERT INTO donatorcred VALUES('$id', '$newDonator->name', '$password', '$newDonator->DOB', '$newDonator->email', $newDonator->contact, '$newDonator->address', '$newDonator->city', '$newDonator->state', $newDonator->pinCode, '$newDonator->directory',0,0);";
      if($newDonator->inputValidation()){
         if($newDonator->Autho()){
            if($newDonator->comparePassword($_POST['Re-password'])){
               if($sqlConnection->query($donatorRegistrationQuery)){
                    mkdir($newDonator->directory);
                    header("Location: ../pages/login.php");
               }else{
                  $error = "Connection Problem Please Try Again";
                  die($sqlConnection->error);
                  $errorDisplay = true;
               }
            }else{
               // code for password not match
               $error = "Password Do not Match Please Try Again";
               $errorDisplay = true;
            }
         }else{
            // code for email or contact found
            $error = "Email Address or Contact Number Already Exist";
            $errorDisplay = true;
         }
      }else{
         // code for invalid input
         $error = '<i class="fas fa-exclamation-circle instruction-open-btn" id="InstructionOpenBtn" onclick="togglePopUp()"></i>Invalid Input Please Try Again <br /> Watch Out Instructions';
         $errorDisplay = true;
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

    <div class="row instruction-pop-up" id="forgotPopUpBox">
        <div class="row instruction-overlay"></div>
        <div class="row instruction-container">
            <div class="row instruction-header">
                <span>Instructions</span>
                <i class="far fa-times-circle" onclick="togglePopUp()"></i>
            </div>
            <div class="row instruction-text">
                <span class="row"><i class="far fa-dot-circle"></i>Password length 3-16 characters</span>
                <span class="row"><i class="far fa-dot-circle"></i>Password must contain digits</span>
                <span class="row"><i class="far fa-dot-circle"></i>Password must contain special characters</span>
                <span class="row"><i class="far fa-dot-circle"></i>Password must start with alphabet</span>
                <span class="row"><i class="far fa-dot-circle"></i>Contact must contain 10-11 digit number</span>
            </div>
        </div>
    </div>
    <section class="row donar-registration-section">
        <form class="donar-registration-form" action="register-donar.php" method="post" id="registationForm">
            <div class="registration-label">Create Account</div>
            <div class="input-group">
                <label class="name">Name</label><br />
                <input class="firstname" type="text" name="username" size=25 /><br />
                <span class="bar"></span>
            </div>
            <!-- <label class="firstlabel">first name</label>
            <input class="lastname" type="text" name="last_name" />
            <label class="lastlabel">last name</label>-->

            <div class="input-group">
                <label class="name">DOB</label><br />
                <input class="date" type="date" name="DOB" />
                <span class="bar"></span>
            </div>
            <div class="input-group">
                <label>Gender</label><br />
                <div class="custom-select">
                    <select name="gender">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
            </div>
            <div class="input-group">
                <label class="name">Email</label>

                <input class="email" type="email" name="email" size=80 />
                <span class="bar"></span>
            </div>
            <div class="input-group">
                <label class="name">Password</label>

                <input class="password" type="password" name="password" size=16 />
                <span class="bar"></span>
            </div>
            <div class="input-group">
                <label class="name">Re-enter Password</label>

                <input class="password" type="password" name="Re-password" />
                <span class="bar"></span>
            </div>
            <div class="input-group">
                <label class="name">Contact No</label>

                <input class="number" type="text" name="contact" />
                <span class="bar"></span>
            </div>
            <div class="input-group">
                <label class="name">Address</label>

                <input class="address" type="text" name="address" />
                <span class="bar"></span>
            </div>
            <div class="input-group">
                <label class="name">City</label>
                <!--<ion-icon name="location"></ion-icon>-->

                <input class="city" type="text" name="city" />
                <span class="bar"></span>
            </div>
            <div class="input-group">
                <label class="name">State</label>

                <input class="state" type="text" name="state" />
                <span class="bar"></span>
            </div>

            <div class="input-group">
                <label class="name">Pincode</label>

                <input class="num" type="text" name="pincode" />
                <span class="bar"></span>
            </div>

            <!--<label id="gender">Gender</label>
            <label class="radio">
          <input class="radio-one" type="radio" checked="checked" name="" />
          <span class="checkmark"></span>
          Male
        </label>
            <label class="radio">
          <input class="radio-one" type="radio" checked="checked" name="" />
          <span class="checkmark"></span>
s          Female
        </label>-->
            <button type="submit" name="clear" class="clear-btn">Clear</button>
            <button type="submit" name="donatorSubmit" class="register-btn">
                Register
            </button>
        </form>
    </section>
    <script src="https://kit.fontawesome.com/27878f914f.js" crossorigin="anonymous"></script>
    <script>
    let form = document.getElementById('registationForm');
    let instructionOverlay = document.getElementById('instructionOverlay');
    let instructionContainer = document.getElementById('instructioncontainer');

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