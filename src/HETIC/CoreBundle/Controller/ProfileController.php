<?php

namespace HETIC\CoreBundle\Controller;

use HETIC\CoreBundle\Entity\Startup;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProfileController extends Controller
{
    public function indexAction(Startup $startup)
    {
        if ($this->getUser()->getStartup() != $startup) {
            throw new Exception("Vous ne pouvez pas accéder à cette startup");
        }

        return $this->render('HETICCoreBundle:Profile:index.html.twig', array('startup' => $startup));
    }

    public function editAction(Request $request, Startup $startup)
    {
        $editForm = $this->createForm('HETIC\CoreBundle\Form\StartupType', $startup);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('hetic_core_startup_profile', array('id' => $startup->getId()));
        }

        return $this->render('HETICCoreBundle:Profile:edit.html.twig', array(
            'startup' => $startup,
            'form' => $editForm->createView()
        ));
    }
}
