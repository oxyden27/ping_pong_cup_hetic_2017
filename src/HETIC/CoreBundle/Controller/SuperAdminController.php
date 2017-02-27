<?php

namespace HETIC\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SuperAdminController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $startups = $em->getRepository('HETICCoreBundle:Startup')->findAll();

        return $this->render('HETICCoreBundle:SuperAdmin:index.html.twig', array('startups' => $startups));
    }

    public function createTournamentAction(Request $request) {
        // $tournament = new Tournament();
        // $form = $this->createForm(, $tournament);
        // $form->handleRequest($request);
        //
        // if ($form->isValid()) {
        //     $em = $this->getDoctrine()->getManager();
        //     $em->persist($tournament);
        //     $em->flush();
        //
        //     return $this->redirectToRoute('hetic_core_superadmin_tournament');
        // }
        //
        // return $this->render('HETICAppBundle:SuperAdmin/Tournament:index.html.twig');
    }

    public function editTournamentAction(Request $request, Tournament $tournament) {
        // $form = $this->createForm('HETIC\CoreBundle\Form\TournamentType', $tournament);
        // $form->handleRequest($request);
        //
        // if ($form->isValid()) {
        //     $em = $this->getDoctrine()->getManager();
        //     $em->persist($tournament);
        //     $em->flush();
        //
        //     return $this->redirectToRoute('hetic_core_superadmin_tournament');
        // }
        //
        // return $this->render('HETICAppBundle:SuperAdmin/Tournament:index.html.twig');
    }

    public function showTournamentsAction() {
        $em = $this->getDoctrine()->getManager();
        $tournaments = $em->getRepository('HETICAppBundle:Tournament')->findAll();

        return $this->render('HETICAppBundle:SuperAdmin/Tournament:index.html.twig', array('tournaments' => $tournaments));
    }

    public function showStartupAction() {
        return $this->render('HETICAppBundle:Landing:index.html.twig');
    }

    public function validateStartupAction($id) {
        $em = $this->getDoctrine()->getManager();
        $startup = $em->getRepository('HETICCoreBundle:Startup')->findOneById($id);
        $startup->setStatus(1);
        $startup->setProfileStatus(1);
        $em->persist($startup);
        $em->flush();

        return $this->redirectToRoute('hetic_core_superadmin_homepage');
    }

    public function refuseStartupAction($id) {
        $em = $this->getDoctrine()->getManager();
        $startup = $em->getRepository('HETICCoreBundle:Startup')->findOneById($id);
        $startup->setStatus(0);
        $startup->setProfileStatus(0);
        $em->persist($startup);
        $em->flush();

        return $this->redirectToRoute('hetic_core_superadmin_homepage');
    }
}
