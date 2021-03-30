<?php
    include '../../php/connection.php';
?>

<?php
    $id = (string)$_POST['ngoID'];
    $code = (int)$_POST['verificationCode'];
    $editNGOQuery = "UPDATE ngocred SET verify=1 WHERE id='$id';";

    if($code != NULL){
        if($code == 2){
            $editNGOQuery = "DELETE FROM ngocred WHERE id='$id';";
        }

        //query execution statement for ngo verification [remove, approve]
        $sqlConnection->query($editNGOQuery);

        //fetch ngo/swg email address for mail
        $email = $sqlConnection->query("SELECT email FROM ngocred WHERE id='$id';")->fetch_object()->email;
        echo "<div id='ngoEmail' style='display: none;'>".$email."</div>";
    }

    // fetch NGO data request
    $fetchQuery = "SELECT *FROM ngocred WHERE verify=0;";
    if($ngoData = $sqlConnection->query($fetchQuery)){
        if($ngoData->num_rows <= 0){
            echo "<div class='empty-donation-check'><i class='fas fa-check'></i></div><div class='empty-donation'>All NGOs/SWGs Verified</div>";
        }else{
            while($row = $ngoData->fetch_array()){
                echo  '<div class="row donation-bar">
                        <div style="display: none;">'.$row[0].'</div>
                        <div class="col span-1-of-2 donation-data">
                            <span class="donation-bar-title">Organization Name: </span><span
                                class="donation-bar-details">'.$row[1].'</span><br />
                            <span class="donation-bar-title">Date: </span><span
                                class="donation-bar-details">'.$row[2].'</span><br />
                            <span class="donation-bar-title">Email Address: </span><span
                                class="donation-bar-details">'.$row[3].'</span><br />
                                <span class="donation-bar-title">Contact: </span><span
                                class="donation-bar-details">'.$row[5].'</span><br />
                            <span class="donation-bar-title">Address: </span><span
                                class="donation-bar-details">'.$row[6].', '.$row[7].', '.$row[8].', - '.$row[9].'</span>
                                <i class="fas fa-map-marked-alt donation-address-icon" id="getLocation"></i>
                        </div>
                        <div class="donation-bar-img">
                        <img src="'.end($row).'" class="span-1-of-2 donation-images" />
                        </div>
                        <div class="donation-bar-btn-section" id="donationBarBtns">
                        <button class="donation-bar-btn" id="addDonation" verify="1" onclick="editNGO(this)">Approve</button>
                        <button class="donation-bar-btn" id="removeDonation" verify="2" onclick="editNGO(this)"></i>Reject</button>
                        </div>
                    </div>';
            }        
        }
    }else{
        echo "<div class='connection-error-msg'><i class='fas fa-exclamation-circle'></i><span>Connection Problem</span></div>";
    }
?>