<?php

class Bibliotheque
{
    private array $livres = [];

    public function ajouter(Livre $l): void
    {
        if ($this->trouver($l->getIsbn()) !== null) {
            throw new Exception(
                "Un livre avec cet ISBN existe déjà."
            );
        }

        $this->livres[] = $l;
    }

    public function trouver(string $isbn): ?Livre
    {
        foreach ($this->livres as $livre) {
            if ($livre->getIsbn() === $isbn) {
                return $livre;
            }
        }

        return null;
    }

   
}