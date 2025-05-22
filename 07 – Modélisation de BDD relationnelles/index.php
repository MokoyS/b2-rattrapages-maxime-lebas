<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mongoo - Liste des commandes</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>

    <main>
        <img class="logo" src="img/mongoo-logo.png" alt="">
        <div class="header">
            <h2>Liste des commandes </h2>
            <a class="new" href="add.php"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus-icon lucide-plus"><path d="M5 12h14"/><path d="M12 5v14"/></svg></a>
        </div>
        <table>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Adresse</th>
                <th>Prix (€)</th>
                <th>Statut</th>
                <th>Date</th>
                <th>Modifier statut</th>
            </tr>

            <?php
            $res = $pdo->query("SELECT * FROM commandes ORDER BY date_creation DESC");
            foreach ($res as $commande):
                $class = match($commande['statut']) {
                    "Commande prise en compte" => "status-gris",
                    "En cours" => "status-bleu",
                    "Réalisée" => "status-vert",
                    "Annulée" => "status-rouge",
                    default => "Veuillez choisir un statut",
                };
            ?>
            <tr>
                <td class="<?= $class ?>"><?= htmlspecialchars($commande['nom']) ?></td>
                <td class="<?= $class ?>"><?= htmlspecialchars($commande['prenom']) ?></td>
                <td class="<?= $class ?>"> <?= nl2br(htmlspecialchars($commande['adresse'])) ?></td>
                <td class="<?= $class ?>"><?= $commande['prix'] ?> €</td>
                <td class="<?= $class ?>"><?= $commande['statut'] ?></td>
                <td class="<?= $class ?>"><?= $commande['date_creation'] ?></td>
                <td>
                    <form method="POST" action="update.php">
                        <input type="hidden" name="id" value="<?= $commande['id'] ?>">
                        <select name="statut">
                            <option <?= $commande['statut'] == 'Commande prise en compte' ? 'selected' : '' ?>>Commande prise en compte</option>
                            <option <?= $commande['statut'] == 'En cours' ? 'selected' : '' ?>>En cours</option>
                            <option <?= $commande['statut'] == 'Réalisée' ? 'selected' : '' ?>>Réalisée</option>
                            <option <?= $commande['statut'] == 'Annulée' ? 'selected' : '' ?>>Annulée</option>
                        </select>
                        <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-refresh-ccw-icon lucide-refresh-ccw"><path d="M21 12a9 9 0 0 0-9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"/><path d="M3 3v5h5"/><path d="M3 12a9 9 0 0 0 9 9 9.75 9.75 0 0 0 6.74-2.74L21 16"/><path d="M16 16h5v5"/></svg></button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </main>

</body>
</html>
