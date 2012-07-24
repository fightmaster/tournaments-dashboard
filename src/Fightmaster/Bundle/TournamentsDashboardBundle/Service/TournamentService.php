<?php

/**
 * This file is part of the FightmasterTournamentsDashboardBundle package.
 *
 * (c) Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */


namespace Fightmaster\Bundle\TournamentsDashboardBundle\Service;

use Symfony\Component\HttpKernel\Log\LoggerInterface;
use Fightmaster\Model\Manager\DoctrineManager;
use Fightmaster\Bundle\TournamentsDashboardBundle\Entity\Tournament;

/**
 * @author Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 */
class TournamentService
{
    /**
     * @var DoctrineManager
     */
    private $manager;

    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(LoggerInterface $logger, DoctrineManager $manager)
    {
        $this->logger = $logger;
        $this->manager = $manager;
    }

    /**
     * @param Tournament $tournament
     */
    public function save(Tournament $tournament)
    {
        $this->manager->save($tournament, true);
    }

    /**
     * @param Tournament $tournament
     */
    public function remove(Tournament $tournament)
    {
        $this->manager->remove($tournament, true);
    }

    /**
     * @return Tournament
     */
    public function create()
    {
        $tournament = $this->manager->create();

        return $tournament;
    }
}
