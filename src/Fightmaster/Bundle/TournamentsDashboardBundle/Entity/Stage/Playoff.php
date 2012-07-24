<?php

namespace Fightmaster\Bundle\TournamentsDashboardBundle\Entity\Stage;

use Fightmaster\Bundle\TournamentsDashboardBundle\Entity\Stage;

/**
 * Fightmaster\Bundle\TournamentsDashboardBundle\Entity\Stage\Playoff
 */
class Playoff extends Stage
{
    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return static::TYPE_PLAYOFF;
    }

}
