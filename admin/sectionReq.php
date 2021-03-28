<?php
    $section = (string)$_POST['pageName'];
    if($section == 'dashboard'){
        header('location: admin.php');
    }else if($section == 'donations'){
        echo "donations";
    }else if($section == 'donators'){
        echo "donators";
    }else if($section == 'ngos'){
        echo "ngos";
    }else if($section == 'logout'){
        echo "logout";
    }
?>