<?php

namespace HETIC\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class TournamentController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $date = new \Datetime();
        $tournaments = $em->getRepository('HETICCoreBundle:Tournament')->findAllByDate($date);
        $user = $this->getUser();
        $startup = $user->getStartup();

        return $this->render('HETICCoreBundle:Tournament:index.html.twig', array('tournaments' => $tournaments, 'startup' => $startup));
    }

    public function joinAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $user = $this->getUser();
        $startup = $user->getStartup();
        $tournament = $em->getRepository('HETICCoreBundle:Tournament')->findOneById($id);

        $startup->addTournament($tournament);
        $em->persist($startup);
        $em->flush();

        return $this->redirectToRoute('hetic_core_tournament_show', array('id' => $id));
    }

    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $tournament = $em->getRepository('HETICCoreBundle:Tournament')->findOneById($id);

        return $this->render('HETICCoreBundle:Tournament:show.html.twig', array('tournament' => $tournament));
    }

    public function getPlayersAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $startup= $em->getRepository('HETICCoreBundle:Startup')->findOneById(1);

        // $startup = $user->getStartup();
        if ($startup != null) {
            $players = $startup->getPlayers();
            foreach ($players as $player) {
                $playersName[] = $player->getFirstname().' '.$player->getLastname();
            }

            return new JsonResponse($playersName);

        } else {
            throw new Exception("Une erreur s'est produite.", 1);
        }

    }

}
