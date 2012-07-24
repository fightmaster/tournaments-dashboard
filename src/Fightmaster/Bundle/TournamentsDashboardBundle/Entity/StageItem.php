<?php

namespace Fightmaster\Bundle\TournamentsDashboardBundle\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Fightmaster\Bundle\TournamentsDashboardBundle\Entity\StageItem
 */
class StageItem
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
     * @var integer $name
     */
    private $number;

    /**
     * @var integer $limitOfMembers
     */
    private $limitOfMembers;

    /**
     * @var integer $limitOfWinners
     */
    private $limitOfWinners;

    /**
     * @var Stage|null
     */
    private $stage;

    /**
     * @var Collection|StageItemMember[]
     */
    private $stageItemMembers;

    public function __construct()
    {
        $this->stageItemMembers = new ArrayCollection();
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
     * @return StageItem
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
     * Set limitOfMembers
     *
     * @param integer $limitOfMembers
     * @return StageItem
     */
    public function setLimitOfMembers($limitOfMembers)
    {
        $this->limitOfMembers = $limitOfMembers;

        return $this;
    }

    /**
     * Get limitOfMembers
     *
     * @return integer 
     */
    public function getLimitOfMembers()
    {
        return $this->limitOfMembers;
    }

    /**
     * Set limitOfWinners
     *
     * @param integer $limitOfWinners
     * @return StageItem
     */
    public function setLimitOfWinners($limitOfWinners)
    {
        $this->limitOfWinners = $limitOfWinners;

        return $this;
    }

    /**
     * Get limitOfWinners
     *
     * @return integer 
     */
    public function getLimitOfWinners()
    {
        return $this->limitOfWinners;
    }

    /**
     * @param Stage|null $stage
     * @return StageItem
     */
    public function setStage(Stage $stage = null)
    {
        $this->stage = $stage;

        return $this;
    }

    /**
     * @return Stage|null
     */
    public function getStage()
    {
        return $this->stage;
    }

    /**
     * @param StageItemMember $stageItemMember
     * @return StageItem
     */
    public function addStageItemMember(StageItemMember $stageItemMember)
    {
        if (!$this->stageItemMembers->contains($stageItemMember)) {
            $stageItemMember->setStageItem($stageItemMember);
            $this->stageItemMembers->add($stageItemMember);
        }

        return $this;
    }

    /**
     * @param StageItemMember $stageItemMember
     * @return StageItem
     */
    public function removeStageItemMember(StageItemMember $stageItemMember)
    {
        if ($this->stageItemMembers->contains($stageItemMember)) {
            $stageItemMember->setStageItem(null);
            $this->stageItemMembers->removeElement($stageItemMember);
        }

        return $this;
    }

    /**
     * @return Collection|StageItemMember[]
     */
    public function getStageItemMembers()
    {
        return $this->stageItemMembers;
    }

    /**
     * @param integer $number
     * @return StageItem
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * @return integer
     */
    public function getNumber()
    {
        return $this->number;
    }

}
