<?php

namespace Fightmaster\Bundle\TournamentsDashboardBundle\Form\Flow;

use Fightmaster\Bundle\TournamentsDashboardBundle\Form\Flow\PlayoffStageType;
use Fightmaster\Bundle\TournamentsDashboardBundle\Form\Flow\GroupStageType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TournamentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        switch ($options['flowStep']) {
            case 1:
                $builder
                    ->add('name', null, array('label' => 'fightmaster.tournaments_dashboard_bundle.tournament.name'))
                    ->add('slug', null, array('label' => 'fightmaster.tournaments_dashboard_bundle.tournament.slug'))
                    ->add('limitOfMembers', null, array('label' => 'fightmaster.tournaments_dashboard_bundle.tournament.limit_of_members'))
                    ->add('donation', null, array('label' => 'fightmaster.tournaments_dashboard_bundle.tournament.donation'));
                break;
            case 2:
                $builder->add('playoffStages', 'collection', array(
                    'type' => new PlayoffStageType(),
                    'allow_add' => true,
                    'allow_delete' => true,
                    'by_reference' => false,
                    'label' => 'fightmaster.tournaments_dashboard_bundle.stage.type.playoff'
                    ));
                $builder->add('groupStages', 'collection', array(
                    'type' => new GroupStageType(),
                    'allow_add' => true,
                    'allow_delete' => true,
                    'by_reference' => false,
                    'label' => 'fightmaster.tournaments_dashboard_bundle.stage.type.group'
                ));
                break;
            case 3:
                break;
        }
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'flowStep' => 1,
            'data_class' => 'Fightmaster\Bundle\TournamentsDashboardBundle\Entity\Tournament'
        ));
    }

    public function getName()
    {
        return 'fightmaster_bundle_tournamentsdashboardbundle_flow_tournamenttype';
    }
}
