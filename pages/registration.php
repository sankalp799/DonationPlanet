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
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;1,300&display=swap" rel="stylesheet" />
    <title>Document</title>
</head>

<body>
    <section class="row registration-section">
        <div class="col span-1-of-2 registration-left-section" id="registrationSelectionPanel">
            <h2 class="registration-first-section">Donator</h2>
            <br />
            <p class="register-section-para">
                Register As Donator To Privilege<br /> Yourself to Donate Goods
            </p>
        </div>
        <div class="col span-1-of-2 registration-right-section" id="registrationSelectionPanel">
            <h2 class="registration-second-section">NGO/Social Working Group</h2>
            <p class="register-section-para">
                Register As NGO or Social Working Group <br /> To Privilege Your Organization or Group<br />to View and
                Collect Donation for helpless and Needy
            </p>
        </div>
    </section>
    <script type="text/javascript">
    const registrationPanel = document.querySelectorAll(
        "#registrationSelectionPanel"
    );
    registrationPanel.forEach((currentPointer) => {
        currentPointer.addEventListener("click", () => {
            if (currentPointer.classList.contains("registration-right-section")) {
                location.href = "../pages/register-ngo.php";
            } else {
                location.href = "../pages/register-donar.php";
            }
        });
    });
    </script>
    <script src="https://kit.fontawesome.com/27878f914f.js" crossorigin="anonymous"></script>
</body>

</html>