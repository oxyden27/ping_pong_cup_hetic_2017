<?php

namespace HETIC\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class LandingController extends Controller
{
    public function indexAction()
    {
        $user = $this->getUser();
        $startup = $user->getStartup();
        if ($startup != null) {
            $players = $startup->getPlayers();
            return $this->render('HETICCoreBundle:Landing:index.html.twig', array('startup' => $startup, 'owner' => $user, 'players' => $players));
        }

        return $this->redirectToRoute('hetic_core_superadmin_homepage');
    }

    public function inviteAction(Request $request) {
        $emails = $request->request->get('players');
        $players = explode(';', $emails);

        $user = $this->getUser();
        $startup = $user->getStartup();
        $url = $request->getScheme() . '://' . $request->getHttpHost() . $request->getBasePath() . '/startup/' . $startup->getId() . '/rejoindre';

        foreach ($players as $player) {
            $message = \Swift_Message::newInstance()
                ->setSubject('Invitation au Ping Pong Startup Cup')
                ->setFrom($user->getEmail())
                ->setTo($player)
                ->setBody(
                    $this->renderView(
                        'HETICCoreBundle:Invite:invite.html.twig',
                        array(
                            'startup' => $startup,
                            'url' => $url
                        )
                    ),
                    'text/html'
                )
            ;
            $this->get('mailer')->send($message);
        }

        // return $this->render('HETICCoreBundle:Invite:invite.html.twig', array('startup' => $startup, 'url' => $url));
        return $this->redirectToRoute('hetic_core_homepage');
    }
}
