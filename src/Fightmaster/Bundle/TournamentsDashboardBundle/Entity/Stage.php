<?php

namespace Fightmaster\Bundle\TournamentsDashboardBundle\Entity;

use Fightmaster\Bundle\TournamentsDashboardBundle\Exception\InvalidArgumentException;

use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Fightmaster\Bundle\TournamentsDashboardBundle\Entity\Stage
 */
abstract class Stage
{

    const TYPE_GROUP = 'group';
    const TYPE_PLAYOFF = 'playoff';

    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $name
     */
    private $name;

    /**
     * @var Tournament $tournament
     */
    private $tournament;

    /**
     * @var integer $number
     */
    private $number;

    /**
     * @var integer $limitOfMembers
     */
    private $limitOfMembers;

    /**
     * @var integer $laps
     */
    private $laps;

    /**
     * @var Collection|StageItem[] $stageItem
     */
    private $stageItems;

    /**
     * Get type
     *
     * @return string
     */
    abstract public function getType();

    public function __construct()
    {
        $this->stageItems = new ArrayCollection();
    }

    /**
     * @static
     * @param $type
     * @return Stage\Group|Stage\Playoff
     * @throws InvalidArgumentException
     */
    public static function instance($type)
    {
        switch ($type) {
            case self::TYPE_GROUP:
                return new Stage\Group();
            break;
            case self::TYPE_PLAYOFF:
                return new Stage\Playoff();
            break;
            default:
                throw new InvalidArgumentException(sprintf('Invalid Stage Type %s', $type));
        }
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
     * @return Stage
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
     * Set tournament
     *
     * @param Tournament $tournament
     * @return Stage
     */
    public function setTournament(Tournament $tournament = null)
    {
        $this->tournament = $tournament;

        return $this;
    }

    /**
     * Get tournament
     *
     * @return Tournament
     */
    public function getTournament()
    {
        return $this->tournament;
    }

    /**
     * Set number
     *
     * @param integer $number
     * @return Stage
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return integer 
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set limitOfMembers
     *
     * @param integer $limitOfMembers
     * @return Stage
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
     * Set laps
     *
     * @param integer $laps
     * @return Stage
     */
    public function setLaps($laps)
    {
        $this->laps = $laps;

        return $this;
    }

    /**
     * Get laps
     *
     * @return integer 
     */
    public function getLaps()
    {
        return $this->laps;
    }

    /**
     * Set stageItems
     *
     * @param StageItem $stageItem
     * @return Stage
     */
    public function addStageItem(StageItem $stageItem)
    {
        if (!$this->stageItems->contains($stageItem)) {
            $stageItem->setStage($this);
            $this->stageItems->add($stageItem);
        }

        return $this;
    }

    /**
     * @param StageItem $stageItem
     * @return Stage
     */
    public function removeStageItem(StageItem $stageItem)
    {
        if ($this->stageItems->contains($stageItem)) {
            $stageItem->setStage(null);
            $this->stageItems->removeElement($stageItem);
        }

        return $this;
    }

    /**
     * Get stageItems
     *
     * @return Collection|StageItem[]
     */
    public function getStageItems()
    {
        return $this->stageItems;
    }
}
