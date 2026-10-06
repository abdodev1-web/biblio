<?php

$bibliotheque = new Bibliotheque();

$livre1 = new Livre(
    '9782100545261',
    'Algorithmique',
    'Cormen'
);

$livre2 = new Livre(
    '1234567890',
    'PHP moderne',
    'Dupont'
);

$bibliotheque->ajouter($livre1);
$bibliotheque->ajouter($livre2);

verifier(
    $bibliotheque->compter() === 2,
    'La bibliothèque contient deux livres'
);

verifier(
    $bibliotheque->trouver('9782100545261') === $livre1,
    'Recherche par ISBN'
);

verifier(
    $bibliotheque->trouver('9999999999') === null,
    'ISBN inexistant retourne null'
);

verifier(
    count($bibliotheque->tous()) === 2,
    'tous retourne les deux livres'
);

$resultats = $bibliotheque->rechercher('algo');

verifier(
    count($resultats) === 1,
    'Recherche dans le titre'
);

$resultats = $bibliotheque->rechercher('DUPONT');

verifier(
    count($resultats) === 1,
    'Recherche auteur sans tenir compte de la casse'
);

$exception = false;

try {
    $bibliotheque->ajouter(
        new Livre(
            '9782100545261',
            'Copie',
            'Autre auteur'
        )
    );
} catch (Exception $e) {
    $exception = true;
}

verifier(
    $exception,
    'Impossible d ajouter deux livres avec le même ISBN'
);
