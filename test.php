<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
            
    include "php/connection.php";
    $result = $sqlConnection->query("SELECT *FROM categories;");
    while($categories = $result->fetch_array()){
        echo '<button class="category-btn" id="donationFilterBtn"><i class="'.$categories[1].'"></i>'.$categories[0].'</button><br />';
    }
    
                ?>
    <script src="https://kit.fontawesome.com/27878f914f.js" crossorigin="anonymous"></script>
</body>

</html>