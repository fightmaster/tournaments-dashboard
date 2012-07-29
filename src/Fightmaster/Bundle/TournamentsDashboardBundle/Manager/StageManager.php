<?php

/**
 * This file is part of the FightmasterTournamentsDashboardBundle package.
 *
 * (c) Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */


namespace Fightmaster\Bundle\TournamentsDashboardBundle\Manager;

use Fightmaster\Model\Manager\DoctrineManager;
use Fightmaster\Bundle\TournamentsDashboardBundle\Entity\Stage;
use Fightmaster\Bundle\TournamentsDashboardBundle\Exception\LogicException;
use Fightmaster\Bundle\TournamentsDashboardBundle\Exception\InvalidArgumentException;

/**
 * @author Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 */
class StageManager extends DoctrineManager
{
    /**
     * Creates an empty object instance.
     *
     * @throws LogicException
     */
    public function create()
    {
        throw new LogicException('Invalid call to "create" method. Need to call the "instance" method.');
    }

    /**
     * @param $type
     * @return Stage\Group|Stage\Playoff
     * @throws InvalidArgumentException
     */
    public function instance($type)
    {
        return Stage::instance($type);
    }
}
