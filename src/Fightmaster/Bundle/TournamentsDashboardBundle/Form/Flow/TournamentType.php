<?php

namespace Fightmaster\Bundle\TournamentsDashboardBundle\Form\Flow;

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
                    ->add('slug');
                break;
            case 2:
                $builder
                    ->add('limitOfMembers')
                    ->add('donation');
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
