<?php
        include "../../php/connection.php";
        $id = (string)$_POST['donationID'];
        $code = $_POST['verificationCode'];

        if($id != NULL && $code != NULL){

            // donator details for mail
            $donatorID = (string)$sqlConnection->query("SELECT donatorID AS id FROM donation WHERE id='$id';")->fetch_object()->id;
            $donatorEmail = (string)$sqlConnection->query("SELECT email FROM donatorcred WHERE id='$donatorID';")->fetch_object()->email;
            echo "<div id='donatorEmail' style='display: none;'>".$donatorEmail."</div>";

            // fetch number of donations 
            $category = (string)$sqlConnection->query("SELECT category FROM donation WHERE id='$id';")->fetch_object()->category;
            $totalDonations = (int)$sqlConnection->query("SELECT total FROM categories WHERE categoryName='$category'")->fetch_object()->total;

            if($code == 1){
                $totalDonations = $totalDonations + 1;
                $editDonationQuery = "UPDATE donation SET verify=1 WHERE id='$id';";
            }else if($code == 2){
                $totalDonations = $totalDonations - 1;
                $editDonationQuery = "DELETE FROM donation WHERE id='$id';";
                
                $deleteDonationImgQuery = "DELETE FROM donationimg WHERE id='$id';";

                if($sqlConnection->query($deleteDonationImgQuery)){
                    // $donatorEmail = $sqlConnection->query("SELECT email FROM donatorcred WHERE contact=$donatorContact;");
                    // echo "<div id='donatorEmail' style='display: none;'>".$donatorEmail."</div>"
                }
            }
            $updateCategory = "UPDATE categories SET total=$totalDonations WHERE categoryName='$category';";

            if($sqlConnection->query($editDonationQuery) && $sqlConnection->query($updateCategory)){
                
            }
        }
        $donationFetchQuery = "SELECT *FROM donation WHERE verify=0";
        if($result = $sqlConnection->query($donationFetchQuery)){
            if($result->num_rows <= 0){
                echo "<div class='empty-donation-check'><i class='fas fa-check'></i></div><div class='empty-donation'>All Donation Verified</div>";
            }else{
                while($row = $result->fetch_array()){
                    $donator = $sqlConnection->query("SELECT *FROM donatorcred WHERE id = '$row[1]';");
                    $donator = $donator->fetch_array();
                    
                    if($donationImageDataArray = $sqlConnection->query("SELECT *FROM donationimg WHERE id = '$row[0]';")){
                        $donationImageData = $donationImageDataArray->fetch_array();
                     echo  '<div class="row donation-bar">
                        <div style="display: none;">'.$row[0].'</div>
                        <div class="col span-1-of-2 donation-data">
                            <span class="donation-bar-title">Name: </span><span
                                class="donation-bar-details">'.$row[2].'</span><br />
                            <span class="donation-bar-title">Category: </span><span
                                class="donation-bar-details">'.$row[3].'</span><br />
                            <span class="donation-bar-title">Quantity: </span><span
                                class="donation-bar-details">'.$row[4].'</span><br />
                                <span class="donation-bar-title">Description: </span><span
                                class="donation-bar-details">'.$row[5].'</span><br />
                            <span class="donation-bar-title">Donator: </span><span
                                class="donation-bar-details">'.$donator[1].'</span><br />
                            <span class="donation-bar-title">Date: </span><span
                                class="donation-bar-details">'.$row[6].'</span><br />
                            <span class="donation-bar-title">contact: </span><span
                                class="donation-bar-details">'.$donator[5].'</span><br />
                            <span class="donation-bar-title">Location: </span><span class="donation-bar-details">'.$donator[6].','.$donator[7].','.$donator[8].' - '.$donator[9].'</span>
                            <ion-icon name="map" class="donation-address-icon"></ion-icon><br />
                        </div>
                        <div class="donation-bar-img">
                        <img src="'.$donationImageData[2].'" class="span-1-of-2 donation-images" />
                        </div>
                        <div class="donation-bar-btn-section" id="donationBarBtns">
                        <button class="donation-bar-btn" id="addDonation" verify="1" onclick="editDonation(this)">Approve</button>
                        <button class="donation-bar-btn" id="removeDonation" verify="2" onclick="editDonation(this)"></i>Reject</button>
                        </div>
                    </div>';
                    }else{
                        echo "Donation Not Found";
                    }
                }
            }
        }else{
            echo "Connection Error Couldn't Fetch Donation Data Please Check Connection Status";
        }
    
?>