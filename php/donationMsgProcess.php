<?php
    session_start();
    include '../php/connection.php';
    $donatorID = $_SESSION['id'];
    $email = $_SESSION['email'];
    $state = $sqlConnection->query("SELECT state FROM donatorcred WHERE email='$email';");
    $state= $state->fetch_array();
    $state = $state[0];
    $RecentDonationID = (string)$_SESSION['recentDonationID'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" text="text/css" href="../css/normalize.css" />
    <link rel="stylesheet" text="text/css" href="../css/Grid.css" />
    <link rel="stylesheet" text="text/css" href="../css/rest.css" />
    <link rel="stylesheet" text="text/css" href="../css/autho.css" />
    <link rel="stylesheet" text="text/css" href="../css/ionicons.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;1,300&display=swap" rel="stylesheet" />
    <title>Document</title>
</head>

<body>
    <section class="row donation-submition-section">
        <div class="row donation-confirmation-msg">
            <div class="done-container">
                <div class="done"></div>
            </div>
            <div class="donation-confirm-msg">
                Thanks for providing donation details<br />
                A copy of your donation details is provided to <br />
                NGOs and Social Working Groups Covered Under Your State
            </div>
        </div>
        <div class="hidden-state" id="state" style="display: none;"><?php echo $state?></div>
        <div class="hidden-email" id="emails" style="display: none;">
            <?php
            $emailList = $sqlConnection->query("SELECT email FROM ngocred WHERE state='$state' AND verify=1;");
            if($emailList){
                while($row = $emailList->fetch_array()){
                    echo '<div>'.$row[0].'</div>';
                }
            }else{
                echo "0";
            }
        ?>
        </div>
        <div id="donation" class="donation-confirm-view">
            <?php
          $donation = $sqlConnection->query("SELECT *FROM donation WHERE id='$RecentDonationID';");
          $donator = $sqlConnection->query("SELECT *FROM donatorcred WHERE id='$donatorID';");
          $donator = $donator->fetch_array();
          $donation = $donation->fetch_array();
          echo "<h4 style='border:1px solid black; text-align:center;'>DONATION DETAILS</h4>";
          echo '<p style="text-align:center;">Donation: '.$donation[2].'</p>';
          echo '<p style="text-align:center;">Category: '.$donation[3].'</p>';
          echo '<p style="text-align:center;">Quantity: '.$donation[4].'</p>';
          echo '<p style="text-align:center;">Description: '.$donation[5].'</p><br />';
          echo '<h4 style="border:1px solid black; text-align:center;">DONATOR DETAILS</h4>';
          echo '<p style="text-align:center;">Donator: '.$donator[1].'</p>';
          echo '<p style="text-align:center;">Email Address: '.$donator[4].'</p>';
          echo '<p style="text-align:center;">Contact No.: '.$donator[5].'</p>';
          echo '<p style="text-align:center;">Address: '.$donator[6].', '.$donator[7].','.$donator[8].' - '.$donator[9].'</p>';
        ?>
        </div>
    </section>

    <script>
    let emails = document.querySelectorAll('#emails div');
    let donation = document.getElementById('donation');
    console.log(donation.innerHTML);
    console.log(emails);

    var mail = (to, subject, body) => {
        Email.send({
            Host: "smtp.gmail.com",
            Username: "helpinghands032021@gmail.com",
            Password: "mcflonomcfloonyloo",
            To: to,
            From: "helpinghands032021@gmail.com",
            Subject: subject,
            Body: "New Donation Registered Few Minutes Ago <br />Please check out<br />" + body.innerHTML
        }).then(
            message => {
                console.log(message);
            }
        );
    }

    emails.forEach((current) => {
        userEmail = current.innerHTML;
        mail(userEmail, "Donation", donation);
    });


    setTimeout(() => {
        window.location.assign('../index.php')
    }, 15000);
    </script>
</body>

</html>