<?php

namespace Fightmaster\Bundle\TournamentsDashboardBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Fightmaster\Bundle\TournamentsDashboardBundle\Entity\Tournament
 */
class Tournament
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
     * @var integer|null $limitOfMembers
     */
    private $limitOfMembers;

    /**
     * @var integer|null $donation
     */
    private $donation;

    /**
     * @var Collection|Stage[]
     */
    private $stages;

    public function __construct()
    {
        $this->stages = new ArrayCollection();
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
     * Set slug
     *
     * @param string $slug
     * @return Tournament
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
     * Set limitOfMembers
     *
     * @param integer|null $limitOfMembers
     * @return Tournament
     */
    public function setLimitOfMembers($limitOfMembers)
    {
        $this->limitOfMembers = $limitOfMembers;

        return $this;
    }

    /**
     * Get limitOfMembers
     *
     * @return integer|null
     */
    public function getLimitOfMembers()
    {
        return $this->limitOfMembers;
    }

    /**
     * Set donation
     *
     * @param integer|null $donation
     * @return Tournament
     */
    public function setDonation($donation)
    {
        $this->donation = $donation;

        return $this;
    }

    /**
     * Get donation
     *
     * @return integer|null
     */
    public function getDonation()
    {
        return $this->donation;
    }

    /**
     * @return Collection|Stage[]
     */
    public function getStages()
    {
        return $this->stages;
    }

    /**
     * @param Stage $stage
     * @return Tournament
     */
    public function addStage(Stage $stage)
    {
        if (!$this->stages->contains($stage)) {
            $stage->setTournament($this);
            $this->stages->add($stage);
        }

        return $this;
    }

    /**
     * @param Stage $stage
     * @return Tournament
     */
    public function removeStage(Stage $stage)
    {
        if ($this->stages->contains($stage)) {
            $stage->setTournament(null);
            $this->stages->removeElement($stage);
        }

        return $this;
    }

}
