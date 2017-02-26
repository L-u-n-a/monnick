<?php
    session_start();
?>

<!-------------------Navigation Bar------------------->
<div class="clearfix">

    <?php

    if(isset($_SESSION['id'])) {

        echo "<div class='welcome'>";
        $welcome = "Hello " . $_SESSION['username'];
        echo "<p>$welcome - <a href='logout.php'>Logout</a> - <a href='contact.php'>Edit Contact</a> - <a href='manage_music.php'>Manage music</a></p>";
        echo "</div>";
    }
    ?>

    <nav class="navbar">
        <p><a href="../index.php">Home</a></p>

        <div class="dropdown">
            <p>Music</p>
            <div class="dropdown-content">
                <ol>
                    <li><a href="tracks.php">Tracks</a></li>
                    <li><a href="sets.php">Sets</a></li>
                </ol>
            </div>
        </div>

        <p><a href="../contact.php">Contact</a></p>
    </nav>
    <br />
    <br />
</div>

<!-------------------Logo------------------->
<div class="clearfix">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <img class="logo" src="images/monnick-logo.jpg">
    </div>
</div>

<!-------------------Divider------------------->
<div class="clearfix">
    <div class="col-xs-12 col-sm-12 col-md-12 divide">
        <img src="images/header-divider2.png">
    </div>
</div>
