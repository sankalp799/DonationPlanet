<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <script src="https://smtpjs.com/v3/smtp.js"></script>

    <script>
    Email.send({
        Host: "smtp.gmail.com",
        Username: "helpinghands032021@gmail.com",
        Password: "mcflonomcfloonyloo",
        To: "sankalpprithyani@gmail.com",
        From: "190510101125@paruluniversity.ac.in",
        Subject: "Donation Regarding",
        Body: "bye"
    }).then((message) => {
        alert(message);
    });
    </script>
</body>

</html>