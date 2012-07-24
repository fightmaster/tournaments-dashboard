<?php

namespace Fightmaster\Bundle\TournamentsDashboardBundle\Form\Flow;

use Craue\FormFlowBundle\Form\FormFlow;

class TournamentFlow extends FormFlow
{
    /**
     * @var int
     */
    protected $maxSteps = 2;

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
            'tournaments_dashboard_bundle.tournament.form.flow.steps.tournament',
            'tournaments_dashboard_bundle.tournament.form.flow.steps.stage'
        );
    }
}
