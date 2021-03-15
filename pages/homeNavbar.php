<nav class="row home-nav" id="homeNav">
    <ul class="main-nav-list">
        <li><a href="../index.php">Home</a></li>
        <li><a href="../pages/donation.php">Donations</a></li>
        <li><a href="../pages/NGOs.php">NGOs</a></li>
        <li><a href="../pages/faq.php">FAQ</a></li>
    </ul>

    <?php
        session_start();
        if(empty($_SESSION['type'])){
            echo '<ul class="user-list">
            <li><a href="../pages/registration.php" class="btn signup-btn">Sign Up</a></li>
            <li><a href="../pages/login.php" class="btn login-btn">Login</a></li>
        </ul>';
        }else{
            echo '<div class="user-profile">
            <ion-icon class="profile-icon" name="contact"></ion-icon><br />
            <h5>'. $_SESSION['username'] .'</h5>
            <a href="../php/logout.php">logout</a>
        </div>';
        }
    ?>
</nav>

<div class="row nav-main-quote">
    <h1 class="logo">The Helping Hand</h1>
    <h5>the Measure of life is not duration.<br />But it's donation</h5>
    <br />
    <br />
    <a class="btn donate-btn" href="../pages/donation_form.php">
        <svg width="300px" height="69px" viewBox="1 1 240 69" class="border">
            <polyline points="215,1 215,69 -21,69 -21,3 215,3" class="bg-line" />
            <polyline points="215,1 215,69 -21,69 -21,3 215,3" class="hl-line" />
        </svg> Donate
    </a>
</div>