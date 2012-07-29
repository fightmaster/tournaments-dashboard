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
use Fightmaster\Bundle\TournamentsDashboardBundle\Manager\StageManager;
use Fightmaster\Bundle\TournamentsDashboardBundle\Entity\Stage;

/**
 * @author Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 */
class StageService
{
    /**
     * @var StageManager
     */
    private $manager;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @param LoggerInterface $logger
     * @param StageManager $manager
     */
    public function __construct(LoggerInterface $logger, StageManager $manager)
    {
        $this->logger = $logger;
        $this->manager = $manager;
    }

    /**
     * @param Stage $stage
     * @param bool $flush
     */
    public function save(Stage $stage, $flush = true)
    {
        $this->manager->save($stage, $flush);
    }

    /**
     * @param Stage $stage
     * @param bool $flush
     */
    public function remove(Stage $stage, $flush = true)
    {
        $this->manager->remove($stage, $flush);
    }

    /**
     * @param $type
     * @return Stage
     */
    public function create($type)
    {
        $stage = $this->manager->instance($type);

        return $stage;
    }
}
