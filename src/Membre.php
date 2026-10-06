<?php

class Membre
{
   private int $id;
    private string $nom;
    private array $emprunts = [];

    public function __construct(int $id, string $nom)
    {
        $this->id = $id;
        $this->nom = $nom;
    }

     public function getId(): int
    {
        return $this->id;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getEmprunts(): array
    {
        return $this->emprunts;
    }
    
    public function emprunter(Livre $l): void
    {
        if (count($this->emprunts) >= 3) {
            throw new Exception(
                "Un membre ne peut pas emprunter plus de trois livres."
            );
        }

        $l->emprunter();

        $this->emprunts[] = $l;
    }
}
