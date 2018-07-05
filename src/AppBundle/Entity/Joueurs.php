<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Joueurs
 *
 * @ORM\Table(name="joueurs")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\JoueursRepository")
 */
class Joueurs
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;

    /**
     * @var int
     *
     * @ORM\Column(name="equipe", type="integer")
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Equipes", inversedBy="joueur")
     * @ORM\JoinColumn(nullable=false)
     */
    public $equipe;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=32)
     */
    public $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=32)
     */
    public $nom;

    /**
     * @var int
     *
     * @ORM\Column(name="num_maillot", type="integer")
     */
    public $numMaillot;

    /**
     * @var string
     *
     * @ORM\Column(name="poste", type="string", length=8)
     */
    private $poste;


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
     * Set equipe.
     *
     * @param int $equipe
     *
     * @return Joueurs
     */
    public function setEquipe($equipe)
    {
        $this->equipe = $equipe;

        return $this;
    }

    /**
     * Get equipe.
     *
     * @return int
     */
    public function getEquipe()
    {
        return $this->equipe;
    }

    /**
     * Set prenom.
     *
     * @param string $prenom
     *
     * @return Joueurs
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom.
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set nom.
     *
     * @param string $nom
     *
     * @return Joueurs
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom.
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set numMaillot.
     *
     * @param int $numMaillot
     *
     * @return Joueurs
     */
    public function setNumMaillot($numMaillot)
    {
        $this->numMaillot = $numMaillot;

        return $this;
    }

    /**
     * Get numMaillot.
     *
     * @return int
     */
    public function getNumMaillot()
    {
        return $this->numMaillot;
    }

    /**
     * Set poste.
     *
     * @param string $poste
     *
     * @return Joueurs
     */
    public function setPoste($poste)
    {
        $this->poste = $poste;

        return $this;
    }

    /**
     * Get poste.
     *
     * @return string
     */
    public function getPoste()
    {
        return $this->poste;
    }


}
