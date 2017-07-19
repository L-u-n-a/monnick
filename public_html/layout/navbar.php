<?php
    session_start();
?>

<!-------------------Navigation Bar------------------->
<div class="clearfix">

    <?php

    if(isset($_SESSION['id'])) {

        echo "<div class='welcome'>";
        $welcome = "Hello " . $_SESSION['username'];
        echo "<p class='admin-bar'>$welcome - <a href='manage_music.php'>Manage music</a> - <a href='manage_contact.php'>Edit Contact</a> - <a href='logout.php'>Logout</a></p>";
        echo "</div>";
    }
    ?>

    <nav class="navbar">
        <p><a href="../index.php">Home</a></p>

        <div class="dropdown">
            <p>Music</p>
            <div class="dropdown-content">
                <ol>
                    <a href="tracks"><li>Tracks</li></a>
                    <a href="sets"><li>Sets</li></a>
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
        <a href="index.php"><img class="logo" src="images/monnick.png"></a>
    </div>
</div>

<!-------------------Divider------------------->
<div class="clearfix">
    <div class="col-xs-12 col-sm-12 col-md-12 divide">
        <img src="images/header-divider2.png">
    </div>
</div>
