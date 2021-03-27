<?php
    include "../php/connection.php";

    if(isset($_POST['filter'])){
        $filterData = strtolower((string)$_POST['filter']);
        $searchText = (string)trim($_POST['search'], " ");
        $donationFetchQuery = "SELECT *FROM donation";
        
        if($filterData != "all"){
            $donationFetchQuery = "SELECT *FROM donation WHERE category = '$filterData';";
        }
        if(strlen($searchText)){
            $donationFetchQuery = "SELECT *FROM donation WHERE donationName LIKE '$searchText%';";
        }
        if($filterData != "all" && strlen($searchText)){
            $donationFetchQuery = "SELECT *FROM donation WHERE category = '$filterData' AND donationName LIKE '$searchText%';";
        }


        if($result = $sqlConnection->query($donationFetchQuery)){
            if(empty($result)){
                echo "<div class='empty-donation'><img src='../css/img/404.gif'></div>";
            }else{
                while($row = $result->fetch_array()){
                    $donator = $sqlConnection->query("SELECT *FROM donatorcred WHERE id = '$row[1]';");
                    $donator = $donator->fetch_array();
                    
                    if($donationImageDataArray = $sqlConnection->query("SELECT *FROM donationimg WHERE id = '$row[0]';")){
                        $donationImageData = $donationImageDataArray->fetch_array();
                     echo  '<div class="row donation-bar">
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
                        <img src="'.$donationImageData[2].'" class="span-1-of-2 donation-images" />
                    </div>';
                    }else{
                        echo "Donation Not Found";
                    }
                }
            }
        }else{
            echo "Connection Error Couldn't Fetch Donation Data Please Check Connection Status";
        }
    }else{
        echo "404 not found";
    }
?>