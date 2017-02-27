<?php

namespace HETIC\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Matches
 *
 * @ORM\Table(name="matches")
 * @ORM\Entity(repositoryClass="HETIC\CoreBundle\Repository\MatchesRepository")
 */
class Matches
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
     * @ORM\ManyToMany(targetEntity="HETIC\CoreBundle\Entity\Player", cascade={"all"})
     * @ORM\JoinColumn(name="matches_player_players")
     */
    private $players;

    /**
     * @var string
     *
     * @ORM\Column(name="score", type="string", length=50)
     */
    private $score;

    

    /**
     * @ORM\ManyToOne(targetEntity="HETIC\CoreBundle\Entity\Tournament", inversedBy="matches", cascade={"all"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $tournament;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->players = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set score
     *
     * @param string $score
     *
     * @return Matches
     */
    public function setScore($score)
    {
        $this->score = $score;

        return $this;
    }

    /**
     * Get score
     *
     * @return string
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Add player
     *
     * @param \HETIC\UserBundle\Entity\User $player
     *
     * @return Matches
     */
    public function addPlayer(\HETIC\UserBundle\Entity\User $player)
    {
        $this->players[] = $player;

        return $this;
    }

    /**
     * Remove player
     *
     * @param \HETIC\UserBundle\Entity\User $player
     */
    public function removePlayer(\HETIC\UserBundle\Entity\User $player)
    {
        $this->players->removeElement($player);
    }

    /**
     * Get players
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPlayers()
    {
        return $this->players;
    }

    /**
     * Set winner
     *
     * @param \HETIC\UserBundle\Entity\User $winner
     *
     * @return Matches
     */
    public function setWinner(\HETIC\UserBundle\Entity\User $winner)
    {
        $this->winner = $winner;

        return $this;
    }

    /**
     * Get winner
     *
     * @return \HETIC\UserBundle\Entity\User
     */
    public function getWinner()
    {
        return $this->winner;
    }

    /**
     * Set tournament
     *
     * @param \HETIC\CoreBundle\Entity\Tournament $tournament
     *
     * @return Matches
     */
    public function setTournament(\HETIC\CoreBundle\Entity\Tournament $tournament)
    {
        $this->tournament = $tournament;

        return $this;
    }

    /**
     * Get tournament
     *
     * @return \HETIC\CoreBundle\Entity\Tournament
     */
    public function getTournament()
    {
        return $this->tournament;
    }

    /**
     * Add winner
     *
     * @param \HETIC\CoreBundle\Entity\Player $winner
     *
     * @return Matches
     */
    public function addWinner(\HETIC\CoreBundle\Entity\Player $winner)
    {
        $this->winners[] = $winner;

        return $this;
    }

    /**
     * Remove winner
     *
     * @param \HETIC\CoreBundle\Entity\Player $winner
     */
    public function removeWinner(\HETIC\CoreBundle\Entity\Player $winner)
    {
        $this->winners->removeElement($winner);
    }

    /**
     * Get winners
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getWinners()
    {
        return $this->winners;
    }
}
