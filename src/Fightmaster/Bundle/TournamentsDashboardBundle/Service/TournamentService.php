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
use Fightmaster\Bundle\TournamentsDashboardBundle\Service\StageService;

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

    /**
     * @var StageService
     */
    private $stageService;

    /**
     * @param LoggerInterface $logger
     * @param DoctrineManager $manager
     * @param StageService $stageService
     */
    public function __construct(LoggerInterface $logger, DoctrineManager $manager, StageService $stageService)
    {
        $this->logger = $logger;
        $this->manager = $manager;
        $this->stageService = $stageService;
    }

    /**
     * @param Tournament $tournament
     * @param bool $flush
     */
    public function save(Tournament $tournament, $flush = true)
    {
        if ($tournament->getOnRemoveStages()->count() > 0) {
            foreach ($tournament->getOnRemoveStages() as $stage) {
                $this->stageService->remove($stage, false);
            }
        }
        $this->manager->save($tournament, $flush);
    }

    /**
     * @param Tournament $tournament
     * @param bool $flush
     */
    public function remove(Tournament $tournament, $flush = true)
    {
        $this->manager->remove($tournament, $flush);
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
