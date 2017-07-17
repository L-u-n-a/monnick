<?php

session_start();

if(!isset($_SESSION['id'])) {
    header("Location: user.php");
}

include_once 'controller/manage_music_controller.php';

include_once 'controller/upload.php';

include_once "layout/header.php";

include_once "layout/left.php";

include_once "layout/navbar.php";

?>

<?php

/**
* Check the data that was inserted into the form.
*/
$nameErr = $typeErr = $embed_linkErr = "";
$name = $type = $embed_link = "";
$allTrue = true;

if($_SERVER["REQUEST_METHOD"] == "POST") {
  if(!empty($_POST['id'])) {
    $id = test_input($_POST['id']);
    deleteMusic($id);
  }
  else {
    if(empty($_POST['name'])) {
      $nameErr = "Name is required";
      $allTrue = false;
    } else {
     $name = test_input($_POST['name']);
    }
    if(empty($_POST['type'])) {
      $typeErr = "Type required";
      $allTrue = false;
    } else {
      $type = test_input($_POST['type']);
    }
    if(empty($_POST['embed_link'])) {
      $embed_linkErr = "Link required";
      $allTrue = false;
    } else {
      $embed_link = $_POST['embed_link'];
    }

    if($allTrue) {
      addMusic($name, $type, $embed_link);
    }
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);

  return $data;
}
?>

<div class="clearfix">
    <div class="col-xs-12 col-sm-12 col-md-12 track">
        <!--Manage Music-->
        <div class="col-xs-3 col-sm-3 col-md-3 track">
          <!--Reserved-->
        </div>

        <!-------------------Add new music------------------->
        <div class="col-xs-12 col-sm-12 col-md-6 track">
          <h3 class="manage-music-header">Add new music</h3>
          <form action="controller/upload.php" method="post" enctype="multipart/form-data">

            <input class="form-control" type="text" name="name" placeholder="Track name" required/>

            <p class="form-item-margin">Upload image</p>
            <input class="btn btn-default" type="file" name="fileToUpload" id="fileToUpload" required>

            <p class="form-item-margin">Upload track/set</p>
            <input class="btn btn-default" type="file" name="musicToUpload" id="musicToUpload" required>

            <div class="form-item-margin">
              <label class="btn btn-default">
                <input type="radio" name="type" value="track" required/> Track
              </label>
              <label class="btn btn-default">
                <input type="radio" name="type" value="set" required/> Set
              </label>
            </div>

            <input class="submit-margin btn btn-primary" type="submit" value="Upload" name="submit">
          </form>
        </div>

        <div class="col-xs-3 col-sm-3 col-md-3 track">
          <!--Reserved-->
        </div>
    </div>

    <!-------------------List of existing music------------------->
    <div class="col-xs-12 col-sm-12 col-md-12 track">
      <div class="col-xs-3 col-sm-3 col-md-3 track">
        <!--Reserved-->
      </div>

      <div class="col-xs-12 col-sm-12 col-md-6 track">
        <h3 class="manage-music-header extra-margin-top">Existing tracks</h3>
        <form action="manage_music.php" method="post">
          <table class="manage-music-list">
          <?php
            $music = getAllMusic();

            foreach($music as $value) {
              echo
              '<tr>
                <td> '. $value->name .' </td>
                <td><button class="btn btn-main btn-danger" type="submit" name="id" value="' . $value->id . '">Remove</button></td>
              </tr>';
            }
          ?>
        </table>
      </div>

      <div class="col-xs-3 col-sm-3 col-md-3 track">
        <!--Reserved-->
      </div>
    </div>

</div>

<?php

include_once "layout/footer.php";

include_once "layout/right.php";

include_once "layout/styles.php";

?>
