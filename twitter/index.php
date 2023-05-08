<?php
require "template/database.php";

if (!isset($_GET["datedetri"])) {
  $_GET["datedetri"] = "croissant";
}

$tri = $_GET["datedetri"];

if ($tri == "decroissant") {
  $tri = "ASC";
} elseif ($tri == "croissant") {
  $tri = "DESC";
}

$requete = $database->prepare("SELECT * FROM tweets ORDER BY date $tri");

$requete->execute();

$allTweets = $requete->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>twitter</title>
    <link rel="stylesheet" href="style.css">
</head>
<?php require "template/navigation.php"; ?>
<body>
    <main>
        <form class="form" method="POST" action="insert.php">
            <input type="hidden" name="user_id" value="1">
            <input type="text" name="tweeter" placeholder="Quoi de neuf?" required/>
            <button type="submit">Tweeter</button>
        </form>

        <form class="recherche" method="POST" action="search.php">
        <input type="text" name="search" placeholder="Rechercher" required/>
        <button type="submit">Rechercher</button>
        </form>
        

        <form method="GET">
        <select name="datedetri">
            <option value="croissant">Plus récent</option>
            <option value="decroissant" >Plus ancien</option>
        </select>
        <button type="submit">Appliquer</button>
        </form>
    <hr>

    <?php foreach ($allTweets as $tweet) { ?>
        <div>
        <br><hr>
        <p><?= $tweet["tweet"] ?></p>
<form action="delete.php" method="POST">
    <input type="hidden" name="supp" value="<?= $tweet["id"] ?>">
    <br>
    <p>Fait le <?= $tweet["date"] ?></p>
    <br>
    <button type="submit">Supprimer</button>
    <hr>
</form>
</div>

<?php } ?>
    </main>
    
</body>
</html>