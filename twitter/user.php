<?php require "template/database.php";

$insert = $database->prepare(
  "SELECT * FROM tweets INNER JOIN inscription ON tweets.user_id = inscription.id"
);
$insert->execute();

header("Location: index.php");
