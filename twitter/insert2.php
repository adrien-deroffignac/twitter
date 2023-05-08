<?php require "template/database.php";

$insert = $database->prepare(
  "INSERT INTO inscription (nom,pseudo,mail,mdp,photo) VALUES (:nom, :pseudo, :mail, :mdp, :photo) "
);
$insert->execute([
  "nom" => $_POST["nom"],
  "pseudo" => $_POST["pseudo"],
  "mail" => $_POST["mail"],
  "mdp" => $_POST["mdp"],
  "photo" => $_POST["photo"],
]);

header("Location: index.php");
