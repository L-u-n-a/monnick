<?php

include_once 'controller/manage_music_controller.php';

include_once "layout/header.php";

include_once "layout/left.php";

include_once "layout/navbar.php";

?>

<!-------------------Tracks------------------->
<div class="clearfix">
    <div class="col-xs-12 col-sm-12 col-md-12 track">
        <!--Manage Music-->
        <div class="col-xs-3 col-sm-3 col-md-3 track">
          <!--Reserved-->
        </div>

        <div class="col-xs-3 col-sm-3 col-md-3 track">
          <p>Add new track</p>
          <form action="manage_music.php" method="post">
            <input type="text" name="name" placeholder="Track name" />
            <br />
            <input type="radio" name="type" value="track" /> Track<br />
            <input type="radio" name="type" value="set" /> Set<br />
            <br />
            <textarea name="embed_link" rows="5" cols="50" placeholder="Soundcloud Embed Link"></textarea>
            <button class="btn btn-main btn-primary" type="submit" name="submit" value="submit">Add Track</button>
          </form>
        </div>

        <div class="col-xs-3 col-sm-3 col-md-3 track">
          <!--Reserved-->
        </div>
    </div>
</div>

<?php
if(isset($_POST['submit'])) {
  $name       = $_POST['name'];
  $type       = $_POST['type'];
  $embed_link = $_POST['embed_link'];

  addMusic($name, $type, $embed_link);
}
?>

<?php

include_once "layout/footer.php";

include_once "layout/right.php";

include_once "layout/styles.php";

?>
