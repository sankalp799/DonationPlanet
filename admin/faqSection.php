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
    <link rel="stylesheet" href="../css/adminDashboard.css">
    <script src="../script/Chart.min.js"></script>
</head>

<body>
    <header>
        <?php include "php/header.php" ?>
    </header>
    <section class="row admin-panel-section">
        <div class="admin-navigation-section">
            <?php include "php/adminNavigator.php" ?>
        </div>

        <div class="admin-rest-section" id="adminFaqSection">
            <div class="fly-container" id="flyContainer"></div>
            <div class="push-query-form" id="pushQueryForm">
                <div class="push-query-form-div">
                    <label class="push-query-form-label">Query &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <input type="text" name="query" id="Query">
                </div>
                <div class="push-query-form-div">
                    <label class="push-query-form-label">Response </label>
                    <textarea name="response" id="Response"></textarea>
                </div>
                <div class="push-query-form-btns-section"><button type="submit" name="submitQuery"
                        id="submitQueryBtn">Submit</button></div>
            </div>
        </div>
    </section>

    <script src="https://kit.fontawesome.com/27878f914f.js" crossorigin="anonymous"></script>
    <script>
    let responsiveNavigator = () => {
        let Navigator = document.getElementById('adminNavigator');
        let links = document.querySelectorAll('#adminNavigator li a span');
        let adminRestSection = document.getElementById('adminFaqSection');
        // let adminDashBoardSection = document.getElementById('adminMainSection');
        links.forEach(curr => {
            curr.classList.toggle('active');
        })
        Navigator.classList.toggle('active');
        adminRestSection.classList.toggle('active');
        // adminDashBoardSection.classList.toggle('active');
        console.log(true);
    }
    </script>
    <script>
    document.getElementById('submitQueryBtn').addEventListener('click', () => {
        let pushQueryForm = document.getElementById('pushQueryForm').innerHTML;
        let question = document.getElementById('Query').value.trim();
        let answer = document.getElementById('Response').value.trim();
        if (question.length > 0 && answer.length > 0) {
            $.ajax({
                url: 'php/pushFaqSection.php',
                method: 'POST',
                data: {
                    question: question,
                    answer: answer
                },
                success: function(data) {
                    document.getElementById('flyContainer').innerHTML = data;

                    setTimeout(() => {
                        document.getElementById('flyContainer').innerHTML = "";
                    }, 6500);

                }
            });
        }
    });
    </script>
</body>

</html>