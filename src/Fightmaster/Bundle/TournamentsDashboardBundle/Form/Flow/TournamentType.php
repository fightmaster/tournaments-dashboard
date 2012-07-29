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
                    ->add('name')
                    ->add('slug')
                    ->add('limitOfMembers')
                    ->add('donation');
                break;
            case 2:
                $builder->add('playoffStages', 'collection', array(
                    'type' => new PlayoffStageType(),
                    'allow_add' => true,
                    'allow_delete' => true,
                    'by_reference' => false,
                    ));
                $builder->add('groupStages', 'collection', array(
                    'type' => new GroupStageType(),
                    'allow_add' => true,
                    'allow_delete' => true,
                    'by_reference' => false,
                ));
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
