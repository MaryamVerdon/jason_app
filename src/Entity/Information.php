<?php

namespace App\Entity;

use App\Repository\InformationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InformationRepository::class)
 */
class Information
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $role;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $faiblesse;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $pt_fort;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $rang;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $competence;

    /**
     * @ORM\Column(type="integer")
     */
    private $annee_exp;

    /**
     * @ORM\OneToOne(targetEntity=Personne::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $personne;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function getFaiblesse(): ?string
    {
        return $this->faiblesse;
    }

    public function setFaiblesse(string $faiblesse): self
    {
        $this->faiblesse = $faiblesse;

        return $this;
    }

    public function getPtFort(): ?string
    {
        return $this->pt_fort;
    }

    public function setPtFort(string $pt_fort): self
    {
        $this->pt_fort = $pt_fort;

        return $this;
    }

    public function getRang(): ?string
    {
        return $this->rang;
    }

    public function setRang(string $rang): self
    {
        $this->rang = $rang;

        return $this;
    }

    public function getCompetence(): ?string
    {
        return $this->competence;
    }

    public function setCompetence(string $competence): self
    {
        $this->competence = $competence;

        return $this;
    }

    public function getAnneeExp(): ?int
    {
        return $this->annee_exp;
    }

    public function setAnneeExp(int $annee_exp): self
    {
        $this->annee_exp = $annee_exp;

        return $this;
    }

    public function getPersonne(): ?Personne
    {
        return $this->personne;
    }

    public function setPersonne(Personne $personne): self
    {
        $this->personne = $personne;

        return $this;
    }
}
