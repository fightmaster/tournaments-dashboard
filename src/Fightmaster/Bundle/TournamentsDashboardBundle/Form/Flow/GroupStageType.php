<?php

namespace Fightmaster\Bundle\TournamentsDashboardBundle\Form\Flow;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GroupStageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array(
                'required' => true,
                'label' => 'fightmaster.tournaments_dashboard_bundle.stage.name'
            ))
            ->add('number', 'integer', array(
                'required' => true,
                'label' => 'fightmaster.tournaments_dashboard_bundle.stage.number'
            ))
            ->add('limitOfMembers', 'integer', array(
                'required' => true,
                'label' => 'fightmaster.tournaments_dashboard_bundle.stage.limit_of_members'
            ))
            ->add('laps', 'integer', array(
                'required' => true,
                'label' => 'fightmaster.tournaments_dashboard_bundle.stage.laps'
            ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Fightmaster\Bundle\TournamentsDashboardBundle\Entity\Stage\Group'
        ));
    }

    public function getName()
    {
        return 'fightmaster_bundle_tournamentsdashboardbundle_stage_group_type';
    }
}
