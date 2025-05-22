<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $statut = $_POST['statut'];

    $stmt = $pdo->prepare("UPDATE commandes SET statut = ? WHERE id = ?");
    $stmt->execute([$statut, $id]);

    header("Location: index.php");
    exit;
}
