<?php

namespace HETIC\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Startup
 *
 * @ORM\Table(name="startup")
 * @ORM\Entity(repositoryClass="HETIC\CoreBundle\Repository\StartupRepository")
 * @Vich\Uploadable
 */
class Startup
{
    const STATUS_DESACTIVE = 0;
    const STATUS_ACTIVE = 1;

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
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     *
     * @Vich\UploadableField(mapping="startup_image", fileNameProperty="imageName")
     *
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     * @var string
     */
    private $imageName;

    /**
     *
     * @Vich\UploadableField(mapping="startup_logo", fileNameProperty="logoName")
     *
     * @var File
     */
    private $logoFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     * @var string
     */
    private $logoName;

    /**
     * @ORM\OneToOne(targetEntity="HETIC\UserBundle\Entity\User", cascade={"all"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $owner;

    /**
     * @ORM\OneToMany(targetEntity="HETIC\CoreBundle\Entity\Player", mappedBy="startup", cascade={"all"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $players;

    /**
     * @ORM\ManyToMany(targetEntity="HETIC\CoreBundle\Entity\Tournament", cascade={"all"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $tournament;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean", length=255)
     */
    private $status;

    /**
     * @var boolean
     *
     * @ORM\Column(name="profile_status", type="boolean", length=255)
     */
    private $profileStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="live_url", type="string", length=50, nullable=true)
     */
    private $liveUrl;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->players = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tournament = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Startup
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
     * Set description
     *
     * @param string $description
     *
     * @return Startup
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Startup
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     *
     * @return Product
     */
    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        if ($image) {
            $this->updatedAt = new \DateTimeImmutable();
        }

        return $this;
    }

    /**
     * @return File|null
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * Set imageName
     *
     * @param string $imageName
     *
     * @return Startup
     */
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;

        return $this;
    }

    /**
     * Get imageName
     *
     * @return string
     */
    public function getImageName()
    {
        return $this->imageName;
    }

    /**
     * Set status
     *
     * @param boolean $status
     *
     * @return Startup
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return boolean
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set profileStatus
     *
     * @param boolean $profileStatus
     *
     * @return Startup
     */
    public function setProfileStatus($profileStatus)
    {
        $this->profileStatus = $profileStatus;

        return $this;
    }

    /**
     * Get profileStatus
     *
     * @return boolean
     */
    public function getProfileStatus()
    {
        return $this->profileStatus;
    }

    /**
     * Add player
     *
     * @param \HETIC\UserBundle\Entity\User $player
     *
     * @return Startup
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
     * Add tournament
     *
     * @param \HETIC\CoreBundle\Entity\Tournament $tournament
     *
     * @return Startup
     */
    public function addTournament(\HETIC\CoreBundle\Entity\Tournament $tournament)
    {
        $this->tournament[] = $tournament;

        return $this;
    }

    /**
     * Remove tournament
     *
     * @param \HETIC\CoreBundle\Entity\Tournament $tournament
     */
    public function removeTournament(\HETIC\CoreBundle\Entity\Tournament $tournament)
    {
        $this->tournament->removeElement($tournament);
    }

    /**
     * Get tournament
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTournament()
    {
        return $this->tournament;
    }

    /**
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     *
     * @return Product
     */
    public function setLogoFile(File $logo = null)
    {
        $this->logoFile = $logo;

        if ($logo) {
            $this->updatedAt = new \DateTimeImmutable();
        }

        return $this;
    }

    /**
     * @return File|null
     */
    public function getLogoFile()
    {
        return $this->logoFile;
    }

    /**
     * Set logoName
     *
     * @param string $logoName
     *
     * @return Startup
     */
    public function setLogoName($logoName)
    {
        $this->logoName = $logoName;

        return $this;
    }

    /**
     * Get logoName
     *
     * @return string
     */
    public function getLogoName()
    {
        return $this->logoName;
    }

    /**
     * Set owner
     *
     * @param \HETIC\UserBundle\Entity\User $owner
     *
     * @return Startup
     */
    public function setOwner(\HETIC\UserBundle\Entity\User $owner = null)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * Get owner
     *
     * @return \HETIC\UserBundle\Entity\User
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Set liveUrl
     *
     * @param string $liveUrl
     *
     * @return Startup
     */
    public function setLiveUrl($liveUrl)
    {
        $this->liveUrl = $liveUrl;

        return $this;
    }

    /**
     * Get liveUrl
     *
     * @return string
     */
    public function getLiveUrl()
    {
        return $this->liveUrl;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Startup
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}
