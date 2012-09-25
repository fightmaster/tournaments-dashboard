<?php

namespace Fightmaster\Bundle\TeamsBundle\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Fightmaster\Bundle\TeamsBundle\Entity\Team
 */
class Team
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
     * @var Country
     */
    private $country;

    /**
     * @var Collection|Player[]
     */
    private $players;

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
     * @return Team
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
     * @return Team
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
     * Set Country
     *
     * @param Country $country
     * @return Team
     */
    public function setCountry(Country $country)
    {
        $this->country = $country;
        $country->addTeam($this);

        return $this;
    }

    /**
     * Get country
     *
     * @return Country
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param Player $player
     * @return Team
     */
    public function addPlayer(Player $player)
    {
        if (!$this->getPlayers()->contains($player)) {
            $this->getPlayers()->add($player);
            $player->setTeam($this);
        }

        return $this;
    }

    /**
     * @param Player $player
     * @return Team
     */
    public function removePlayer(Player $player)
    {
        if ($this->getPlayers()->contains($player)) {
            $this->getPlayers()->removeElement($player);
            $player->setTeam(null);
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
}
