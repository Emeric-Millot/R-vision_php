<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Enregistrement et Affichage Utilisateur</title>
</head>
<body>
    <h2>Enregistrer les informations utilisateur</h2>

    <!-- Formulaire HTML -->
    <form method="post" action="">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required><br><br>

        <label for="age">Âge:</label>
        <input type="number" id="age" name="age" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <input type="submit" value="Enregistrer">
    </form>

    <?php
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        $nom = $_POST['nom'];
        $age = $_POST['age'];
        $email = $_POST['email'];

        
        $l = "$nom,$age,$email\n";

        
        file_put_contents("utilisateurs.txt", $l, FILE_APPEND);

        header("Location: ./niveau0.3.php?isSubmitted=1");
    }

    
    $fichier = "utilisateurs.txt";
    if (file_exists($fichier)) {
        $utilisateurs = file($fichier, FILE_IGNORE_NEW_LINES);
        if (isset($_GET["isSubmitted"])) {
            echo "<p>Utilisateur enregistré avec succès !</p>";
        }
        echo "<h2>Liste des Utilisateurs</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Nom</th><th>Âge</th><th>Email</th></tr>";

        
        foreach ($utilisateurs as $utilisateur) {
            list($nom, $age, $email) = explode(",", $utilisateur);
            echo "<tr>";
            echo "<td>" . htmlspecialchars($nom) . "</td>";
            echo "<td>" . htmlspecialchars($age) . "</td>";
            echo "<td>" . htmlspecialchars($email) . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p>Aucun utilisateur enregistré pour le moment.</p>";
    }
    ?>
</body>
</html>
