<?php

try {
    $handler = new PDO('mysql:host=localhost;dbname=monnick','root','root');
    $handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $handler;
}
catch(PDOException $e) {
    echo "PDO.php -> PDOexception e = " . $e->getMessage();
    die();
}

return $handler;