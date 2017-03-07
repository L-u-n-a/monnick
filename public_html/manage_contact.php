<?php

session_start();

if(!isset($_SESSION['id'])) {
    header("Location: user.php");
}

include_once 'controller/manage_contact_controller.php';

include_once "layout/header.php";

include_once "layout/left.php";

include_once "layout/navbar.php";

?>

<?php

$textErr = "";
$text = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
  if(empty($_POST['text'])) {
    $nameErr = "Text is required";
    $allTrue = false;
  } else {
   // Using nl2br will make sure the text keeps the added line brakes.
   $text = nl2br(htmlentities(test_input($_POST['text']), ENT_QUOTES, 'UTF-8'));
   updateContactText($text);
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
        <div class="col-xs-2 col-sm-2 col-md-2 track">
          <!--Reserved-->
        </div>

      <!--Manage Contact-->
      <div class="col-xs-8 col-sm-8 col-md-8 track">

        <?php
          $text = getContactText();
        ?>

        <form action="manage_contact.php" method="post">
          <textarea name="text" rows="15" cols="60"><?php echo strip_tags($text->text); ?></textarea>
          <button class="btn btn-default">Save</button>
        </form>
      </div>

      <div class="col-xs-2 col-sm-2 col-md-2 track">
        <!--Reserved-->
      </div>
    </div>

</div>

<?php

include_once "layout/footer.php";

include_once "layout/right.php";

include_once "layout/styles.php";

?>
