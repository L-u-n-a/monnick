<?php

include_once 'controller/login.php';

include_once "layout/header.php";

include_once "layout/left.php";

include_once "layout/navbar.php";

?>

<!--User Login Form-->
<div class="clearfix">
    <div class="col-xs-12 col-sm-12 col-md-12 track">

      <div class="col-xs-2 col-sm-2 col-md-2 track">
        <!--Reserved-->
      </div>

      <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-1 track">
        <form action="user.php" method="post">
            <input class="form-control" name="username" type="text" placeholder="Username" required />
            <input class="form-control form-item-margin" name="password" type="password" placeholder="Password" required />
            <input class="btn btn-primary form-item-margin" type="submit" name="login" value="Login" />
        </form>
      </div>

        <div class="col-xs-2 col-sm-2 col-md-2 track">
          <!--Reserved-->
        </div>

    </div>
</div>

<?php
if(isset($_POST['login'])) {
  if(!empty($_POST['username']) && !empty($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    attemptLogin($username, $password);
  }
  else {
    echo "Please fill in a username and password!";
    $input = false;
  }
}


function clean_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);

  return $data;
}
?>

<?php

include_once "layout/footer.php";

include_once "layout/right.php";

include_once "layout/styles.php";

?>
