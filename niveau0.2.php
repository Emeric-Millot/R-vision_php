<?php
if (isset($_POST["age"])) {
    $age = (int)$_POST["age"]; // On récupère l'âge saisi par l'utilisateur et on le convertit en entier
    if ($age >= 18) {
        echo 'Vous êtes majeur';
    } else {
        echo 'Vous êtes mineur';
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vérification de l'âge</title>
</head>
<body>
    <div class="form">
        <form action="" method="POST">
            Prénom: <input type="text" name="name" /><br>
            Âge: <input type="number" name="age" /><br>
            <input type="submit" value="Envoyer"/>
        </form>
        
        <?php
        if (isset($_POST["name"])) {
            $p = htmlspecialchars($_POST["name"]); // Sécurise la saisie utilisateur pour éviter les injections de code
            echo 'Bienvenue ' . $p . '<br>';
        }
        ?>
    </div>
</body>
</html>
