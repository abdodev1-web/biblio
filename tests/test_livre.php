<?php

$livre = new Livre(
    '9782100545261',
    'Introduction à l algorithmique',
    'Cormen'
);

verifier(
    $livre->getIsbn() === '9782100545261',
    'ISBN correct'
);

verifier(
    $livre->getTitre() === 'Introduction à l algorithmique',
    'Titre correct'
);

verifier(
    $livre->getAuteur() === 'Cormen',
    'Auteur correct'
);

$livreIsbn10 = new Livre(
    '1234567890',
    'Test ISBN 10',
    'Auteur test'
);

verifier(
    $livreIsbn10->getIsbn() === '1234567890',
    'Un ISBN de 10 chiffres est accepte'
);

verifier(
    $livre->estDisponible(),
    'Un nouveau livre est disponible'
);

$livre->emprunter();

verifier(
    !$livre->estDisponible(),
    'Après emprunt, le livre est indisponible'
);

$exception = false;

try {
    $livre->emprunter();
} catch (Exception $e) {
    $exception = true;
}

verifier(
    $exception,
    'Impossible d emprunter deux fois le même livre'
);

$livre->rendre();

verifier(
    $livre->estDisponible(),
    'Après retour, le livre est disponible'
);

$exception = false;

try {
    new Livre('123', 'Livre invalide', 'Auteur');
} catch (InvalidArgumentException $e) {
    $exception = true;
}

verifier(
    $exception,
    'Un ISBN invalide provoque une exception'
);

verifier(
    strpos((string) $livre, 'Introduction') !== false,
    '__toString contient le titre du livre'
);
