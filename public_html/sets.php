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
          $sets = getMusicType("set");

          foreach($sets as $value) {
            echo
            "<div class='track-background' style='background-image: url(images/" . $value->embed_link . ".jpg); background-repeat: no-repeat; background-position: right;'>
              <div class='col-xs-12 col-sm-12 col-md-5'>
                <h4>" . $value->name . "</h4>
              </div>
              <div class='audio-player'>
                <paper-audio-player src='../audio_files/" . $value->name . ".mp3' title=' " . $value->name . " 'color='#000000' preload='none'></paper-audio-player>
              </div>
            </div>";
          }
        ?>
    </div>
</div>

<?php

include_once "layout/footer.php";

include_once "layout/right.php";

include_once "layout/styles.php";

?>
