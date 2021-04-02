<?php
    include '../../php/connection.php';
    $question = $_POST['question'];
    $ans = $_POST['answer'];
    $pushFaqQuery = "INSERT INTO faq VALUES('$question', '$ans');";
    if($sqlConnection->query($pushFaqQuery)){
        echo '
        <div class="overlay-container"><i class="fas fa-fighter-jet"></i>

        </div>

        <div class="fly-text">Query Uploaded Successfully</div>
    ';
    }
?>