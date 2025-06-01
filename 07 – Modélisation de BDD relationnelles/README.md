# Modélisattion de BDD relationnelles

## Description : 

Dans ce document, vous retrouverez mon rendu final ainsi que la vidéo explicative.

## Lien vidéo : 

https://www.loom.com/share/15dfde0490d349de866683ff8b83ff4e

## Nom Prénom : 

Maxime Lebas

## BDD Table : 

CREATE TABLE commandes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nom VARCHAR(100),
  prenom VARCHAR(100),
  adresse TEXT,
  prix FLOAT,
  statut VARCHAR(50),
  date_creation DATETIME DEFAULT CURRENT_TIMESTAMP
);
