<?php

namespace HETIC\CoreBundle\Controller;

use HETIC\CoreBundle\Entity\Startup;
use HETIC\CoreBundle\Entity\Player;
use HETIC\CoreBundle\Form\PlayerType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Startup controller.
 *
 */
class StartupController extends Controller
{
    public function joinAction(Request $request, $id) {
        $player = new Player();
        $form = $this->createForm(PlayerType::class, $player);
        $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();
        $startup = $em->getRepository('HETICCoreBundle:Startup')->findOneById($id);

        if ($form->isValid()) {
            $player->setStartup($startup);
            $em->persist($player);
            $em->flush();

            return $this->redirectToRoute('hetic_app_homepage');
        }

        return $this->render('HETICCoreBundle:Invite:join.html.twig', array('form' => $form->createView(), 'startup' => $startup));
    }
}
