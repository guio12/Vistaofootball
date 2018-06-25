<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Equipes
 *
 * @ORM\Table(name="equipes")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EquipesRepository")
 */
class Equipes
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Joueurs", mappedBy="equipeId")
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Matchs", mappedBy="equipe1Id")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="entraineur_id", type="integer")
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Entraineurs", inversedBy="id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $entraineurId;

    /**
     * @var string
     *
     * @ORM\Column(name="entraineur_nom_club", type="string", length=32)
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Entraineurs", inversedBy="nomClub")
     * @ORM\JoinColumn(nullable=false)
     */
    private $entraineurNomClub;

    /**
     * @var string
     *
     * @ORM\Column(name="championnat", type="string", length=32)
     */
    private $championnat;

    /**
     * @var string
     *
     * @ORM\Column(name="categorie", type="string", length=32)
     */
    private $categorie;

    /**
     * @var int
     *
     * @ORM\Column(name="num_equipe", type="integer")
     */
    private $numEquipe;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set entraineurId.
     *
     * @param int $entraineurId
     *
     * @return Equipes
     */
    public function setEntraineurId($entraineurId)
    {
        $this->entraineurId = $entraineurId;

        return $this;
    }

    /**
     * Get entraineurId.
     *
     * @return int
     */
    public function getEntraineurId()
    {
        return $this->entraineurId;
    }

    /**
     * Set entraineurNomClub.
     *
     * @param string $entraineurNomClub
     *
     * @return Equipes
     */
    public function setEntraineurNomClub($entraineurNomClub)
    {
        $this->entraineurNomClub = $entraineurNomClub;

        return $this;
    }

    /**
     * Get entraineurNomClub.
     *
     * @return string
     */
    public function getEntraineurNomClub()
    {
        return $this->entraineurNomClub;
    }

    /**
     * Set championnat.
     *
     * @param string $championnat
     *
     * @return Equipes
     */
    public function setChampionnat($championnat)
    {
        $this->championnat = $championnat;

        return $this;
    }

    /**
     * Get championnat.
     *
     * @return string
     */
    public function getChampionnat()
    {
        return $this->championnat;
    }

    /**
     * Set categorie.
     *
     * @param string $categorie
     *
     * @return Equipes
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie.
     *
     * @return string
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set numEquipe.
     *
     * @param int $numEquipe
     *
     * @return Equipes
     */
    public function setNumEquipe($numEquipe)
    {
        $this->numEquipe = $numEquipe;

        return $this;
    }

    /**
     * Get numEquipe.
     *
     * @return int
     */
    public function getNumEquipe()
    {
        return $this->numEquipe;
    }
}
