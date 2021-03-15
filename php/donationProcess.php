<?php 
    include '../php/connection.php';
?>

<?php
    session_start();
    $numberOfDonations;
    if(isset($_POST['donationUpload'])){
        if((string)$_SESSION['type'] == 'donator'){
            // donation data
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
            $types_allowed = array('jpeg', 'png');

            // donation directory 
            $numberOfDonations = $numberOfDonations + 1;
            $donationDir = "D-".(string)$donatorContact.(string)$numberOfDonations;

            if((string)strtolower($donationCategory) != "--select--"){
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
                                $result = false;
                            }
                        }else{
                            $error = "invalid type";
                        }
                    }
                }else{
                    $error = "too low quantity";
                }
            }else{
                $error = "Please Select Donation Type";
            }
        }else{
            $error = "Please Login as Donator";
        }

        if($result){
            if($sqlConnection->query("UPDATE donatorcred SET donations = $numberOfDonations WHERE id = '$donatorID';")){
                echo "1";
                $sqlConnection->query("INSERT INTO donation values('$donationDir', '$donatorID', '$donationName', '$donationCategory', $qty, '$desc', 0, 0);");
                $_SESSION['donations'] = $numberOfDonations;
            }
        }else{
            echo "0";
        }
    }
?>