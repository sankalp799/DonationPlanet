<nav class="row home-nav" id="homeNav">
    <ul class="main-nav-list">
        <li><a href="../index.php">Home</a></li>
        <li><a href="../pages/donation.php">Donations</a></li>
        <li><a href="../pages/NGOs.php">NGOs</a></li>
        <li><a href="../pages/faq.php">FAQ</a></li>
    </ul>

    <?php
        
        if(!isset($_SESSION['type'])){
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
    <div class="row logo">
        <svg id="logo" width="500" height="70" viewBox="0 0 713 74" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M44.5983 10.3289H26.8931V71.0642H19.6673V10.3289H2V2.93583H44.5983V10.3289Z" stroke="#fff"
                stroke-width="1" mask="url(#path-1-outside-1)" />
            <path
                d="M95.1033 71.0642H87.8018V39.5735H60.0335V71.0642H52.7699V2.93583H60.0335V32.2273H87.8018V2.93583H95.1033V71.0642Z"
                stroke="#fff" stroke-width="1" mask="url(#path-1-outside-1)" />
            <path
                d="M139.139 39.5735H115.267V63.7179H142.998V71.0642H108.004V2.93583H142.62V10.3289H115.267V32.2273H139.139V39.5735Z"
                stroke="#fff" stroke-width="1" mask="url(#path-1-outside-1)" />
            <path
                d="M213.592 71.0642H206.29V39.5735H178.522V71.0642H171.258V2.93583H178.522V32.2273H206.29V2.93583H213.592V71.0642Z"
                stroke="#fff" stroke-width="1" mask="url(#path-1-outside-1)" />
            <path
                d="M257.627 39.5735H233.756V63.7179H261.486V71.0642H226.492V2.93583H261.108V10.3289H233.756V32.2273H257.627V39.5735Z"
                stroke="#fff" stroke-width="1" mask="url(#path-1-outside-1)" />
            <path d="M277.829 63.7179H303.933V71.0642H270.528V2.93583H277.829V63.7179Z" stroke="#fff" stroke-width="2"
                mask="url(#path-1-outside-1)" />
            <path
                d="M319.482 44.393V71.0642H312.218V2.93583H332.534C338.562 2.93583 343.278 4.83868 346.683 8.64438C350.113 12.4501 351.828 17.488 351.828 23.758C351.828 30.3712 350.151 35.4715 346.796 39.0588C343.467 42.615 338.688 44.393 332.458 44.393H319.482ZM319.482 37.0468H332.534C336.418 37.0468 339.394 35.9238 341.462 33.6778C343.53 31.4006 344.564 28.1252 344.564 23.8516C344.564 19.7963 343.53 16.5521 341.462 14.119C339.394 11.6858 336.557 10.4225 332.95 10.3289H319.482V37.0468Z"
                stroke="#fff" stroke-width="1" mask="url(#path-1-outside-1)" />
            <path d="M368.89 71.0642H361.626V2.93583H368.89V71.0642Z" stroke="#fff" stroke-width="2"
                mask="url(#path-1-outside-1)" />
            <path
                d="M424.54 71.0642H417.238L389.508 18.5642V71.0642H382.207V2.93583H389.508L417.314 55.6698V2.93583H424.54V71.0642Z"
                stroke="#fff" stroke-width="1" mask="url(#path-1-outside-1)" />
            <path
                d="M478.109 62.127C476.243 65.4336 473.633 67.9135 470.278 69.5668C466.949 71.1889 463.065 72 458.626 72C454.137 72 450.152 70.7054 446.671 68.1163C443.191 65.496 440.492 61.7839 438.575 56.9799C436.684 52.176 435.713 46.6078 435.662 40.2754V34.3329C435.662 24.07 437.592 16.1154 441.451 10.4693C445.335 4.82308 450.782 2 457.794 2C463.544 2 468.172 3.82487 471.678 7.4746C475.184 11.0931 477.327 16.2402 478.109 22.9158H470.846C469.484 13.9006 465.146 9.39305 457.832 9.39305C452.964 9.39305 449.269 11.5143 446.747 15.7567C444.25 19.9679 442.989 26.082 442.964 34.0989V39.6671C442.964 47.3097 444.376 53.3926 447.201 57.9158C450.026 62.4078 453.847 64.6537 458.664 64.6537C461.388 64.6537 463.771 64.2794 465.814 63.5307C467.857 62.7821 469.547 61.5187 470.884 59.7406V44.4398H458.134V37.1404H478.109V62.127Z"
                stroke="#fff" stroke-width="1" mask="url(#path-1-outside-1)" />
            <path
                d="M551.805 71.0642H544.504V39.5735H516.735V71.0642H509.472V2.93583H516.735V32.2273H544.504V2.93583H551.805V71.0642Z"
                stroke="#fff" stroke-width="1" mask="url(#path-1-outside-1)" />
            <path
                d="M595.803 53.2834H572.726L567.543 71.0642H560.052L581.087 2.93583H587.442L608.514 71.0642H601.062L595.803 53.2834ZM574.92 45.8904H593.647L584.265 14.0254L574.92 45.8904Z"
                stroke="#fff" stroke-width="1" mask="url(#path-1-outside-1)" />
            <path
                d="M658.263 71.0642H650.961L623.231 18.5642V71.0642H615.929V2.93583H623.231L651.037 55.6698V2.93583H658.263V71.0642Z"
                stroke="#fff" stroke-width="1" mask="url(#path-1-outside-1)" />
            <path
                d="M671.163 71.0642V2.93583H686.712C691.504 2.93583 695.741 4.24599 699.424 6.86631C703.106 9.48663 705.943 13.2143 707.936 18.0495C709.953 22.8846 710.975 28.4372 711 34.7072V39.0588C711 45.4848 709.991 51.1154 707.973 55.9505C705.981 60.7857 703.118 64.4978 699.386 67.0869C695.678 69.676 691.353 71.0018 686.41 71.0642H671.163ZM678.427 10.3289V63.7179H686.069C691.668 63.7179 696.019 61.5655 699.121 57.2607C702.248 52.9559 703.812 46.8262 703.812 38.8717V34.8944C703.812 27.1582 702.337 21.1533 699.386 16.8797C696.46 12.5749 692.299 10.3913 686.901 10.3289H678.427Z"
                stroke="#fff" stroke-width="1" mask="url(#path-1-outside-1)" />
        </svg>
    </div>
    <div class="row main-quote-subpart">
        <h5>the Measure of life is not duration.<br />But it's donation</h5>
        <br />
        <br />
        <a class="btn donate-btn" href="../pages/donation_form.php">
            <svg width="300px" height="69px" viewBox="1 1 250 69" class="border">
                <polyline points="223,1 223,69 -21,69 -21,3 223,3" class="bg-line" />
                <polyline points="223,1 223,69 -21,69 -21,3 223,3" class="hl-line" />
            </svg> Donate
        </a>
    </div>

</div>