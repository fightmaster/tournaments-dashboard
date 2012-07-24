<?php

namespace Fightmaster\Bundle\TournamentsDashboardBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TournamentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('slug')
            ->add('limitOfMembers')
            ->add('donation')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Fightmaster\Bundle\TournamentsDashboardBundle\Entity\Tournament'
        ));
    }

    public function getName()
    {
        return 'fightmaster_bundle_tournamentsdashboardbundle_tournamenttype';
    }
}
