<?php

include_once 'PDO.php';

  $name       = $_POST['name'];
  $type       = $_POST['type'];
  $embed_link = $_POST['embed_link'];

  addMusic($name, $type, $embed_link);

  function addMusic($name, $type, $embed_link) {
    $query = "INSERT INTO music(name, type, embed_link) VALUES (:name, :type, :embed_link);";

    $statement = connect()->prepare($query);

    try {
        $statement->execute(['name' => $name, 'type' => $type, 'embed_link' => $embed_link]);
        header("Location: ../manage_music.php");
    }
    catch(Exception $e) {
        echo "manage_music_controller.php error. Error message + " . $e->getMessage();
    }
  }

?>
