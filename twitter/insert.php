<?php require "template/database.php";

$insert = $database->prepare(
  "INSERT INTO tweets (tweet, user_id) VALUES (:tweeter, :user_id)"
);
$insert->execute([
  "tweeter" => $_POST["tweeter"],
  "user_id" => 1,
]);

header("Location: index.php");
