<?php

namespace Fightmaster\Bundle\TournamentsDashboardBundle\Entity;

use Fightmaster\Bundle\TournamentsDashboardBundle\Exception\InvalidArgumentException;

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

    /**
     * @var Collection|Stage\Playoff[]
     */
    private $playoffStages;

    /**
     * @var Collection|Stage\Group[]
     */
    private $groupStages;

    /**
     * @var ArrayCollection|Stage[]
     */
    private $onRemoveStages;

    public function __construct()
    {
        $this->stages = new ArrayCollection();
        $this->playoffStages = new ArrayCollection();
        $this->groupStages = new ArrayCollection();
        $this->onRemoveStages = new ArrayCollection();
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
        if (!$this->getStages()->contains($stage)) {
            $stage->setTournament($this);
            $this->removeOnRemoveStage($stage);
            $this->getStages()->add($stage);
        }

        return $this;
    }

    /**
     * @param Stage $stage
     * @return Tournament
     */
    public function removeStage(Stage $stage)
    {
        if ($this->getStages()->contains($stage)) {
            $this->addOnRemoveStage($stage);
            $this->getStages()->removeElement($stage);
        }

        return $this;
    }

    /**
     * @param Stage\Playoff $stage
     * @param bool $updateStage
     * @return Tournament
     */
    public function addPlayoffStage(Stage\Playoff $stage, $updateStage = true)
    {
        if (!$this->getPlayoffStages()->contains($stage)) {
            if ($updateStage) {
                $this->addStage($stage);
            }
            $this->getPlayoffStages()->add($stage);
        }

        return $this;
    }

    /**
     * @param Stage\Playoff $stage
     * @param bool $updateStage
     * @return Tournament
     */
    public function removePlayoffStage(Stage\Playoff $stage, $updateStage = true)
    {
        if ($this->getPlayoffStages()->contains($stage)) {
            if ($updateStage) {
                $this->removeStage($stage);
            }
            $this->getPlayoffStages()->removeElement($stage);
        }

        return $this;
    }

    /**
     * @param Stage\Group $stage
     * @param bool $updateStage
     * @return Tournament
     */
    public function addGroupStage(Stage\Group $stage, $updateStage = true)
    {
        if (!$this->getGroupStages()->contains($stage)) {
            if ($updateStage) {
                $this->addStage($stage);
            }
            $this->getGroupStages()->add($stage);
        }

        return $this;
    }

    /**
     * @param Stage\Group $stage
     * @param bool $updateStage
     * @return Tournament
     */
    public function removeGroupStage(Stage\Group $stage, $updateStage = true)
    {
        if ($this->getGroupStages()->contains($stage)) {
            if ($updateStage) {
                $this->removeStage($stage);
            }
            $this->getGroupStages()->removeElement($stage);
        }

        return $this;
    }

    public function getGroupStages()
    {
        if ($this->groupStages === null) {
            $this->groupStages = new ArrayCollection();
        }
        return $this->groupStages;
    }

    public function getPlayoffStages()
    {
        if ($this->playoffStages === null) {
            $this->playoffStages = new ArrayCollection();
        }
        return $this->playoffStages;
    }

    /**
     * @throws InvalidArgumentException
     */
    public function separeteStages()
    {
        foreach ($this->getStages() as $stage) {
            if ($stage instanceof Stage\Group) {
                $this->addGroupStage($stage, false);
            } elseif ($stage instanceof Stage\Playoff) {
                $this->addPlayoffStage($stage, false);
            } else {
                throw new InvalidArgumentException('Invalid instance of Stage');
            }
        }
    }

    /**
     * @return ArrayCollection|Stage[]
     */
    public function getOnRemoveStages()
    {
        if ($this->onRemoveStages === null) {
            $this->onRemoveStages = new ArrayCollection();
        }

        return $this->onRemoveStages;
    }

    /**
     * @param Stage $stage
     * @return Tournament
     */
    public function addOnRemoveStage(Stage $stage)
    {
        if (!$this->getOnRemoveStages()->contains($stage)) {
            $this->getOnRemoveStages()->add($stage);
        }

        return $this;
    }

    /**
     * @param Stage $stage
     * @return Tournament
     */
    public function removeOnRemoveStage(Stage $stage)
    {
        if ($this->getOnRemoveStages()->contains($stage)) {
            $this->getOnRemoveStages()->removeElement($stage);
        }

        return $this;
    }

}
