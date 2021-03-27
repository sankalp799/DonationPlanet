<?php
    include "../php/connection.php";

    $searchText = trim((string)($_POST['search']));
    $searchQuery = "SELECT *FROM ngocred";
    if($searchText != ""){
        $searchQuery = "SELECT *FROM ngocred WHERE orgName LIKE '%$searchText%';";
    }


    if($result = $sqlConnection->query($searchQuery)){
        while($row = $result->fetch_array()){
            $filePath = end($row);
            echo '<div class="row donation-bar">
            <div class="col span-1-of-2 donation-data">
                <span class="donation-bar-title">Organization: </span><span
                    class="donation-bar-details">'.$row[1].'</span><br />
                <span class="donation-bar-title">Startup Data: </span><span
                    class="donation-bar-details">'.$row[2].'</span><br />
                <span class="donation-bar-title">E-mail address: </span><span
                    class="donation-bar-details">'.$row[3].'</span><br />
                <span class="donation-bar-title">contact: </span><span
                    class="donation-bar-details">'.$row[5].'</span><br />
                <span class="donation-bar-title">Location: </span><span class="donation-bar-details">'.$row[6].", ".$row[7].", ".$row[8].", - ".$row[9].'</span>
                <i class="fas fa-map-marked-alt donation-address-icon" id="getLocation"></i>
            </div>
            <img src="'.$filePath.'" class="span-1-of-2 donation-images"/>
        </div>';
        }
    }else{
        // connection error;
    }
?>