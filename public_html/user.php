<?php

include_once 'controller/PDO.php';
include_once 'controller/login.php';

include_once "layout/header.php";

include_once "layout/left.php";

include_once "layout/navbar.php";

?>

<!--User Login Form-->
<div class="clearfix">
    <div class="col-xs-12 col-sm-12 col-md-12 track">
        <form action="user.php" method="post">
            <input name="username" type="text" placeholder="Username" />
            <input name="password" type="password" placeholder="Password" />
            <input type="submit" name="login" value="Login" />
        </form>
    </div>
</div>

<?php
if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    attemptLogin($handler, $username, $password);
}
?>

<?php

include_once "layout/footer.php";

include_once "layout/right.php";

include_once "layout/styles.php";

?>

