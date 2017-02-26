<?php

include_once "controller/manage_music_controller.php";

include_once "layout/header.php";

include_once "layout/left.php";

include_once "layout/navbar.php";

?>

<!-------------------Sets------------------->
<div class="clearfix">
    <div class="col-xs-12 col-sm-12 col-md-12 track">
        <!--Music-->
        <?php
          $sets = getAllSets();

          foreach($sets as $value) {
            echo "<h4>" . $value->name . "</h4>";
            echo $value->embed_link;
          }
        ?>
    </div>
</div>

<?php

include_once "layout/footer.php";

include_once "layout/right.php";

include_once "layout/styles.php";

?>
