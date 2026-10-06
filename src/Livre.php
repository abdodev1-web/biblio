<?php

class Livre
{
    private string $isbn;
    private string $titre;
    private string $auteur;
    private bool $disponible;

    public function __construct(string $isbn, string $titre, string $auteur)
    {
        if (!preg_match('/^(\d{10}|\d{13})$/', $isbn)) {
            throw new InvalidArgumentException(
                "L'ISBN doit contenir 10 ou 13 chiffres."
            );
        }

        $this->isbn = $isbn;
        $this->titre = $titre;
        $this->auteur = $auteur;
        $this->disponible = true;
    }

    public function getIsbn(): string
{
    return $this->isbn;
}

public function getTitre(): string
{
    return $this->titre;
}

public function getAuteur(): string
{
    return $this->auteur;
}

public function estDisponible(): bool
{
    return $this->disponible;
}

public function emprunter(): void
{
    if (!$this->disponible) {
        throw new Exception("Le livre est déjà emprunté.");
    }

    $this->disponible = false;
}

public function rendre(): void
{
    if ($this->disponible) {
        throw new Exception("Le livre est déjà disponible.");
    }

    $this->disponible = true;
}
public function __toString(): string
{
    $etat = $this->disponible ? "disponible" : "indisponible";

    return $this->titre . " - " .
           $this->auteur . " (" .
           $this->isbn . ") - " .
           $etat;
}
}
