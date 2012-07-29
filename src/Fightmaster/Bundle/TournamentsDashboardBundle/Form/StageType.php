<?php

namespace Fightmaster\Bundle\TournamentsDashboardBundle\Form;

use Fightmaster\Bundle\TournamentsDashboardBundle\Entity\Stage;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class StageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //TODO fix tournament
            ->add('tournament')
            ->add('name', 'text', array(
                'required' => true,
                'label' => 'fightmaster.tournaments_dashboard_bundle.stage.name'
            ))
            ->add('number', 'integer', array(
                'required' => true,
                'label' => 'fightmaster.tournaments_dashboard_bundle.stage.number'
            ))
            ->add('type', 'choice', array(
            'label' => 'opensoft.profit.admin.manage_machines.type',
            'choices' => array(
                Stage::TYPE_GROUP => 'fightmaster.tournaments_dashboard_bundle.stage.type.group',
                Stage::TYPE_PLAYOFF => 'fightmaster.tournaments_dashboard_bundle.stage.type.playoff'
            )))
            ->add('limitOfMembers', 'integer', array(
                'required' => true,
                'label' => 'fightmaster.tournaments_dashboard_bundle.stage.limit_of_members'
            ))
            ->add('laps', 'integer', array(
                'required' => true,
                'label' => 'fightmaster.tournaments_dashboard_bundle.stage.laps'
            ));
    }

    public function getName()
    {
        return 'fightmaster_bundle_tournamentsdashboardbundle_stagetype';
    }
}
