<!doctype html>
<html class="no-js" lang="">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/Grid.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/adminPanel.css">
    <script src="../script/Chart.min.js"></script>
    <script defer src="https://smtpjs.com/v3/smtp.js"></script>
</head>

<body>
    <header>
        <?php include "php/header.php" ?>
    </header>
    <section class="row admin-panel-section">
        <div class="admin-navigation-section">
            <?php include "php/adminNavigator.php" ?>
        </div>

        <div class="admin-rest-section" id="adminNgoViewPanel">

        </div>
    </section>

    <script src="https://kit.fontawesome.com/27878f914f.js" crossorigin="anonymous"></script>
    <script>
    let editNgoRequest = (id = null, code = null) => {
        $.ajax({
            url: 'php/NgoSectionRequest.php',
            method: "POST",
            data: {
                ngoID: id,
                verificationCode: code
            },
            success: function(data) {
                $('#adminNgoViewPanel').html(data);
            }
        });
    }
    editNgoRequest();

    let sendMail = (email, body) => {
        Email.send({
            Host: "smtp.gmail.com",
            Username: "helpinghands032021@gmail.com",
            Password: "mcflonomcfloonyloo",
            To: email + "",
            From: "helpinghands032021@gmail.com",
            Subject: "Donation Regarding",
            Body: body
        }).then(() => {
            alert("Verification Sent");
        });
    }

    let editNGO = (element) => {
        let ngoID = element.parentNode.parentNode.firstElementChild.innerHTML;
        let code = element.getAttribute("verify");
        console.log(code, ngoID);
        editNgoRequest(ngoID, code);


        setTimeout(() => {
            let donatorEmail = document.getElementById('ngoEmail').innerHTML;
            if (code == 1)
                sendMail(donatorEmail, "<h1>Account Verified</h1>");
            else if (code == 2)
                sendMail(donatorEmail, "<h1>Account Rejected</h1>");
        }, 2000);

    }
    </script>
</body>

</html>