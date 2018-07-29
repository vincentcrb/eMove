<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TarifRepository")
 */
class Tarif
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $periode;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_debut;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_fin;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prix_heure;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prix_kilometre;

    public function getId()
    {
        return $this->id;
    }

    public function getPeriode(): ?string
    {
        return $this->periode;
    }

    public function setPeriode(?string $periode): self
    {
        $this->periode = $periode;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->date_debut;
    }

    public function setDateDebut(?\DateTimeInterface $date_debut): self
    {
        $this->date_debut = $date_debut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->date_fin;
    }

    public function setDateFin(?\DateTimeInterface $date_fin): self
    {
        $this->date_fin = $date_fin;

        return $this;
    }

    public function getPrixHeure(): ?float
    {
        return $this->prix_heure;
    }

    public function setPrixHeure(?float $prix_heure): self
    {
        $this->prix_heure = $prix_heure;

        return $this;
    }

    public function getPrixKilometre(): ?float
    {
        return $this->prix_kilometre;
    }

    public function setPrixKilometre(?float $prix_kilometre): self
    {
        $this->prix_kilometre = $prix_kilometre;

        return $this;
    }
}
