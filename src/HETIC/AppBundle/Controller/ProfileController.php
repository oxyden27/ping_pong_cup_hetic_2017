<?php

namespace HETIC\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProfileController extends Controller
{
    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();
        $startups = $em->getRepository('HETICCoreBundle:Startup')->findAllActive();
        return $this->render('HETICAppBundle:Profile:list.html.twig', array('startups' => $startups));
    }
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $startup = $em->getRepository('HETICCoreBundle:Startup')->findActive($id);
        return $this->render('HETICAppBundle:Profile:profile.html.twig', array('startup' => $startup));
    }
}
