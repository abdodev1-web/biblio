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
    
    public function rendre(Livre $l): void
    {
        $index = null;

        foreach ($this->emprunts as $i => $livre) {
            if ($livre === $l) {
                $index = $i;
                break;
            }
        }

        if ($index === null) {
            throw new Exception(
                "Ce livre n'est pas emprunté par ce membre."
            );
        }

        $l->rendre();

        array_splice($this->emprunts, $index, 1);
    }
}
