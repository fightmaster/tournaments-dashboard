<?php

namespace Fightmaster\Bundle\TournamentsDashboardBundle\Form\Flow;

use Craue\FormFlowBundle\Form\FormFlow;

class TournamentFlow extends FormFlow
{
    /**
     * @var int
     */
    protected $maxSteps = 3;

    /**
     * @var bool
     */
    protected $allowDynamicStepNavigation = true;

    /**
     * @return array|string[]
     */
    protected function loadStepDescriptions()
    {
        return array(
            'fightmaster.tournaments_dashboard_bundle.tournament.form.flow.steps.tournament',
            'fightmaster.tournaments_dashboard_bundle.tournament.form.flow.steps.stage',
            'fightmaster.tournaments_dashboard_bundle.tournament.form.flow.steps.stage'
        );
    }
}
