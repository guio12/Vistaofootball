<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ActionsMatch
 *
 * @ORM\Table(name="actions_match")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ActionsMatchRepository")
 */
class ActionsMatch
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="match_id", type="integer")
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Matchs", inversedBy="id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $matchId;

    /**
     * @var int
     *
     * @ORM\Column(name="joueur_action", type="integer")
     */
    private $joueurAction;

    /**
     * @var int
     *
     * @ORM\Column(name="action_id", type="integer")
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Actions", inversedBy="id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $actionId;

    /**
     * @var int
     *
     * @ORM\Column(name="joueur_receveur", type="integer", nullable=true)
     */
    private $joueurReceveur;


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
     * Set matchId.
     *
     * @param int $matchId
     *
     * @return ActionsMatch
     */
    public function setMatchId($matchId)
    {
        $this->matchId = $matchId;

        return $this;
    }

    /**
     * Get matchId.
     *
     * @return int
     */
    public function getMatchId()
    {
        return $this->matchId;
    }

    /**
     * Set joueurAction.
     *
     * @param int $joueurAction
     *
     * @return ActionsMatch
     */
    public function setJoueurAction($joueurAction)
    {
        $this->joueurAction = $joueurAction;

        return $this;
    }

    /**
     * Get joueurAction.
     *
     * @return int
     */
    public function getJoueurAction()
    {
        return $this->joueurAction;
    }

    /**
     * Set actionId.
     *
     * @param int $actionId
     *
     * @return ActionsMatch
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
     * Set joueurReceveur.
     *
     * @param int $joueurReceveur
     *
     * @return ActionsMatch
     */
    public function setJoueurReceveur($joueurReceveur)
    {
        $this->joueurReceveur = $joueurReceveur;

        return $this;
    }

    /**
     * Get joueurReceveur.
     *
     * @return int
     */
    public function getJoueurReceveur()
    {
        return $this->joueurReceveur;
    }
}
