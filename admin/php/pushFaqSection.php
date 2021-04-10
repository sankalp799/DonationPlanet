<?php
    include '../../php/connection.php';
    $question = $_POST['question'];
    $ans = $_POST['answer'];
    $dateTime = date("Y-m-d h:i:s");
    $pushFaqQuery = "INSERT INTO faq VALUES('$question', '$ans', '$dateTime');";
    if($sqlConnection->query($pushFaqQuery)){
        echo '
        <div class="overlay-container"><img src="../css/img/flyingWitch.png" class="flyingWitchBroomIcon"/>

        </div>

        <div class="fly-text">Query Uploaded Successfully</div>
    ';
    }
?>