<?php

include_once "controller/manage_contact_controller.php";

include_once "layout/header.php";

include_once "layout/left.php";

include_once "layout/navbar.php";

?>

<!-------------------Display Contact Information------------------->
<div class="clearfix">
    <div class="col-xs-12 col-sm-12 col-md-12 track">
        <h1 style="font-size: 2.2em; text-align: center; line-height: 2em;">About</h1><br />
        <p style="line-height: 2em; letter-spacing: 0.05em; word-spacing: 0.2em; font-size: 1.1em;">

          <?php echo getContactText()->text; ?>

        </p>
        <p style="margin-top: 1em;">My <a href="https://facebook.com/monnickofficial">Facebook</a></p>
        <p>My <a href="https://soundcloud.com/monnick">Soundcloud</a></p>
    </div>
</div>

<?php

include_once "layout/footer.php";

include_once "layout/right.php";

include_once "layout/styles.php";

?>
