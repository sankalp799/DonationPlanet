<nav class="row home-nav">
    <ul class="main-nav-list">
        <li><a href="../index.php">Home</a></li>
        <li><a href="../pages/donation.php">Donations</a></li>
        <li><a href="../pages/NGOs.php">NGOs</a></li>
        <li><a href="../pages/faq.php">FAQ</a></li>
    </ul>

    <?php
        
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