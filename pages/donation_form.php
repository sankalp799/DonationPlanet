<?php
    include '../php/connection.php';
    session_start();
    $numberOfDonations;
    $errorDisplay = false;
    $error = "";
    $result = false;
    if(isset($_POST['donationUpload'])){
        if(isset($_SESSION['type'])){
            if(strtolower((string)$_SESSION['type']) == 'donator'){
                // donation data
            $currentDayDate = date("l jS \of F Y");
            $currentDate = date("d-m-yy");
            $donationName = $_POST['donationName'];
            $donationCategory = $_POST['Category'];
            $desc = $_POST['donationDesc'];
            $qty = $_POST['Qty'];
            
            // donator data
            $donatorID = $_SESSION['id'];
            $donatorContact = $_SESSION['contact'];

            // donation varaibles
            $result = false;
            $imageDir = (string)$_SESSION['dir'];

            //fetch number of donations made by donator
            $donations = $sqlConnection->query("SELECT donations FROM donatorcred WHERE id = '$donatorID'");
            $donationsObj = $donations->fetch_object();
            $numberOfDonations = (int)$donationsObj->donations;

            // donation image types allowed
            $types_allowed = array('jpeg', 'png', 'jpg', 'gif', 'webp', 'heif', 'heic');

            // donation directory 
            $numberOfDonations = $numberOfDonations + 1;
            $donationDir = "D-".(string)$donatorContact.(string)$numberOfDonations;

            if((string)strtolower($donationCategory) != "--select--"){
                $totalDonationCategory = $sqlConnection->query("SELECT total FROM categories WHERE categoryName='$donationCategory';")->fetch_object()->total + 1;
                if((int)$qty > 0){

                    // check for donation directory
                    if(file_exists($imageDir)){
                        //$result = false;
                    }else{
                        mkdir($imageDir);
                    }

                    if(file_exists($imageDir ."/".$donationDir)){
                        // $result = false;
                    }else{
                        $imageDir = $imageDir . "/" . (string)$donationDir;
                        mkdir($imageDir);
                    }


                    // donation image upload process
                    foreach ($_FILES['imageFile']['tmp_name'] as $key => $image) {
                        $imageTmpName = $_FILES['imageFile']['tmp_name'][$key];
                        $imageName = $_FILES['imageFile']['name'][$key];
                        $fileSize = $_FILES['imageFile']['size'][$key];
                        
                        //image type
                        $imageType = explode('.', $imageName);
                        $imageType = strtolower(end($imageType));
                        
                        // check donation images type
                        if(in_array($imageType, $types_allowed)){

                            //move image to donation directory
                            if(move_uploaded_file($imageTmpName, $imageDir . "/".$imageName)){
                                $tmp = $imageDir . "/" . $imageName;
                                if($sqlConnection->query("INSERT INTO donationImg VALUES('$donationDir', '$imageName', '$tmp');")){
                                    $result = true;
                                }else{
                                    $result = false;
                                    die($sqlConnection->error);
                                }
                                
                            }else{
                                $errorDisplay = true;
                                $error = "Unable to store Images\nPlease Try Again";
                            }
                        }else{
                            $errorDisplay = true;
                            $error = "invalid type";
                        }
                    }
                }else{
                    $errorDisplay = true;
                    $error = "too low quantity";
                }
            }else{
                $errorDisplay = true;
                $error = "Please Select Donation Type";
            }
            }else{
                $errorDisplay = true;
                $error = "You're Required to login as donator <br />for donation registration purpose";
            }
        }else{
            $errorDisplay = true;
            $error = "Please Login First";
        }

        if($result){
            if($sqlConnection->query("UPDATE donatorcred SET donations = $numberOfDonations WHERE id = '$donatorID';")){
                $sqlConnection->query("INSERT INTO donation values('$donationDir', '$donatorID', '$donationName', '$donationCategory', $qty, '$desc', '$currentDayDate','$currentDate',0, 0);");
                $sqlConnection->query("UPDATE categories SET total=$totalDonationCategory WHERE categoryName='$donationCategory';");
                $_SESSION['donations'] = $numberOfDonations;
                $_SESSION['recentDonationID'] = (string)$donationDir;
                header('location: ../php/donationMsgProcess.php');
            }
        }
    }
?>

