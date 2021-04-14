<?php
    include "../php/connection.php";

    $searchText = trim((string)($_POST['search']));
    $searchQuery = "SELECT *FROM ngocred WHERE verify=1";
    if($searchText != ""){
        $searchQuery = "SELECT *FROM ngocred WHERE orgName LIKE '%$searchText%' AND verify=1;";
    }


    if($result = $sqlConnection->query($searchQuery)){
        while($row = $result->fetch_array()){
            $email = explode('@',$row[3]);
            $EmailName = (string)$email[0];
               for($iterator = (int)floor((strlen($EmailName)/2)); $iterator < strlen($EmailName); $iterator++){
                   $EmailName[$iterator] = '*';
               }
            $email = (string)($EmailName . '@' . $email[1]);
            $contactNumber = $row[5]%1000;
            echo '<div class="row donation-bar">
            <div class="col span-1-of-2 donation-data">
                <span class="donation-bar-title">Organization: </span><span
                    class="donation-bar-details">'.$row[1].'</span><br />
                <span class="donation-bar-title">Startup Data: </span><span
                    class="donation-bar-details">'.$row[2].'</span><br />
                <span class="donation-bar-title">E-mail address: </span><span
                    class="donation-bar-details">'.$email.'</span><br />
                <span class="donation-bar-title">contact: </span><span
                    class="donation-bar-details">'.'*******'.$contactNumber.'</span><br />
                <span class="donation-bar-title">Location: </span><span class="donation-bar-details">'.$row[6].", ".strtoupper($row[7]).", ".strtoupper($row[8]).", - ".$row[9].'</span>
                <i class="fas fa-map-marked-alt donation-address-icon" id="getLocation" onclick="ngoGeoLocation(this)"></i>
            </div>
            <img src="'.$row[13].'" class="span-1-of-2 donation-images"/>
        </div>';
        }
    }else{
        // connection error;
    }
?>