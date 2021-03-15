<?php
    include "../php/connection.php";
    include "../php/helpinghand.php";
?>

<?php
    $error = "";
    $errorDisplay = false;

  if (isset($_POST['NGOsubmit'])) {
  $newNGO = new ngo($_POST['orgName'], $_POST['StartUpDate'], $_POST['password'], $_POST['email'], $_POST['contact'], $_POST['city'], $_POST['state'], $_POST['address'], $_POST['pincode']);
      $id = $newNGO->getID();
      $password = $newNGO->getPassword();

      if ($newNGO->inputValidation()) {
          if ($newNGO->Autho()) {
              if ($newNGO->comparePassword($_POST['re-password'])) {
                  // file upload process
                    if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK){
                        $file= $_FILES['uploadedFile'];
        
                        // file credentials
                        $fileName= $file['name'];
                        $fileSize = $file['size'];
                        $fileTmp = $file['tmp_name'];

                        //file extension
                        $fileType = explode('.', $fileName);
                        $fileType = strtolower(end($fileType));
                        
                        // allowed type
                        $typeAllowed = array('jpeg', 'png', 'pdf', 'docx', 'pptx');

                        // file new name
                        $userEmail = explode('@', $_POST['email']);
                        $userEmailName = $userEmail[0];
                        $fileNewName = (string)($userEmailName. '.' . $fileType);

                        //file destination
                        $fileDestination = "../uploads/ngo_doc/" . $fileNewName;

                        //check file type
                        if(in_array($fileType, $typeAllowed)){
                            if(move_uploaded_file($fileTmp, $fileDestination)){
                                $ngoRegistrationQuery = "INSERT INTO ngocred VALUES('$id', '$newNGO->orgName', '$newNGO->startupDate', '$newNGO->email', '$password', $newNGO->contact, '$newNGO->address', '$newNGO->city', '$newNGO->state', $newNGO->pinCode, '$newNGO->registeredOn', 0, '$fileNewName', '$fileDestination');";
                                require('../php/connection.php');
                                if($sqlConnection->query($ngoRegistrationQuery)){
                                    header("Location: ../pages/login.php");
                                }else{
                                    $error = "Connection Problem Please Try Again";
                                    die($sqlConnection->error);
                                    $errorDisplay = true;
                                 }
                            }else{
                                $errorDisplay = true;
                                $error = "file couldn't be uploaded Please try later";
                            }
                    }else{
                        $errorDisplay = true;
                        $error = "Invalid File Type";
                    }
                }else{
                    $errorDisplay = true;
                    $error = "Please Choose Your License";
                }
                  
              }else{
                 // code for password not match
                 $errorDisplay = true;
                 $error = "Password Do not Match Please Try Again";
              }
          }else{
             // code for autho();
             $errorDisplay = true;
             $error = "Email Address or Contact Number Already Exist";
          }
      }else{
         //code for invalid input;
         $errorDisplay = true;
         $error = ' Invalid Input Please Try Again <br /> Watch Out Instructions';
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
    <!--    MESSAGE-BOX     -->
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

    <section class="row donar-registration-section">
        <form class="donar-registration-form" action="./register-ngo.php" method="POST" enctype="multipart/form-data">
            <div class="input-group">
                <label class="name">Organization </label>
                <input class="firstname" type="text" name="orgName" /><br />
                <span class="bar"></span>
            </div>
            <!-- <label class="firstlabel">first name</label>
            <input class="lastname" type="text" name="last_name" />
            <label class="lastlabel">last name</label>-->

            <div class="input-group">
                <label class="name">Started On </label>
                <input class="date" type="date" name="StartUpDate" />
                <span class="bar"></span>
            </div>
            <!--
                <div class="input-group">
                <label>Gender</label>
                <div class="custom-select">
                    <select>
              <option value="male">Male</option>
              <option value="female">Female</option>
            </select>
                </div>
            </div>
            -->

            <div class="input-group">
                <label class="name">Email</label>

                <input class="email" type="email" name="email" />
                <span class="bar"></span>
            </div>
            <div class="input-group">
                <label class="name">Password</label>

                <input class="password" type="password" name="password" />
                <span class="bar"></span>
            </div>
            <div class="input-group">
                <label class="name">Re-enter Password</label>

                <input class="password" type="password" name="re-password" />
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
                <label class="name">State</label>

                <input class="state" type="text" name="state" />
                <span class="bar"></span>
            </div>
            <div class="input-group">
                <label class="name">City</label>
                <!--<ion-icon name="location"></ion-icon>-->

                <input class="city" type="text" name="city" />
                <span class="bar"></span>
            </div>
            <div class="input-group">
                <label class="name">Pincode</label>

                <input class="num" type="text" name="pincode" />
                <span class="bar"></span>
            </div>

            <div class="upload-wrapper">
                <span class="file-name">Choose Your License...</span>
                <label for="file-upload">Browse<input type="file" id="file-upload" name="uploadedFile"></label>
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
            <button type="submit" name="submit" class="clear-btn">Clear</button>
            <button type="submit" name="NGOsubmit" class="register-btn">
                Register
            </button>
        </form>
    </section>
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