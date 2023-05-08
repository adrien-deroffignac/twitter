<?php
require "template/database.php";

$requete2 = $database->prepare("SELECT * FROM inscription ");

$requete2->execute();

$AllInscriptions = $requete2->fetchAll(PDO::FETCH_ASSOC);
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
        <h1 class="inscription">Inscription</h1>
        <br>
        <form class="form" method="POST" action="insert2.php">
            <br>
            <input type="text" name="nom" placeholder="Nom" required/>
            <br><br>
            <input type="text" name="pseudo" placeholder="Pseudo" required/>
            <br><br>
            <input type="text" name="mail" placeholder="Email@gmail.com" required/>
            <br><br>
            <input type="password" name="mdp" placeholder="Mot de passe" required/>
            <br><br>
            <input class="photo" type="hidden" name="photo" value="https://picsum.photos/200"/>    
            <br>
            <button type="submit">S'inscrire</button>
        </form>


    
    </main>
</body>
</html>