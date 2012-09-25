<?php

namespace Fightmaster\Bundle\TeamsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Fightmaster\Bundle\TeamsBundle\Entity\Country
 */
class Country
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $name
     */
    private $name;

    /**
     * @var string $slug
     */
    private $slug;

    /**
     * @var Collection|Team[]
     */
    private $teams;

    /**
     * @var Collection|Player[]
     */
    private $players;

    public function __construct()
    {
        $this->teams = new ArrayCollection();
        $this->players = new ArrayCollection();
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
     * @return Country
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
     * Set slug
     *
     * @param string $slug
     * @return Country
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param Player $player
     * @return Country
     */
    public function addPlayer(Player $player)
    {
        if (!$this->getPlayers()->contains($player)) {
            $this->getPlayers()->add($player);
        }

        return $this;
    }

    /**
     * @param Player $player
     * @return Country
     */
    public function removePlayer(Player $player)
    {
        if ($this->getPlayers()->contains($player)) {
            $this->getPlayers()->removeElement($player);
        }

        return $this;
    }

    /**
     * @return Collection|Player[]
     */
    public function getPlayers()
    {
        return $this->players;
    }

    /**
     * @param Team $team
     * @return Country
     */
    public function addTeam(Team $team)
    {
        if (!$this->getTeams()->contains($team)) {
            $this->getTeams()->add($team);
        }

        return $this;
    }

    /**
     * @param Team $team
     * @return Country
     */
    public function removeTeam(Team $team)
    {
        if ($this->getTeams()->contains($team)) {
            $this->getTeams()->removeElement($team);
        }

        return $this;
    }

    /**
     * @return Collection|Team[]
     */
    public function getTeams()
    {
        return $this->teams;
    }
}
