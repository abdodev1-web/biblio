<?php

$membre = new Membre(1, 'Ahmed');

verifier(
    $membre->getId() === 1,
    'Identifiant du membre correct'
);

verifier(
    $membre->getNom() === 'Ahmed',
    'Nom du membre correct'
);

$livre1 = new Livre(
    '1111111111',
    'Livre 1',
    'Auteur 1'
);

$livre2 = new Livre(
    '2222222222',
    'Livre 2',
    'Auteur 2'
);

$livre3 = new Livre(
    '3333333333',
    'Livre 3',
    'Auteur 3'
);

$livre4 = new Livre(
    '4444444444',
    'Livre 4',
    'Auteur 4'
);

$membre->emprunter($livre1);

verifier(
    count($membre->getEmprunts()) === 1,
    'Le membre possède un emprunt'
);

verifier(
    !$livre1->estDisponible(),
    'Le livre emprunté devient indisponible'
);

$membre->emprunter($livre2);
$membre->emprunter($livre3);

verifier(
    count($membre->getEmprunts()) === 3,
    'Le membre peut emprunter trois livres'
);

$exception = false;

try {
    $membre->emprunter($livre4);
} catch (Exception $e) {
    $exception = true;
}

verifier(
    $exception,
    'Impossible d emprunter plus de trois livres'
);

$membre->rendre($livre1);

verifier(
    count($membre->getEmprunts()) === 2,
    'Le retour retire le livre des emprunts'
);

verifier(
    $livre1->estDisponible(),
    'Le livre rendu redevient disponible'
);