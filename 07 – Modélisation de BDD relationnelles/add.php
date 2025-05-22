<?php include 'db.php'; ?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $adresse = $_POST['adresse'];
    $prix = rand(10, 100);
    $statut = 'Commande prise en compte';

    $stmt = $pdo->prepare("INSERT INTO commandes (nom, prenom, adresse, prix, statut) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$nom, $prenom, $adresse, $prix, $statut]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="add.css">
</head>
<body>
    <main class="add">
        <h2>Ajouter une commande</h2>
        <div class="form-container">
            <form method="POST">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" required>
            </div>
            
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" id="prenom" name="prenom" required>
            </div>
            
            <div class="form-group">
                <label for="adresse">Adresse</label>
                <textarea id="adresse" name="adresse" required></textarea>
            </div>
            
            <div class="form-group">
                <button type="submit">Valider la commande</button>
            </div>
            </form>
        </div>
    </main>
</body>
</html>
