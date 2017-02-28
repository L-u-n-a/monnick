<?php

include_once 'PDO.php';

function getContactText() {
  $query = "SELECT text FROM contact WHERE id = 1  LIMIT 1;";
  $statement = connect()->prepare($query);

  try {
    $statement->execute();
    $music = $statement->fetchObject();

    return $music;
  }
  catch(Exception $e) {
    echo "manage_contact_controller.php error in ---> getContactText(). Error message + " . $e->getMessage();
  }
}

function updateContactText($text) {
  $query = "UPDATE contact SET text = :text WHERE id = 1;";
  $statement = connect()->prepare($query);

  try {
      $statement->execute(['text' => $text]);
      header("Location: ../manage_contact.php");
  }
  catch(Exception $e) {
      echo "manage_contact_controller.php error in ---> updateContactText(). Error message + " . $e->getMessage();
  }
}

?>
