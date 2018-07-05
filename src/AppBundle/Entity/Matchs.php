<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Matchs
 *
 * @ORM\Table(name="matchs")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MatchsRepository")
 */
class Matchs
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\ActionsMatch", mappedBy="matchId")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="action_id", type="integer")
     */
    private $actionId;

    /**
     * @var string
     *
     * @ORM\Column(name="date", type="string")
     */
    private $date;

    /**
     * @var int
     *
     * @ORM\Column(name="equipe1_id", type="integer")
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Equipes", inversedBy="id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $equipe1Id;

    /**
     * @var string
     *
     * @ORM\Column(name="equipe2", type="string", length=32)
     */
    private $equipe2;

    /**
     * @var int
     *
     * @ORM\Column(name="joueur1", type="integer")
     */
    private $joueur1;

    /**
     * @var int
     *
     * @ORM\Column(name="joueur2", type="integer", nullable=true)
     */
    private $joueur2;

    /**
     * @var int
     *
     * @ORM\Column(name="joueur3", type="integer", nullable=true)
     */
    private $joueur3;

    /**
     * @var int
     *
     * @ORM\Column(name="joueur4", type="integer", nullable=true)
     */
    private $joueur4;

    /**
     * @var int
     *
     * @ORM\Column(name="joueur5", type="integer", nullable=true)
     */
    private $joueur5;

    /**
     * @var int
     *
     * @ORM\Column(name="joueur6", type="integer", nullable=true)
     */
    private $joueur6;

    /**
     * @var int
     *
     * @ORM\Column(name="joueur7", type="integer", nullable=true)
     */
    private $joueur7;

    /**
     * @var int
     *
     * @ORM\Column(name="joueur8", type="integer", nullable=true)
     */
    private $joueur8;

    /**
     * @var int
     *
     * @ORM\Column(name="joueur9", type="integer", nullable=true)
     */
    private $joueur9;

    /**
     * @var int
     *
     * @ORM\Column(name="joueur10", type="integer", nullable=true)
     */
    private $joueur10;

    /**
     * @var int
     *
     * @ORM\Column(name="joueur11", type="integer", nullable=true)
     */
    private $joueur11;

    /**
     * @var int
     *
     * @ORM\Column(name="joueur12", type="integer", nullable=true)
     */
    private $joueur12;

    /**
     * @var int
     *
     * @ORM\Column(name="joueur13", type="integer", nullable=true)
     */
    private $joueur13;

    /**
     * @var int
     *
     * @ORM\Column(name="joueur14", type="integer", nullable=true)
     */
    private $joueur14;

    /**
     * @var int
     *
     * @ORM\Column(name="joueur15", type="integer", nullable=true)
     */
    private $joueur15;

    /**
     * @var int
     *
     * @ORM\Column(name="joueur16", type="integer", nullable=true)
     */
    private $joueur16;


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
     * Set actionId.
     *
     * @param int $actionId
     *
     * @return Matchs
     */
    public function setActionId($actionId)
    {
        $this->actionId = $actionId;

        return $this;
    }

    /**
     * Get actionId.
     *
     * @return int
     */
    public function getActionId()
    {
        return $this->actionId;
    }

    /**
     * Set date.
     *
     * @param \DateTime $date
     *
     * @return Matchs
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date.
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set equipe1Id.
     *
     * @param int $equipe1Id
     *
     * @return Matchs
     */
    public function setEquipe1Id($equipe1Id)
    {
        $this->equipe1Id = $equipe1Id;

        return $this;
    }

    /**
     * Get equipe1Id.
     *
     * @return int
     */
    public function getEquipe1Id()
    {
        return $this->equipe1Id;
    }

    /**
     * Set equipe2.
     *
     * @param string $equipe2
     *
     * @return Matchs
     */
    public function setEquipe2($equipe2)
    {
        $this->equipe2 = $equipe2;

        return $this;
    }

    /**
     * Get equipe2.
     *
     * @return string
     */
    public function getEquipe2()
    {
        return $this->equipe2;
    }

    /**
     * Set joueur1.
     *
     * @param int $joueur1
     *
     * @return Matchs
     */
    public function setJoueur1($joueur1)
    {
        $this->joueur1 = $joueur1;

        return $this;
    }

    /**
     * Get joueur1.
     *
     * @return int
     */
    public function getJoueur1()
    {
        return $this->joueur1;
    }

    /**
     * Set joueur2.
     *
     * @param int $joueur2
     *
     * @return Matchs
     */
    public function setJoueur2($joueur2)
    {
        $this->joueur2 = $joueur2;

        return $this;
    }

    /**
     * Get joueur2.
     *
     * @return int
     */
    public function getJoueur2()
    {
        return $this->joueur2;
    }

    /**
     * Set joueur3.
     *
     * @param int $joueur3
     *
     * @return Matchs
     */
    public function setJoueur3($joueur3)
    {
        $this->joueur3 = $joueur3;

        return $this;
    }

    /**
     * Get joueur3.
     *
     * @return int
     */
    public function getJoueur3()
    {
        return $this->joueur3;
    }

    /**
     * Set joueur4.
     *
     * @param int $joueur4
     *
     * @return Matchs
     */
    public function setJoueur4($joueur4)
    {
        $this->joueur4 = $joueur4;

        return $this;
    }

    /**
     * Get joueur4.
     *
     * @return int
     */
    public function getJoueur4()
    {
        return $this->joueur4;
    }

    /**
     * Set joueur5.
     *
     * @param int $joueur5
     *
     * @return Matchs
     */
    public function setJoueur5($joueur5)
    {
        $this->joueur5 = $joueur5;

        return $this;
    }

    /**
     * Get joueur5.
     *
     * @return int
     */
    public function getJoueur5()
    {
        return $this->joueur5;
    }

    /**
     * Set joueur6.
     *
     * @param int $joueur6
     *
     * @return Matchs
     */
    public function setJoueur6($joueur6)
    {
        $this->joueur6 = $joueur6;

        return $this;
    }

    /**
     * Get joueur6.
     *
     * @return int
     */
    public function getJoueur6()
    {
        return $this->joueur6;
    }

    /**
     * Set joueur7.
     *
     * @param int $joueur7
     *
     * @return Matchs
     */
    public function setJoueur7($joueur7)
    {
        $this->joueur7 = $joueur7;

        return $this;
    }

    /**
     * Get joueur7.
     *
     * @return int
     */
    public function getJoueur7()
    {
        return $this->joueur7;
    }

    /**
     * Set joueur8.
     *
     * @param int $joueur8
     *
     * @return Matchs
     */
    public function setJoueur8($joueur8)
    {
        $this->joueur8 = $joueur8;

        return $this;
    }

    /**
     * Get joueur8.
     *
     * @return int
     */
    public function getJoueur8()
    {
        return $this->joueur8;
    }

    /**
     * Set joueur9.
     *
     * @param int $joueur9
     *
     * @return Matchs
     */
    public function setJoueur9($joueur9)
    {
        $this->joueur9 = $joueur9;

        return $this;
    }

    /**
     * Get joueur9.
     *
     * @return int
     */
    public function getJoueur9()
    {
        return $this->joueur9;
    }

    /**
     * Set joueur10.
     *
     * @param int $joueur10
     *
     * @return Matchs
     */
    public function setJoueur10($joueur10)
    {
        $this->joueur10 = $joueur10;

        return $this;
    }

    /**
     * Get joueur10.
     *
     * @return int
     */
    public function getJoueur10()
    {
        return $this->joueur10;
    }

    /**
     * Set joueur11.
     *
     * @param int $joueur11
     *
     * @return Matchs
     */
    public function setJoueur11($joueur11)
    {
        $this->joueur11 = $joueur11;

        return $this;
    }

    /**
     * Get joueur11.
     *
     * @return int
     */
    public function getJoueur11()
    {
        return $this->joueur11;
    }

    /**
     * Set joueur12.
     *
     * @param int $joueur12
     *
     * @return Matchs
     */
    public function setJoueur12($joueur12)
    {
        $this->joueur12 = $joueur12;

        return $this;
    }

    /**
     * Get joueur12.
     *
     * @return int
     */
    public function getJoueur12()
    {
        return $this->joueur12;
    }

    /**
     * Set joueur13.
     *
     * @param int $joueur13
     *
     * @return Matchs
     */
    public function setJoueur13($joueur13)
    {
        $this->joueur13 = $joueur13;

        return $this;
    }

    /**
     * Get joueur13.
     *
     * @return int
     */
    public function getJoueur13()
    {
        return $this->joueur13;
    }

    /**
     * Set joueur14.
     *
     * @param int $joueur14
     *
     * @return Matchs
     */
    public function setJoueur14($joueur14)
    {
        $this->joueur14 = $joueur14;

        return $this;
    }

    /**
     * Get joueur14.
     *
     * @return int
     */
    public function getJoueur14()
    {
        return $this->joueur14;
    }

    /**
     * Set joueur15.
     *
     * @param int $joueur15
     *
     * @return Matchs
     */
    public function setJoueur15($joueur15)
    {
        $this->joueur15 = $joueur15;

        return $this;
    }

    /**
     * Get joueur15.
     *
     * @return int
     */
    public function getJoueur15()
    {
        return $this->joueur15;
    }

    /**
     * Set joueur16.
     *
     * @param int $joueur16
     *
     * @return Matchs
     */
    public function setJoueur16($joueur16)
    {
        $this->joueur16 = $joueur16;

        return $this;
    }

    /**
     * Get joueur16.
     *
     * @return int
     */
    public function getJoueur16()
    {
        return $this->joueur16;
    }
}
