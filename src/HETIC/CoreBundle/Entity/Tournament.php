<?php

namespace HETIC\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tournament
 *
 * @ORM\Table(name="tournament")
 * @ORM\Entity(repositoryClass="HETIC\CoreBundle\Repository\TournamentRepository")
 */
class Tournament
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50)
     */
    private $name;

    /**
     * @var datetime
     *
     * @ORM\Column(name="end_date", type="datetime")
     */
    private $endDate;

    /**
     * @ORM\OneToMany(targetEntity="HETIC\CoreBundle\Entity\Matches", mappedBy="tournament", cascade={"all"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $matches;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->matches = new \Doctrine\Common\Collections\ArrayCollection();
        $this->startup = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     *
     * @return Tournament
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     *
     * @return Tournament
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Add match
     *
     * @param \HETIC\CoreBundle\Entity\Matches $match
     *
     * @return Tournament
     */
    public function addMatch(\HETIC\CoreBundle\Entity\Matches $match)
    {
        $this->matches[] = $match;

        return $this;
    }

    /**
     * Remove match
     *
     * @param \HETIC\CoreBundle\Entity\Matches $match
     */
    public function removeMatch(\HETIC\CoreBundle\Entity\Matches $match)
    {
        $this->matches->removeElement($match);
    }

    /**
     * Get matches
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMatches()
    {
        return $this->matches;
    }

    /**
     * Add startup
     *
     * @param \HETIC\CoreBundle\Entity\Startup $startup
     *
     * @return Tournament
     */
    public function addStartup(\HETIC\CoreBundle\Entity\Startup $startup)
    {
        $this->startup[] = $startup;

        return $this;
    }

    /**
     * Remove startup
     *
     * @param \HETIC\CoreBundle\Entity\Startup $startup
     */
    public function removeStartup(\HETIC\CoreBundle\Entity\Startup $startup)
    {
        $this->startup->removeElement($startup);
    }

    /**
     * Get startup
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStartup()
    {
        return $this->startup;
    }
}
