<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/accueil", name="accueil")
     */
    public function accueilAction()
    {
        return $this->render('/accueil/index.html.twig');
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contactAction()
    {
        return $this->render('/contact/index.html.twig');
    }


    /**
     * @Route("/coach", name="coachMenu")
     */

     public function testAction(Request $request)
     {
         // replace this example code with whatever you need
         return $this->render('coach/menu.html.twig', [
             'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
         ]);
     }

    /**
     * @Route("/clavier", name="clavier")
     */
    public function clavierAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('clavier/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/statsmatch", name="statsmatch")
     */
    public function statsAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('stats/general.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/cpa", name="cpa")
     */
    public function cpaAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('stats/cpa.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

}