<?php
    $currentFileName = explode('/', $_SERVER['PHP_SELF']);
    $currentFileName = explode('.', end($currentFileName));
    $currentFileName = $currentFileName[0];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <?php
        if(isset($_SESSION['type'])){
            if($_SESSION['type'] == 'donator')
                echo '<link rel="stylesheet" text="text/css" href="../css/donatorTheme.css" />';
            else
                echo '<link rel="stylesheet" text="text/css" href="../css/ngoTheme.css" />';
        }else{
            echo '<link rel="stylesheet" text="text/css" href="../css/donatorTheme.css" />';
        }
            
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" text="text/css" href="../css/normalize.css" />
    <link rel="stylesheet" text="text/css" href="../css/Grid.css" />
    <link rel="stylesheet" text="text/css" href="../css/autho.css" />
    <link rel="stylesheet" text="text/css" href="../css/ionicons.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;1,300&display=swap" rel="stylesheet" />
    <title><?php echo $currentFileName ?></title>
</head>

<body>
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


    <section class="row donation-form-section">
        <form method="post" action="donation_form.php" class="donation-form" enctype="multipart/form-data">
            <div class="row donation-form-heading">
                <labe>Donation Form</labe>
            </div>
            <div class="row">
                <label for="donation-name" class="col-1-of-2">Donation: </label>
                <input type="text" name="donationName" class="col-1-of-2" required>
            </div>

            <div class="row">
                <label for="donation-category" class="col-1-of-2">Category: </label>
                <select name="Category" class="col-1-of-2" required>
                    <option value="--Select--">--Select--</option>
                    <!--
                    <option value="Books">Books</option>
                    <option value="Clothes">Clothes</option>
                    -->
                    <?php
                        include "../php/connection.php";
                        $result = $sqlConnection->query("SELECT categoryName AS cat FROM categories;");
                        while($categories = $result->fetch_array()){
                            echo '<option value="'.$categories[0].'">'.$categories[0].'</option>';
                        }
                    ?>
                </select>
            </div>

            <div class="row">
                <label for="donation-quantity" class="col-1-of-2">Quantity: </label>
                <input type="number" name="Qty" class="col-1-of-2" required>
            </div>

            <div class="row">
                <label for="donation-desc" class="col-1-of-2">Description: </label>
                <textarea name="donationDesc" class="col-1-of-2" required></textarea>
            </div>
            <div class="row donation-files">
                <label for="file-upload" class="col-1-of-2">Donation Images: </label>
                <input type="file" name="imageFile[]" id="file-upload" class="col-1-of-2 donation-file-btn" require
                    multiple>
            </div>

            <div class="donation-image-section" id="donationImageView">
                <!--
                <div class="donation-image-bar">
                    <span class="donation-image-name">Image-1.jpg</span>
                    <span class="donation-image-size">24.4KB</span>
                </div>
                -->
            </div>


            <div class="donation-form-btn">
                <button class="donation-clear-btn col-1-of-2">Clear</button>
                <input type="submit" name="donationUpload" value="Donate" class="col-1-of-2">
            </div>
        </form>
    </section>
    <!--    javascript  --->
    <script src="https://kit.fontawesome.com/27878f914f.js" crossorigin="anonymous"></script>
    <script>
    let toggleMessageBox = () => {
        console.log("closed");
        document.getElementById("messageBox").classList.remove("active");
    };


    let togglePopUp = () => {
        document.getElementById("forgotPopUpBox").classList.toggle("active");
    };


    const fileInput = document.getElementById('file-upload');
    let imageViewPort = document.getElementById('donationImageView');
    let imageContainerArr = [];
    fileInput.addEventListener('change', (evt) => {
        let imageBar = "";
        imageViewPort.innerHTML = imageBar;

        // embedd image bar to imageViewPort
        let embeddImageBar = (elementBar, counter) => {
            setTimeout(() => {
                imageViewPort.insertAdjacentHTML('beforeend', elementBar);
            }, 500 * counter);
        }

        // loop to collect files in array - imageContainerArr[]
        for (let imagesLen = --fileInput.files.length; imagesLen >= 0; imagesLen--) {
            console.log(fileInput.files[imagesLen]);
            imageBar = `<div class="donation-image-bar">
                    <span class="donation-image-name">` + fileInput.files[imagesLen].name + `</span>
                    <span class="donation-image-size">` + Math.round(fileInput.files[imagesLen].size / 1024) +
                `KB</span>
                </div>`;
            imageContainerArr.push(imageBar);
            embeddImageBar(imageBar, imagesLen);
            // imageViewPort.insertAdjacentHTML('beforeend', imageBar);
        }
    });
    </script>
</body>

</html>