<?php

namespace Fightmaster\Bundle\TournamentsDashboardBundle\Entity\Stage;

use Fightmaster\Bundle\TournamentsDashboardBundle\Entity\Stage;

/**
 * Fightmaster\Bundle\TournamentsDashboardBundle\Entity\Stage\Group
 */
class Group extends Stage
{
    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return static::TYPE_GROUP;
    }
}
