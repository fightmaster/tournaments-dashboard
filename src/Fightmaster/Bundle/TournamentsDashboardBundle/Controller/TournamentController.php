<?php

namespace Fightmaster\Bundle\TournamentsDashboardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Fightmaster\Model\Manager\DoctrineManager;
use Fightmaster\Bundle\TournamentsDashboardBundle\Service\TournamentService;
use Fightmaster\Bundle\TournamentsDashboardBundle\Entity\Tournament;
use Fightmaster\Bundle\TournamentsDashboardBundle\Form\TournamentType;
use Fightmaster\Bundle\TournamentsDashboardBundle\Form\Flow\TournamentFlow;

/**
 * Tournament controller.
 *
 */
class TournamentController extends Controller
{
    /**
     * Lists all Tournament entities.
     *
     */
    public function indexAction()
    {
        $tournaments = $this->getTournamentManager()->findAll();

        return $this->render('FightmasterTournamentsDashboardBundle:Tournament:index.html.twig', array(
            'tournaments' => $tournaments,
        ));
    }

    /**
     * Finds and displays a Tournament entity.
     *
     */
    public function showAction($id)
    {
        $tournament = $this->getTournamentManager()->find($id);

        if (!$tournament) {
            throw $this->createNotFoundException('Unable to find Tournament entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('FightmasterTournamentsDashboardBundle:Tournament:show.html.twig', array(
            'tournament' => $tournament,
            'delete_form' => $deleteForm->createView()));
    }

    /**
     * Displays a form to create a new Tournament entity.
     *
     */
    public function newAction()
    {
        $tournament = $this->getTournamentService()->create();
        $flow = $this->getTournamentFlow();
        $flow->bind($tournament);
        $form = $flow->createForm($tournament);

        return $this->render('FightmasterTournamentsDashboardBundle:Tournament:new.html.twig', array(
            'tournament' => $tournament,
            'form'   => $form->createView(),
            'flow' => $flow
        ));
    }

    /**
     * Creates a new Tournament entity.
     *
     */
    public function createAction()
    {
        $tournament  = $this->getTournamentService()->create();
        $flow = $this->getTournamentFlow();
        $flow->bind($tournament);
        $form = $flow->createForm($tournament);

        if ($flow->isValid($form)) {
            $flow->saveCurrentStepData();

            if ($flow->nextStep()) {
                // form for the next step
                $form = $flow->createForm($tournament);
            } else {
                $this->getTournamentService()->save($tournament);
                $flow->reset();
                // flow finished
                /*$em = $this->getDoctrine()->getEntityManager();
                $em->persist($user);
                $em->flush();*/
                //$this->
                return $this->redirect($this->generateUrl('tournament_show', array('id' => $tournament->getId())));
            }
        }

        return $this->render('FightmasterTournamentsDashboardBundle:Tournament:new.html.twig', array(
            'tournament' => $tournament,
            'flow' => $flow,
            'form' => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing Tournament entity.
     *
     */
    public function editAction($id)
    {
        $tournament = $this->getTournamentManager()->find($id);

        if (!$tournament) {
            throw $this->createNotFoundException('Unable to find Tournament entity.');
        }

        $flow = $this->getTournamentFlow();
        $flow->bind($tournament);
        $editForm = $flow->createForm($tournament);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('FightmasterTournamentsDashboardBundle:Tournament:edit.html.twig', array(
            'tournament'      => $tournament,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'flow' => $flow
        ));
    }

    /**
     * Edits an existing Tournament entity.
     *
     */
    public function updateAction($id)
    {
        $tournament = $this->getTournamentManager()->find($id);

        if (!$tournament) {
            throw $this->createNotFoundException('Unable to find Tournament entity.');
        }

        $flow = $this->getTournamentFlow();
        $flow->bind($tournament);
        $editForm = $flow->createForm($tournament);
        $deleteForm = $this->createDeleteForm($id);

        if ($flow->isValid($editForm)) {
            $flow->saveCurrentStepData();

            if ($flow->nextStep()) {
                // form for the next step
                $editForm = $flow->createForm($tournament);
            } else {
                $this->getTournamentService()->save($tournament);
                $flow->reset();
                return $this->redirect($this->generateUrl('tournament_edit', array('id' => $id)));
            }

        }

        return $this->render('FightmasterTournamentsDashboardBundle:Tournament:edit.html.twig', array(
            'tournament'      => $tournament,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'flow' => $flow
        ));
    }

    /**
     * Deletes a Tournament entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bind($request);

        if ($form->isValid()) {
            $tournament = $this->getTournamentManager()->find($id);

            if (!$tournament) {
                throw $this->createNotFoundException('Unable to find Tournament entity.');
            }
            $this->getTournamentService()->remove($tournament);
        }

        return $this->redirect($this->generateUrl('tournament'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }

    /**
     * @return DoctrineManager
     */
    private function getTournamentManager()
    {
        return $this->get('fightmaster_tournaments_dashboard.manager.tournament');
    }

    /**
     * @return TournamentService
     */
    private function getTournamentService()
    {
        return $this->get('fightmaster_tournaments_dashboard.service.tournament');
    }

    /**
     * @return TournamentFlow
     */
    private function getTournamentFlow()
    {
        return $this->get('fightmaster_tournaments_dashboard.form.flow.tournament');
    }

}
