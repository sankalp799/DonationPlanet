<?php
include '../php/connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" text="text/css" href="../css/normalize.css" />
    <link rel="stylesheet" text="text/css" href="../css/Grid.css" />
    <link rel="stylesheet" text="text/css" href="../css/rest.css" />
    <link rel="stylesheet" text="text/css" href="../css/ionicons.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;1,300&display=swap" rel="stylesheet" />
    <title>Document</title>
</head>

<body>
    <header>
        <?php require 'navbar.php'?>
    </header>

    <!-- SECTION PART CONTAINS ALL QUESTIONS AND ANSWERS -->
    <section class="row FAQ-section">
        <!--
        <form class="row faq-navigator-form">
            <input type="text" name="search-bar" class="col span-1-of-2 Search-Bar" placeholder="Search FAQ" />
            <button class="search-bar-icon">
                <ion-icon name="search"></ion-icon>
            </button>
        </form>
    -->
        <div class="accordion">


            <?php
                if($result = $sqlConnection->query('SELECT *FROM faq;')){
                    while($row = $result->fetch_array()){
                        echo '<div class="accordion-item">
                        <div class="accordion-item-question">'.$row[0].'</div>
        
                        <div class="accordion-item-content">
                            <div class="accordion-item-content-answer-bar"></div>
                            <div class="accordion-item-content-answer">'
                                .$row[1].
                            '</div>
                        </div>
                    </div>';
                    }
                }
            ?>
            <!--
            <div class="accordion-item">
                <div class="accordion-item-question">What does Helping hand do?</div>

                <div class="accordion-item-content">
                    <div class="accordion-item-content-answer-bar"></div>
                    <div class="accordion-item-content-answer">
                        We are acting as bridge between Donators and Recievers.It is just a platform and nothing much.
                        We are acting as bridge between Donators and Recievers.It is just a platform and nothing much.
                        We are acting as bridge between Donators and Recievers.It is
                        just a platform and nothing much. We are acting as bridge We are acting as bridge between
                        Donators and Recievers.It is just a platform and nothing much. We are acting as bridge between
                        Donators and Recievers.It is just a platform
                        and nothing much. We are acting as bridge between Donators and Recievers. We are acting as
                        bridge between Donators and Recievers.It is just a platform and nothing much. We are acting as
                        bridge between Donators and Recievers.It
                        is just a platform and nothing much. We are acting as bridge between Donators and Recievers.It
                        is just a platform and nothing much. We are acting as bridge We are acting as bridge between
                        Donators and Recievers.It is just a platform
                        and nothing much. We are acting as bridge between Donators and Recievers.It is just a platform
                        and nothing much. We are acting as bridge between Donators and Recievers. We are acting as
                        bridge between Donators and Recievers.It
                        is just a platform and nothing much. We are acting as bridge between Donators and Recievers.It
                        is just a platform and nothing much. We are acting as bridge between Donators and Recievers.It
                        is just a platform and nothing much.
                        We are acting as bridge We are acting as bridge between Donators and Recievers.It is just a
                        platform and nothing much. We are acting as bridge between Donators and Recievers.It is just a
                        platform and nothing much. We are acting
                        as bridge between Donators and Recievers. We are acting as bridge between Donators and
                        Recievers.It is just a platform and nothing much. We are acting as bridge between Donators and
                        Recievers.It is just a platform and nothing much.
                        We are acting as bridge between Donators and Recievers.It is just a platform and nothing much.
                        We are acting as bridge between Donators and Recievers.It is just a platform and nothing much.
                    </div>
                </div>
            </div>
-->
        </div>
    </section>

    <footer>
        <div class="row footer-section">
            <div class="col span-1-of-4 footer-section-heading">
                <h3 class="footer-title">the helping hand</h3>
                <p class="footer-section-heading-para">
                    &copy; 2021. all rights reserved
                </p>
            </div>
            <div class="col span-1-of-4 footer-section-follow">
                <p class="footer-section-subheading">Follow</p>
                <ul class="footer-section-links">
                    <li><a>Twitter</a></li>
                    <li><a>Facebook</a></li>
                    <li><a>Instagram</a></li>
                </ul>
            </div>
            <div class="col span-1-of-4 footer-section-legals">
                <p class="footer-section-subheading">Legal</p>
                <ul class="footer-section-links">
                    <li><a>terms</a></li>
                    <li><a>policy</a></li>
                </ul>
            </div>
            <div class="col span-1-of-4 footer-section-contact">
                <p class="footer-section-subheading">Contact</p>
                <ul class="footer-section-contact-links">
                    <li><a>helpinghand@gmail.com </a></li>
                    <li><a>0761-4079191</a></li>
                </ul>
            </div>
        </div>
    </footer>
    <script type="text/javascript">
    const accordionItemQuestions = document.querySelectorAll(
        ".accordion-item-question"
    );

    accordionItemQuestions.forEach((accordionItemQuestion) => {
        accordionItemQuestion.addEventListener("click", (event) => {
            accordionItemQuestion.classList.toggle("active");
            const accordionItemContent = accordionItemQuestion.nextElementSibling;
            console.log(accordionItemContent);
            if (accordionItemQuestion.classList.contains("active")) {
                accordionItemContent.style.maxHeight =
                    accordionItemContent.scrollHeight + "px";
                accordionItemQuestions.forEach((restItems) => {
                    const temp = restItems.nextElementSibling;
                    if (accordionItemContent != temp) {
                        restItems.classList.remove("active");
                        temp.style.maxHeight = 0;
                    }
                });
            } else {
                accordionItemContent.style.maxHeight = 0;
            }
        });
    });
    </script>
    <script defer src="https://kit.fontawesome.com/27878f914f.js" crossorigin="anonymous"></script>

    <script defer src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
</body>

</html>