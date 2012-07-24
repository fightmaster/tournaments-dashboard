<?php

namespace Fightmaster\Bundle\TournamentsDashboardBundle\Entity;

/**
 * Fightmaster\Bundle\TournamentsDashboardBundle\Entity\StageItemMember
 */
class StageItemMember
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
     * @var string $externalId
     */
    private $externalId;

    /**
     * @var string $externalName
     */
    private $externalName;

    /**
     * @var StageItem|null
     */
    private $stageItem;

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
     * @return StageItemMember
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
     * Set externalId
     *
     * @param string $externalId
     * @return StageItemMember
     */
    public function setExternalId($externalId)
    {
        $this->externalId = $externalId;

        return $this;
    }

    /**
     * Get externalId
     *
     * @return string 
     */
    public function getExternalId()
    {
        return $this->externalId;
    }

    /**
     * Set externalName
     *
     * @param string $externalName
     * @return StageItemMember
     */
    public function setExternalName($externalName)
    {
        $this->externalName = $externalName;

        return $this;
    }

    /**
     * Get externalName
     *
     * @return string 
     */
    public function getExternalName()
    {
        return $this->externalName;
    }

    /**
     * @param StageItem|null $stageItem
     * @return StageItemMember
     */
    public function setStageItem(StageItem $stageItem = null)
    {
        $this->stageItem = $stageItem;

        return $this;
    }

    /**
     * @return StageItem|null
     */
    public function getStageItem()
    {
        return $this->stageItem;
    }
}
