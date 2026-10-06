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
}
