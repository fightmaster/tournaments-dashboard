<?php

namespace Fightmaster\Bundle\TeamsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('FightmasterTeamsBundle:Default:index.html.twig', array('name' => $name));
    }
}
