<?php

namespace HETIC\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LandingController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $startups = $em->getRepository('HETICCoreBundle:Startup')->findAllActive();

        return $this->render('HETICAppBundle:Landing:index.html.twig', array('startups' => $startups));
    }
}
